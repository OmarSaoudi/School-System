@extends('layouts.master')

@section('title')
    List Promotions
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List Promotions
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">List Promotions</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Promotions</h3>
            <br><br>
            <button type="button" class="btn btn-danger" id=""><i class="fa fa-trash"></i> Delete All</button>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Grade Previous</th>
                <th>Classroom Previous</th>
                <th>Section Previous</th>
                <th>Academic Year Previous</th>
                <th>Grade Current</th>
                <th>Classroom Current</th>
                <th>Section Current</th>
                <th>Academic Year Current</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($promotions as $promotion)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $promotion->student->name }}</td>
                <td>{{ $promotion->f_grade->name }}</td>
                <td>{{ $promotion->f_classroom->name }}</td>
                <td>{{ $promotion->f_section->name }}</td>
                <td>{{ $promotion->academic_year }}</td>
                <td>{{ $promotion->t_grade->name }}</td>
                <td>{{ $promotion->t_classroom->name }}</td>
                <td>{{ $promotion->t_section->name }}</td>
                <td>{{ $promotion->academic_year_new }}</td>
                <td>

                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Grade Previous</th>
                <th>Classroom Previous</th>
                <th>Section Previous</th>
                <th>Academic Year Previous</th>
                <th>Grade Current</th>
                <th>Classroom Current</th>
                <th>Section Current</th>
                <th>Academic Year Current</th>
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
