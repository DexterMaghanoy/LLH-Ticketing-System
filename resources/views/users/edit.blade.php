<h3 class="text-xl font-bold text-navy-900">Edit User</h3>
<form>
    <input type="hidden" value="{{ $user->id }}">
    <div class="space-y-4">
        <input type="text" value="{{ $user->name }}" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Name *">
        <input type="email" value="{{ $user->email }}" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Email *">
        @if($user->isSuperAdmin())
        <p class="text-red-600 text-sm">Super Administrator cannot change password or role through this interface.</p>
        @else()
        <input type="password" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="New Password (leave blank to keep current)">
        @endif
        <select class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500">
            <option value="employee" @if($user->role === 'employee') selected @endif>Employee</option>
            <option value="department_head" @if($user->role === 'department_head') selected @endif>Department Head</option>
            @if(!$user->isSuperAdmin())
            <option value="super_admin" @if($user->role === 'super_admin') selected @endif>Super Admin</option>
            @endif
        </select>
        <select class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500">
            <option value="">-- Department --</option>
            <option value="1" @if($user->department_id == 1) selected @endif>Information Technology</option>
            <option value="2" @if($user->department_id == 2) selected @endif>Engineering and Maintenance</option>
        </select>
        <div class="flex gap-2"><label><input type="radio" name="is_active" value="1" @if($user->is_active) checked @endif> Active</label><label><input type="radio" name="is_active" value="0" @if(!$user->is_active) checked @endif> Inactive</label></div>
    </div>
    <div class="flex justify-end gap-3 mt-6"><button type="button" class="px-4 py-2 border border-navy-200 rounded text-sm text-navy-600 hover:bg-navy-50">Cancel</button><button type="submit" class="px-4 py-2 bg-navy-600 text-white rounded text-sm hover:bg-navy-700">Update User</button></div>
</form>