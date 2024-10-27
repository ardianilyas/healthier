<a {{ $attributes->merge([
    'class' => 'px-5 py-2 inline-flex mb-3 font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow-md transition-all ease-in-out',
    'href' => ''
]) }}>
    {{ $slot }}
</a>