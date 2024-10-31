<button {{ $attributes->merge(['class' => 'py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:bg-blue-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-blue-800', 'type' => 'submit']) }}>
    {{ $slot }}
</button>