@extends('layouts.layout')

@section('body')

<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">

<form method="post" action="{{  route('find_rooms.index') }}">
     
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Date Debut</label>
    <div class="col-sm-10">
      <input type="date"  class="form-control"  name="debut" id="debut" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Date Fin</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  name="fin" id="fin" >
    </div>
  </div>
  <div class="form-group row">
  {{csrf_field()}}
    <div class="col-sm-10">

    <button type="submit" name="submit" class="btn btn-danger mb-2"  style="float:right">Search for Rooms</button>
    </div>
  </div>

</form>
<br><br>
@if (isset($rooms) && is_null($rooms))
            <div class="form-group" style="text-align: center">
                <label></label>
            </div>
        @endif
        @if (!is_null($rooms))
<div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                  
                    <th>Number Room</th>
                    <th>Phone</th>
                    <th>Category</th>
                  
                </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr >
                        
                            <td>{{ $room->id }}</td>
                          
                            <td >{{ $room->number }}</td>
                            <td >{{ $room->phone }}</td>
                          
                            <td >{{ $room->libelle     }}</td>
                           
                            <td>
                           
                            <form method="GET" action="{{ url('find_rooms/'.$room->id.'/create') }}">
                            
                                      <input type="hidden" id="test" name="test" value="{{ $date_debut}}">
                                      <input type="hidden" id="tevt" name="text" value="{{ $date_fin}}">
                                
                                          <button type="submit"   class="btn btn-sm btn-danger">Booking</button>
                                      

</form>    
                                
                                    
                            </td>
                        </tr>
                    @endforeach
            
                </tbody>
            </table>
        </div>
</div>
   
@endif
<script>
$( "#debut" )
  .keyup(function() {
    var value = $( this ).val();
    $( "#test" ).text( value );
  })
  .keyup();
</script>
<script>
$( "#fin" )
  .keyup(function() {
    var value = $( this ).val();
    $( "#tevt" ).text( value );
  })
  .keyup();
</script>

<script src="{{ asset('dist/js/jquery.js') }}"></script>  
    <script src="{{ asset('dist/js/jquery.validate.js')}}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>  
@endsection