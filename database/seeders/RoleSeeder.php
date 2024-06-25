<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=Role::create(['name'=>'admin']);
        $donador=Role::create(['name'=>'donador']);
        $donadoractivo=Role::create(['name'=>'donadoractivo']);


        Permission::create(['name'=>'admin'])->syncRoles([$admin]);
        Permission::create(['name'=>'donador'])->syncRoles([$donador]);
        Permission::create(['name'=>'donadoractivo'])->syncRoles([$donadoractivo]);
    }
}
