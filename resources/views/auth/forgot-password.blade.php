<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password | Area Management System | Xgenious</title>

    <!-- favicon -->
    <link rel=icon href="favicons.png" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- All Icon -->
    <link rel="stylesheet" href="assets/css/icon.css">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="assets/css/flatpickr.min.css">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="assets/css/niceCountryInput.css">
    <link rel="stylesheet" href="assets/css/jsuites.css">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="assets/css/fancybox.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- dark css -->

</head>

<body>



    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Forgot Password</h2>
                        <p class="loginForm__header__para mt-3">Forgot your password? No problem. Just let us know your
                            email address and we will email you a password reset link that will allow you to choose a
                            new one.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form method="POST" action="{{ route('password.email') }}" class="custom_form">
                            @csrf
                            <div class="single_input">
                                <label class="label_title">Enter Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email"
                                        placeholder="Enter email or phone" name="email" value="{{ old('email') }}"
                                        required>
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                                <span class="text-danger" id="emailError"></span>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="btn_wrapper single_input d-flex gap-2">
                                <button type="submit" class="cmn_btn w-100 radius-5">Submit</button>
                                <a href="{{ route('login') }}" class="cmn_btn outline_btn w-100 radius-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg " style="background-image: url(assets/img/login.jpg);">
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
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <!-- jquery Migrate -->
    <script src="assets/js/jquery-migrate-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/js/slick.js"></script>
    <!-- Plugins Js -->
    <script src="assets/js/plugin.js"></script>
    <!-- Fancy box Js -->
    <script src="assets/js/fancybox.umd.js"></script>

    <!-- Country Select Js -->
    <script src="assets/js/niceCountryInput.js"></script>
    <!-- Multiple Country Select Js -->
    <script src="assets/js/jsuites.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Done!",
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "{{ session('error') }}",
            });
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Done!",
                text: "{{ session('status') }}",
            });
        </script>
    @endif

</body>

</html>
