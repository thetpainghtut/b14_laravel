@extends('backendtemplate')

@section('content')
  <div class="container-fluid">
    <h2 class="d-inline-block">Show with table</h2>
    <a href="{{route('students.create')}}" class="btn btn-info float-right">Add New</a>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone No</th>
              <th>Education</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($students as $row)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$row->namee}}</td>
              <td>{{$row->email}}</td>
              <td>{{$row->phone}}</td>
              <td>{{$row->education}}</td>
              <td>
                <a href="#" class="btn btn-info detail" data-id="{{$row->id}}"><i class="fas fa-info-circle"></i></a>

                <a href="{{route('students.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                <form method="post" action="{{route('students.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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

  <!-- Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
      // $.ajaxSetup({
      //   headers: {
      //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //   }
      // });

      $('.detail').click(function () {
        var id = $(this).data('id');
        // alert(id);
        $.get("/backend/students/"+id,function (res) {
          // console.log(res.namee);
          $('#detailModalLabel').text(res.namee);
          $('#detailModal').modal('show');
        })
      })
    })
  </script>
@endsection