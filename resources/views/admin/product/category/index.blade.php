@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Category </h3>
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
                    <h4 class="card-title">Categories</h4>
                    <a href="{{route('admin.product.category.create')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle fa-1x"></i> Add New
                    </a>
                </div>
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th> Title</th>
                        <th> Logo</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}
                            </td>
                            <td>
                                {{$category->title}}
                            </td>
                            <td><img src="{{$category->logo_url}}" width="100" height="100" alt=""></td>
                            <td class="d-flex mt-4">
                                <a href="{{route('admin.product.category.edit', $category)}}"
                                   class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{route('admin.product.category.destroy',$category)}}" method="post">
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
                        <td colspan="7" class="text-center">There is no data found</td>
                    @endforelse
                    </tbody>
                </table>
                {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
