<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Item\StoreItemRequest;
use App\Http\Requests\Product\Item\UpdateItemRequest;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Discount;
use App\Models\Product\Item;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ItemController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $items = Item::with('category', 'brand', 'discount')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.product.item.index', compact('items'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories=Category::all();
        $brands=Brand::all();
        $discounts=Discount::all();

        return \view('admin.product.item.create', compact('categories', 'brands', 'discounts'));
    }

    public function store(StoreItemRequest $request): RedirectResponse
    {
        Item::create($request->validated());

        toast('Item Added Successfully', 'success');
        return back();
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories=Category::all();
        $brands=Brand::all();
        $discounts=Discount::all();

        $item->load('category', 'brand', 'discount');

        return \view('admin.product.item.edit', compact('item', 'categories', 'brands', 'discounts'));
    }

    public function update(UpdateItemRequest $request, Item $item): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if ($request->hasFile('image')){
            $this->deleteFile($item->image);
        }
        $item->update($request->validated());

        toast('Item Updated Successfully', 'success');
        return redirect( route('admin.product.item.index'));
    }

    public function destroy(Item $item): RedirectResponse
    {
        $this->deleteFile($item->image);

        $item->delete();

        return back();
    }
}
