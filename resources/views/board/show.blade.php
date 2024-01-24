@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>form</h1>
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
                                @foreach ($fields as $field)
                                    <div class="form-group">
                                        <label>{{ $field->name }}</label>
                                        @php
                                            $type = $field->type;
                                        @endphp

                                        @if ($type == 'text')
                                            <input type="text" id="{{ $field->shortname }}" class="form-control"
                                                name="{{ $field->shortname }}"
                                                @if (json_decode($field->configdata)->required == 'yes') required @endif
                                                maxlength="{{ json_decode($field->configdata)->maxlength }}"
                                                size="{{ json_decode($field->configdata)->displaysize }}"
                                                value="{{ json_decode($field->configdata)->defaultvalue }}">
                                        @elseif ($type == 'select')
                                            <select class="custom-select" name="{{ $field->shortname }}"
                                                id="{{ $field->shortname }}"
                                                @if (json_decode($field->configdata)->required == 'yes') required @endif>
                                                @php
                                                    $optionArray = explode("\r\n", json_decode($field->configdata)->options);
                                                @endphp
                                                @foreach ($optionArray as $option)
                                                    <option
                                                        value="{{ $option }}"@if (json_decode($field->configdata)->defaultvalue == $option) selected @endif>
                                                        {{ $option }}</option>
                                                @endforeach
                                            </select>
                                        @elseif ($type == 'radio')
                                            @php
                                                $optionArray = explode("\r\n", json_decode($field->configdata)->options);
                                            @endphp
                                            <div class="radio">
                                                @foreach ($optionArray as $option)
                                                    <label class="radio-inline">
                                                        <input type="radio" name="{{ $field->shortname }}"
                                                            @if (json_decode($field->configdata)->defaultvalue == $option) checked @endif>
                                                        {{ $option }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif

                                        <span>{!! $field->description !!}</span>
                                    </div>
                                @endforeach

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
