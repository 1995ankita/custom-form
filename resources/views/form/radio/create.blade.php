@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Radio</h1>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Radio</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('project.board.task.store', [$project_id,$board_id]) }}">
                                @csrf
                                <input type="hidden" name="type" value="radio" />

                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Shortname<span class="text-danger">*</label>
                                    <input type="text" id="shortname"
                                        class="form-control @error('shortname') is-invalid @enderror" name="shortname"
                                        value="{{ old('shortname') }}">
                                    @error('shortname')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror"
                                        rows="5"name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Required</label>
                                    <select name="required" id="required"
                                        class="form-control select">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unique data</label>
                                    <select name="unique_data" id="unique_data"
                                        class="form-control select ">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Option</label>
                                    <textarea class="form-control" rows="3" name="option">{{ old('option') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Checked Bydefault value</label>
                                    <input type="text" id="default_value" class="form-control" name="default_value"
                                        value="{{ old('default_value') }}">
                                </div>
                                <div class="form-group">
                                    <label>Locked</label>
                                    <select name="locked" id="locked"
                                        class="form-control select">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('child-scripts')
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 200,
                focus: true,
            });

            if ($('#summernote').hasClass('is-invalid')) {
                $('#summernote').next('.note-editor').css('border-color', 'red');
            }

            $('#summernote').on('summernote.change', function(we, contents, $editable) {
                resetSummernoteBorder();
            });

            function resetSummernoteBorder() {
                $('#summernote').removeClass('is-invalid');
                $('#summernote').next('.note-editor').css('border-color', '');
            }

        });
    </script>
@endpush
