<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\Role\StoreRoleRequest;
use App\Http\Requests\UserManagement\Role\UpdateRoleRequest;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $roles=Role::paginate(10);

        return view('admin.user_management.role.index', compact('roles'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $permissions=Permission::all();

        return view('admin.user_management.role.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request){
           $role=Role::create($request->validated());

           $role->permissions()->attach($request->validated()['permissions']);
        });

        toast('Role Added Successfully', 'success');
        return back();
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $permissions=Permission::all();
        $role->load('permissions');

        return view('admin.user_management.role.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        DB::transaction(function () use ($request, $role){
            $role->update($request->validated());
            $role->permissions()->sync($request->validated()['permissions']);

        });

        toast('Role Updated Successfully', 'success');
        return redirect(route('admin.userManagement.role.index'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        if ($role->type=='super'){

            toast('You Can Not Delete Super Admin', 'danger');
            return back();
        }

        $role->permissions()->detach();
        $role->delete();

        return  back();
    }
}
