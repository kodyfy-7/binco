@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 text-center">
        <h1 class="mt-5">Uche George Ogbechie</h1>
        <p class="lead">Solution to test.</p>
        <ul class="list-unstyled">
            <li> <a  href="{{route('q1')}}">Question One</a></li>
            <li> <a  href="{{route('q2')}}">Question Two</a></li>
            <li> <a  href="{{route('q3.create')}}">Question Three</a></li>
        </ul>
        </div>
    </div>
@endsection