@props(['title'])

<div class="px-4 py-3">
    <h2 class="px-3 text-xs font-medium text-navy-400 uppercase tracking-wider">{{ $title }}</h2>
</div>

{{ $slot }}