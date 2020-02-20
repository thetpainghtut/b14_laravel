@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2>Show with your own ui</h2>

    <div class="row">
      <div class="col-md-12">
        Name : {{$course->name}}
        <br>
        Outlines : {{$course->outline}}
      </div>
    </div>
  </div>

@endsection