@extends('layouts.master')

@section('title')
    Classrooms
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Classrooms
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Classrooms</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Classrooms List</h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddClassroom"><i class="fa fa-plus"></i> Add</a>
            <button type="button" class="btn btn-danger" id="btn_delete_all"><i class="fa fa-trash"></i> Delete All</button>
            <br><br>
            <div class="col-md-2">
               <form action="{{ route('Filter_Classes_Grade') }}" method="POST">
                @csrf
                  <select class="form-control" data-style="btn btn-info" name="grade_id" required onchange="this.form.submit()">
                    <option value="" selected disabled>Search By Grade</option>
                      @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                      @endforeach
                  </select>
               </form>
            </div>
            <br><br>
          <!-- /.box-header -->
          <div class="box-body" id="datatable">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Grade Name</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @if (isset($details))
                 <?php $classrooms = $details; ?>
              @else
                 <?php $classrooms = $classrooms; ?>
              @endif
              @foreach($classrooms as $classroom)
              <tr>
                <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1"></td>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $classroom->name }}</td>
                <td>{{ $classroom->grade->name }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $classroom->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $classroom->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              <!-- Edit -->
               <div class="modal fade" id="edit{{ $classroom->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Classroom Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('classrooms.update', 'test') }}" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" value="{{ $classroom->id }}">
                          <label>Classroom Name Arabic</label>
                          <input type="text" name="name" id="name" value="{{ $classroom->getTranslation('name', 'ar') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Classroom Name English</label>
                          <input type="text" name="name_en" id="name_en" value="{{ $classroom->getTranslation('name', 'en') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Grade Name</label>
                            <select name="grade_id" class="form-control" required>
                            <option value="{{ $classroom->grade->id }}">{{ $classroom->grade->name }}</option>
                              @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                              @endforeach
                          </select>
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
                <div class="modal fade" id="delete{{ $classroom->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Classroom</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('classrooms.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $classroom->id }}">
                                <input class="form-control" name="name" value="{{ $classroom->name }}" type="text" readonly>
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
                  <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                  <th>#</th>
                  <th>Name</th>
                  <th>Grade Name</th>
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

<!-- Add -->
  <div class="modal fade" id="AddClassroom">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Classroom</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('classrooms.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <label>Classroom Name Arabic</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Classroom Name English</label>
                  <input type="text" name="name_en" id="name_en" class="form-control">
                </div>
                <div class="form-group">
                  <label>Grade Name</label>
                  <select name="grade_id" id="grade_id" class="form-control" required>
                    <option value="" selected disabled> -- Select Grade --</option>
                    @foreach ($grades as $grade)
                      <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                  </select>
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
<!-- End Add -->

<!-- Delete All -->
  <div class="modal fade" id="delete_all_c">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Delete All Classrooms</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('delete_all_c') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>Are sure of the deleting process ?</p><br>
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
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
<!-- End Delete All -->

@endsection




@section('scripts')
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script type="text/javascript">
    $(function() {
       $("#btn_delete_all").click(function() {
           var selected = new Array();
           $("#datatable input[type=checkbox]:checked").each(function() {
               selected.push(this.value);
           });

           if (selected.length > 0) {
               $('#delete_all_c').modal('show')
               $('input[id="delete_all_id"]').val(selected);
           }
       });
    });
</script>
@endsection
