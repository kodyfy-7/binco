@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Question 2</h1>
            <p class="lead">Delta state lga</p>
            @isset($r)
                <h4>Sum of polling units result in {{$lga_detail->lga_name}}: <strong>{{$r}}</strong></h4>
            @endisset
            <form method="GET" action="{{ route('get_result') }}">
                @csrf
                <div class="form-group row">
                    <label for="lga" class="col-md-4 col-form-label text-md-right">{{ __('LGA') }}</label>
                    <div class="col-md-6">
                        <select name="lga" class="form-control" id="lga" required>
                            <option value="">Select lga</option>                                   
                                @foreach($lgas as $lga)
                                    <option value="{{$lga->uniqueid}}">{{$lga->lga_name}} </option>
                                @endforeach
                        </select>     
                    </div> 
                </div>            
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                            {{ __('Get data') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection