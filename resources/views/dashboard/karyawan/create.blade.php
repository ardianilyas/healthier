<x-dashboard>
    <x-slot:title>Create User</x-slot:title>
    <x-slot:desc>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla, ipsum.</x-slot:desc>

    <x-card>
        <form action="" class="[&>div]:mb-3">
            <div>
                <x-label>Username</x-label>
                <x-input name='name' placeholder="username" />
            </div>
            <div>
                <x-label>Role</x-label>
                <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="" value="" name="role">Select role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </x-card>
</x-dashboard>