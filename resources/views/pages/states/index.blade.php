@extends('layouts.master')

@section('content')
    <div class="row mt-3 m-auto px-5">
        <div class="col-lg-12">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <div class="row">
                    <div class="col-3">
                        <h5 class="dashboard__card__header__title">States</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button class="btn btn-primary float-end create-btn">Add State</button>
                    </div>
                </div>
                <div class="dashboard__card__inner border_top_1">
                    <div class="dashboard__inventory__table custom_table">
                        <table class="table table-bordered table-striped data-table" id="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>State Name</th>
                                    <th>Country Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($states as $state)
                                    <tr class="table_row">
                                        <td>
                                            <span class="order_id">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->country->name }}</td>
                                        <td>
                                            @include('partials.action-buttons', ['id' => $state->id])
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No States Found</td>
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
    <div class="modal fade" id="addStateModal" tabindex="-1" aria-labelledby="addStateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addStateForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStateModalLabel">Add State</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stateName">State Name</label>
                            <input type="text" id="stateName" name="name" class="form-control" required>
                            <span class="text-danger" id="stateNameError"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="countryId">Country</label>
                            <select id="countryId" name="country_id" class="form-control select2" required>
                                <option value="0"> -- Select Country -- </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="countryIdError"></span>
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
    <div class="modal fade" id="editStateModal" tabindex="-1" aria-labelledby="editStateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editStateForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStateModalLabel">Edit State</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="stateId">
                        <div class="form-group">
                            <label for="editStateName">State Name</label>
                            <input type="text" id="editStateName" name="name" class="form-control" required>
                            <span class="text-danger" id="editStateNameError"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="editCountryId">Country</label>
                            <select id="editCountryId" name="country_id" class="form-control select2" required>
                                <option value="0"> -- Select Country -- </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="editCountryIdError"></span>
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
                $('#addStateModal').modal('show');
                $('#stateNameError, #countryIdError').text('');
                $('#addStateForm')[0].reset();
            });

            // Add State
            $('#addStateForm').submit(function(e) {
                e.preventDefault();

                $('#stateNameError, #countryIdError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: "{{ route('states.store') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addStateModal').modal('hide');
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
                            let errors = response.responseJSON.errors;
                            $('#stateNameError').text(errors.name);
                            $('#countryIdError').text(errors.country_id);
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
                let url = "{{ route('states.edit', ':id') }}".replace(':id', id);

                $.get(url, function(data) {
                    $('#stateId').val(data.id);
                    $('#editStateName').val(data.name);
                    $('#editCountryId').val(data.country_id).trigger('change');
                    $('#editStateModal').modal('show');
                });
            });

            // when modal closes
            $('#editStateModal').on('hidden.bs.modal', function() {
                $('#editStateForm')[0].reset();
                $('#editStateNameError, #editCountryIdError').text('');
            });

            // Edit State
            $('#editStateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#stateId').val();
                let url = "{{ route('states.update', ':id') }}".replace(':id', id);

                $('#editStateNameError, #editCountryIdError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editStateModal').modal('hide');
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
                            let errors = response.responseJSON.errors;
                            $('#editStateNameError').text(errors.name);
                            $('#editCountryIdError').text(errors.country_id);
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
                let url = "{{ route('states.destroy', ':id') }}".replace(':id', id);

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
                                    text: "State has been deleted.",
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
