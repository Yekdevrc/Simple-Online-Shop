<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $allCategories=Category::all();
        $allBrands=Brand::all();
        view()->share('allCategories', $allCategories);
        view()->share('allBrands', $allBrands);
    }
}
