<div class="dashboard__left__main">
    <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
    <div class="dashboard__top">
        <div class="dashboard__top__logo">
            <a href="{{route('dashboard')}}">
                <img class="main_logo" src="assets/img/logo.web" alt="logo">
                <img class="iocn_view__logo" src="assets/img/Favicon.png" alt="logo_icon">
            </a>
        </div>
    </div>
    <div class="dashboard__bottom mt-5">
        <div class="dashboard__bottom__search mb-3">
            <input class="form--control w-100" type="text" placeholder="Search here..." id="search_sidebarList">
        </div>
        <ul class="dashboard__bottom__list dashboard-list">
            <li class="dashboard__bottom__list__item has-children show open active">
                <a href="{{route('dashboard')}}"><i class="material-symbols-outlined">dashboard</i>
                    <span class="icon_title">Dashboard</span>
                </a>
            </li>
            <li class="dashboard__bottom__list__item has-children">
                <a href="basic_form.html"><span class="icon_title">Form</span></a>
            </li>
            <li class="dashboard__bottom__list__item has-children">
                <a href="table.html"><span class="icon_title">Table</span></a>
            </li>
            <li class="dashboard__bottom__list__item has-children">
                <a href="javascript:void(0)"><i class="material-symbols-outlined">group</i> <span
                        class="icon_title">User</span></a>
                <ul class="submenu">
                    <li class="dashboard__bottom__list__item">
                        <a href="sign_in.html">Login</a>
                    </li>
                    <li class="dashboard__bottom__list__item">
                        <a href="sign_up.html">Register</a>
                    </li>
                    <li class="dashboard__bottom__list__item">
                        <a href="forgot_password.html">Reset Password</a>
                    </li>
                    <li class="dashboard__bottom__list__item">
                        <a href="mail_varification.html">Mail Varification</a>
                    </li>
                </ul>
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
