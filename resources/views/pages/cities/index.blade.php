@extends('layouts.master')

@section('content')
    <div class="row mt-1 m-auto">
        <div class="col-lg-12">
            <div class="dashboard__card bg__white padding-20 radius-10">
                <h5 class="dashboard__card__header__title">Recent Orders</h5>
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
                                    <td>asdasd</td>
                                    <td>
                                        <div class="action__icon d-flex">
                                            <div class="action__icon__item">
                                                <div class="btn-group">
                                                    <a href="javascript:void(0)" class="icon" data-bs-toggle="dropdown">
                                                        <i class="material-symbols-outlined">more_vert</i></a>
                                                    <ul class="dropdown-menu">
                                                        <li class="single-item"><a class="dropdown-item"
                                                                href="javascript:void(0)"><i
                                                                    class="material-symbols-outlined">edit</i>
                                                                Edit Product</a>
                                                        </li>
                                                        <li class="single-item"><a class="dropdown-item delete delete_item"
                                                                href="javascript:void(0)"><i
                                                                    class="material-symbols-outlined">delete</i>
                                                                Delete Product</a>
                                                        </li>
                                                    </ul>
                                                </div>
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
