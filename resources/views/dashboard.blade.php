@extends('layouts.layout')
@section('body')
<div class="container">
   <h3 align="center">Les Services Plus Demander
</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Les Services Plus Demander Par Clients</h3>
    </div>
                <div class="container">
                        <div class="row">
                                <div class="col-md-6">
            Les Services Plus Demander
                                    <ul class="chart">
                                        @foreach($data as $row)
                                            <li data-data="{{$row->total}}">{{$row->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                </div>

                <script>
                        $(function () {
                            $("ul.chart").hBarChart();
                        })
                </script>
    
    </div>
   </div>
   
  </div>


@endsection