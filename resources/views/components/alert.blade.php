@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-green-50 text-green-700 border-green-300',
        'danger'  => 'bg-red-50 text-red-700 border-red-300',
    ][$type] ?? 'bg-slate-50 text-slate-700 border-slate-300';
@endphp

<div {{ $attributes->merge(['class' => "border rounded-lg px-4 py-3 mb-6 text-sm $styles"]) }}>
    {{ $slot }}
</div>
