@extends('layouts.master')

@section('content')
    <div class="row mt-3 m-auto">
        <div class="col-lg-12">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <div class="row">
                    <div class="col-3">
                        <h5 class="dashboard__card__header__title">Countries</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <a href="{{ route('countries.create') }}">
                            <button class="btn btn-primary float-end">Add Country</button>
                        </a>
                    </div>
                </div>
                <div class="dashboard__card__inner border_top_1">
                    <div class="dashboard__inventory__table custom_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Countries</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table_row">
                                    <td><span class="order_id">12</span></td>
                                    <td>Bangladesh</td>
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
@endsection
