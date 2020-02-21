@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2>Show with form / old value</h2>
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action="{{route('courses.update',$course->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="name" value="{{$course->name}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-10">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a href="#old" class="nav-link active" data-toggle="tab">Old</a>
                </li>
                <li class="nav-item">
                  <a href="#new" class="nav-link" data-toggle="tab">New</a>
                </li>
              </ul>

              <div class="tab-content py-3">
                <div class="tab-pane fade show active" id="old">
                  <img src="{{asset($course->logo)}}" class="img-fluid w-25">
                  <input type="hidden" name="oldlogo" value="{{$course->logo}}">
                </div>
                <div class="tab-pane fade" id="new">
                  <input type="file" class="form-control-file" id="inputLogo" name="logo">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputOutlines" class="col-sm-2 col-form-label">Outlines</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputOutlines" name="outlines">{{$course->outline}}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputFees" class="col-sm-2 col-form-label">Fees</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputFees" name="fees" value="{{$course->fees}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputDuring" class="col-sm-2 col-form-label">During</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDuring" name="during" value="{{$course->during}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDuration" name="duration" value="{{$course->duration}}">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection