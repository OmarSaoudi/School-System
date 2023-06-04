@extends('layouts.master')

@section('title')
   Students Promotions
@stop

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Students Promotions
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('students.index') }}">Students</a></li>
       <li class="active">Students Promotions</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Students Promotions</h3>
          </div>

            <div class="box-body">
                    <form action="{{ route('promotions.store') }}" method="POST">
                      @csrf

                        <div class="box-header">
                            <h3 class="box-title" style="color:rgb(0, 0, 0);font-family:Cairo">Old School Stage</h3>
                        </div>

                        {{-- 1 --}}
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
                                 <select name="academic_year" class="form-control">
                                    <option value="" selected disabled>Select Academic Year</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                      @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                      <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="box-header">
                            <h3 class="box-title" style="color:rgb(0, 0, 0);font-family:Cairo">The New School Stage</h3>
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Grades</label>
                                    <select name="grade_id_new" class="form-control">
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
                                    <select name="classroom_id_new" class="form-control"></select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sections</label>
                                    <select name="section_id_new" class="form-control"></select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Academic Year</label>
                                    <select name="academic_year_new" class="form-control">
                                       <option value="" selected disabled>Select Academic Year</option>
                                       @php
                                       $current_year = date("Y");
                                       @endphp
                                         @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                         <option value="{{ $year}}">{{ $year }}</option>
                                       @endfor
                                    </select>
                                    <span class="help-block with-errors"></span>
                                 </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
