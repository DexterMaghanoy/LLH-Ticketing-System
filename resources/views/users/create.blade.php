<h3 class="text-xl font-bold text-navy-900">Create User</h3>
<form>
    <div class="space-y-4">
        <input type="text" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Name *">
        <input type="email" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Email *">
        <input type="password" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Password *">
        <select class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500">
            <option value="employee">Employee</option>
            <option value="department_head">Department Head</option>
            <option value="super_admin">Super Admin</option>
        </select>
        <select class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500">
            <option value="">-- Department --</option>
            <option value="1">Information Technology</option>
            <option value="2">Engineering and Maintenance</option>
        </select>
        <div class="flex gap-2"><label><input type="radio" name="is_active" value="1" checked> Active</label><label><input type="radio" name="is_active" value="0"> Inactive</label></div>
    </div>
    <div class="flex justify-end gap-3 mt-6"><button type="button" class="px-4 py-2 border border-navy-200 rounded text-sm text-navy-600 hover:bg-navy-50">Cancel</button><button type="submit" class="px-4 py-2 bg-navy-600 text-white rounded text-sm hover:bg-navy-700">Create User</button></div>
</form>