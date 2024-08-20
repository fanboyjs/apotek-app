<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Product') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
        {{-- Cek apakah ada error dari proses validasi apa tidak --}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="p-3 my-3 w-full rounded-3xl bg-red-500 text-white">
              {{ $error }}
            </div>
          @endforeach
        @endif
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
          @csrf
          <!-- Name -->
          <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
              required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"
              required autofocus autocomplete="price" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" required autofocus
              autocomplete="photo" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="category" :value="__('Category')" />
            <select name="category_id" id="category" class="py-3 rounded-lg pl-3 w-full border-slate-300">
              <option value="">Choose Product Category</option>
              @forelse ($categories as $category)
                {{-- value yang ada pada option tag itu id category --}}
                <option value="{{ $category->id }}">
                  {{ $category->name }}
                </option>
              @empty
              @endforelse
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="about" :value="__('About')" />
            <textarea name="about" id="about_product" class="border border-slate-300 rounded-xl w-full" cols="30"
              rows="5"></textarea>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
              {{ __('Add New Product') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
