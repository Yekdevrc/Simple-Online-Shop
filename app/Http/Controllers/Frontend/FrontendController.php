<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\Order;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Item;
use App\Models\Promotion;
use App\Models\Setting\OfficeSetting;
use App\Models\Testmonial;
use App\Models\Website\Slider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class FrontendController extends BaseController
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $buyProductLists = Order::select('item_id',DB::raw('count(*) as total'))
            ->groupBy('item_id')
            ->orderBy('total', 'DESC')
            ->get();

        $topSellings = Item::whereIn('id', $buyProductLists->pluck('item_id'))
            ->take(10)
            ->get();


        $first=Promotion::latest()->first();
        $second=Promotion::latest()->skip(1)->take(1)->first();
        $categories =Category::all();
        $brands=Brand::all();
        $sliders=Slider::all();
        $newArrivals=Item::with('category', 'brand', 'discount')->orderBy('created_at', 'desc')->get();
        return view('frontend.index', compact('categories', 'brands', 'newArrivals', 'sliders', 'first', 'second', 'topSellings'));
    }

    public function wishlist()
    {
        $item_id=session()->all();
        $items=Item::where('id', $item_id)->orderBy('created_at', 'desc')->get();

            return view('frontend.pages.wishlist', compact('items'));
    }

    public function order()
    {
        return \view('frontend.pages.order');
    }

    public function about()
    {
        $officeSetting=OfficeSetting::first();
        $testimonials=Testmonial::latest()->get();
        return \view('frontend.pages.about', compact('officeSetting', 'testimonials'));
    }

    public function product(Request $request)
    {
        if (!empty($request->input('title'))){
            $items=Item::where('title', 'like', '%'.$request)->get();
            return view('frontend.pages.product', compact('items'));
        }else {
            $items = Item::orderBy('created_at', 'desc')->get();
            return view('frontend.pages.product', compact('items'));
        }
    }

    public function contact()
    {
        $officeSetting=OfficeSetting::first();
        return view('frontend.pages.contact', compact('officeSetting'));
    }
}
