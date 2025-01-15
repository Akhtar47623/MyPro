<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionRepository;

    // Inject the RoleRepository and PermissionRepository via the constructor
    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    // Show all roles
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.roles.index', compact('roles'));
    }

    // Create a new role
    public function create()
    {
        $permissions = $this->permissionRepository->getAllPermissions();
        return view('admin.roles.create', compact('permissions'));
    }

    // Store a new role
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable',
        ]);

        // Use the repository to create the role
        $role = $this->roleRepository->createRole([
            'name' => $validated['name'],
        ]);

        // Sync the permissions if provided
        if (isset($validated['permissions'])) {
            $role->permissions()->sync($validated['permissions']);
        }

        return redirect()->route('roles.index');
    }

    // Edit a role
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->getAllPermissions();
        $rolePermissions = $role->permissions->pluck('id')->toArray(); // Get assigned permission IDs

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    // Update a role
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        // Update the role using the repository
        $this->roleRepository->updateRole($id, ['name' => $request->name]);

        // Sync permissions
        $role = $this->roleRepository->find($id);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index');
    }

    // Delete a role
    public function destroy($id)
    {
        // Use the repository to delete the role
        $this->roleRepository->deleteRole($id);

        return redirect()->route('roles.index');
    }
}
