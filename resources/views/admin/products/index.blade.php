<x-app-layout>
  <x-slot name="header">
    <div id="deleteModal"
      class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full  justify-center items-center">
      <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this product?</p>
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
        {{ __('Manage Products') }}
      </h2>
      <a href="{{ route('admin.products.create') }}"
        class="font-bold py-3 px-5 rounded-full text-white bg-indigo-500">Add
        Products</a>
    </div>
  </x-slot>

  <div div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden gap-y-5 p-10 shadow-sm sm:rounded-lg">
        @forelse ($products as $product)
          <div class="item-card flex p-3 flex-row justify-between items-center">
            <div class="flex flex-row gap-x-3 items-center">
              <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->name }}" class="w-[50px] h-[50px]" />
              <div>
                <h3 class="font-bold text-xl text-indigo-950">
                  {{ $product->name }}
                </h3>
                <p class="text-base text-blue-500 font-bold">
                  Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
              </div>
            </div>
            <p class="text-base text-slate-500">
              {{ $product->category->name }}
            </p>
            <div class="flex flex-row gap-x-3 items-center">
              <a href="{{ route('admin.products.edit', $product) }}"
                class="font-bold py-2 px-4 rounded text-white bg-indigo-700">Edit</a>
              <button class="font-bold py-2 px-4 rounded text-white bg-red-700"
                onclick="openDeleteModal('{{ route('admin.products.destroy', $product) }}')">
                Delete
              </button>
            </div>
          </div>
        @empty
          <p>Belum ada produk yang ditambahkan oleh pemilik apotek
            <a href="{{ route('admin.products.create') }}" class="text-blue-500 hover:underline">
              tambah produk
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
