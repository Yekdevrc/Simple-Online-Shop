<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Setting\OfficeSetting;
use App\Models\Website\Slider;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $allCategories=Category::all();
        $allBrands=Brand::all();
        $officeSetting= OfficeSetting::first();
        $order=Order::with('guest', 'item')->where('guest_id', auth()->guard('guest')->id())->count();
        $sliders=Slider::first();
        view()->share('allCategories', $allCategories);
        view()->share('allBrands', $allBrands);
        view()->share('officeSetting', $officeSetting);
        view()->share('order', $order);
    }
}
