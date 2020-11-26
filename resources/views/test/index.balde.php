@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewHotel" style="float:right"> Add New Hotel</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Country</th>
                <th>City</th>
                <th>Address</th>
                <th>Code Postal</th>
                <th>Phone</th>
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
                <form id="hotelForm" name="HotelForm" class="form-horizontal">
                @csrf       <input type="hidden" name="hotel_id" id="hotel_id" class="form-control" >
                <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="namehotel" name="namehotel" placeholder="Enter Address" value="" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <select name="CountryId" id="CountryId" class="form-control">


                            <option value="">Select country </option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->name  }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <select name="CityId" id="CityId" class="form-control">


                            <option value="">Select City </option>
                           

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <select name="Hotels" id="Hotels" class="form-control">


                            <option value="">Select Hotel </option>
                           

                            </select>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">CodePostal</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Enter Code postal" value="" maxlength="50" required="">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="" maxlength="50" required="">
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
    <script src="{{ asset('dist/js/jquery.validate.js')}}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>  
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


    $('#createNewHotel').click(function () {
        $('#saveBtn').val("create-hotel");
        $('#hotel_id').val('');
        $('#hotelForm').trigger("reset");
        $('#modelHeading').html("Create New Hotel");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
       
      var hotel_id = $(this).data('id');
      $.get("{{ route('test.index') }}" +'/' + hotel_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Hotel");
          $('#saveBtn').val("edit-hotel");
          $('#ajaxModel').modal('show');
          $('#hotel_id').val(data.id);
          $('#namehotel').val(data.namehotel);
          $('#CountryId').val(data.CountryId);
          $('#CityId').val(data.CityId);
          $('#address').val(data.address);
          $('#codepostal').val(data.codepostal);
          $('#phone').val(data.phone);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#hotelForm').serialize(),
          url: "{{ route('test.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#hotelForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    $(document).ready(function(){
                      $('select[name="CountryId"]').on('change',function(){
                          var country_id = $(this).val();

                          if(country_id){
                           $.ajax({

                            url:'/test/getStates/'+country_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data){
                                console.log(data);

                                $('select[name="CityId"]').empty();
                                $.each(data, function(key, value){
                                        $('select[name="CityId"]').append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                           });
                          }
                          else{
                            $('select[name="CityId"]').empty();
                          }
                      });
                });


                $(document).ready(function(){
                      $('select[name="CityId"]').on('change',function(){
                          var country_id = $(this).val();

                          if(country_id){
                           $.ajax({

                            url:'/test/getHotels/'+country_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data){
                                console.log(data);

                                $('select[name="CityId"]').empty();
                                $.each(data, function(key, value){
                                        $('select[name="Hotels"]').append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                           });
                          }
                          else{
                            $('select[name="Hotels"]').empty();
                          }
                      });
                });
    $('body').on('click', '.delete', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('test.store') }}"+'/'+id,
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