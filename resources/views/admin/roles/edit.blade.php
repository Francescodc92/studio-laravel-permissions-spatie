<x-admin-layout>
  <div class="py-12 w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
          <div class="flex p-2">
            <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 mb-3 bg-green-700  text-slate-100 hover:bg-green-500 rounded-md ">Role Index</a>
          </div>
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-1">
            <form action="{{ route('admin.roles.update',$role) }}" method="post">
              @method('PUT')
              @csrf
              <div class="sm:col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700"> Role Name </label>
                <div class="mt-1">
                  <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" /
                  value="{{ $role->name }}"
                  >
                </div>
                @error('name')
                  <span class="text-red-500 text-sm bg-red-300 px-4 py-1 rounded-sm ">{{ $message }}</span>
                @enderror
              </div>
              <div class="sm:col-span-6 pt-3">
                <div class="mt-1">
                  <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update Role</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</x-admin-layout>