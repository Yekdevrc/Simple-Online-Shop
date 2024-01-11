@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>


    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Product</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$totalProduct}}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Total</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Category</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$totalCategory}}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Total</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Sale</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$totalSale}}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Total</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Order</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$totalOrder}}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Total</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->


                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">


                        <div class="card-body">
                            <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recentSales as $recentSale)
                                <tr>
                                    <th scope="row"><a href="#">{{$loop->iteration}}</a></th>
                                    <td>{{$recentSale->guest->name ?? ''}}</td>
                                    <td><a href="#" class="text-primary">{{$recentSale->item->title ?? ''}}</a></td>
                                    <td>{{$recentSale->item->price ?? ''}}</td>
                                    <td><span class="badge bg-success">{{$recentSale->status==1 ? 'Ordered Placed' : 'Not Placed'}}</span></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">There is no Data found!!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->


                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Selling <span>| This Month</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Revenue</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($topSelling as $topSele)
                                <tr>
                                    <th scope="row"><a href="#"><img src="{{$topSele->item->image_url ?? ''}}" alt="{{$topSele->item->title ?? ''}}"></a></th>
                                    <td><a href="#" class="text-primary fw-bold">{{$topSele->item->title ?? ''}}</a></td>
                                    <td>{{$topSele->item->price ?? ''}}</td>
                                    <td class="fw-bold">{{$topSele->sum('quantity')}}</td>
                                    <td>{{$topSele->item->price * $topSele->sum('quantity')}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">There is no Data found!!</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->
            </div>
        </div>
    </div>

@endsection
