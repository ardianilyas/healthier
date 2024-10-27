<a {{ $attributes->merge([
    'class' => 'px-5 py-2 text-sm font-medium rounded-md bg-yellow-300 hover:bg-yellow-400 shadow-md',
    'href' => ''
]) }}>
    {{ $slot }}
</a>