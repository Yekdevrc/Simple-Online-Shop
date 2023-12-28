@extends('frontend.layouts.master')

@section('content')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{url('/')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Contact Us</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Contact Us</h1>
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <section class="about">
        <div class="container">
            <div class="about-section">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6">
                        <div class="about-img" data-aos="fade-right">
                            <img src="{{$officeSetting->background_image_url}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content" data-aos="fade-up">
                            <h3 class="about-title">We are</h3>
                            <p class="about-info">
                                {{$officeSetting->introduction}}</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{route('testimonial.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                    <fieldset class="border p-3">
                                    <div class=" account-section">
                                        <h3 class="text-center"> Client Testimonial</h3>
                                        <div class="review-form">
                                            <div class=" account-inner-form col-lg-12">
                                                <div class="review-form-name">
                                                    <label for="name" class="form-label"> Name*</label>
                                                    <input type="text" id="name" name="name"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           placeholder="Enter your Name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" account-inner-form col-lg-12">
                                                <div class="review-form-name">
                                                    <label for="designation" class="form-label"> Designation*</label>
                                                    <input type="text" id="designation" name="designation"
                                                           class="form-control @error('designation') is-invalid @enderror"
                                                           placeholder="Enter your designation">
                                                    @error('designation')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" account-inner-form col-lg-12">
                                                <div class="review-form-name">
                                                    <label for="company" class="form-label"> Company/Business*</label>
                                                    <input type="text" id="company" name="company"
                                                           class="form-control @error('company') is-invalid @enderror"
                                                           placeholder="Enter your designation">
                                                    @error('company')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" account-inner-form col-lg-12">
                                                <div class="review-form-name">
                                                    <label for="photo" class="form-label"> Photo*</label>
                                                    <input type="file" id="photo" name="photo"
                                                           class="form-control @error('photo') is-invalid @enderror">
                                                    @error('photo')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" account-inner-form col-lg-12">
                                                <div class="review-form-name">
                                                    <label for="message" class="form-label"> Message*</label>
                                                    <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                                    @error('company')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" href="#" class="shop-btn update-btn">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
