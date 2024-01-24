@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Dynamic Text Field</h1>
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
                                    @php
                                        $type = json_decode($field->configdata)->ispassword == 1 ? 'password' : 'text';
                                    @endphp
                                    <input type="{{ $type }}" id="{{ $field->shortname }}" class="form-control "
                                        name="{{ $field->shortname }}" @if (json_decode($field->configdata)->required == 'yes') required @endif
                                        maxlength="{{ json_decode($field->configdata)->maxlength }}"
                                        size="{{ json_decode($field->configdata)->displaysize }}"
                                        value="{{ json_decode($field->configdata)->defaultvalue }}">
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
