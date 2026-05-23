@props(['variant' => 'primary', 'type' => 'button', 'size' => 'md'])
@php
$base = 'inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
$variants = [
  'primary' => 'bg-primary text-white hover:bg-primary-dark focus:ring-primary',
  'accent'  => 'bg-accent text-white hover:bg-accent-light focus:ring-accent',
  'outline' => 'border border-primary text-primary hover:bg-primary hover:text-white focus:ring-primary',
  'danger'  => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
  'ghost'   => 'text-gray-600 hover:bg-gray-100 focus:ring-gray-300',
];
$sizes = ['sm' => 'px-3 py-1.5 text-sm', 'md' => 'px-5 py-2.5 text-sm', 'lg' => 'px-6 py-3 text-base'];
@endphp
<button type="{{ $type }}" {{ $attributes->merge(['class' => "$base {$variants[$variant]} {$sizes[$size]}"]) }}>
  {{ $slot }}
</button>
