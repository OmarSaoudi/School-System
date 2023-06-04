@extends('layouts.master')

@section('title')
    Edit Parents
@stop

@section('css')

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
       <li><a href="{{ route('myparents.index') }}">Parents</a></li>
       <li class="active">Edit Parent</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
            <div class="box-body">
                    <form method="POST" action="{{ route('myparents.update','test') }}">
                      @csrf
                      {{ method_field('PATCH') }}

                        <div class="box-header" style="text-align:center">
                           <h2 class="box-title"><b>Father's information</b></h2>
                        </div>

                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Email</label>
                                   <input type="hidden" value="{{ $myparents->id }}" name="id">
                                   <input type="email" name="email" value="{{ $myparents->email }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" name="password" value="{{ $myparents->password }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Father Name Arabic</label>
                                 <input type="text" name="name_father" value="{{ $myparents->getTranslation('name_father', 'ar') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Father Name English</label>
                                 <input type="text" name="name_father_en" value="{{ $myparents->getTranslation('name_father', 'en') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Father Job Arabic</label>
                                   <input type="text" name="job_father" value="{{ $myparents->getTranslation('job_father', 'ar') }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Father Job English</label>
                                   <input type="text" name="job_father_en" value="{{ $myparents->getTranslation('job_father', 'en') }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Identification Number</label>
                                  <input type="text" name="national_id_father" value="{{ $myparents->national_id_father }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Passport Number</label>
                                  <input type="text" name="passport_id_father" value="{{ $myparents->passport_id_father }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>

                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Nationalities</label>
                                   <select name="nationalitie_father_id" class="form-control" required>
                                      <option value="" selected disabled>Select Nationalitie</option>
                                      @foreach ($nationalities as $nationalitie)
                                          <option value="{{ $nationalitie->id }}" {{ $myparents->nationalitie_father_id == $nationalitie->id ? 'selected' : '' }}>{{ $nationalitie->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Bloods</label>
                                   <select name="blood_father_id" class="form-control" required>
                                      <option value="" selected disabled>Select Blood</option>
                                      @foreach ($bloods as $blood)
                                          <option value="{{ $blood->id }}" {{ $myparents->blood_father_id == $blood->id ? 'selected' : '' }}>{{ $blood->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Religions</label>
                                   <select name="religion_father_id" class="form-control" required>
                                      <option value="" selected disabled>Select Religion</option>
                                      @foreach ($religions as $religion)
                                          <option value="{{ $religion->id }}" {{ $myparents->religion_father_id == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Father Phone</label>
                                  <input type="text" name="phone_father" value="{{ $myparents->phone_father }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Father Address</label>
                                  <textarea name="address_father" class="form-control" placeholder="Enter ...">{{ $myparents->address_father }}</textarea>
                              </div>
                            </div>
                        </div>

                        <div class="box-header" style="text-align:center">
                            <h2 class="box-title"><b>Mother's information</b></h2>
                        </div>

                        {{-- End 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Mother Name Arabic</label>
                                  <input type="text" name="name_mother" value="{{ $myparents->getTranslation('name_mother', 'ar') }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                  <label>Mother Name English</label>
                                  <input type="text" name="name_mother_en" value="{{ $myparents->getTranslation('name_mother', 'en') }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                       <label>Mother Job Arabic</label>
                                       <input type="text" name="job_mother" value="{{ $myparents->getTranslation('job_mother', 'ar') }}" class="form-control" required>
                                       <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                       <label>Mother Job English</label>
                                       <input type="text" name="job_mother_en" value="{{ $myparents->getTranslation('job_mother', 'en') }}" class="form-control" required>
                                       <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label>Identification Number</label>
                                      <input type="text" name="national_id_mother" value="{{ $myparents->national_id_mother }}" class="form-control" required>
                                      <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label>Passport Number</label>
                                      <input type="text" name="passport_id_mother" value="{{ $myparents->passport_id_mother }}" class="form-control" required>
                                      <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Nationalities</label>
                                   <select name="nationalitie_mother_id" class="form-control" required>
                                      <option value="" selected disabled>Select Nationalitie</option>
                                      @foreach ($nationalities as $nationalitie)
                                          <option value="{{ $nationalitie->id }}" {{ $myparents->nationalitie_mother_id == $nationalitie->id ? 'selected' : '' }}>{{ $nationalitie->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Bloods</label>
                                   <select name="blood_mother_id" class="form-control" required>
                                      <option value="" selected disabled>Select Blood</option>
                                      @foreach ($bloods as $blood)
                                          <option value="{{ $blood->id }}" {{ $myparents->blood_mother_id == $blood->id ? 'selected' : '' }}>{{ $blood->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Religions</label>
                                   <select name="religion_mother_id" class="form-control" required>
                                      <option value="" selected disabled>Select Religion</option>
                                      @foreach ($religions as $religion)
                                          <option value="{{ $religion->id }}" {{ $myparents->religion_mother_id == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Mother Phone</label>
                                      <input type="text" name="phone_mother" value="{{ $myparents->phone_mother }}" class="form-control" required>
                                      <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                        {{-- End 3 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Mother Address</label>
                                  <textarea name="address_mother" class="form-control" placeholder="Enter ...">{{ $myparents->address_mother }}</textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('myparents.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
