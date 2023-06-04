@extends('layouts.master')

@section('title')
    Edit Payment Student {{ $students->name }}

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Payment Student
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('payment_students.index') }}">Payment Students</a></li>
       <li class="active">Edit Payment Student</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Payment Student <label style="color: red">{{ $payment_students->student->name }}</label></h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('payment_students.update','test') }}" autocomplete="off">
                      @csrf
                      @method('PUT')
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" class="form-control" name="debit" value="{{ $payment_students->amount }}">
                                  <input type="hidden" class="form-control" name="student_id" value="{{ $payment_students->student->id }}">
                                  <input type="hidden" class="form-control" name="id" value="{{ $payment_students->id }}">
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $payment_students->description }}</textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('payment_students.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
