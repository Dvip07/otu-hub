<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Check if permissions exist before creating them
        if (!Permission::where('name', 'edit articles')->exists()) {
            Permission::create(['name' => 'edit articles']);
        }

        if (!Permission::where('name', 'delete articles')->exists()) {
            Permission::create(['name' => 'delete articles']);
        }

        if (!Permission::where('name', 'publish articles')->exists()) {
            Permission::create(['name' => 'publish articles']);
        }

        if (!Permission::where('name', 'unpublish articles')->exists()) {
            Permission::create(['name' => 'unpublish articles']);
        }

        // Create roles and assign existing permissions
        $role1 = Role::firstOrCreate(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('publish articles');

        $role2 = Role::firstOrCreate(['name' => 'admin']);
        $role2->givePermissionTo(Permission::all());
    }
}
