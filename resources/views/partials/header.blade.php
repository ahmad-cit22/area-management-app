<div class="row gx-4 align-items-center justify-content-between">
    <div class="col-sm-2">
        <div class="dashboard__header__left">
            <div class="dashboard__header__left__inner">
                <span class="dashboard__sidebarIcon d-none d-lg-block"></span>
                <span class="dashboard__sidebarIcon__mobile sidebar-icon d-lg-none"></span>
            </div>
        </div>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
        <div class="dashboard__header__middle text-center">
            <h4>Area Management System</h4>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="dashboard__header__right">
            <div class="dashboard__header__right__flex">
                {{-- <div class="dashboard__header__right__item">
                    <a href="javascript:void(0)" class="dashboard__header__notification__icon lightMode"
                        id="mode_change"> <i class="material-symbols-outlined">wb_sunny</i>
                    </a>
                </div> --}}
                <div class="dashboard__header__right__item">
                    <div class="dashboard__header__author">
                        <a href="javascript:void(0)" class="dashboard__header__author__flex flex-btn">
                            <div class="dashboard__header__author__thumb">
                                <img src="assets/img/author_nav_new.jpg" alt="authorImg">
                            </div>
                        </a>
                        <div class="dashboard__header__author__wrapper">
                            <div class="dashboard__header__author__wrapper__list">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="javascript:void(0)"
                                        class="dashboard__header__author__wrapper__list__item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Log Out</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
