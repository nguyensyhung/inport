
@extends('csv_file')

@section('csv_data')

<table class="table table-bordered table-striped">
 <thead>
  <tr>
   <th>Name</th>
   <th>Email Address</th>
   <th>Export</th>
  </tr>
 </thead>
 <tbody>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td><a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a></td>
  </tr>
 @endforeach
 </tbody>
</table>

{!! $data->links() !!}

@endsection