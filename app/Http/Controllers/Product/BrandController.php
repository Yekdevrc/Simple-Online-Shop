<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Brand\StoreBrandRequest;
use App\Http\Requests\Product\Brand\UpdateBrandRequest;
use App\Models\Product\Brand;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.brand.index', [
            "brands" => Brand::latest()->paginate(10)
        ]);
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.product.brand.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());

        toast('Brand Added Successfully', 'success');
        return back();
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.product.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($request->hasFile('logo')){
            $this->deleteFile($brand->logo);
        }
        $brand->update($request->validated());

        toast('Brand Updated Successfully', 'success');
        return redirect(route('admin.product.brand.index'));
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $this->deleteFile($brand->logo);

        $brand->delete();

        return back();
    }
}
