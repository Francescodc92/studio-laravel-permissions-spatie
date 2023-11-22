<x-admin-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($permissions as $permission)
              <div class="p-6 text-gray-900">
                {{ $permission->name }}
              </div>
            @endforeach
          </div>
      </div>
  </div>
</x-admin-layout>