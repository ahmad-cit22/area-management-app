@extends('layouts.master')

@section('content')
    <div class="row mt-3 m-auto px-5">
        <div class="col-lg-12">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <div class="row">
                    <div class="col-3">
                        <h5 class="dashboard__card__header__title">Cities</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button class="btn btn-primary float-end create-btn">Add City</button>
                    </div>
                </div>
                <div class="dashboard__card__inner border_top_1">
                    <div class="dashboard__inventory__table custom_table">
                        <table class="table table-bordered table-striped data-table" id="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>City Name</th>
                                    <th>State Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cities as $city)
                                    <tr class="table_row">
                                        <td>
                                            <span class="order_id">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->state->name }}</td>
                                        <td>
                                            @include('partials.action-buttons', ['id' => $city->id])
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Cities Found</td>
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
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addCityForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCityModalLabel">Add City</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cityName">City Name</label>
                            <input type="text" id="cityName" name="name" class="form-control" required>
                            <span class="text-danger" id="cityNameError"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="stateId">State</label>
                            <select id="stateId" name="state_id" class="form-control select2" required>
                                <option value="0"> -- Select State -- </option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="stateIdError"></span>
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
    <div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCityForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCityModalLabel">Edit City</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="cityId">
                        <div class="form-group">
                            <label for="editCityName">City Name</label>
                            <input type="text" id="editCityName" name="name" class="form-control" required>
                            <span class="text-danger" id="editCityNameError"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="editStateId">State</label>
                            <select id="editStateId" name="state_id" class="form-control select2" required>
                                <option value="0"> -- Select State -- </option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="editStateIdError"></span>
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
                $('#addCityModal').modal('show');
                $('#cityNameError, #stateIdError').text('');
                $('#addCityForm')[0].reset();
            });

            // Add City
            $('#addCityForm').submit(function(e) {
                e.preventDefault();

                $('#cityNameError, #stateIdError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: "{{ route('cities.store') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addCityModal').modal('hide');
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
                            $('#cityNameError').text(errors.name);
                            $('#stateIdError').text(errors.state_id);
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
                let url = "{{ route('cities.edit', ':id') }}".replace(':id', id);

                $.get(url, function(data) {
                    $('#cityId').val(data.id);
                    $('#editCityName').val(data.name);
                    $('#editStateId').val(data.state_id).trigger('change');
                    $('#editCityModal').modal('show');
                });
            });

            // when modal closes
            $('#editCityModal').on('hidden.bs.modal', function() {
                $('#editCityForm')[0].reset();
                $('#editCityNameError, #editStateIdError').text('');
            });

            // Edit City
            $('#editCityForm').submit(function(e) {
                e.preventDefault();

                let id = $('#cityId').val();
                let url = "{{ route('cities.update', ':id') }}".replace(':id', id);

                $('#editCityNameError, #editStateIdError').text('');

                let $submitButton = $(this).find('button[type="submit"]');
                $submitButton.prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editCityModal').modal('hide');
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
                            $('#editCityNameError').text(errors.name);
                            $('#editStateIdError').text(errors.state_id);
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
                let url = "{{ route('cities.destroy', ':id') }}".replace(':id', id);

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
                                    text: "City has been deleted.",
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
