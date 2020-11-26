
@extends('layouts.layout')
@section('body')

<div class="container">
<div class="card-header">
                    
                      <div class="card-tools">
                          <a class="btn btn-primary" href="{{ url('services/index') }}">
                              Nouvelle Service
                              <i class="fa fa-plus"></i>
                          </a>
                      </div>
                  </div>
<div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
            <th width="20%">Client</th>
                <th width="20%">Description</th>
                <th width="10%">Price</th>
                <th width="30%">Image</th>
                <th width="30%">Action</th>
            </tr>
           </thead>
       </table>
   </div>
   
</div>

<br> 



<script src="{{ asset('dist/js/jquery.js') }}"></script>  

    <script src="{{ asset('dist/js/jquery.dataTables.min.js')}}"></script>
  <!--  <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/jquery.validate.js')}}"></script>-->
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>  


<script>

$(document).ready(function(){

$('#user_table').DataTable({
 processing: true,
 serverSide: true,
 ajax:{
  url: "{{ route('services.create') }}",
 },
 columns:[
 
  {
   data: 'fullname',
   name: 'fullname'
  },
  {
   data: 'description',
   name: 'description'
  },
  {
   data: 'prix',
   name: 'prix'
  },

  {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/images/" + data + " width='70' style='border-radius:50%' class='img-thumbnail' />";
    },
    orderable: false
   },
  {
   data: 'action',
   name: 'action',
   orderable: false
  }
 ]
});
});
</script>
@endsection