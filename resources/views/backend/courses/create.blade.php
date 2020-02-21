@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2>Course Create Form</h2>

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
        <form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="inputLogo" name="logo">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputOutlines" class="col-sm-2 col-form-label">Outlines</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputOutlines" name="outlines"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputFees" class="col-sm-2 col-form-label">Fees</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputFees" name="fees">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputDuring" class="col-sm-2 col-form-label">During</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDuring" name="during">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDuration" name="duration">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
@endsection