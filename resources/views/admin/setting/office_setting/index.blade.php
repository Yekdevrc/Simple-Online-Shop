@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Office Setting </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-2 mb-2">
                        <h1 class="card-title">Office Setting</h1>
                    </div>
                    <form class="" action="{{route('admin.setting.officeSetting.update', $officeSetting)}}"
                          enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('put')
                        <fieldset class="form-group border p-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="title" class="form-label">Title <sup class="text-danger">*</sup></label>
                                    <input type="text"
                                           name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           value="{{old('title', $officeSetting->title)}}"
                                           placeholder="Title"
                                    >
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           value="{{old('email', $officeSetting->email)}}"
                                           placeholder="email"
                                    >
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file"
                                           name="logo"
                                           class="form-control @error('logo') is-invalid @enderror"
                                           id="logo"
                                    >
                                    @error('logo')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="background_image" class="form-label">Background Image</label>
                                    <input type="file"
                                           name="background_image"
                                           class="form-control @error('background_image') is-invalid @enderror"
                                           id="background_image"
                                    >
                                    @error('background_image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="google_map" class="form-label">Google Map</label>
                                    <input type="text"
                                           name="google_map"
                                           class="form-control @error('google_map') is-invalid @enderror"
                                           id="google_map"
                                           value="{{old('google_map', $officeSetting->google_map)}}"
                                           placeholder="google_map"
                                    >
                                    @error('google_map')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           id="phone"
                                           value="{{old('phone', $officeSetting->phone)}}"
                                           placeholder="phone"
                                    >
                                    @error('phone')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="text"
                                           name="website"
                                           class="form-control @error('website') is-invalid @enderror"
                                           id="website"
                                           value="{{old('website', $officeSetting->website)}}"
                                           placeholder="website"
                                    >
                                    @error('website')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text"
                                           name="facebook"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           id="facebook"
                                           value="{{old('facebook', $officeSetting->facebook)}}"
                                           placeholder="facebook"
                                    >
                                    @error('facebook')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text"
                                           name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           id="address"
                                           value="{{old('address', $officeSetting->address)}}"
                                           placeholder="address"
                                    >
                                    @error('address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="delivery_charge" class="form-label">Delivery Charge</label>
                                    <input type="number"
                                           name="delivery_charge"
                                           class="form-control @error('delivery_charge') is-invalid @enderror"
                                           id="delivery_charge"
                                           value="{{old('delivery_charge', $officeSetting->delivery_charge)}}"
                                           placeholder="delivery_charge"
                                    >
                                    @error('delivery_charge')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2 form-group">
                                <label for="introduction" class="form-label">Introduction</label>
                                <textarea name="introduction"
                                          id="introduction"
                                          cols="50" rows="5"
                                          class="form-control"
                                >{{old('introduction', $officeSetting->introduction)}}</textarea>
                                @error('introduction')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2 me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
