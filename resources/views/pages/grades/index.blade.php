@extends('layouts.master')

@section('title')
    Grades
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Grades
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Grades</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Grades List <small>{{ $grades->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddGrade"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Note</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($grades as $grade)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $grade->name }}</td>
                <td>{{ $grade->notes }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $grade->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $grade->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="edit{{ $grade->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Grade Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('grades.update', 'test') }}" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" value="{{ $grade->id }}">
                          <label>Grade Name Arabic</label>
                          <input type="text" name="name" id="name" value="{{ $grade->getTranslation('name', 'ar') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Grade Name English</label>
                          <input type="text" name="name_en" id="name_en" value="{{ $grade->getTranslation('name', 'en') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" name="notes" id="notes" value="{{ $grade->notes }}" class="form-control">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </form>
                    </div>
                   </div>
                 </div>
               </div>
              <!-- Edit End -->

              <!-- Delete -->
                <div class="modal fade" id="delete{{ $grade->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Grade</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('grades.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $grade->id }}">
                                <input class="form-control" name="name" value="{{ $grade->name }}" type="text" readonly>
                            </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-danger">Save changes</button>
                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                       </div>
                      </div>
                    </div>
                </div>
              <!-- Delete End -->
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Note</th>
                <th>Operation</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- Add Grade -->
  <div class="modal fade" id="AddGrade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Grade</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('grades.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <label>Grade Name Arabic</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Grade Name English</label>
                  <input type="text" name="name_en" id="name_en" class="form-control">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="notes" id="notes" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save changes</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Add Grade -->

@endsection




@section('scripts')
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection
