@extends('layouts.frontend.app')
@section('main-content')
<main class="d-flex flex-column justify-content-start flex-grow-1">

    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 hero-content">
                    <h1>Signup</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="authentication-form">
                    <div class="authentication-form-body">
                        <h2 class="text-center mb-3">Register</h2>

                        <div class="sign-in-container">
                            <form class="" id="sign-in-form" action="{{route('customer.store')}}">
                                @csrf
                                <div class="form-wrap mb-3">
                                    <input class="form-control" placeholder="Enter Name" type="text" value="" name="name" id="user_name">
                                </div>
                                <div class="form-wrap mb-3">
                                    <input class="form-control" placeholder="Email address" type="email" value="" name="email" id="user_email">
                                </div>

                                <div class="form-wrap mb-3">
                                    <input class="form-control" placeholder="Password" type="password" name="password" id="user_password">
                                </div>
                                <div class="form-wrap mb-3">
                                    <input class="form-control" placeholder="Retype Password" type="password" name="password2" id="user_password2">
                                </div>

                                <a class="d-block fs-8 text-muted text-decoration-underline mb-3" href="forgot.html">Forgot your password</a>

                                <button name="button" type="submit" class="btn btn-primary fw-bold w-100">Register</button>

                                <div class="checkbox mt-3">
                                    <input type="checkbox" value="1" name="user[remember_me]" id="user_remember_me">
                                    <label class="text-muted ms-1" for="user_remember_me">Remember me</label>
                                </div>

                            </form>
                            {{-- <div class="hr-divider">
                                <span class="hr-divider-text text-center">or</span>
                            </div> --}}

                            {{-- <button type="button" class="btn btn_facebook fw-bold w-100">
                                <i class="fab fa-facebook-f"></i>
                                Sign in with Facebook
                            </button> --}}
                        </div>

                    </div>
                    {{-- <div class="authentication-form-footer">
                        No account? <a href="booking_car.html">Click here to get my instant price.</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
