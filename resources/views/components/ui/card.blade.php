@props(['title' => null])
<div {{ $attributes->merge(['class' => 'bg-white border border-gray-100 rounded-2xl shadow-sm']) }}>
    @if($title)
        <div class="px-6 py-4 border-b border-gray-100 font-semibold text-gray-800">{{ $title }}</div>
    @endif
    <div class="px-6 py-4">
        {{ $slot }}
    </div>
</div>
