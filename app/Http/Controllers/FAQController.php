<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\BaseController;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends BaseController
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'subject'=>['required', 'string', 'max:255'],
            'message'=>['required']
        ]);

        FAQ::create($validatedData);
        return back()->with('success', "Your Message Added Successfully");

    }
}
