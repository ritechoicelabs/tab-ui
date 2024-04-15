@php use RiteChoiceInnovations\TabUi\Theme\Button; @endphp
@props([
    'variant' => 'solid',
    'color' => 'primary',
    'rounded' => 'xl',
    'size' => 'md'
])
@php
    $baseClass = "inline-flex items-center justify-center whitespace-nowrap text-sm font-medium
    ring-offset-white disabled:pointer-events-none disabled:opacity-65
    transition-colors focus-visible:outline-none focus-visible:ring-2
    focus-visible:ring-slate-950 focus-visible:ring-offset-2 disabled:pointer-events-none
    disabled:opacity-50 dark:ring-offset-slate-950 dark:focus-visible:ring-slate-300";
    $variants = [
            'solid' => [
                'primary' => 'bg-gray-900 text-slate-50 hover:bg-gray-900/80 dark:bg-slate-50 dark:text-gray-500 dark:hover:bg-slate-100',
                'secondary' => 'bg-blue-500 text-slate-50 hover:bg-blue-500/90 dark:bg-blue-900 dark:text-slate-50 dark:hover:bg-blue-900/90',
                'danger' => 'bg-red-500 text-slate-50 hover:bg-red-500/90 dark:bg-red-900 dark:text-slate-50 dark:hover:bg-red-900/90',
                'warning' => 'bg-yellow-500 text-slate-50 hover:bg-yellow-500/90 dark:bg-yellow-900 dark:text-slate-50 dark:hover:bg-yellow-900/90',
                'positive' => 'bg-green-500 text-slate-50 hover:bg-green-500/90 dark:bg-green-900 dark:text-slate-50 dark:hover:bg-green-900/90',
                'info' => 'bg-indigo-500 text-slate-50 hover:bg-indigo-500/90 dark:bg-indigo-900 dark:text-slate-50 dark:hover:bg-indigo-900/90',
            ],
            'outlined' => [
                'primary' => 'border border-slate-200 bg-white hover:bg-slate-100 hover:text-slate-900 dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-800 dark:hover:text-slate-50',
                'secondary' => 'border border-blue-500 bg-white text-blue-500 hover:bg-blue-500/90 hover:border-blue-600 dark:border-blue-900 dark:bg-blue-900 dark:hover:bg-blue-900/90 dark:hover:text-slate-50',
                'danger' => 'border border-red-500 bg-white text-red-500 hover:bg-red-500/90 hover:border-red-600 dark:border-red-900 dark:bg-red-900 dark:hover:bg-red-900/90 dark:hover:text-slate-50',
                'warning' => 'border border-yellow-500 bg-white text-yellow-500 hover:bg-yellow-500/90 hover:border-yellow-600 dark:border-yellow-900 dark:bg-yellow-900 dark:hover:bg-yellow-900/90 dark:hover:text-slate-50',
                'positive' => 'border border-green-500 bg-white text-green-500 hover:bg-green-500/90 hover:border-green-600 dark:border-green-900 dark:bg-green-900 dark:hover:bg-green-900/90 dark:hover:text-slate-50',
                'info' => 'border border-indigo-500 bg-white text-indigo-500 hover:bg-indigo-500/90 hover:border-indigo-600 dark:border-indigo-900 dark:bg-indigo-900 dark:hover:bg-indigo-900/90 dark:hover:text-slate-50',
            ],
            'ghost' => [
                'primary' => 'hover:bg-slate-100 hover:text-slate-900 dark:hover:bg-slate-800 dark:hover:text-slate-50',
                'secondary' => 'hover:bg-blue-100 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-slate-50',
                'danger' => 'hover:bg-red-100 hover:text-red-900 dark:hover:bg-red-900 dark:hover:text-slate-50',
                'warning' => 'hover:bg-yellow-100 hover:text-yellow-900 dark:hover:bg-yellow-900 dark:hover:text-slate-50',
                'positive' => 'hover:bg-green-100 hover:text-green-900 dark:hover:bg-green-900 dark:hover:text-slate-50',
                'info' => 'hover:bg-indigo-100 hover:text-indigo-900 dark:hover:bg-indigo-900 dark:hover:text-slate-50',
            ],
            'link' => [
                'primary' => 'text-slate-900 underline-offset-4 hover:underline dark:text-slate-50',
                'secondary' => 'text-blue-500 underline-offset-4 hover:text-blue-900 dark:text-blue-900 dark:hover:text-slate-50',
                'danger' => 'text-red-500 underline-offset-4 hover:text-red-900 dark:text-red-900 dark:hover:text-slate-50',
                'warning' => 'text-yellow-500 underline-offset-4 hover:text-yellow-900 dark:text-yellow-900 dark:hover:text-slate-50',
                'positive' => 'text-green-500 underline-offset-4 hover:text-green-900 dark:text-green-900 dark:hover:text-slate-50',
                'info' => 'text-indigo-500 underline-offset-4 hover:text-indigo-900 dark:text-indigo-900 dark:hover:text-slate-50',
            ],
        ][$variant][$color] ?? ['solid']['primary'];

    $sizes = [
         "md" => "h-10 px-4 py-2",
            "sm" => "h-9 rounded-md px-3",
            "xs" => "h-6 rounded-md px-1",
            "lg" => "h-11 rounded-md px-8",
            "icon" => "h-10 w-10",
    ][ $size] ?? ['md'];

    $rounded = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        'full' => 'rounded-full',
    ][ $rounded] ?? ['xl'];

    $class = "{$baseClass} {$variants} {$sizes} {$rounded}";
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
    {{ $slot }}
</button>
