<?php
namespace App\Repositories\Interfaces;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

interface PermissionRepositoryInterface
{
    public function getAllPermissions();
    public function createPermission(array $data);
    public function getBlogById(int $id);
    public function updatePermission(int $id, array $data);
    public function deletePermission(int $id);
}
