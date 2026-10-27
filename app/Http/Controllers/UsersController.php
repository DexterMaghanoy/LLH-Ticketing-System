<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::with('department')->orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        Gate::authorize('create', User::class);

        $departments = Department::active()->orderBy('name')->get();

        return view('users.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Gate::authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:super_admin,department_head,employee',
            'department_id' => 'nullable|exists:departments,id',
            'is_active' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->boolean('is_active');

        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        $departments = Department::active()->orderBy('name')->get();

        return view('users.edit', compact('user', 'departments'));
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        // Protect last super admin from deactivation
        if ($user->isSuperAdmin() && $request->boolean('is_active') === false) {
            $superAdminCount = User::where('role', 'super_admin')->where('is_active', true)->count();
            if ($superAdminCount <= 1) {
                return back()->withErrors(['is_active' => 'Cannot deactivate the last active Super Administrator.']);
            }
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:super_admin,department_head,employee',
            'department_id' => 'nullable|exists:departments,id',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        // Protect last super admin
        if ($user->isSuperAdmin()) {
            $superAdminCount = User::where('role', 'super_admin')->where('is_active', true)->count();
            if ($superAdminCount <= 1) {
                return back()->withErrors(['Cannot deactivate the last active Super Administrator.']);
            }
        }

        // Deactivate instead of delete to preserve history
        $user->update(['is_active' => false]);

        return redirect()->route('users.index')
            ->with('success', 'User deactivated successfully.');
    }
}
