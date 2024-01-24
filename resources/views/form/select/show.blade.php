@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Dynamic DropDown Field</h1>
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
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('form.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ $field->name }}</label>
                                    <select class="custom-select" name="{{ $field->shortname }}"
                                        id="{{ $field->shortname }}" @if (json_decode($field->configdata)->required == 'yes') required @endif
                                        >
                                        @php
                                            $optionArray = explode("\r\n", json_decode($field->configdata)->options);
                                        @endphp
                                        @foreach ($optionArray as $option)
                                            <option
                                                value="{{ $option }}"@if (json_decode($field->configdata)->defaultvalue == $option) selected @endif>
                                                {{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span>{!! $field->description !!}</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
