<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Models\Testmonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        dd($request->validated());
        Testmonial::create($request->validated());

        toast('Testimonial Added Successfully', 'success');
        return back();
    }

    public function edit(Testmonial $testmonial)
    {
        return view('admin.testimonial.edit', compact('testmonial'));
    }

    public function update(Request $request, Testmonial $testmonial)
    {
        if ($request->hasFile('photo')) {
            $this->deleteFile($testmonial->photo);
        }

        $testmonial->update($request->validated());

        toast('Testimonial Updated Successfully', 'success');
        return redirect(route('admin.testimonial.index'));
    }

    public function destroy(UpdateTestimonialRequest $testmonial)
    {
        $this->deleteFile($testmonial->photo);

        $testmonial->delete();
        return back();
    }
}
