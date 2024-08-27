<x-client-layout>
  {{-- hero-section --}}
  <section class="w-full h-full flex-1 flex-col px-2">
    <div class="absolute left-1/2 transform -translate-x-1/2 max-w-[800px] flex items-center justify-center">
      <img src="/images/farma.png" alt="" class="object-cover opacity-20 xl:opacity-50">
    </div>
    <div class="w-full flex flex-1 justify-center items-center flex-col md:flex-row mt-10 lg:mt-0">
      <div class="w-fit p-2 max-w-[500px] flex flex-col justify-between gap-16 order-2 lg:mt-48 lg:order-1">
        <p class="hidden lg:block text-lg font-medium text-gray-600 text-center md:text-left">
          Tak perlu keluar rumah untuk mendapatkan obat yang Anda butuhkan. Praktis, cepat, dan aman, solusi cerdas
          untuk kebutuhan medis Anda!
        </p>
        <div class="flex flex-row justify-center md:justify-start gap-5">
          <div class="w-fit flex flex-row items-center">
            <img class="w-8" src="/icons/location-icn.svg" alt="">
            <p class="text-base font-medium ml-2">Diantar sampai tujuan</p>
          </div>
          <div class="w-fit flex flex-row items-center">
            <img class="w-8" src="/icons/heart-icon.svg" alt="">
            <p class="text-base font-medium ml-2">Obat dijamin Asli</p>
          </div>
        </div>
      </div>
      <div class="z-10 order-1 lg:order-2">
        <img src="/images/apotek-thumbnail.png" alt="">
      </div>
    </div>
  </section>
  {{-- List Obat --}}
  <section class="w-full h-full flex flex-col gap-8 mt-10 lg:mt-30 px-2">
    <!-- Categories -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
      <h2 class="text-2xl font-bold text-blue-600 lg:text-3xl">Kategori</h2>

      <div id="categoriesSlider" class="relative">
        @forelse ($categories as $category)
          <div
            class="inline-flex gap-2.5 items-center py-3 px-3.5 bg-white rounded-xl mr-4 border border-gray-200 shadow-sm">
            <img src="{{ Storage::url($category->icon) }}" class="w-10 h-10 object-cover" alt="{{ $category->name }}">
            <a href="{{ route('category', $category->id) }}" class="text-base font-semibold truncate">
              {{ $category->name }}
            </a>
          </div>
        @empty
          <p>Tidak ada category</p>
        @endforelse
      </div>
    </section>

    <section class="wrapper !px-0 flex flex-col gap-2.5">
      <h2 class="text-2xl font-bold text-blue-600 lg:text-3xl">Result : {{ $products->count() }}</h2>
      <div class="w-full h-full flex flex-1 flex-row flex-wrap justify-center  gap-4">
        @forelse ($products as $product)
          <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
            <div class="h-[200px] bg-slate-100 flex justify-center items-center p-4">
              <img class="rounded-t-lg  h-full" src="{{ Storage::url($product->photo) }}" alt="" />
            </div>
            <div class="p-5">
              <a href="#">
                <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">{{ $product->name }}</h5>
              </a>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->category->name }} </p>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp.
                {{ number_format($product->price, 0, ',', '.') }}</p>
              <a href="{{ route('cart') }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Masukan Keranjang
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </div>
          </div>
        @empty
          <p>Belum ada produk</p>
        @endforelse
      </div>
    </section>
  </section>

</x-client-layout>
