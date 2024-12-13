<?php
namespace App\Repositories\DatabaseLayer;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    // Get all roles with permissions
    public function getAllRoles()
    {
        return Role::with('permissions')->get();
    }

    // Create a new role
    public function createRole(array $data)
    {
        return Role::create($data);
    }

    // Find a role by ID
    public function find(int $id): ?Role
    {
        return Role::with('permissions')->find($id);
    }

    // Update a role
    public function updateRole(int $id, array $data)
    {
        $role = Role::find($id);
        if ($role) {
            $role->update($data);
            return true;
        }
        return false;
    }

    // Delete a role
    public function deleteRole(int $id): bool
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return true;
        }
        return false;
    }
}
