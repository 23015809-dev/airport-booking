@props(['label' => null, 'type' => 'text', 'name', 'value' => null, 'placeholder' => null])
<label class="block text-sm font-medium text-gray-700">
    @if($label)
        <span class="mb-1 inline-block">{{ $label }}</span>
    @endif
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary']) }}
    />
</label>
@error($name)
    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
@enderror
