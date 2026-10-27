< h3 class="text-xl font-bold text-navy-900">Create Department</h3>
<button @click="close()" class="text-gray-400 hover:text-navy-900" aria-label="Close">×</button>
<form>
    <div class="space-y-4">
        <input type="text" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Department Name *">
        <input type="text" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Slug *">
        <textarea class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" rows="3" placeholder="Description"></textarea>
        <div class="flex gap-2">
            <label class="flex items-center gap-2"><input type="radio" name="is_active" value="1" class="rounded w-4 h-4" checked> Active</label>
            <label class="flex items-center gap-2"><input type="radio" name="is_active" value="0" class="rounded w-4 h-4"> Inactive</label>
        </div>
    </div>
    <div class="flex justify-end gap-3 mt-6">
        <button class="px-4 py-2 border border-navy-200 rounded text-sm text-navy-600 hover:bg-navy-50">Cancel</button>
        <button class="px-4 py-2 bg-navy-600 text-white rounded text-sm hover:bg-navy-700">Create</button>
    </div>
</form>