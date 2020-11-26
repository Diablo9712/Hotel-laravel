
@extends('csv_file')

@section('csv_data')

<table class="table table-bordered table-striped">
 <thead class="thead-dark">
  <tr>
  <th>#</th>
   <th>Code </th>
   <th>Country Name</th>
  </tr>
 </thead>
 <tbody>
 @foreach($data as $row)
  <tr>
  <td>{{ $row->id }}</td>
   <td>{{ $row->code }}</td>
   <td>{{ $row->name }}</td>
  </tr>
 @endforeach
 </tbody>
</table>

{!! $data->links() !!}

@endsection