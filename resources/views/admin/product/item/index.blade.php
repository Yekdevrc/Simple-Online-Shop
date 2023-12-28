@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Item </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Items</h4>
                    <a href="{{route('admin.product.item.create')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle fa-1x"></i> Add New
                    </a>
                </div>
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th> Title</th>
                        <th> Image</th>
                        <th> Price</th>
                        <th> Category</th>
                        <th> Brand</th>
                        <th> Discount (%)</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{$loop->iteration}}
                            </td>
                            <td>{{$item->title}}</td>
                            <td><img src="{{$item->image_url}}" width="100" height="100" alt=""></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category->title??''}}</td>
                            <td>{{$item->brand->title??''}}</td>
                            <td>{{$item->discount->rate??''}}</td>
                            <td class="d-flex mt-4">
                                <a href="{{route('admin.product.item.edit', $item)}}"
                                   class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{route('admin.product.item.destroy',$item)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger delete_confirm"
                                            title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="8" class="text-center">There is no data found</td>
                    @endforelse
                    </tbody>
                </table>
                {!! $items->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
