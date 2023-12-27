@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="page-title">Item</div>
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
                    <h4 class="card-title">Edit Item</h4>
                    <a href="{{route('admin.product.item.index')}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-list-check"></i>Item List
                    </a>
                </div>
                <form action="{{route('admin.product.item.update', $item)}}" class="" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <fieldset class="form-group border p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="title" class="form-label">Title <sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{old('title', $item->title)}}"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="Title"
                                        >
                                        @error('title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="image" class="form-label">Image<sup class="text-danger">*</sup></label>
                                        <input type="file"
                                               id="image"
                                               name="image"
                                               value="{{old('image')}}"
                                               class="form-control @error('image') is-invalid @enderror"
                                               placeholder="image"
                                        >
                                        @error('image')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="price" class="form-label">Price<sup class="text-danger">*</sup></label>
                                        <input type="text"
                                               id="price"
                                               name="price"
                                               value="{{old('price', $item->price)}}"
                                               class="form-control @error('price') is-invalid @enderror"
                                               placeholder="price"
                                        >
                                        @error('price')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="category_id" class="form-label">Category<sup class="text-danger">*</sup></label>
                                        <select
                                            id="category_id"
                                            name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">--select a option--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{$category->id==old('category_id', $item->category_id)? 'selected': ''}}
                                                >{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="brand_id" class="form-label">Brand<sup class="text-danger">*</sup></label>
                                        <select
                                            id="brand_id"
                                            name="brand_id"
                                            class="form-control @error('brand_id') is-invalid @enderror">
                                            <option value="">--select a option--</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}"
                                                    {{$brand->id==old('brand_id', $item->brand_id)? 'selected': ''}}
                                                >{{$brand->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="discount_id" class="form-label">Discount<sup class="text-danger">*</sup></label>
                                        <select
                                            id="discount_id"
                                            name="discount_id"
                                            class="form-control @error('discount_id') is-invalid @enderror">
                                            <option value="">--select a option--</option>
                                            @foreach($discounts as $discount)
                                                <option value="{{$discount->id}}"
                                                    {{$discount->id==old('discount_id', $item->disount_id)? 'selected': ''}}
                                                >{{$discount->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('discount_id')
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
