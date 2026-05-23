@props(['type' => 'success'])
@php
$styles = [
  'success' => 'bg-green-50 border-green-400 text-green-800',
  'error'   => 'bg-red-50 border-red-400 text-red-800',
];
@endphp
<div {{ $attributes->merge(['class' => "border-l-4 p-4 rounded-r-lg {$styles[$type]} mb-4"]) }}>
  {{ $slot }}
</div>
