@extends('layouts.login-layout')

@section('title') Login @endsection

@section('body')

    <div class="container-fluid h-100 login-bg">
        <div class="row h-100">
            <div class="crousel-side col-md-6 col-sm-12 background-image customRoundedBorder d-flex align-items-center justify-content-center rounded-top-right-12 rounded-bottom-right-12 h-100 px-xl-5 px-4 py-4">
                <div id="prms-testimonials-carousel" class="carousel slide prms-testimonials-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner pl-5">
                        <div class="carousel-item active" data-bs-interval="5000" style="min-height: 255px;">
                            <div class="login-testimonials p-4">
                                <div class="testimonials-content">
                                    <div class="quote-container d-flex justify-content-center mb-2">
                                        <i class="icon-bold-quote-up text-center font-size-18"></i>
                                    </div>
                                    <p class="p-0 text-quote fst-italic fw-medium ms-1">
                                        Discovered a personalised solution for effortlessly tracking promotions, it empowered us to maximise product exposure with confidence and ease.
                                    </p>
                                    <div class="testimonials-writer d-flex align-items-center">
                                        <img src="{{ asset('images/user-image.svg') }}" alt="William Noris" />
                                        <div class="d-flex flex-column ms-2">
                                            <span class="prmst-author text-quote fw-bold">William Noris</span>
                                            <span class="prmst-designation text-quote m-0">Vice President Marketing Uniliver</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000" style="min-height: 255px;">
                            <div class="login-testimonials p-4">
                                <div class="testimonials-content">
                                    <div class="quote-container d-flex justify-content-center mb-2">
                                        <i class="icon-bold-quote-up text-center font-size-18"></i>
                                    </div>
                                    <p class="p-0 text-quote fst-italic fw-medium ms-1">
                                        Discovered a personalised solution for effortlessly tracking promotions, it empowered us to maximise product exposure with confidence and ease.
                                    </p>
                                    <div class="testimonials-writer d-flex align-items-center">
                                        <img src="{{ asset('images/user-image.svg') }}" alt="William Noris" />
                                        <div class="d-flex flex-column ms-2">
                                            <span class="prmst-author text-quote fw-bold">William Noris</span>
                                            <span class="prmst-designation text-quote m-0">Vice President Marketing Uniliver</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 login-bg login-form-container overflow-hidden p-3">
                <div class="d-flex align-items-center flex-column h-100 custom-form-width mx-auto">
                    <div class="login-headings pt-0 mx-0 mt-auto w-100">
                        <div class="brand-login-logo mb-4">
                            <img alt="Theme logo" class="w-100 d-block" src="{{ asset('images/logo.png') }}">
                        </div>
                        <h3 class="login-slogan-heading-1 text-primary-2 fw-500 fst-italic mb-0">Maximize ROI Effortlessly:</h3>
                        <h1 class="login-heading-1 text-primary-2 fw-700 m-0">Redefining Trade Spend Management.</h1>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <form id="loginForm" class="w-100 needs-validation login-main-form" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <div class="login-container rounded-4">
                                <div class="login-header">
                                    <h2 class="login-heading-1 align-self-start fw-bold text-grey darken-3 mb-1 d-lg-block d-md-block">Welcome to PromoPro.</h2>
                                    <p class="login-subheading-1 align-self-start text-grey text-lighten-3 m-0 d-lg-block d-md-block">Please login to your account.</p>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label fw-600 mb-1">Email <span class="validation-color-red">*</span></label>
                                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Unleash your digital identity." value="{{ old('email') }}" autocomplete="email" autofocus required>
                                </div>
                                <div id="incorrect-username" class="mb-4">
                                    <label class="form-label fw-600 mb-1" id="password-label" for="password">Password <span class="validation-color-red">*</span></label>
                                    <div class="position-relative">
                                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your magic word, please." autocomplete="current-password" required>
                                        <i class="icon-outline-eye-slash password-show-class text-grey lighten-3 password-eye position-absolute end-0 top-0 bottom-0 d-flex align-items-center justify-content-center cursor-pointer" id="togglePassword"></i>
                                    </div>
                                    <div class="invalid-feedback invalid-error-fontsize my-3">Incorrect login details. Please try again.</div>
                                    <div class="mt-xl-2">
                                        <a href="{{route('password.request')}}" class="text-forgot-link text-decoration-none text-black fw-bold">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" id="login-button" class="btn btn-primary btn-primary border-0 customWidthButton d-flex align-items-center justify-content-center" onclick="handleLogin()">
                                        <span class="spinner-border spinner-border-sm text-white me-2 d-none" id="loader" role="status" aria-hidden="true"></span>
                                        <span class="text-black-light fw-600 login-btn-text" id="btn-text">Login</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mt-auto text-center positionResponsive">
                        <p class="text-secondary mb-0">
                            <a class="text-secondary text-decoration-none cr-font-zize text-grey text-darken-2" href="">Terms & Conditions</a> |
                            <a class="text-secondary text-decoration-none cr-font-zize text-grey text-darken-2" href="">Privacy Policy</a> | 
                            <a class="text-secondary text-decoration-none cr-font-zize text-grey text-darken-2" href="">Contact Us</a>
                        </p>
                        <p class="cr-font-zize m-0 text-secondary d-flex align-items-center justify-content-center copyright-link text-grey text-darken-2">
                            <span class="font-size-18 me-1">&copy;</span> 2024 - a product of <a href="https://salesflo.com/" class="text-secondary text-decoration-none ms-2 align-middle"><img src="{{ asset('images/footer-logo.svg') }}" alt="Logo" width="70" class="d-block" /></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/jquery-3.7.0.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('loginForm');
        const usernameField = document.getElementById('email');
        const passwordField = document.getElementById('password');
        const errorAlert = document.getElementsByClassName('invalid-feedback')[0];

        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Reset validation styles and hide the error message
            clearValidation();
            hideError();

            const username = usernameField.value.trim();
            const password = passwordField.value.trim();
            $.ajax({
                url: "{{ route('ValidateUser') }}",
                type: 'POST',
                data: {
                    username: username, // Send the claims array
                    password: password
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
                },
                beforeSend: function(){
                    $('#login-button').prop("disable", true);
                    $('.cs-loader-container').css("display", "flex");
                },
                success: function(response) {
                if(response.statusCode == 400)
                {
                        usernameField.classList.add('is-invalid');
                        passwordField.classList.add('is-invalid');
                    errorAlert.style.display = 'block';
                }
                else
                {
                        usernameField.classList.remove('is-invalid');
                        passwordField.classList.remove('is-invalid');
                    errorAlert.style.display = 'none';
                    loginForm.submit();
                }
            
                },
                complete: function(response) {
                    $('.cs-loader-container').css("display", "none");
                },
                error: function(xhr, status, error) {
                }
            });
            
            // Validate fields
            if (!username) {
                usernameField.classList.add('is-invalid');
                showError("Username is required.");
                return;
            }
            if (!password) {
                passwordField.classList.add('is-invalid');
                showError("Password is required.");
                return;
            }


            if (!username || !password) {
                usernameField.classList.add('is-invalid');
                passwordField.classList.add('is-invalid');
                showError("Both username and password are required.");
                return;
            }


            // // Check credentials
            // if (username === 'salesfloadmin@mailinator.com' && password === 'Salesflo') {
            //     loginForm.submit(); // Submit the form if credentials are correct
            // } else {
            //     usernameField.classList.add('is-invalid');
            //     passwordField.classList.add('is-invalid');
            //     showError('Incorrect username or password. Please try again.');
            // }
        });

        function clearValidation() {
            usernameField.classList.remove('is-invalid');
            passwordField.classList.remove('is-invalid');
        }

        function showError(message) {
            errorAlert.textContent = message;
            errorAlert.style.display = 'block';
        }

        function hideError() {
            errorAlert.style.display = 'none';
        }
    });

    // Toggle password/text type
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password"); // Ensure this targets the password input field

    $("#togglePassword").click(function () {
        // Toggle between "password" and "text" types
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle eye icons
        $(this).toggleClass("icon-outline-eye icon-outline-eye-slash");
    });

    </script>
@endsection