@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewSaison" style="float:right"> Add New Saison</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Libelle</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
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
                <form id="saisonForm" name="saisonForm" class="form-horizontal">
                   <input type="hidden" name="saison_id" id="saison_id" class="form-control" >
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Enter Name Saison" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Start</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="Enter Name Saison" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">End</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date_fin" name="date_fin" placeholder="Enter Name Saison" value="" maxlength="50" required="">
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
        ajax: "{{ route('saison.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'libelle', name: 'libelle'},
            {data: 'date_debut', name: 'date_debut'},
            {data: 'date_fin' , name: 'date_fin'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewSaison').click(function () {
        $('#saveBtn').val("create-saison");
        $('#saison_id').val('');
        $('#saisonForm').trigger("reset");
        $('#modelHeading').html("Create New Saison");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var saison_id = $(this).data('id');
      $.get("{{ route('saison.index') }}" +'/' + saison_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Saison");
          $('#saveBtn').val("edit-saison");
          $('#ajaxModel').modal('show');
          $('#saison_id').val(data.id);
          $('#libelle').val(data.libelle);
          $('#date_debut').val(data.date_debut);
          $('#date_fin').val(data.date_fin);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#saisonForm').serialize(),
          url: "{{ route('saison.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#saisonForm').trigger("reset");
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
            url: "{{ route('saison.store') }}"+'/'+id,
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