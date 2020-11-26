@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container">
   
    <a class="btn btn-success" href="javascript:void(0)" id="createNewTarif" style="float:right"> Add New Tarif</a><br><br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Saison</th>
                <th>Prix</th>
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
                <form id="tarifForm" name="TarifForm" class="form-horizontal">
                @csrf       <input type="hidden" name="tarif_id" id="tarif_id" class="form-control" >
                
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-12">
                            <select name="CategoryId" id="CategoryId" class="form-control">


                            <option value="">Select Category </option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->libelle  }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <select name="SaisonId" id="SaisonId" class="form-control">

                            <option value="">Select Saison </option>
                            @foreach ($saisons as $saison)
                                <option value="{{$saison->id}}">{{$saison->libelle  }}</option>
                            @endforeach
                           

                            </select>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Prix</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter Prix" value="" maxlength="50" required="">
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
        ajax: "{{ route('tarif.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'libelle', name: 'libelle'},
            {data: 'nom', name: 'nom'},
            {data: 'date_debut', name: 'date_debut'},
            {data: 'date_fin', name: 'date_fin'},
            {data: 'prix', name: 'prix'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewTarif').click(function () {
        $('#saveBtn').val("create-tarif");
        $('#tarif_id').val('');
        $('#tarifForm').trigger("reset");
        $('#modelHeading').html("Create New Tarif");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.edit', function () {
       
      var tarif_id = $(this).data('id');
      $.get("{{ route('tarif.index') }}" +'/' + tarif_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Tarif");
          $('#saveBtn').val("edit-tarif");
          $('#ajaxModel').modal('show');
          $('#tarif_id').val(data.id);
          $('#CategoryId').val(data.CatId);
          $('#SaisonId').val(data.saisonId);
          $('#prix').val(data.prix);
      
       
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#tarifForm').serialize(),
          url: "{{ route('tarif.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#tarifForm').trigger("reset");
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
            url: "{{ route('tarif.store') }}"+'/'+id,
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