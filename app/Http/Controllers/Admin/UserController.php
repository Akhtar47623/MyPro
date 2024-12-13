<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    // Inject the UserRepositoryInterface via the constructor
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Show all users
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    // Create a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'roles' => 'nullable|array',
            'permissions' => 'nullable|array',
        ]);

        $user = $this->userRepository->createUser($validated);

        return redirect()->route('users.index');
    }

    // Edit a user
    public function edit($id)
    {

        $user = $this->userRepository->getUserById($id);
        $roles=Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'nullable|array',
            'permissions' => 'nullable|array',
        ]);

        $user = $this->userRepository->updateUser($id, $validated);

        return redirect()->route('users.index');
    }

    // Delete a user
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return redirect()->route('users.index');
    }
}
