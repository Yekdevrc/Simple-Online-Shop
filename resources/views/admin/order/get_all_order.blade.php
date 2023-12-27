@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Order </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <h4 class="card-title">Order List</h4>
                </div>
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th> SN</th>
                        <th> Customer Name</th>
                        <th> Customer Email</th>
                        <th> Customer Phone</th>
                        <th> Item </th>
                        <th> Price </th>
                        <th> Quantity</th>
                        <th> Total Amount</th>
                        <th> Order Place</th>
                        <th> Order placed ? </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}
                            </td>
                            <td>{{$order->guest->name??''}}</td>
                            <td>{{$order->guest->email??''}}</td>
                            <td>{{$order->guest->phone??''}}</td>
                            <td><img src="{{$order->item->image_url}}" width="50" height="60" alt="{{$order->item->title??'item'}}">{{$order->item->title??''}}</td>
                            <td>{{$order->item->price??''}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->item->price * $order->quantity}}</td>
                            <td>{{$order->order_place}}</td>
                            <td>
                                <a href="{{route('admin.order.updateStatus',$order)}}">
                                    <i class="fa fa-2x {{$order->status ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger'}}"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="8" class="text-center">There is no data found</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
