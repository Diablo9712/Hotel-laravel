@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewRoom" style="float:right"> Add New Room</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Number </th>
                <th>Phone</th>
                <th>Hotel </th>
                <th>Category</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="roomForm" name="roomForm" class="form-horizontal">
                   <input type="hidden" name="room_id" id="room_id" class="form-control" >
                  
                   <div class="form-group">
                        <label class="col-sm-2 control-label"> Number</label>
                        <div class="col-sm-12">
                            <input type="text" id="number" name="number" required="" placeholder="Enter Room Number" class="form-control"/>                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" id="phone" name="phone" required="" placeholder="Enter Phone" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label"> Category</label>
                        <div class="col-sm-12">
                             <select name="CatId" id="CatId" class="form-control">


                        <option value="">Select category </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->libelle  }}</option>
                        @endforeach

                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label"> Hotel</label>
                        <div class="col-sm-12">
                             <select name="HotelId" id="HotelId" class="form-control">


                        <option value="">Select hotel </option>
                        @foreach ($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->namehotel  }}</option>
                        @endforeach

                        </select>
                        </div>
                    </div>
     
                
                   
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
            
    </div>
</div>
    

<script src="{{ asset('dist/js/jquery.js') }}"></script>  

    <script src="{{ asset('dist/js/jquery.dataTables.min.js')}}"></script>
  <!--  <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/jquery.validate.js')}}"></script>-->
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>  
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('room.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'number', name: 'number'},
            {data: 'phone', name: 'phone'},
            {data: 'namehotel', name: 'namehotel'},
            {data: 'libelle', name: 'libelle'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewRoom').click(function () {
        $('#saveBtn').val("create-room");
        $('#room').val('');
        $('#roomForm').trigger("reset");
        $('#modelHeading').html("Create New Room");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var country_id = $(this).data('id');
      $.get("{{ route('room.index') }}" +'/' + country_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Room");
          $('#saveBtn').val("edit-room");
          $('#ajaxModel').modal('show');
          $('#room_id').val(data.id);
          $('#CatId').val(data.CatId);
          $('#HotelId').val(data.HotelId);
          $('#number').val(data.number);
          $('#phone').val(data.phone);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
      
        $.ajax({
          data: $('#roomForm').serialize(),
          url: "{{ route('room.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#roomForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.delete', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('room.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
@endsection