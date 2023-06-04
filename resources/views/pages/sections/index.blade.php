@extends('layouts.master')

@section('title')
    Sections
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Sections
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Sections</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sections List <small>{{ $sections->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddSection"><i class="fa fa-plus"></i> Add</a>
          </div>
          <div class="box-body">
            <section class="content">
                <div class="row">
                @foreach ($grades as $grade)
                  <div class="col-md-12">
                    <div class="box box-warning collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title" data-widget="collapse">{{ $grade->name }}</h3>
                      </div>
                      <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Classroom Name</th>
                             <th>Teachers</th>
                             <th>Status</th>
                             <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 0; ?>
                          @foreach ($grade->section as $list_section)
                            <tr>
                             <?php $i++; ?>
                             <td>{{ $i }}</td>
                             <td>{{ $list_section->name }}</td>
                             <td>{{ $list_section->classroom->name }}</td>
                             <td>{{ $list_section->teachers->pluck('name')->join(', ') }}</td>
                             <td>
                                @if ($list_section->status === 1)
                                    <label class="badge badge-success">Active</label>
                                @else
                                    <label class="badge badge-danger">Not Active</label>
                                @endif
                             </td>
                             <td>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $list_section->id }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $list_section->id }}"><i class="fa fa-trash"></i></a>
                             </td>
                            </tr>

                            <!-- Edit -->
                              <div class="modal fade" id="edit{{ $list_section->id }}">
                                 <div class="modal-dialog">
                                  <div class="modal-content">
                                   <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                     <h4 class="modal-title">Section Update</h4>
                                   </div>
                                   <div class="modal-body">
                                     <form action="{{ route('sections.update', 'test') }}" method="POST">
                                      @csrf
                                      {{ method_field('PATCH') }}
                                      <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="{{ $list_section->id }}">
                                        <label>Section Name Arabic</label>
                                        <input type="text" name="name" id="name" value="{{ $list_section->getTranslation('name', 'ar') }}" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Section Name English</label>
                                        <input type="text" name="name_en" id="name_en" value="{{ $list_section->getTranslation('name', 'en') }}" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Grade Name</label>
                                        <select name="grade_id" class="form-control" onclick="console.log($(this).val())">
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @foreach ($list_grades as $list_grade)
                                                    <option value="{{ $list_grade->id }}">{{ $list_grade->name }}</option>
                                                @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Classroom Name</label>
                                        <select name="classroom_id" class="form-control">
                                            <option value="{{ $list_section->classroom->id }}">{{ $list_section->classroom->name }}</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        @if ($list_section->status === 1)
                                          <label>Status</label><br>
                                          <input type="checkbox" class="minimal" name="status" checked>
                                        @else
                                          <label>Status</label><br>
                                          <input type="checkbox" class="minimal" name="status">
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label>Teacher Name</label>
                                        <select name="teachers[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                                @forelse($teachers as $teacher)
                                                  <option value="{{ $teacher->id }}" {{ in_array($teacher->id,$list_section->teachers->pluck('id')->toArray()) ? 'selected' : null }}>{{ $teacher->name }}</option>
                                                @empty
                                                @endforelse
                                        </select>
                                      </div>

                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      </div>
                                     </form>
                                   </div>
                                  </div>
                                </div>
                              </div>
                            <!-- Edit End -->

                            <!-- Delete -->
                              <div class="modal fade" id="delete{{ $list_section->id }}">
                                <div class="modal-dialog">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Section Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('sections.destroy', 'test') }}" method="post">
                                     @csrf
                                     {{ method_field('Delete') }}
                                     <div class="modal-body">
                                       <p>Are sure of the deleting process ?</p><br>
                                       <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_section->id }}">
                                       <input class="form-control" name="name" value="{{ $list_section->name }}" type="text" readonly>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-danger">Save changes</button>
                                       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                     </div>
                                    </form>
                                  </div>
                                 </div>
                               </div>
                             </div>
                            <!-- Delete End -->

                          @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Classroom Name</th>
                             <th>Teachers</th>
                             <th>Status</th>
                             <th>Operation</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
            </section>
          </div>
        </div>
      </div>
  </section>
</div>

<!-- Add -->
  <div class="modal fade" id="AddSection">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title">Add Section</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('sections.store') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label>Section Name Arabic</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Section Name English</label>
                  <input type="text" name="name_en" id="name_en" class="form-control">
                </div>
                <div class="form-group">
                  <label>Grade Name</label>
                  <select name="grade_id" class="form-control" onchange="console.log($(this).val())">
                      <option value="" selected disabled>Select Grade</option>
                        @foreach ($list_grades as $list_grade)
                          <option value="{{ $list_grade->id }}"> {{ $list_grade->name }}</option>
                        @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Classroom Name</label>
                  <select name="classroom_id" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label>Teacher Name</label>
                    <select name="teachers[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Day" style="width: 100%;">
                          @forelse($teachers as $teacher)
                            <option value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                          @empty
                          @endforelse
                    </select>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save changes</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Add -->

@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ URL::asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="classroom_id"]').empty();
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
@endsection
