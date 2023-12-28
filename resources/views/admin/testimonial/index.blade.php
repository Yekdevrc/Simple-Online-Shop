@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Testimonial </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Testimonial List</h4>
                </div>
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th>  Name </th>
                        <th> Designation </th>
                        <th> Company </th>
                        <th> Photo </th>
                        <th> message </th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{$loop->iteration}}
                            </td>
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->designation}}</td>
                            <td>{{$testimonial->company}}</td>
                            <td><img src="{{$testimonial->photo_url}}" width="100" height="100" alt="{{$testimonial->name}}"></td>
                            <td>{{$testimonial->message}}</td>
                            <td>
                                <form action="{{route('order.destroy',$testimonial)}}" method="post">
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
            </div>
        </div>
    </div>
@endsection
