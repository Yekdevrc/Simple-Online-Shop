<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Tax\StoreTaxRequest;
use App\Http\Requests\Setting\Tax\UpdateTaxRequest;
use App\Models\Setting\Tax;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TaxController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $taxes=Tax::all();

        return view('admin.setting.tax.index', compact('taxes'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.setting.tax.create');
    }

    public function store(StoreTaxRequest $request): RedirectResponse
    {
        Tax::create($request->validated());

        toast('Tax Added Successfully', 'success');
        return back();
    }

    public function show(Tax $tax)
    {
        //
    }

    public function edit(Tax $tax): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.setting.tax.edit', compact('tax'));
    }

    public function update(UpdateTaxRequest $request, Tax $tax): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $tax->update($request->validated());

        toast('Tax Updated Successfully', 'success');
        return redirect(route('admin.setting.tax.index'));
    }

    public function destroy(Tax $tax): RedirectResponse
    {
        $tax->delete();

        return back();
    }
}
