@extends('layouts.master')

@section('title')
    Students
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Students
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Students</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Students List <small>{{ $students->count() }}</small></h3>
            <br><br>
            <a href="students/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            <button type="button" class="btn btn-danger" id="btn_delete_all"><i class="fa fa-trash"></i> Delete All</button>
          <!-- /.box-header -->
          <div class="box-body" id="datatable">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Section</th>
                <th>Parent</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($students as $student)
              <tr>
                <td><input type="checkbox"  value="{{ $student->id }}" class="box1"></td>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender->name }}</td>
                <td>{{ $student->grade->name }}</td>
                <td>{{ $student->classroom->name }}</td>
                <td>{{ $student->section->name }}</td>
                <td>{{ $student->myparent->name_father }}</td>
                <td>
                  <a href="{{ route('fee_invoices.show', $student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">رسوم</a>
                  <a href="{{ route('receipt_students.show', $student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">سند قبض</a>
                  <a href="{{ route('processing_fees.show', $student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">استبعاد رسوم</a>
                  <a href="{{ route('payment_students.show', $student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">سند صرف</a>
                  <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm" href="{{ route('students.show',$student->id) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteStudent{{ $student->id }}"><i class="fa fa-trash"></i></a>
              </tr>
              @include('pages.students.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Section</th>
                <th>Parent</th>
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

<!-- Delete All -->
<div class="modal fade" id="delete_all_s">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Delete All Students</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('delete_all_s') }}" method="POST">
                    @csrf
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
               $('#delete_all_s').modal('show')
               $('input[id="delete_all_id"]').val(selected);
           }
       });
    });
</script>
@endsection
