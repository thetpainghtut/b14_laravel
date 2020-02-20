@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2>Show with table</h2>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Fees</th>
              <th>During</th>
              <th>Duration</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($courses as $row)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->fees}}</td>
              <td>{{$row->during}}</td>
              <td>{{$row->duration}}</td>
              <td>
                <a href="{{route('courses.show',$row->id)}}" class="btn btn-info">Detail</a>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection