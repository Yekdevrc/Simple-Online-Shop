@extends('frontend.layouts.master')

@section('content')

    <section class="product-cart product footer-padding">
        <div class="container">
            <div class="cart-section">
                <table>
                    <tbody>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUCT</h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">PRICE</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">QUANTITY</h5>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">TOTAL</h5>
                            </div>
                        </td>
                    </tr>
                    @forelse($orders as $order)
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{$order->item->image_url}}" alt="{{$order->item->title}}">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">{{$order->item->title}}</h5>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">{{$order->item->price}}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <div class="quantity">
                                    <span class="number">{{$order->quantity}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="heading">{{$order->quantity * $order->item->price}}</h5>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="mt-4">
                        <td class="text-center" colspan="5"><h5>There is No Order Found!!</h5></td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
