@extends('layouts.layout')

@section('title')
  
    
@endsection

@section('body')
<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Booking</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                   



                  <form role="form"  action="{{ url('find_rooms/') }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
<?php $x = $_GET['test'];$xx = $_GET['text'];

$datetime1 = new DateTime($x);
                         $datetime2 = new DateTime($xx);
?>
                    <div class="card-body">
                      <div class="form-group">
                        <label >Room Number</label>
                        <input type="hidden" name="vv" value="{{$room->id}}"/>
                        <input type="text" name="title" class="form-control" value="{{ $room->number }}" disabled >
                      </div>
                      <?php
	$date1=$x;
	$date2=$xx;
	function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	$dateDiff= dateDiff($date1, $date2);
	
?>
                      <div class="form-group">
                        <label >Start Date</label>
                      
                        <input type="date" name="debut" id="debut" class="form-control" value="<?php echo date($x);?>" >
                      </div>

                      <div class="form-group">
                        <label >end Date</label>
                        <input type="date" name="fin" id="fin" class="form-control" value="<?php echo date($xx);?>" >
                      </div>

                      <div class="form-group">
                        <label >Number of Days</label>
                        <input type="text" name="number" class="form-control" value="<?php echo $dateDiff; ?>" disabled>
                      </div>
                    
                      <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Client :</label>
                                <select name="client" id="client" class="form-control">
                                    @foreach($users as $user)
                                    if($user->role != 'user')
                                        <option value="{{ $user->id }}">{{ $user ->fullname}}</option>
                                    @endforeach
                                </select>
                           
                        </div>
                    </div>
                  
          
                      <button type="submit" class="btn btn-danger" style="float:right">Create</button>
                   
                  </form>




                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>

</div>
<script >
    $('body').on('load', function () {
        $('#fin').val('#debut');
       
      
   });

</script>
@endsection