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
