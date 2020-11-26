
@extends('layouts.layout')
@section('body')

<div class="container">

    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
        <div class="card-header">
                   
                      <div class="card-tools">
                          <a class="btn btn-success" href="{{ url('services/create') }}">
                             Liste des Services Demander
                              <i class="fa fa-plus"></i>
                          </a>
                      </div>
                  </div>
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Services</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                   

               

                  <form role="form"  action="{{ url('services/') }}" method="post">
                    {{csrf_field()}}
                    

                    <div class="card-body">
                      <div class="form-group">
                        <label >Client</label>
                        <select name="client" id="client" class="form-control">
                                    @foreach($users as $user)
                                   
                                        <option value="{{ $user->id }}">{{ $user ->fullname}}</option>
                                    @endforeach
                                </select>
                             </div>

                      <div class="form-group">
                        <label >Services</label>
                      <br>
                        <select multiple data-placeholder="Choose anything" id="service" name="service[]" data-allow-clear="1" class="form-control select2">
                        @foreach($services as $service)
                                   
                                   <option value="{{ $service->id }}">{{ $service ->description }} {{ $service ->prix}}DH</option>
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
        <div class="table-responsive">
     
   </div>
</div>

<br> 

{{--<script src="{{ URL::asset('dist/js/script.js') }}"></script>--}}


<script>


    $(document).ready(function () {
  $('#service').select2();
})
	$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "Placeholder",
			allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});

			$('.icons_select2').select2({
				width: "100%",
				templateSelection: iformat,
				templateResult: iformat,
				allowHtml: true,
				placeholder: "Placeholder",
				dropdownParent: $( '.select-icon' ),//обавили класс
				allowClear: true,
				multiple: false
			});
	

				function iformat(icon, badge,) {
					var originalOption = icon.element;
					var originalOptionBadge = $(originalOption).data('badge');
				 
					return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
				}

</script>
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