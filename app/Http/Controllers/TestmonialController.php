<?php

namespace App\Http\Controllers;

use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Models\Testmonial;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class TestmonialController extends Controller
{

    public function index()
    {
        $testimonials = Testmonial::all();

        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        Testmonial::create($request->validated());

        toast('Testimonial Added Successfully', 'success');
        return back();
    }

    public function show(Testmonial $testimonial)
    {
        //
    }

    public function edit(Testmonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testmonial $testimonial)
    {
        if ($request->hasFile('photo')) {
            $this->deleteFile($testimonial->photo);
        }

        $testimonial->update($request->validated());

        toast('Testimonial Updated Successfully', 'success');
        return redirect(route('admin.testimonial.index'));
    }

    public function destroy(Testmonial $testimonial)
    {
        $this->deleteFile($testimonial->photo);

        $testimonial->delete();
        return back();
    }
}
