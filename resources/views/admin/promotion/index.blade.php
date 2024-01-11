@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Promotion </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Promotion</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Promotion</h4>
                    <a href="{{route('admin.promotion.create')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle fa-1x"></i> Add New
                    </a>
                </div>
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th> Title</th>
                        <th> Image</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($promotions as $promotion)
                        <tr>
                            <td>{{$loop->iteration}}
                            </td>
                            <td>
                                {{$promotion->title}}
                            </td>
                            <td><img src="{{$promotion->image_url}}" width="80" height="100" alt=""></td>
                            <td class="d-flex">
                                <a href="{{route('admin.promotion.edit', $promotion)}}"
                                   class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{route('admin.promotion.destroy',$promotion)}}" method="post">
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
                        <td colspan="4" class="text-center">There is no data found</td>
                    @endforelse
                    </tbody>
                </table>
                {{--                {!! $brands->withQueryString()->links('pagination::bootstrap-5') !!}--}}
            </div>
        </div>
    </div>
@endsection
