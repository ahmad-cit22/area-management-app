<div class="dashboard__left__main">
    <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
    <div class="dashboard__top">
        <div class="dashboard__top__logo">
            <a href="{{route('dashboard')}}">
                <img class="main_logo" src="{{ asset('assets/img/logo.webp') }}" alt="logo">
                <img class="iocn_view__logo" src="{{ asset('assets/img/Favicon.png') }}" alt="logo_icon">
            </a>
        </div>
    </div>
    <div class="dashboard__bottom mt-5">
        <ul class="dashboard__bottom__list dashboard-list">
            <li class="dashboard__bottom__list__item {{request()->routeIs('dashboard') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}"><i class="material-symbols-outlined">dashboard</i>
                    <span class="icon_title">Dashboard</span>
                </a>
            </li>
            <li class="dashboard__bottom__list__item {{request()->routeIs('countries.index') ? 'active' : ''}}">
                <a href="{{route('countries.index')}}"><span class="icon_title">Countries</span></a>
            </li>
            <li class="dashboard__bottom__list__item {{request()->routeIs('states.index') ? 'active' : ''}}">
                <a href="{{route('states.index')}}"><span class="icon_title">States</span></a>
            </li>
            <li class="dashboard__bottom__list__item {{request()->routeIs('cities.index') ? 'active' : ''}}">
                <a href="{{route('cities.index')}}"><span class="icon_title">Cities</span></a>
            </li>
            <li class="dashboard__bottom__list__item">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <a href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="material-symbols-outlined">logout</i>
                        <span class="icon_title">Log Out</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
