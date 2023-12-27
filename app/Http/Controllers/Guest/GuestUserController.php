<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\BaseController;
use App\Models\Guest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestUserController extends BaseController
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.guest.login');
    }

    public function registerPage()
    {
        return \view('frontend.guest.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'phone' => ['required'],
            'address' => ['required', 'string']
        ]);
        $guestUser=Guest::create($validatedData);

        auth()->login($guestUser);

        return redirect(url('/'))->with('success', 'You are registered Successfully!!');
    }

    public function login(Request $request)
    {
        if (auth('guest')->attempt($request->only('email', 'password'))){
            return redirect(url('/'));
        }
    }
}
