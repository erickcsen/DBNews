<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = User::query();
        $query->where('role', 1);
    
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }
    
        $users = $query->paginate(5);
    
        return view('admin.user.main', compact('users'));
    }
    public function indexx(Request $request) {
        $search = $request->input('search');
        $query = User::query();
        
        // Filter untuk menampilkan hanya role 0
        $query->where('role', 0);
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        $users = $query->paginate(5);
    
        return view('admin.user.main', compact('users'));
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['nullable'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);

        $user->save();

        Alert::success('Success', 'User added successfully');
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $use = User::findOrFail($id);
        return view('admin.user.edit', compact('use'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = strtolower($request->email);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Alert::success('Success', 'User updated successfully');
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('Success', 'User deleted successfully');
        return redirect()->route('user.index');
    }
}
