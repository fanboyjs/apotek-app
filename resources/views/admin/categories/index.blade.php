<x-app-layout>
  <x-slot name="header">
    <div id="deleteModal"
      class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full  justify-center items-center">
      <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this category?</p>
        <div class="flex justify-end">
          <button id="cancelBtn"
            class="mr-4 px-4 py-2 bg-gray-300 rounded text-gray-800 hover:bg-gray-400">Cancel</button>
          <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
          </form>
        </div>
      </div>
    </div>

    <div class="flex flex-row w-full justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage Category') }}
      </h2>
      <a href="{{ route('admin.categories.create') }}"
        class="font-bold py-3 px-5 rounded-full text-white bg-indigo-500">Add
        Category</a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden gap-y-5 p-10 shadow-sm sm:rounded-lg">
        @forelse ($categories as $category)
          <div class="item-card flex p-3 flex-row justify-between items-center">
            <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}" class="w-[50px] h-[50px]">
            <h3 class="font-bold text-xl text-indigo-950">
              {{ $category->name }}
            </h3>
            <div class="flex flex-row gap-x-3 items-center">
              <a href="{{ route('admin.categories.edit', $category) }}"
                class="font-bold py-2 px-4 rounded text-white bg-indigo-700 hover:bg-indigo-800">Edit</a>
              <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                @csrf
                @method('DELETE')
                <button type="button" class="font-bold py-2 px-4 rounded text-white bg-red-700 hover:bg-red-800"
                  onclick="openDeleteModal('{{ route('admin.categories.destroy', $category) }}')">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @empty
          <p>Belum ada kategori yang ditambahkan oleh pemilik apotek
            <a href="{{ route('admin.categories.create') }}" class="text-blue-500 hover:underline">
              tambah kategori
            </a>
          </p>
        @endforelse
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  function openDeleteModal(action) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
  }

  document.getElementById('cancelBtn').addEventListener('click', function() {
    document.getElementById('deleteModal').classList.add('hidden');
  });
</script>
