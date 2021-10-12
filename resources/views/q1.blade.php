@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Question 1</h1>
            <p class="lead">Delta state lga</p>
            @if (count($polling_units)>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>LGA</th>
                            <th>Polling Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polling_units as $polling_unit)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$polling_unit->lga_name}}</td>
                                <td>{{$polling_unit->polling_unit_name}}</td>
                                <td><a href="/polling_result/{{$polling_unit->polling_unit_number}}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No data</p>
            @endif
        </div>
    </div>
@endsection