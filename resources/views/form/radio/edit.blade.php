<!-- resources/views/form/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Radio</h1>
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
                            <h3 class="card-title">Edit Radio</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('project.board.task.update', [$project_id,$board_id,$customField->id]) }}">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updating -->

                                <input type="hidden" name="type" value="radio" />
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
                                    <label>Description</label>
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
                                    <label>Option</label>
                                    <textarea class="form-control" rows="3" name="option">{{ old('option', json_decode($customField->configdata)->options) }}</textarea>
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
