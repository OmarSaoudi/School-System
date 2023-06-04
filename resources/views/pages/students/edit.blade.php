@extends('layouts.master')

@section('title')
    Edit Student
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
       <li class="active">Edit Student</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Student</h3>
          </div>
            <div class="box-body">
                <form action="{{ route('students.update','test') }}" method="POST">
                      @csrf
                      {{ method_field('PATCH') }}
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="hidden" value="{{ $students->id }}" name="id">
                                 <input type="text" name="name" value="{{ $students->getTranslation('name', 'ar') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" value="{{ $students->getTranslation('name', 'en') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                               <label>Email</label>
                               <input type="email" name="email" value="{{ $students->email }}" class="form-control" required>
                               <span class="help-block with-errors"></span>
                            </div>
                          </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="{{ $students->password }}" required>
                                <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label>Genders</label>
                                 <select name="gender_id" class="form-control" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ $students->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label>Nationalities</label>
                                 <select name="nationalitie_id" class="form-control" required>
                                    <option value="" selected disabled>Select Nationalitie</option>
                                    @foreach ($nationalities as $nationalitie)
                                        <option value="{{ $nationalitie->id }}" {{ $students->nationalitie_id == $nationalitie->id ? 'selected' : '' }}>{{ $nationalitie->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Bloods</label>
                                   <select name="blood_id" class="form-control" required>
                                     <option value="" selected disabled>Select Blood</option>
                                     @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}" {{ $students->blood_id == $blood->id ? 'selected' : '' }}>{{ $blood->name }}</option>
                                     @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" name="date_birth" value="{{ $students->date_birth }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        {{-- 4 --}}
                        <div class="row">
                             <div class="col-md-3">
                                <div class="form-group">
                                   <label>Grades</label>
                                   <select name="grade_id" class="form-control">
                                        <option value="" selected disabled>Select Grade</option>
                                        @foreach($grades as $grade)
                                          <option value="{{ $grade->id }}" {{ $grade->id == $students->grade_id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                        @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                   <label>Classrooms</label>
                                   <select name="classroom_id" class="form-control">
                                       <option value="{{ $students->classroom_id }}">{{ $students->classroom->name }}</option>
                                       @foreach($classrooms as $classroom)
                                          <option value="{{ $classroom->id }}"> {{ $classroom->name }}</option>
                                       @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                   <label>Sections</label>
                                   <select name="section_id" class="form-control">
                                      <option value="{{ $students->section_id }}"> {{ $students->section->name }}</option>
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                             </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                 <label>Academic Year</label>
                                 <select name="academic_year" class="form-control" required>
                                    <option value="" selected disabled>Select Academic Year</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year + 4 ;$year++)
                                       <option value="{{ $year }}" {{$year == $students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 4 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                     <label>Parents</label>
                                     <select name="parent_id" class="form-control" required>
                                        <option value="" selected disabled>Select Parent</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}" {{ $students->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name_father }}</option>
                                        @endforeach
                                     </select>
                                     <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('students.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('GetClassrooms') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="classroom_id"]').empty();
                        $('select[name="classroom_id"]').append('<option selected disabled >Select Classroom</option>');
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('select[name="classroom_id"]').on('change', function () {
            var classroom_id = $(this).val();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('GetSections') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option selected disabled >Select Section</option>');
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
