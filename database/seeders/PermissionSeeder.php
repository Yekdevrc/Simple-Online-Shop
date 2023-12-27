<?php

namespace Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            ['title'=>'user_access'],
            ['title'=>'user_create'],
            ['title'=>'user_edit'],
            ['title'=>'user_delete'],
            ['title'=>'role_access'],
            ['title'=>'role_create'],
            ['title'=>'role_edit'],
            ['title'=>'role_delete'],
        ];

        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
