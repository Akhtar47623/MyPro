<?php
namespace App\Repositories\DatabaseLayer;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    // Get all users with their roles and permissions
    public function getAllUsers()
    {
        // Return a collection of users
        return User::with('roles', 'permissions')->latest()->get();
    }

    // Get a specific user by ID with roles and permissions
    public function getUserById($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    // Create a new user
    public function createUser(array $data)
    {
        $user = User::create($data);

        // Optionally assign roles and permissions after creating a user
        if (isset($data['roles'])) {
            $user->roles()->sync($data['roles']);
        }

        if (isset($data['permissions'])) {
            $user->permissions()->sync($data['permissions']);
        }

        return $user;
    }

    // Update an existing user
    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);

        // Sync roles and permissions if provided
        if (isset($data['roles'])) {
            $user->roles()->sync($data['roles']);
        }

        if (isset($data['permissions'])) {
            $user->permissions()->sync($data['permissions']);
        }

        return $user;
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}

