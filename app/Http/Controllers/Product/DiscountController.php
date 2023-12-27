<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Discount\StoreDiscountRequest;
use App\Http\Requests\Product\Discount\UpdateDiscountRequest;
use App\Models\Product\Discount;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class DiscountController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $discounts=Discount::all();

        return view('admin.product.discount.index', compact('discounts'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.discount.create');
    }

    public function store(StoreDiscountRequest $request): RedirectResponse
    {
        Discount::create($request->validated());

        toast('Discount Added Successfully', 'success');
        return back();
    }

    public function show(Discount $discount)
    {
        //
    }

    public function edit(Discount $discount)
    {
        return \view('admin.product.discount.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $discount->update($request->validated());

        toast('Discount Updated Successfully', 'success');
        return redirect(route('admin.product.discount.index'));
    }

    public function destroy(Discount $discount): RedirectResponse
    {
        $discount->delete();

        return back();
    }
}
