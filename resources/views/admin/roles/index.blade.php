<x-admin-layout>
  <div class="py-12 w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
          <div class="flex justify-end">
            <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 mb-3 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md ">Create</a>
          </div>
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                        name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody>
         
                @foreach ($roles as $role)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $role->name }}
                      </td>
                      <td class="px-6 py-4 text-right">
                          <div class="flex justify-end">
                            <div class="space-x-2">
                              <a href="{{ route('admin.roles.edit', $role->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-medium hover:underline rounded-md">Edit</a>
                              <a href="#" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-medium hover:underline rounded-md">Delete</a>
                            </div>
                          </div>
                      </td>
                  </tr>
                  @endforeach
               
              </tbody>
          </table>
        </div>
      </div>
  </div>
</x-admin-layout>