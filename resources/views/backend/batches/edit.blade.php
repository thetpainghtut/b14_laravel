@extends('backendtemplate')
@section('content')
  <div class="container-fluid">
    <h2>Edit Form</h2>

    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('batches.update',$batch->id)}}">
          @csrf
          <div class="form-group row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" value="{{ $batch->title }}" required autocomplete="title" autofocus>
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="inputStartDate" name="start_date" value="{{ $batch->startdate }}" required autocomplete="start_date" autofocus>
              @error('start_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEndDate" class="col-sm-2 col-form-label">End Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="inputEndDate" name="end_date" value="{{ $batch->enddate }}" required autocomplete="end_date" autofocus>
              @error('end_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('time') is-invalid @enderror" id="inputTime" name="time" value="{{ $batch->time }}" required autocomplete="time" autofocus>
              @error('time')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Choose Course</label>
            <div class="col-sm-10">
              <select name="course" class="form-control">
                @foreach($courses as $row)
                <option value="{{$row->id}}" 
                  @if($batch->coure_id == $row->id) {{'selected'}}
                  @endif>{{$row->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection