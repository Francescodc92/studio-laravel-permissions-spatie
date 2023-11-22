<x-admin-layout>
  <div class="py-12 w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
          <div class="flex p-2">
            <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 mb-3 bg-green-700  text-slate-100 hover:bg-green-500 rounded-md ">Role Index</a>
          </div>
          <div class="flex flex-col p-2 bg-slate-100">
            <div class="space-y-8  divide-y divide-gray-200 w-1/2 mt-1">
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
          <div class="flex flex-col mt-6 p-2 bg-slate-100">
            <div class=" p-2">
              <h2 class="text-2xl font-semibold">Role Permissions</h2>
              <div class="mt-4 p-2">
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                      <form  class="inline-block"
                      action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}" 
                      method="POST"
                      onsubmit="return confirm('Are you sure?')"
                    >
                      @method('DELETE')
                      @csrf
                      <button class="px-4 py-2 inline-block bg-red-500 hover:bg-red-700 text-white font-medium hover:underline rounded-md" type="submit">{{ $role_permission->name }}</button>
                    </form>
                    @endforeach
                @endif
              </div>
              <div class="max-w-xl mt-6">
                <form action="{{ route('admin.roles.permissions',$role) }}" method="post">
                  @csrf
                  <div class="sm:col-span-6">
                    <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                    <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}">
                          {{ $permission->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  @error('permission')
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
</x-admin-layout>