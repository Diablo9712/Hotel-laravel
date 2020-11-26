@extends('layouts.layout')

@section('body')
<link rel="stylesheet" href="{{ URL::asset('dist/css/bootstrap.min.css') }}" />
    <link href="{{ URL::asset('dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<div class="container">    
     <br />
    
     <br />
   
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
            <th>No</th>
                <th>Client</th>
                <th>Category</th>
                <th>Room Number</th>
                <th>Start Date</th>
                <th>End Date</th>
               
                <th width="300px">Action</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />

   
   <div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Fullname : </label>
            <div class="col-md-8">
             <input type="text" name="fullname" id="fullname" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">CIN: </label>
            <div class="col-md-8">
             <input type="text" name="cin" id="cin" class="form-control" />
            </div>
           </div>

           <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <select name="CountryId" id="CountryId" class="form-control">


                          

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
            <label class="control-label col-md-4">Address: </label>
            <div class="col-md-8">
             <input type="text" name="address" id="address" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">CodePostal: </label>
            <div class="col-md-8">
             <input type="text" name="codepostal" id="codepostal" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Phone: </label>
            <div class="col-md-8">
             <input type="text" name="phone" id="phone" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Email: </label>
            <div class="col-md-8">
             <input type="email" name="email" id="email" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Password: </label>
            <div class="col-md-8">
             <input type="password" name="password" id="password" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="hidden" id='code' name="_method" >
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

  </div>   

<script src="{{ asset('dist/js/jquery.js') }}"></script>  
    <script src="{{ asset('dist/js/jquery.validate.js')}}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>  
<script type="text/javascript">
$(document).ready(function(){

$('#user_table').DataTable({
 processing: true,
 serverSide: true,
 ajax:{
  url: "{{ route('booking.index') }}",
 },
 columns:[

  {
   data: 'id',
   name: 'id'
  },
  {
   data: 'fullname',
   name: 'fullname'
  },
  {
   data: 'libelle',
   name: 'libelle'
  },
  {
   data: 'number',
   name: 'number'
  },
  {
   data: 'debut',
   name: 'debut'
  },


  {
   data: 'fin',
   name: 'fin'
  },

  {
   data: 'action',
   name: 'action',
   orderable: false
  }
 ]
});

$('#create_record').click(function(){
 $('.modal-title').text("Add New Record");
    $('#action_button').val("Add");
    $('#action').val("Add");
    $('#formModal').modal('show');
   
});

$('#sample_form').on('submit', function(event){
 event.preventDefault();
 if($('#action').val() == 'Add')
 {
   $.ajax({
   url:"{{ route('client.store') }}",
   method:"POST",
   data: new FormData(this),
   contentType: false,
   cache:false,
   processData: false,
   dataType:"json",
   success:function(data)
   {
    var html = '';
    if(data.errors)
    {
     html = '<div class="alert alert-danger">';
     for(var count = 0; count < data.errors.length; count++)
     {
      html += '<p>' + data.errors[count] + '</p>';
     }
     html += '</div>';
    }
    if(data.success)
    {
     html = '<div class="alert alert-success">' + data.success + '</div>';
     $('#sample_form')[0].reset();
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  })
 }

 if($('#action').val() == "Edit")
 {
   $('#code').val("PUT");
  $.ajax({
   url:"{{ route('client.update') }}",
   method:"POST",
   data:new FormData(this),
   contentType: false,
   cache: false,
   processData: false,
   dataType:"json",
   
   success:function(data)
   {
    var html = '';
    if(data.errors)
    {
     html = '<div class="alert alert-danger">';
     for(var count = 0; count < data.errors.length; count++)
     {
      html += '<p>' + data.errors[count] + '</p>';
     }
     html += '</div>';
    }
    if(data.success)
    {
     html = '<div class="alert alert-success">' + data.success + '</div>';
     $('#sample_form')[0].reset();
     $('#store_image').html('');
     
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  });
 }
});
$(document).ready(function(){
                     $('select[name="CountryId"]').on('change',function(){
                         var country_id = $(this).val();

                         if(country_id){
                          $.ajax({

                           url:'/hotel/getStates/'+country_id,
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
$(document).on('click', '.edit', function(){
 var id = $(this).attr('id');
 $('#form_result').html('');
 $.ajax({
  url:"/client/"+id+"/edit",
  dataType:"json",
  success:function(html){
   $('#fullname').val(html.data.fullname);
   $('#cin').val(html.data.cin);
   $('#CountryId').val(html.data.CountryId);
   $('#CityId').val(html.data.CityId);
   $('#address').val(html.data.address);
   $('#codepostal').val(html.data.codepostal);
   $('#phone').val(html.data.phone);
   $('#email').val(html.data.email);
   $('#password').val(html.data.password);
   $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
   $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
   $('#hidden_id').val(html.data.id);
   $('.modal-title').text("Edit New Record");
   $('#action_button').val("Edit");
   $('#action').val("Edit");
   $('#formModal').modal('show');
  }
 })
});

var user_id;

$(document).on('click', '.delete', function(){
 user_id = $(this).attr('id');
 $('#confirmModal').modal('show');
});

$('#ok_button').click(function(){
 $.ajax({
  url:"client/destroy/"+user_id,
  beforeSend:function(){
   $('#ok_button').text('Deleting...');
  },
  success:function(data)
  {
   setTimeout(function(){
    $('#confirmModal').modal('hide');
    $('#user_table').DataTable().ajax.reload();
   }, 2000);
  }
 })
});

});

  

     
  
</script>
@endsection