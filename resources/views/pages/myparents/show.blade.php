@extends('layouts.master')

@section('title')
    Show Parents
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
      <li><a href="{{ route('myparents.index') }}">Teachers</a></li>
      <li class="active">Show Parents</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">Show Parents</h3><br><br>
       </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Parents Information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <div class="box-header" style="text-align: center">
                        <h3 class="box-title">Father's information</h3><br><br>
                    </div>
                    <tr>
                        <th scope="row">Father's Name</th>
                        <td>{{ $myparents->name_father }}</td>
                        <th scope="row">Email</th>
                        <td>{{ $myparents->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">National id father</th>
                        <td>{{ $myparents->national_id_father }}</td>
                        <th scope="row">Passport id father</th>
                        <td>{{ $myparents->passport_id_father }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Father's Job</th>
                        <td>{{ $myparents->job_father }}</td>
                        <th scope="row">Father's Phone</th>
                        <td>{{ $myparents->phone_father }}</td>
                        <th scope="row">Father's Address</th>
                        <td>{{ $myparents->address_father }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nationalitie</th>
                        <td>{{ $myparents->nationalitiefather->name }}</td>
                        <th scope="row">Blood</th>
                        <td>{{ $myparents->bloodfather->name }}</td>
                        <th scope="row">Religion</th>
                        <td>{{ $myparents->religionfather->name }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <div class="box-header" style="text-align: center">
                        <h3 class="box-title">Mother's information</h3><br><br>
                    </div>
                    <tr>
                        <th scope="row">Mother's Name</th>
                        <td>{{ $myparents->name_mother }}</td>
                        <th scope="row">National id father</th>
                        <td>{{ $myparents->national_id_mother }}</td>
                        <th scope="row">Passport id father</th>
                        <td>{{ $myparents->passport_id_mother }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mother's Job</th>
                        <td>{{ $myparents->job_mother }}</td>
                        <th scope="row">Mother's Phone</th>
                        <td>{{ $myparents->phone_mother }}</td>
                        <th scope="row">Mother's Address</th>
                        <td>{{ $myparents->address_mother }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nationalitie</th>
                        <td>{{ $myparents->nationalitiemother->name }}</td>
                        <th scope="row">Blood</th>
                        <td>{{ $myparents->bloodmother->name }}</td>
                        <th scope="row">Religion</th>
                        <td>{{ $myparents->religionmother->name }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{ route('myparents.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
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

