<button {{ $attributes->merge([ 'type' => 'button', 'class' => 'px-5 py-2 font-semibold text-white bg-neutral-800 hover:bg-neutral-900 rounded-md shadow-md disabled:bg-neutral-600' ]) }}>
    {{ $slot }}
</button>