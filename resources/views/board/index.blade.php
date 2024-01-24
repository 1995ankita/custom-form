@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Board

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
                                <h3 class="card-title">Board</h3>
                                <div class="float-right"> <a class="btn btn-block btn-sm btn-success"
                                        href="{{ route('project.board.create',$id) }}"> Create New Board</a></div>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Board</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($boards as $board)
                                                <tr>
                                                    <td>{{ $board->id }}</td>
                                                    <td>{{ $board->board }}</td>
                                                    <td>
                                                        <a href="{{ route('project.board.task.index',[$board->project_id , $board->id]) }}" class="fas fa-plus"></a>

                                                        <a href="{{ route('project.board.edit', [$board->project_id , $board->id]) }}" class="fas fa-edit"></a>
                                                        <a href="{{ route('project.board.destroy',[$board->project_id , $board->id]) }}" class="fas fa-trash text-danger"></a>
                                                        <a href="{{ route('project.board.show',[$board->project_id , $board->id]) }}" class="fas fa-eye text-edit"></a>
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
