<x-admin-layout>
  <div class="py-12 w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
          <div class="flex p-2">
            <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 mb-3 bg-green-700  text-slate-100 hover:bg-green-500 rounded-md ">Permissions Index</a>
          </div>
          <div class="flex flex-col p-3 bg-slate-100">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-1">
              <form action="{{ route('admin.permissions.update',$permission->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="sm:col-span-6">
                  <label for="name" class="block text-sm font-medium text-gray-700"> Permission Name </label>
                  <div class="mt-1">
                    <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" /
                    value="{{ $permission->name }}"
                    >
                  </div>
                  @error('name')
                    <span class="text-red-500 text-sm bg-red-300 px-4 py-1 rounded-sm ">{{ $message }}</span>
                  @enderror
                </div>
                <div class="sm:col-span-6 pt-3">
                  <div class="mt-1">
                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update Permission</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-col mt-6 p-2 bg-slate-100">
            <div class=" p-2">
              <h2 class="text-2xl font-semibold">Roles</h2>
              <div class="mt-4 p-2">
                @if ($permission->roles)
                    @foreach ($permission->roles as $permission_role)
                      <form  class="inline-block"
                      action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id])}}" 
                      method="POST"
                      onsubmit="return confirm('Are you sure?')"
                    >
                      @method('DELETE')
                      @csrf
                      <button class="px-4 py-2 inline-block bg-red-500 hover:bg-red-700 text-white font-medium hover:underline rounded-md" type="submit">{{ $permission_role->name }}</button>
                    </form>
                    @endforeach
                @endif
              </div>
              <div class="max-w-xl mt-6">
                <form action="{{ route('admin.permissions.roles',$permission->id) }}" method="post">
                  @csrf
                  <div class="sm:col-span-6">
                    <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach ($roles as $role)
                        <option value="{{ $role->name }}">
                          {{ $role->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  @error('role')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                  @enderror
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
        </div>
      </div>
  </div>
</x-admin-layout>