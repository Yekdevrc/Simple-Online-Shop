<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Product\Category\UpdateCategoryRequest;
use App\Models\Product\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::latest()->paginate(10);

        return view('admin.product.category.index', compact('categories'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.category.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        toast('Category Added Successfully', 'success');
        return back();
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return \view('admin.product.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->hasFile('logo')){
            $this->deleteFile($category->logo);
        }
        $category->update($request->validated());

        toast('Category Updated Successfully', 'success');
        return redirect(route('admin.product.category.index'));
    }

    public function destroy(Category $category)
    {
        $this->deleteFile($category->logo);

        $category->delete();

        return back();
    }
}
