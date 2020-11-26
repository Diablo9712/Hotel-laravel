@extends('layouts.layout')
@section('body')
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <div class="container">    
     <br />
     <h3 align="center">Import Export Data Country</h3>
     <br />
     <div class="panel panel-default">
          <div class="panel-heading">
           <h3 class="panel-title">Import / Export CSV File</h3>
          </div>
          <div class="panel-body">
           <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
                  <br><br>
                  <button class="btn btn-success"  >Import Country Data</button>
                  <a class="btn btn-danger" href="{{ route('export') }}" style="float:right">Export Country Data</a>
           </form><br>
              @yield('csv_data')
          </div>
      </div>
  </div>
  @endsection