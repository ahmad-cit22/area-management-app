<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | Area Management System | Xgenious</title>

    <!-- favicon -->
    <link rel=icon href="favicons.png" sizes="16x16" type="icon/png">

    <!-- Styles -->
    @include('includes.styles')

</head>

<body>

    @include('partials.preloader')

    <!-- Dashboard start -->
    <div class="body-overlay"></div>
    <div class="dashboard__area">
        <div class="container-fluid p-0">
            <div class="dashboard__contents__wrapper">
                <div class="dashboard__left dashboard-left-content">
                    @include('partials.sidebar')
                </div>
                <div class="dashboard__right">
                    <div class="dashboard__header single_border_bottom">
                        @include('partials.header')
                    </div>
                    <div class="dashboard__body posPadding mt-3">
                        <div class="dashboard__inner">
                            <div class="dashboard__inner__item">
                                <div class="dashboard__inner__item__flex">

                                    <!-- main content -->
                                    @yield('content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard end -->

    <!-- scripts -->
    @include('includes.scripts')

</body>

</html>
