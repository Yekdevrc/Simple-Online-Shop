@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="page-title">Brand</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Add new Brand</h4>
                    <a href="{{route('admin.product.brand.index')}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-list-check"></i>Brand List
                    </a>
                </div>
                <form action="{{route('admin.product.brand.store')}}" class="" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group border p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="title" class="form-label">Title <sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{old('title')}}"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="Title"
                                        >
                                        @error('title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="logo" class="form-label">Logo<sup class="text-danger">*</sup></label>
                                        <input type="file"
                                               id="logo"
                                               name="logo"
                                               value="{{old('logo')}}"
                                               class="form-control @error('logo') is-invalid @enderror"
                                               placeholder="logo"
                                        >
                                        @error('logo')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
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
