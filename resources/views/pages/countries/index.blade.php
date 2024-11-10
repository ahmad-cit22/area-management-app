@extends('layouts.master')

@section('content')
    <div class="row mt-3 m-auto px-5">
        <div class="col-lg-12">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <div class="row">
                    <div class="col-3">
                        <h5 class="dashboard__card__header__title">Countries</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <a href="{{ route('countries.create') }}">
                            <button class="btn btn-primary float-end" id="create-button">Add Country</button>
                        </a>
                    </div>
                </div>
                <div class="dashboard__card__inner border_top_1">
                    <div class="dashboard__inventory__table custom_table">
                        <table class="table table-bordered table-striped data-table" id="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Country Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table_row">
                                    <td><span class="order_id">1</span></td>
                                    <td class="">Bangladesh</td>
                                    <td>
                                        <div class="action__icon d-flex gap-2">
                                            <div class="action__icon__item">
                                                <a href="javascript:void(0)" class="icon"><i
                                                        class="material-symbols-outlined text-primary">edit</i></a>
                                            </div>
                                            <div class="action__icon__item">
                                                <a href="javascript:void(0)" class="icon delete delete_item"><i
                                                        class="material-symbols-outlined text-danger">delete</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="countryForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCountryModalLabel">Add Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="countryId">
                        <div class="form-group">
                            <label for="countryName">Name</label>
                            <input type="text" id="countryName" name="name" class="form-control">
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
@endsection

@push('custom-scripts')
    <script>
        // Swal.fire({
        //     icon: "error",
        //     title: "Oops!",
        //     text: `asdasd`,
        // });

        // Swal.fire({
        //     title: "Are you sure?",
        //     text: "You won't be able to revert this!",
        //     icon: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3085d6",
        //     cancelButtonColor: "#d33",
        //     confirmButtonText: "Yes, delete it!"
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire({
        //             title: "Deleted!",
        //             text: "Your file has been deleted.",
        //             icon: "success"
        //         });
        //     }
        // });
    </script>
@endpush
