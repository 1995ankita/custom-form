@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>CustomFields

                        </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Custom Fields</h3>
                                <div class="float-right">
                                    <select class="form-control select" id="mySelect">
                                        <option value="">Create Custom Field</option>
                                        <option value="1">Text Field</option>
                                        <option value="2">Select</option>
                                        <option value="3">Radio</option>
                                    </select>
                                    </form>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Custom field</th>
                                                <th scope="col">Short name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($custom_field as $field)
                                                <tr>
                                                    <td>{{ $field->name }}</td>
                                                    <td>{{ $field->shortname }}</td>
                                                    <td>{{ $field->type }}</td>
                                                    <td>
                                                        <a href="{{ route('form.show', $field->id) }}" class="fas fa-eye text-info"></a>
                                                        <a href="{{ route('form.edit', $field->id) }}" class="fas fa-edit"></a>
                                                        {{-- <a href="" class="fas fa-trash text-danger"></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('#mySelect').on('change', function() {
                var selectedValue = $(this).val();
                var redirectUrl = '{{ url('create-form-field') }}/' + selectedValue;
                window.location.href = redirectUrl;
            });
        });
    </script>
@endpush
