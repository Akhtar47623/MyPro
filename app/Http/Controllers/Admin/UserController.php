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
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

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

    public function edit($id)
    {

        $user = $this->userRepository->getUserById($id);
        $roles=Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

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

    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return redirect()->route('users.index');
    }
}
