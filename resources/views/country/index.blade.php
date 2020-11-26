@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewCountry" style="float:right"> Add New Country</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
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
                <form id="countryForm" name="countryForm" class="form-horizontal">
                   <input type="hidden" name="country_id" id="country_id" class="form-control" >
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <textarea id="name" name="name" required="" placeholder="Enter Country" class="form-control"></textarea>
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
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('country.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewCountry').click(function () {
        $('#saveBtn').val("create-country");
        $('#country_id').val('');
        $('#countryForm').trigger("reset");
        $('#modelHeading').html("Create New Country");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var country_id = $(this).data('id');
      $.get("{{ route('country.index') }}" +'/' + country_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Country");
          $('#saveBtn').val("edit-country");
          $('#ajaxModel').modal('show');
          $('#country_id').val(data.id);
          $('#code').val(data.code);
          $('#name').val(data.name);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#countryForm').serialize(),
          url: "{{ route('country.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#countryForm').trigger("reset");
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
            url: "{{ route('country.store') }}"+'/'+id,
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