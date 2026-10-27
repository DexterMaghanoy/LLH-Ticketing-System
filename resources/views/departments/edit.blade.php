<h3 class="text-xl font-bold text-navy-900">Edit Department</h3>
<button @click="close()" class="text-gray-400 hover:text-navy-900" aria-label="Close">×</button>
<form>
    <div class="space-y-4">
        <input type="hidden" value="{{ $department->id }}">
        <input type="text" value="{{ $department->name }}" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Department Name *">
        <input type="text" value="{{ $department->slug }}" class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" placeholder="Slug *">
        <textarea class="w-full rounded border border-navy-200 px-3 py-2 focus:outline-none focus:border-navy-500" rows="3">{{ $department->description ?? '' }}</textarea>
        <input type="hidden" value="{{ $department->head_user_id ?? '' }}">
        <div class="flex gap-2">
            <label class="flex items-center gap-2"><input type="radio" name="is_active" value="1" @if($department->is_active) checked @endif> Active</label>
            <label class="flex items-center gap-2"><input type="radio" name="is_active" value="0" @if(!$department->is_active) checked @endif> Inactive</label>
        </div>
    </div>
    <div class="flex justify-end gap-3 mt-6">
        <button class="px-4 py-2 border border-navy-200 rounded text-sm text-navy-600 hover:bg-navy-50">Cancel</button>
        <button class="px-4 py-2 bg-navy-600 text-white rounded text-sm hover:bg-navy-700">Update</button>
    </div>
</form>