<!-- resources/views/form/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Text</h1>
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
                            <h3 class="card-title">Edit Text</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('project.board.task.update', [$project_id,$board_id,$customField->id]) }}">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updating -->

                                <input type="hidden" name="type" value="text" />
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $customField->name) }}">
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
                                        value="{{ old('shortname', $customField->shortname) }}">
                                    @error('shortname')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror"
                                        rows="5" name="description">{{ old('description', $customField->description) }}</textarea>
                                    @error('description')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Required</label>
                                    <select name="required" id="required" class="form-control select">
                                        <option value="no" {{ old('required', json_decode($customField->configdata)->required) == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ old('required',  json_decode($customField->configdata)->required) == 'yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unique data</label>
                                    <select name="unique_data" id="unique_data" class="form-control select">
                                        <option value="no" {{ old('unique_data', json_decode($customField->configdata)->uniquevalues) == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ old('unique_data',json_decode($customField->configdata)->uniquevalues) == 'yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Default value</label>
                                    <input type="text" id="default_value" class="form-control" name="default_value" value="{{ old('default_value', json_decode($customField->configdata)->defaultvalue) }}">
                                </div>

                                <div class="form-group">
                                    <label>Form input size</label>
                                    <input type="text" id="form_input_size" class="form-control" name="form_input_size" value="{{ old('form_input_size', json_decode($customField->configdata)->displaysize) }}">
                                </div>
                                <div class="form-group">
                                    <label>Maximum number of characters</label>
                                    <input type="text" id="max_no_of_char" class="form-control" name="max_no_of_char" value="{{ old('max_no_of_char', json_decode($customField->configdata)->maxlength) }}">
                                </div>

                                <div class="form-group">
                                    <label>Password field</label>
                                    <select name="password_field" id="password_field" class="form-control select">
                                        <option value="0" {{ old('password_field',json_decode($customField->configdata)->ispassword) == '0' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('password_field', json_decode($customField->configdata)->ispassword) == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Link field</label>
                                    <input type="text" id="link_field" class="form-control" name="link_field" value="{{ old('link_field', json_decode($customField->configdata)->link) }}">
                                </div>
                                <div class="form-group">
                                    <label>Locked</label>
                                    <select name="locked" id="locked"
                                        class="form-control select">
                                        <option value="0" {{ old('password_field',json_decode($customField->configdata)->locked) == '0' ? 'selected' : '' }}>No</option>
                                        <option value="1"{{ old('password_field',json_decode($customField->configdata)->locked) == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        });
    </script>
@endpush
