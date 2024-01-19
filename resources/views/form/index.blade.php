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
                                    <select id="countryDropdown" class="form-control select" id="mySelect">
                                        <option value="">Create Custom Field</option>
                                        <option value="1">Text Field</option>
                                        <option value="2">Select</option>
                                        <option value="3">Radio</option>
                                    </select>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                {{-- <th scope="col">User Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Created By</th>
                                            <th scope="col">Action</th> --}}

                                            </tr>
                                        </thead>
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
<script>
    $(document).ready(function() {
        // Attach the onchange event handler to the select field
        $('#mySelect').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();
            // Make an AJAX request
            $.ajax({
                type: 'POST', // or 'GET' depending on your needs
                url: 'your_backend_endpoint.php', // Replace with your actual backend endpoint
                data: {
                    selectedValue: selectedValue
                },
                success: function(response) {
                    // Handle the response from the server
                    $('#resultContainer').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
    });
</script>
