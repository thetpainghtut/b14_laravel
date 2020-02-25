@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2>Trainer Create Form</h2>

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
        <form method="post" action="{{route('trainers.store')}}" enctype="multipart/form-data">
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
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
              @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="inputAvatar" name="avatar">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Choose Course</label>
            <div class="col-sm-10">
              <select name="course" class="form-control">
                <option value="">Select Course</option>
                @foreach($courses as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Choose Degree</label>
            <div class="col-sm-10">
              <select name="degree" class="form-control">
                <option value="">Select Degree</option>
                @foreach($degrees as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputAddress" name="address"></textarea>
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