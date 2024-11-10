@extends('layouts.master')

@section('content')
    city
    {{-- show data --}}
        <div class="row g-4 mt-1">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <h5 class="dashboard__card__header__title">Recent Orders</h5>
                    <div class="dashboard__card__inner border_top_1">
                        <div class="dashboard__inventory__table custom_table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ORDER ID</th>
                                        <th>CUSTOMER</th>
                                        <th>ORDERED</th>
                                        <th>AMOUNT</th>
                                        <th>PAYMENT METHOD</th>
                                        <th>STATUS</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table_row">
                                        <td><span class="order_id">RTS2235611</span>
                                        </td>
                                        <td>
                                            <div class="table_customer">
                                                <div class="table_customer__flex">
                                                    <div class="table_customer__thumb">
                                                        <img src="assets/img/customer/customer1.jpg" alt="customer">
                                                    </div>
                                                    <div class="table_customer__contents">
                                                        <h6 class="table_customer__title">
                                                            Naomi Russel</h6>
                                                        <p class="table_customer__para mt-1">
                                                            ckctm12@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="table_date">22 Feb 2023</span>
                                        </td>
                                        <td><span class="table_price">$446.61</span>
                                        </td>
                                        <td><span class="table_payment"><img src="assets/img/payment_method/apple.png"
                                                    alt=""></span></td>
                                        <td>
                                            <p class="status_btn completed">Complete
                                            </p>
                                        </td>
                                        <td>
                                            <div class="action__icon d-flex">
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">sticky_note_2</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">print</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" class="icon"
                                                            data-bs-toggle="dropdown">
                                                            <i class="material-symbols-outlined">more_vert</i></a>
                                                        <ul class="dropdown-menu">
                                                            <li class="single-item"><a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="material-symbols-outlined">edit</i>
                                                                    Edit Product</a>
                                                            </li>
                                                            <li class="single-item"><a
                                                                    class="dropdown-item delete delete_item"
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
                                    <tr class="table_row">
                                        <td><span class="order_id">RTS2235612</span>
                                        </td>
                                        <td>
                                            <div class="table_customer">
                                                <div class="table_customer__flex">
                                                    <div class="table_customer__thumb">
                                                        <img src="assets/img/customer/customer2.jpg" alt="customer">
                                                    </div>
                                                    <div class="table_customer__contents">
                                                        <h6 class="table_customer__title">
                                                            Wade Warren</h6>
                                                        <p class="table_customer__para mt-1">
                                                            vuhaithuongnute@gmail.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="table_date">23 Feb 2023</span>
                                        </td>
                                        <td><span class="table_price">$928.36</span>
                                        </td>
                                        <td><span class="table_payment"><img src="assets/img/payment_method/cash.png"
                                                    alt=""></span></td>
                                        <td>
                                            <p class="status_btn in_progress">In
                                                Progress</p>
                                        </td>
                                        <td>
                                            <div class="action__icon d-flex">
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">sticky_note_2</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">print</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" class="icon"
                                                            data-bs-toggle="dropdown">
                                                            <i class="material-symbols-outlined">more_vert</i></a>
                                                        <ul class="dropdown-menu">
                                                            <li class="single-item"><a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="material-symbols-outlined">edit</i>
                                                                    Edit Product</a>
                                                            </li>
                                                            <li class="single-item"><a
                                                                    class="dropdown-item delete delete_item"
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
                                    <tr class="table_row">
                                        <td><span class="order_id">RTS2235613</span>
                                        </td>
                                        <td>
                                            <div class="table_customer">
                                                <div class="table_customer__flex">
                                                    <div class="table_customer__thumb">
                                                        <img src="assets/img/customer/customer3.jpg" alt="customer">
                                                    </div>
                                                    <div class="table_customer__contents">
                                                        <h6 class="table_customer__title">
                                                            Kristin Watson</h6>
                                                        <p class="table_customer__para mt-1">
                                                            thuhang.nute@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="table_date">22 Feb 2023</span>
                                        </td>
                                        <td><span class="table_price">$275.43</span>
                                        </td>
                                        <td><span class="table_payment"><img src="assets/img/payment_method/google.png"
                                                    alt=""></span></td>
                                        <td>
                                            <p class="status_btn pending">Pending</p>
                                        </td>
                                        <td>
                                            <div class="action__icon d-flex">
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">sticky_note_2</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">print</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" class="icon"
                                                            data-bs-toggle="dropdown">
                                                            <i class="material-symbols-outlined">more_vert</i></a>
                                                        <ul class="dropdown-menu">
                                                            <li class="single-item"><a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="material-symbols-outlined">edit</i>
                                                                    Edit Product</a>
                                                            </li>
                                                            <li class="single-item"><a
                                                                    class="dropdown-item delete delete_item"
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
                                    <tr class="table_row">
                                        <td><span class="order_id">RTS2235614</span>
                                        </td>
                                        <td>
                                            <div class="table_customer">
                                                <div class="table_customer__flex">
                                                    <div class="table_customer__thumb">
                                                        <img src="assets/img/customer/customer4.jpg" alt="customer">
                                                    </div>
                                                    <div class="table_customer__contents">
                                                        <h6 class="table_customer__title">
                                                            Kristin Watson</h6>
                                                        <p class="table_customer__para mt-1">
                                                            thuhang.nute@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="table_date">24 Feb 2023</span>
                                        </td>
                                        <td><span class="table_price">$275.43</span>
                                        </td>
                                        <td><span class="table_payment"><img src="assets/img/payment_method/cash.png"
                                                    alt=""></span></td>
                                        <td>
                                            <p class="status_btn cancelled">Canceled
                                            </p>
                                        </td>
                                        <td>
                                            <div class="action__icon d-flex">
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">sticky_note_2</i></a>
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">sticky_note_2</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <a href="javascript:void(0)" class="icon"> <i
                                                            class="material-symbols-outlined">print</i></a>
                                                </div>
                                                <div class="action__icon__item">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" class="icon"
                                                            data-bs-toggle="dropdown">
                                                            <i class="material-symbols-outlined">more_vert</i></a>
                                                        <ul class="dropdown-menu">
                                                            <li class="single-item"><a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="material-symbols-outlined">edit</i>
                                                                    Edit Product</a>
                                                            </li>
                                                            <li class="single-item"><a
                                                                    class="dropdown-item delete delete_item"
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
