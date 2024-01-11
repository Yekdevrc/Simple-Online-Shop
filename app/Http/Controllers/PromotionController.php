<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function index()
    {
        $promotions=Promotion::all();

        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotion.create');
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>['required', 'string', 'max:255'],
            'image'=> ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif']
        ]);

        Promotion::create($validated);
        toast('Promotion Added Successfully', 'success');

        return back();
    }

    public function show(Promotion $promotion)
    {
        //
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $validated=$request->validate([
            'title'=>['required', 'string', 'max:255'],
            'image'=> ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif']
        ]);

        if ($request->hasFile('image')){
            $this->deleteFile($promotion->image);
        }
        $promotion->update($validated);

        toast('Promotion Updated Successfully', 'successfully');

        return redirect(route('admin.promotion.index'));
    }

    public function destroy(Promotion $promotion)
    {
        $this->deleteFile($promotion->image);

        $promotion->delete();

        toast('Promotion Deleted Successfully', 'success');
        return back();
    }
}
