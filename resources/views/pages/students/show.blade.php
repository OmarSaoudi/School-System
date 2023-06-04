@extends('layouts.master')

@section('title')
    Show Student
@stop

@section('css')

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
      <li><a href="{{ route('students.index') }}">Students</a></li>
      <li class="active">Show Student</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
     <div class="box">
      <div class="box-header">
           <h3 class="box-title">Students Details</h3><br><br>
      </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Student information</a></li>
          <li><a href="#tab_2" data-toggle="tab">Attachments</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <tr>
                        <th scope="row">Student Name</th>
                        <td>{{ $students->name }}</td>
                        <th scope="row">Email</th>
                        <td>{{ $students->email }}</td>
                        <th scope="row">Parent</th>
                        <td>{{ $students->myparent->name_father }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date Of Birth</th>
                        <td>{{ $students->date_birth }}</td>
                        <th scope="row">Academic Year</th>
                        <td>{{ $students->academic_year }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gender</th>
                        <td>{{ $students->gender->name }}</td>
                        <th scope="row">Nationalitie</th>
                        <td>{{ $students->nationalitie->name }}</td>
                        <th scope="row">Blood</th>
                        <td>{{ $students->blood->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Grade</th>
                        <td>{{ $students->grade->name }}</td>
                        <th scope="row">Classroom</th>
                        <td>{{ $students->classroom->name }}</td>
                        <th scope="row">Section</th>
                        <td>{{ $students->section->name }}</td>
                    </tr>
                </tbody>
            </table>
          </div>

          <div class="tab-pane" id="tab_2">
            <div class="card-body">
                <p class="text-danger">* Attachment Format : jpg , jpeg , png </p>
                  <h5 class="card-title">Add Attachments</h5>
                  <form method="post" action="{{ route('UploadAttachment') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="custom-file">
                      <input type="file" accept="image/*" name="photos[]" multiple required>
                      <input type="hidden" name="student_name" value="{{ $students->name }}">
                      <input type="hidden" name="student_id" value="{{ $students->id }}">
                    </div>
                    <br>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
            </div>
            <br>
            <table class="table center-aligned-table mb-0 table-hover">
                <thead>
                    <tr class="text-dark">
                        <th>#</th>
                        <th>File Name</th>
                        <th>Created At</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($students->images as $attachment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attachment->filename }}</td>
                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ url('DownloadAttachment') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}" role="button"><i class="fa fa-download"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteImg{{ $attachment->id }}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                  @include('pages.students.DeleteImg')
                  @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-dark">
                      <th>#</th>
                      <th>File Name</th>
                      <th>Created At</th>
                      <th>Operation</th>
                    </tr>
                </tfoot>
            </table>
          </div>

        </div>
        <div class="modal-footer">
            <a href="{{ route('students.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
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
