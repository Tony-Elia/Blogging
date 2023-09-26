@props([
    'px' => '4',
    'py' => '1.5',
    'bg' => 'red-500',
    'rounded' => 'full'
])

<button {{ $attributes->merge(['class' => 'px-' . $px . ' py-' . $py . ' bg-' . $bg . ' rounded-' . $rounded . ' transition-all duration-200']) }}>
    {{ $slot }}
</button>
