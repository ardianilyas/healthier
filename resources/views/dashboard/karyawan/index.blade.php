<x-dashboard>
    <x-slot:title>List Karyawan</x-slot:title>
    <x-slot:desc>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, cupiditate.</x-slot:desc>

    <x-primary-link href="{{ route('dashboard.karyawan.create') }}">Create user</x-primary-link>
    
    <div class="w-full mt-6">
        <div class="min-w-full flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Role</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">   
                        @foreach ($users as $user)    
                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $user->getRoleNames()[0] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $user->email }}</td>
                            <td class="px-6 py-4 justify-end whitespace-nowrap text-end text-sm font-medium">
                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                            </td>   
                        </tr>
                        @endforeach       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-dashboard>