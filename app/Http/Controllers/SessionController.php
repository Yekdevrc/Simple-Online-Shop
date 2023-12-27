<?php

namespace App\Http\Controllers;

use App\Models\Product\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function getSession()
    {
        dd(session()->all());
    }

    public function store(Request $request)
    {
        $item = $request->input('item_id');
        $request->session()->put('item_id',$item);

        return back()->with('success', 'Product Stored on Wishlist Successfully!! Please get Order the product!!');
    }

    public function flush()
    {
        session()->flush();

        return back()->with('success', 'Item Flashed Successfully!');
    }
}
