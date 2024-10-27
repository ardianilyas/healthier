<button {{ $attributes->merge([
    'class' => 'px-5 py-2 text-sm text-white font-medium rounded-md bg-red-500 hover:bg-red-600 shadow-md',
    'type' => 'submit'
]) }}>
    {{ $slot }}
</button>