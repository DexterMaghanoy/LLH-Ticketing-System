<x-data="{ open: false }">
<div class="min-h-screen bg-navy-50">
    <div class="flex items-center justify-between p-4 border-b border-navy-200">
        <h2 class="text-2xl font-bold text-navy-900">Departments</h2>
        <div class="flex items-center gap-2">
            <button class="secondary-button" @click="openCreate">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Create Department
            </button>
        </div>
    </div>
    @if($departments->isEmpty())
    <div class="p-6 text-center text-muted-foreground"><p>No departments found. Create one to get started.</p></div>
    @else()
    <table class="min-w-full bg-white rounded-lg shadow-sm">
        <thead><tr class="border-b border-navy-200"><th class="p-4 text-left text-xs font-medium text-navy-500 uppercase tracking-wider">Name</th><th class="p-4 text-left text-xs font-medium text-navy-500 uppercase tracking-wider">Head</th><th class="p-4 text-left text-xs font-medium text-navy-500 uppercase tracking-wider">Status</th><th class="p-4 text-left text-xs font-medium text-navy-500 uppercase tracking-wider">Actions</th></tr></thead>
        <tbody class="divide-y divide-navy-100">
        @foreach($departments as $department)
        <tr class="hover:bg-navy-50"><td class="p-4 font-medium text-navy-900">{{ $department->name }}</td><td class="p-4">{{ $department->head ? $department->head->name : '—' }}</td><td class="p-4"><span class="text-sm text-green-600 font-medium" @if(!$department->is_active) class="text-red-600" @endif>{{ $department->is_active ? 'Active' : 'Inactive' }}</span></td><td class="p-4"><div class="flex gap-2"><button class="text-sm text-blue-600 hover:underline">Edit</button><button class="text-sm text-red-600 hover:underline">Deactivate</button></div></td></tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>