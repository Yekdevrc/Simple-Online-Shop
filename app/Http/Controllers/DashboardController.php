<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Order;
use App\Models\Product\Category;
use App\Models\Product\Item;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $todayDate=new DateTime('today');
        $thisMonth= date('m');



        $totalProduct= Item::all()->count();
        $totalCategory=Category::all()->count();
        $totalSale=Order::where('status', 1)->get()->count();
        $totalOrder=Order::all()->count();
        $recentSales=Order::with('guest', 'item')
            ->where('status', 1)
            ->where('created_at', $todayDate)
            ->get();

        $topSelling=Order::with('item', 'guest')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->take(10)
            ->get();


        return view('dashboard', compact('totalProduct', 'totalCategory', 'totalSale', 'totalOrder', 'recentSales', 'topSelling'));
    }
}
