<x-client-layout>
  {{-- hero-section --}}
  <div id="toast"
    class="hidden z-40 fixed bottom-0 right-2 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow "
    role="alert">

    <div class="ms-3 text-sm font-normal">{{ session('status') }}</div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
      data-dismiss-target="#toast-success" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
  <section class="w-full h-full  flex-1 flex-col px-2">
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
  <section class="max-w-screen-xl h-full flex-1 border flex-col gap-8 mt-10 lg:mt-30 mx-auto px-4 ">
    <!-- Categories -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
      <h2 class="text-2xl font-bold text-blue-600 lg:text-3xl">Kategori</h2>

      <div id="categoriesSlider" class="relative w-full h-fit flex flex-row flex-wrap gap-2.5">
        @forelse ($categories as $category)
          <a href="{{ route('category', $category->id) }}" class="text-base font-semibold truncate">
            <div
              class="inline-flex gap-2.5 items-center py-3  px-3 w-36 bg-white rounded-xl border border-gray-200 shadow-sm">
              <img src="{{ Storage::url($category->icon) }}" class="w-10 h-10 object-cover" alt="{{ $category->name }}">
              {{ $category->name }}
            </div>
          </a>
        @empty
          <p>Tidak ada category</p>
        @endforelse
      </div>
    </section>

    <section class="wrapper !px-0 flex flex-col gap-2.5">
      <h2 class="text-2xl font-bold text-blue-600 lg:text-3xl">Produk Terbaru</h2>
      <div class="w-full h-full flex flex-1 flex-row flex-wrap justify-center  gap-4">
        @forelse ($products as $product)
          <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
            <div class="h-[200px] bg-slate-100 flex justify-center items-center p-4">
              <img class="rounded-t-lg  h-full" src="{{ Storage::url($product->photo) }}" alt="" />
            </div>
            <div class="p-5">
              <a href="#">
                <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 ">
                  {{ \Illuminate\Support\Str::limit($product->name, 30) }}
                </h5>
              </a>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->category->name }} </p>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp.
                {{ number_format($product->price, 0, ',', '.') }}</p>
              <a href="{{ route('cart.add', ['productId' => $product->id, 'userId' => Auth::user()->id ?? 0]) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
  <script>
    // Check if there's a session flash message
    @if (session('status'))
      document.getElementById('toast').classList.remove('hidden');
      document.getElementById('toast').classList.add('flex');
      setTimeout(() => {
        document.getElementById('toast').classList.add('hidden');
      }, 3000); // Hide after 3 seconds
    @endif
  </script>
</x-client-layout>