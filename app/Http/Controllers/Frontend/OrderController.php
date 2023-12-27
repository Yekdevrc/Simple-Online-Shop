<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Product\Item;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::where('guest_id', auth()->guard('guest')->user()->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.order.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => ['required'],
            'order_place' => ['required', 'string', 'max:255'],
        ]);

        $order = Order::create($validatedData + [
            'guest_id'=>auth()->guard('guest')->user()->id,
                'item_id'=>$request->item_id
            ]);

        return response()->json([
            'status'=>200
        ]);

    }

    public function destroy(Order $order)
    {
        //
    }

    public function geAllOrder(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders= Order::with('guest', 'item')
            ->where('status', 0)
            ->orderBy('created_at', 'desc');
        return view('admin.order.get_all_order', compact('orders'));
    }

    public function updateStatus(Order $order): RedirectResponse
    {
        $order->update([
            'status'=> !$order->status
        ]);

        toast('Order Placed Successfully', 'success');
        return back();
    }
}
