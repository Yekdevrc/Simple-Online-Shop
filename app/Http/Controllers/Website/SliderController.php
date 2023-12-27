<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Slider\StoreSliderRequest;
use App\Http\Requests\Website\Slider\UpdateSliderRequest;
use App\Models\Website\Slider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SliderController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $sliders=Slider::all();

        return view('admin.website.slider.index', compact('sliders'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.website.slider.create');
    }

    public function store(StoreSliderRequest $request): RedirectResponse
    {
        Slider::create($request->validated());

        toast('Slider Added Successfully', 'success');
        return back();
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.website.slider.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if ($request->hasFile('image')){
            $this->deleteFile($slider->image);
        }

        $slider->update($request->validated());

        toast('Slider Updated Successfully');

        return redirect(route('admin.website.slider.index'));
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $this->deleteFile($slider->image);

        $slider->delete();

        return back();
    }
}
