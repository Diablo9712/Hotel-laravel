@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewCity" style="float:right"> Add New City</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Country </th>
                <th>Name</th>
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
                <form id="cityForm" name="cityForm" class="form-horizontal">
                   <input type="hidden" name="city_id" id="city_id" class="form-control" >
                  
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label"> Country</label>
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
                        <label class="col-sm-2 control-label">Name City</label>
                        <div class="col-sm-12">
                            <textarea id="nom" name="nom" required="" placeholder="Enter City" class="form-control"></textarea>
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
        ajax: "{{ route('city.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'CountryId'},
            {data: 'nom', name: 'nom'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewCity').click(function () {
        $('#saveBtn').val("create-city");
        $('#city_id').val('');
        $('#cityyForm').trigger("reset");
        $('#modelHeading').html("Create New City");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var country_id = $(this).data('id');
      $.get("{{ route('city.index') }}" +'/' + country_id +'/edit', function (data) {
          $('#modelHeading').html("Edit City");
          $('#saveBtn').val("edit-city");
          $('#ajaxModel').modal('show');
          $('#city_id').val(data.id);
          $('#CountryId').val(data.CountryId);
          $('#nom').val(data.nom);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#cityForm').serialize(),
          url: "{{ route('city.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#cityForm').trigger("reset");
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
            url: "{{ route('city.store') }}"+'/'+id,
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