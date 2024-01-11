@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="page-title">Testimonial</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Edit Testimonial</h4>
                    <a href="{{route('admin.testimonial.index')}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-list-check"></i>Testimonial List
                    </a>
                </div>
                <form action="{{route('admin.testimonial.update', $testimonial)}}" class="" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <fieldset class="form-group border p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="name"
                                               name="name"
                                               value="{{old('name', $testimonial->name)}}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="name"
                                        >
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="designation" class="form-label">Designation <sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="designation"
                                               name="designation"
                                               value="{{old('designation', $testimonial->designation)}}"
                                               class="form-control @error('designation') is-invalid @enderror"
                                               placeholder="designation"
                                        >
                                        @error('designation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="company" class="form-label">Company <sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="company"
                                               name="company"
                                               value="{{old('company', $testimonial->company)}}"
                                               class="form-control @error('company') is-invalid @enderror"
                                               placeholder="company"
                                        >
                                        @error('company')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="photo" class="form-label">Photo<sup class="text-danger">*</sup></label>
                                        <input type="file"
                                               id="photo"
                                               name="photo"
                                               value="{{old('photo')}}"
                                               class="form-control @error('photo') is-invalid @enderror"
                                               placeholder="photo"
                                        >
                                        @error('photo')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group mt-2">
                                        <label for="message" class="form-label">Message <sup class="text-danger">*</sup></label>
                                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"  cols="30" rows="10">{{old('message', $testimonial->message)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
