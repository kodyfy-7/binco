<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = DB::table('lga')
                            ->select('lga_name', 'uniqueid')
                            ->orderBy('lga_name')
                            ->get();
        return view('q2', compact('lgas'));
    }

    public function polling_result(PollingUnit $polling_unit)
    {
        $results = DB::table('announced_pu_results')
                            ->select('party_abbreviation', 'party_score', 'result_id')
                            ->where('polling_unit_uniqueid', '=', $polling_unit->uniqueid)
                            ->orderBy('party_abbreviation')
                            ->get();
        return view('polling_result', compact('results', 'polling_unit'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
