<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function geAllOrder(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::with('guest', 'item')
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.order.get_all_order', compact('orders'));
    }

    public function updateStatus(Order $order): RedirectResponse
    {
        $order->update([
            'status' => !$order->status
        ]);

        toast('Order Placed Successfully', 'success');
        return back();
    }
}
