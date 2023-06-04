@extends('layouts.master')

@section('title')
    Show Teacher
@stop

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>
      Teachers
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
      <li class="active">Show Teacher</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">Show Teacher</h3><br><br>
       </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Teacher Information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <tr>
                        <th scope="row">Teacher Name</th>
                        <td>{{ $teachers->name }}</td>
                        <th scope="row">Email</th>
                        <td>{{ $teachers->email }}</td>
                        <th scope="row">Address</th>
                        <td>{{ $teachers->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Joining Date</th>
                        <td>{{ $teachers->joining_date }}</td>
                        <th scope="row">Specialization</th>
                        <td>{{ $teachers->specialization->name }}</td>
                        <th scope="row">Gender</th>
                        <td>{{ $teachers->gender->name }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{ route('teachers.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    </div>
   </section>
</div>

@endsection

@section('scripts')
@endsection
