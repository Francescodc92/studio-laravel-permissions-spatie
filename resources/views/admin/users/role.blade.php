<x-admin-layout>
  <div class="py-12 w-full">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
          <div class="flex p-2">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 mb-3 bg-green-700  text-slate-100 hover:bg-green-500 rounded-md ">Users Index</a>
          </div>
          <div class="flex flex-col p-2 bg-slate-100">
            <div >
              User Name: {{ $user->name }}
            </div>
            <div >
              User Email: {{ $user->email }}
            </div>
          </div>

          <div class="flex flex-col mt-6 p-2 bg-slate-100">
            <div class=" p-2">
              <h2 class="text-2xl font-semibold">Roles</h2>
              <div class="mt-4 p-2">
                @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                      <form  class="inline-block"
                      action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id])}}" 
                      method="POST"
                      onsubmit="return confirm('Are you sure?')"
                    >
                      @method('DELETE')
                      @csrf
                      <button class="px-4 py-2 inline-block bg-red-500 hover:bg-red-700 text-white font-medium hover:underline rounded-md" type="submit">{{ $user_role->name }}</button>
                    </form>
                    @endforeach
                @endif
              </div>
              <div class="max-w-xl mt-6">
                <form action="{{ route('admin.users.roles',$user->id) }}" method="post">
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

          <div class="flex flex-col mt-6 p-2 bg-slate-100">
            <div class=" p-2">
              <h2 class="text-2xl font-semibold">Permissions</h2>
              <div class="mt-4 p-2">
                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                      <form  class="inline-block"
                      action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id])}}" 
                      method="POST"
                      onsubmit="return confirm('Are you sure?')"
                    >
                      @method('DELETE')
                      @csrf
                      <button class="px-4 py-2 inline-block bg-red-500 hover:bg-red-700 text-white font-medium hover:underline rounded-md" type="submit">{{ $user_permission->name }}</button>
                    </form>
                    @endforeach
                @endif
              </div>
              <div class="max-w-xl mt-6">
                <form action="{{ route('admin.users.permissions',$user->id) }}" method="post">
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