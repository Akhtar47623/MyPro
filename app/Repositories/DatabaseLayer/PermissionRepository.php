<?php
namespace App\Repositories\DatabaseLayer;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermissionRepository implements PermissionRepositoryInterface
{
    // Get all permissions
    public function getAllPermissions()
    {
        return Permission::all();
    }

    // Create a new permission
    public function createPermission(array $data)
    {
        return Permission::create($data);
    }

    // Find a permission by ID
    public function getBlogById(int $id)
    {
        return Permission::find($id);
    }

    // Update a permission
    public function updatePermission(int $id, array $data)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->update($data);
            return true;
        }
        return false;
    }

    // Delete a permission
    public function deletePermission(int $id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return true;
        }
        return false;
    }
}
