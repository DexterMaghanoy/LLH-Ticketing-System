<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Department::class, 'department');
    }

    public function index()
    {
        Gate::authorize('viewAny', Department::class);

        $departments = Department::orderBy('name')->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        Gate::authorize('create', Department::class);

        return view('departments.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Department::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments',
            'slug' => 'nullable|string|max:255|unique:departments',
            'description' => 'nullable|string',
            'head_user_id' => 'nullable|exists:users,id',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        Department::create($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        Gate::authorize('update', $department);

        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        Gate::authorize('update', $department);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'slug' => 'nullable|string|max:255|unique:departments,slug,' . $department->id,
            'description' => 'nullable|string',
            'head_user_id' => 'nullable|exists:users,id',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        $department->update($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        Gate::authorize('delete', $department);

        // Deactivate instead of delete to preserve history
        $department->update(['is_active' => false]);

        return redirect()->route('departments.index')
            ->with('success', 'Department deactivated successfully.');
    }
}
