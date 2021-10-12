<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\{
    PollingUnit,
    Party,
    Lga,
    Ward,
    AnnouncedPuResult
};

class PollingUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pulling data from polling unit joint with lga table
        $polling_units = DB::table('polling_unit')
                            ->select('polling_unit.uniqueid', 'polling_unit_name', 'polling_unit.lga_id','lga_name', 'polling_unit_number')
                            ->join('lga', 'lga.lga_id', '=', 'polling_unit.lga_id')
                            ->orderBy('lga.lga_name')
                            ->get();
        return view('q1', compact('polling_units'));
    }

    public function polling_result(PollingUnit $polling_unit)
    { 
        // pulling data from announced pu results table using slug from q1
        $results = DB::table('announced_pu_results')
                            ->select('party_abbreviation', 'party_score', 'result_id')
                            ->where('polling_unit_uniqueid', '=', $polling_unit->uniqueid)
                            ->orderBy('party_abbreviation')
                            ->get();
        return view('polling_result', compact('results', 'polling_unit'));
    }

    public function lga()
    {
        $lgas = Lga::all();
        return view('q2', compact('lgas'));
    }

    public function get_result(Request $request)
    {
        // Get the lga from the request
        $lga = $request->lga;
        $lga_detail = Lga::where('uniqueid', '=', $lga)->first();
    
        // Search in the lga_id columns from the polling unit table
        $unit = PollingUnit::query()
            ->where('lga_id', 'LIKE', "%{$lga}%")
            ->first();

        $r = AnnouncedPuResult::where('polling_unit_uniqueid', '=', $unit->uniqueid)->sum('party_score');
       
        $lgas = Lga::all();
    
        // Return the view with the results compacted
        return view('q2', compact('lgas', 'r', 'lga_detail'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parties = Party::all();
        $lgas = Lga::all();
        $wards = Ward::all();
        return view('q3', compact('parties', 'lgas', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'polling_unit_id' => ['required', 'integer'],
            'lga' => ['required', 'string'],
            'ward' => ['required', 'string'],
            'polling_unit_name' => ['required', 'string'],
        ]);

        $last_entry = PollingUnit::orderBy('uniqueid', 'desc')->first();
        $new_uniqueid = $last_entry->uniqueid+1;
        $rand = mt_rand(0,100);
        $new_polling_unit_number = $last_entry->polling_unit_number.'_'.$rand;

        $ward_detail = Ward::where('uniqueid', '=', $request->ward)->first();

        $new_polling_unit = PollingUnit::create([
            'uniqueid' => $new_uniqueid,
            'polling_unit_id' => $request->polling_unit_id,
            'lga_id' => $request->lga,
            'ward_id' => $ward_detail->ward_id,
            'uniquewardid' => $request->ward,
            'polling_unit_number' => $new_polling_unit_number,
            'polling_unit_name' => $request->polling_unit_name,
        ]);

        $last_entry = AnnouncedPuResult::orderBy('result_id', 'desc')->first();
        $new_id = $last_entry->result_id+1;

        for($i = 0; $i < count($request->party); $i++)
        {
            $last_entry = AnnouncedPuResult::orderBy('result_id', 'desc')->first();
            $new_id = $last_entry->result_id+1;
            AnnouncedPuResult::create([
                'result_id' => $new_id,
                'polling_unit_uniqueid' => $new_polling_unit->polling_unit_id,
                'party_abbreviation' => $request->party[$i],
                'party_score' => $request->score[$i],
                'entered_by_user' => 'Bose',
                'date_entered' => now(),
                'user_ip_address' => '100.00.00.00'
            ]);
        }

        return redirect()->back()->with('success', 'Data saved successfully');
    }

}
