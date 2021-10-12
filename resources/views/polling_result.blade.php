@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Question 1</h1>
            <p class="lead">Result for individual polling unit</p>
            @if (count($results)>0)
              <table class="table">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Party</th>
                    <th>Score</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $result)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$result->party_abbreviation}}</td>
                        <td>{{$result->party_score}}</td>
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