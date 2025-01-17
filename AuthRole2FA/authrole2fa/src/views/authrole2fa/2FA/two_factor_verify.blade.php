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
                        
                        <form method="POST" action="{{ route('two-factor.verify') }}" class="w-100 needs-validation login-main-form">
                        @csrf
                            <div class="row">
                                <div class="col-md-7 col-12">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="one_time_password" class="form-label fw-600 mb-1">Enter One-Time Password (TOTP) from Google Authenticator:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" name="one_time_password" class="form-control @error('one_time_password') is-invalid @enderror" required>
                                            @error('one_time_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <button type="submit"class="btn btn-primary text-capitalize px-md-5 px-4">Verify</button>
                                        </div>
                                    </div>

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

@endsection