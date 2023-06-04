@extends('layouts.master')

@section('title')
    Create Receipt Student

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Receipt Students
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('receipt_students.index') }}">Receipt Students</a></li>
       <li class="active">Create Receipt Student</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Receipt Student</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('receipt_students.store') }}" autocomplete="off">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" name="debit" class="form-control">
                                  <input type="hidden" name="student_id"  value="{{ $students->id }}" class="form-control">
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('receipt_students.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
