@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Question 3</h1>
            <p class="lead">New polling unit data</p>
            @include('inc.messages')
            <form method="POST" action="{{ route('q3.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="polling_unit_id" class="col-md-4 col-form-label text-md-right">{{ __('Polling Unit ID') }}</label>
  
                    <div class="col-md-6">
                        <input id="polling_unit_id" type="text" class="form-control @error('polling_unit_id') is-invalid @enderror" name="polling_unit_id" value="{{ old('polling_unit') }}" required autocomplete="polling_unit_id" placeholder="Polling Unit Id" autofocus>
                                      
                        @error('polling_unit_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                              
                </div>
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
                <div class="form-group row">
                    <label for="ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward') }}</label>
                    <div class="col-md-6">
                        <select name="ward" class="form-control" id="ward" required>
                            <option value="">Select ward</option>                       
                                @foreach($wards as $ward)
                                    <option value="{{$ward->uniqueid}}">{{$ward->ward_name}} </option>
                                @endforeach
                        </select>      
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="polling_unit_name" class="col-md-4 col-form-label text-md-right">{{ __('Polling Unit Name') }}</label>
                    <div class="col-md-6">
                        <input id="polling_unit_name" type="text" class="form-control @error('polling_unit_name') is-invalid @enderror" name="polling_unit_name" value="{{ old('polling_unit_name') }}" required autocomplete="polling_unit_name" autofocus>
                                    
                        @error('polling_unit_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <table id="party_table" class="table">
                        <tr>
                            <th>Party</th>
                            <th>Score</th>
                            <th width="5%"><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button></th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select name="party[]" class="form-control" id="party1" required>
                                        <option value="">Select party</option>
                                             
                                        @foreach($parties as $party)
                                            <option value="{{$party->partyname}}">{{$party->partyname}} </option>
                                        @endforeach
                                    </select>      
                                </div>                                           
                            </td>
                            <td>
                                <div class="form-group">
                                    <input id="score1" type="text" class="form-control" name="score[]">
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                                  
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')

  <script>
    var count = 1;         
    $(document).on('click', '#add_row', function(){
      count++;
      $('#total_item').val(count);
      var html_code = '';
      html_code += '<tr id="row_id_'+count+'">';      
      html_code += '<td><select name="party[]" class="form-control" id="party'+count+'"><option value="">Select party</option>@foreach($parties as $party)<option value="{{$party->partyname}}">{{$party->partyname}}</option>                                        @endforeach</select>      </td>';
        html_code += '<td><input name="score[]" class="form-control" id="score'+count+'">   </td>';
      html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
      html_code += '</tr>';
        $('#party_table').append(html_code);
    });
                    
    $(document).on('click', '.remove_row', function(){
      var row_id = $(this).attr("id");
      $('#row_id_'+row_id).remove();
      count--;
      $('#total_item').val(count);
    });
  </script>
    
@endsection