<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $authorRole = Role::create(['name' => 'author']);
        $userRole = Role::create(['name' => 'user']);

        // Create permissions
        $addPostPermission = Permission::create(['name' => 'add-posts']);
        $editPostPermission = Permission::create(['name' => 'edit-posts']);
        $viewPostPermission = Permission::create(['name' => 'view-posts']);
        $deletePostPermission = Permission::create(['name' => 'delete-posts']);

        // Assign permissions to roles
        $adminRole->permissions()->attach([$addPostPermission->id, $editPostPermission->id, $viewPostPermission->id, $deletePostPermission->id]);
        $authorRole->permissions()->attach([$addPostPermission->id, $viewPostPermission->id]);
        $userRole->permissions()->attach([$viewPostPermission->id]);

        // Example of assigning roles to users
        $adminUser = \App\Models\User::find(1); // Assigning to user with ID 1
        $adminUser->roles()->attach($adminRole);
    }
}
