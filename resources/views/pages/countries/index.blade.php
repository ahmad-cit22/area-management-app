@extends('layouts.master')

@section('content')
    <div class="row mt-3 m-auto px-5">
        <div class="col-lg-10 m-auto">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <div class="row">
                    <div class="col-3">
                        <h5 class="dashboard__card__header__title">Countries</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button class="btn btn-primary float-end create-btn">Add Country</button>
                    </div>
                </div>
                <div class="dashboard__card__inner border_top_1">
                    <div class="dashboard__inventory__table custom_table">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Country Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($countries as $country)
                                    <tr class="table_row">
                                        <td>
                                            <span class="order_id">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            @include('partials.action-buttons', ['id' => $country->id])
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Countries Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addCountryForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCountryModalLabel">Add Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="countryName">Name</label>
                            <input type="text" id="countryName" name="name" class="form-control" required autofocus
                                autocomplete="name" value="{{ old('name') }}">
                            <span class="text-danger" id="countryNameError"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCountryModal" tabindex="-1" aria-labelledby="editCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCountryForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCountryModalLabel">Edit Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="countryId">
                        <div class="form-group">
                            <label for="editCountryName">Name</label>
                            <input type="text" id="editCountryName" name="name" class="form-control" required
                                autofocus>
                            <span class="text-danger" id="editCountryNameError"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            // Add Button Click
            $(document).on('click', '.create-btn', function() {
                $('#addCountryModal').modal('show');
                $('#countryNameError').text('');
                $('#addCountryForm')[0].reset();
            });

            // Add Country
            $('#addCountryForm').submit(function(e) {
                e.preventDefault();

                $('#countryNameError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: "{{ route('countries.store') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addCountryModal').modal('hide');
                        Swal.fire({
                            icon: "success",
                            title: "Done!",
                            text: response.message,
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            $('#countryNameError').text(response.responseJSON.errors.name);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong. Please try again.",
                            });
                        }
                    },
                    complete: function() {
                        $submitButton.prop('disabled', false);
                    }
                });
            });


            // Edit Button Click
            $(document).on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('countries.edit', ':id') }}";
                url = url.replace(':id', id);

                $.get(url, function(data) {
                    $('#countryId').val(data.id);
                    $('#editCountryName').val(data.name);
                    $('#editCountryModal').modal('show');
                });
            });

            // when modal closes
            $('#editCountryModal').on('hidden.bs.modal', function() {
                $('#editCountryForm')[0].reset();
                $('#editCountryNameError').text('');
            });

            // Edit Country
            $('#editCountryForm').submit(function(e) {
                e.preventDefault();

                let id = $('#countryId').val();
                let url = `{{ route('countries.update', ':id') }}`;
                url = url.replace(':id', id);

                $('#editCountryNameError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editCountryModal').modal('hide');
                        Swal.fire({
                            icon: "success",
                            title: "Done!",
                            text: response.message,
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            $('#editCountryNameError').text(response.responseJSON.errors.name);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong. Please try again.",
                            });
                        }
                    },
                    complete: function() {
                        $submitButton.prop('disabled', false);
                    }
                });
            });


            // Delete Button Click
            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                let url = "{{ route('countries.destroy', ':id') }}";
                url = url.replace(':id', id);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Country has been deleted.",
                                    icon: "success"
                                }).then(function() {
                                    window.location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Something went wrong. Please try again.",
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
