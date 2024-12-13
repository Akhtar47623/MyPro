<?php
namespace App\Repositories\Interfaces;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function getAllRoles();
    public function createRole(array $data);
    public function find(int $id);
    public function updateRole(int $id, array $data);
    public function deleteRole(int $id);
}
