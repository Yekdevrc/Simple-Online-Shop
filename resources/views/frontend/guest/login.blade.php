@extends('frontend.layouts.master')

@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Log In</h5>
                    <div class="review-inner-form ">
                        <form action="{{route('user.login')}}" class="form-control" method="post">
                            @csrf
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email Address**</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">Password*</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox">
                                    <span class="address">
Remember Me</span>
                                </div>
                                <div class="forget-pass">
                                    <p>Forgot password?</p>
                                </div>
                            </div>
                            <button type="submit" class="shop-btn">Login</button>
                        </form>
                    </div>

                    <div class="login-btn text-center">
                        <span class="shop-account">Dont't have an account ?<a href="{{route('user.register')}}">Register New Account</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
