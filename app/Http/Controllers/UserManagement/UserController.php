<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\User\StoreUserRequest;
use App\Http\Requests\UserManagement\User\UpdateUserRequest;
use App\Models\User;
use App\Models\UserManagement\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::with('role')
            ->whereNot('role_id', 1)
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.user_management.user.index', compact('users'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $roles= Role::where('id', '!=', 1 )->get();

        return view('admin.user_management.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        toast('User Added Successfully', 'success');
        return back();
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $roles=Role::all();

        return view('admin.user_management.user.edit', compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, User $user): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if ($request->hasFile('profile_photo_path')){
            $this->deleteFile($user->profile_photo_path);
        }
        @unlink(public_path('user/'.$user->profile_photo_path));

        $user->update($request->validated());

        toast('User Updated Successfully', 'success');
        return redirect(route('admin.userManagement.user.index'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->deleteFile($user->profile_photo_url);
//        @unlink(public_path('user/'.$user->profile_photo_path));
        $user->delete();
        return back();
    }

}
