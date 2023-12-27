@extends('frontend.layouts.master')

@section('content')

    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Create Account</h5>
                    <form action="{{route('user.register')}}" class="form-group" method="post">
                        @csrf
                        <div class="review-form-name mb-2">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Name">
                        </div>
                        <div class="review-form-email mb-2">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                        </div>
                        <div class="review-form-password mb-2">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="review-form-password mb-2">
                            <label for="password_confirmation" class="form-label">Password Confirmation*</label>
                            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation"
                                   class="form-control" placeholder="Password">
                        </div>
                        <div class="review-form-name mb-2">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" name="phone" id="phone" value="{{old('phone')}}" class="form-control" placeholder="9874563210">
                        </div>
                        <div class="review-form-name address-form mb-2">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control"
                                   placeholder="Enter your Address">
                        </div>
                        <button type="submit" class="shop-btn">Create an Account</button>
                    </form>
                    <div class="login-btn text-center">
                        <span class="shop-account">Already have an account ?<a
                                href="{{route('user.login')}}">Log In</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
