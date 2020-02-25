@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2 class="d-inline-block">Show with table</h2>
    <a href="{{route('courses.create')}}" class="btn btn-info float-right">Add New</a>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($trainers as $row)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$row->user->name}}</td>
              <td>{{$row->user->email}}</td>
              <td>{{$row->phone}}</td>
              <td>{{$row->address}}</td>
              <td>
                <a href="{{route('trainers.show',$row->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>

                <a href="{{route('trainers.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                <form method="post" action="{{route('trainers.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                </form>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection