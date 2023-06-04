@extends('layouts.master')

@section('title')
     Attendance and absence list for students
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        Attendance and absence list for students
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('students.index') }}"> Students</a></li>
      <li class="active">Attendance and absence list for students</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
       <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h5 style="font-family: 'Cairo', sans-serif;color: red"> today's date : {{ date('Y-m-d') }}</h5>
            <form method="post" action="{{ route('attendances.store') }}">
            @csrf
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Section</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($students as $student)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender->name }}</td>
                <td>{{ $student->grade->name }}</td>
                <td>{{ $student->classroom->name }}</td>
                <td>{{ $student->section->name }}</td>
                <td>
                    @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">Presence</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">Absence</span>
                            </label>

                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">Presence</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">Absence</span>
                            </label>

                        @endif

                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Classroom</th>
                <th>Section</th>
                <th>Operation</th>
              </tr>
              </tfoot>
            </table>
            <P>
                <button class="btn btn-success" type="submit">Submit</button>
            </P>
          </div>
        </form>
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
