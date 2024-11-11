<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password | Area Management System | Xgenious</title>

    <!-- favicon -->
    <link rel=icon href="{{ asset('favicons.png') }}" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- All Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/icon.css') }}">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/niceCountryInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jsuites.css') }}">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <!-- dark css -->

</head>

<body>
    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Reset Password</h2>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="{{ route('password.store') }}" class="custom_form" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email"
                                        placeholder="Enter your email address" name="email"
                                        value="{{ old('email') }}" required>
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password"
                                        placeholder="Enter your password" required>
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password_confirmation"
                                        placeholder="confirm password" required>
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                                <button type="submit" class="cmn_btn w-100 radius-5">Reset Password</button>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Don’t have an account ? </span> <a
                                        href="{{ route('register') }}" class="loginForm__wrapper__signup__btn">Sign
                                        Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg "
                style="background-image: url({{ asset('assets/img/login.jpg') }});">
                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/logo.webp') }}"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <!-- jquery Migrate -->
    <script src="{{ asset('assets/js/jquery-migrate-3.4.1.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- Plugins Js -->
    <script src="{{ asset('assets/js/plugin.js') }}"></script>

    <!-- Country Select Js -->
    <script src="{{ asset('assets/js/niceCountryInput.js') }}"></script>
    <!-- Multiple Country Select Js -->
    <script src="{{ asset('assets/js/jsuites.js') }}"></script>
    <!-- Fancy box Js -->
    <script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
