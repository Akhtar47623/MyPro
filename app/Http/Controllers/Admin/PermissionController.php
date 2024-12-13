<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionRepository;

    // Inject the PermissionRepository via the constructor
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    // Show all permissions
    public function index()
    {
        $permissions = $this->permissionRepository->getAllPermissions();
        return view('admin.permissions.index', compact('permissions'));
    }

    // Create a new permission
    public function create()
    {
        return view('admin.permissions.create');
    }

    // Store a new permission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        // Use the repository to create a permission
        $this->permissionRepository->createPermission(['name' => $request->name]);

        return redirect()->route('permissions.index');
    }

    // Edit a permission
    public function edit($id)
    {
        $permission = $this->permissionRepository->getBlogById($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    // Update a permission
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        // Use the repository to update the permission
        $this->permissionRepository->updatePermission($id, ['name' => $request->name]);

        return redirect()->route('permissions.index');
    }

    // Delete a permission
    public function destroy($id)
    {
        // Use the repository to delete the permission
        $this->permissionRepository->deletePermission($id);

        return redirect()->route('permissions.index');
    }
}
