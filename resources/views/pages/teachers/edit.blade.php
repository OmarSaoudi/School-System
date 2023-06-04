@extends('layouts.master')

@section('title')
    Edit Teacher
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
        <li class="active">Edit Teacher</li>
      </ol>
    </section>
    <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Edit Teacher</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('teachers.update','test') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="hidden" value="{{ $teachers->id }}" name="id">
                                 <input type="text" name="name" value="{{ $teachers->getTranslation('name', 'ar') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" value="{{ $teachers->getTranslation('name', 'en') }}" class="form-control" required>
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
                                  <input type="email" name="email" value="{{ $teachers->email }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" name="password" value="{{ $teachers->password }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                            </div>
                        </div>
                        {{-- End 1 --}}


                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Specializations Name</label>
                                    <select name="specialization_id" class="form-control" required>
                                        <option value="" selected disabled>Select Specialization</option>
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}" {{ $teachers->specialization_id == $specialization->id ? 'selected' : '' }}>{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <label>Genders Name</label>
                                <select name="gender_id" class="form-control" required>
                                   <option value="" selected disabled>Select Gender</option>
                                   @foreach ($genders as $gender)
                                       <option value="{{ $gender->id }}" {{ $teachers->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                   @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                             </div>
                            </div>
                        </div>
                        {{-- End 4 --}}

                        {{-- 6 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                 <label>Joining Date</label>
                                 <input type="date" class="form-control" name="joining_date" value="{{ $teachers->joining_date }}" required>
                                 <span class="help-block with-errors"></span>
                               </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                   <label>Address</label>
                                   <input type="text" name="address" value="{{ $teachers->address }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 6 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('teachers.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>

@endsection

@section('js')
@endsection
