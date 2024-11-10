@extends('layouts.master')

@section('content')
    <div class="dashboard__inner__item__left bodyItemPadding">
        <div class="dashboard__inner__header">
            <div class="dashboard__inner__header__flex">
                <div class="dashboard__inner__header__left">
                    <h4 class="dashboard__inner__header__title">Good Morning, {{ Auth::user()->name }}
                    </h4>
                    <p class="dashboard__inner__header__para">Manage your areas
                        here</p>
                </div>
            </div>
        </div>

        <div class="dashboard_promo">
            <div class="row g-4 mt-2">
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="{{ route('countries.index') }}">
                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                            <h5 class=" mt-2">Manage Counties</h5>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="{{ route('states.index') }}">
                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                            <h5 class=" mt-2">Manage Counties</h5>
                        </div>
                    </a>
                </div>
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="{{ route('cities.index') }}">
                        <div class="dashboard_promo__single bg__white radius-10 padding-20">
                            <h5 class=" mt-2">Manage Counties</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
