@extends('layouts.master')

@section('title')
    Parents
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Parents
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Parents</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Parents List <small>{{ $myparents->count() }}</small></h3>
            <br><br>
            <a href="myparents/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Email</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($myparents as $myparent)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $myparent->name_father }}</td>
                <td>{{ $myparent->name_mother }}</td>
                <td>{{ $myparent->email }}</td>
                <td>
                  <a href="{{ route('myparents.edit',$myparent->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm" href="{{ route('myparents.show',$myparent->id) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteMyparent{{ $myparent->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.myparents.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Email</th>
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
