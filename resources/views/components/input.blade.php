@props([
    'text' => 'md',
    'width' => 'full',
    'rounded' => 'xl',
    'bg' => 'gray-900/70',
])

<input {{ $attributes->merge(['class' => 'bg-' . $bg . ' border-none focus:ring-red-500 focus:ring-2 block w-' . $width . ' text-' . $text .' rounded-' . $rounded . ' outline-none mb-3 mt-1']) }} >
