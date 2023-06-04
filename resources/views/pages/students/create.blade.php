@extends('layouts.master')

@section('title')
    Create Student
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
       <li class="active">Create Student</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Student</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('students.store') }}" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="text" name="name" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" class="form-control" required>
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
                               <input type="email" name="email" class="form-control" required>
                               <span class="help-block with-errors"></span>
                            </div>
                          </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
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
                                        <option value="{{ $gender->id }}"> {{ $gender->name }}</option>
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
                                        <option value="{{ $nationalitie->id }}"> {{ $nationalitie->name }}</option>
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
                                          <option value="{{ $blood->id }}"> {{ $blood->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" name="date_birth" class="form-control" required>
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
                                      @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"> {{ $grade->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Classrooms</label>
                                   <select name="classroom_id" class="form-control"></select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Sections</label>
                                   <select name="section_id" class="form-control"></select>
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
                                       <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 4 --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Parents</label>
                                   <select name="parent_id" class="form-control">
                                      <option value="" selected disabled>Select Parent</option>
                                      @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name_father }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <label>Images <span class="text-danger">*</span></label>
                              <input type="file" accept="image/*" name="photos[]" multiple>
                            </div>
                        </div>

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

@endsection
