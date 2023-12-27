<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Item;
use App\Models\Website\Slider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FrontendController extends BaseController
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories =Category::all();
        $brands=Brand::all();
        $sliders=Slider::all();
        $newArrivals=Item::with('category', 'brand', 'discount')->orderBy('created_at', 'desc')->get();
//        $topSellingProducts=Item::where()->get();
        return view('frontend.index', compact('categories', 'brands', 'newArrivals', 'sliders'));
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
        return \view('frontend.pages.about');
    }

    public function product()
    {
        $items=Item::orderBy('created_at', 'desc')->get();
        return \view('frontend.pages.product', compact('items'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
