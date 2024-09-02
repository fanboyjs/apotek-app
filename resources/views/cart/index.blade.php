<x-client-layout>
  @php
    $totalPrice = 0;
  @endphp
  <section class="w-full h-full flex flex-1 flex-col ">
    <div class="px-4 lg:px-20 w-full h-fit flex flex-row justify-between items-center">
      <h1 class="text-xl font-bold  uppercase">Keranjang</h1>
      <button class="flex flex-row gap-2 justify-center items-center">
        <span class="font-medium text-sm text-gray-400">HAPUS SEMUA</span>
        <img src="/icons/trash-icon.svg" alt="">
      </button>
    </div>
    <div
      class="px-4 mt-10 lg:px-20 w-full flex flex-row justify-between items-center self-center border-b gap-10 border-slate-200 py-4">
      <p class="text-lg w-2/4  font-medium text-gray-400 text-start">Produk</p>
      <p class="text-lg text-center w-1/4 font-medium text-gray-400">Jumlah</p>
      <p class="text-lg text-center w-1/4 hidden lg:block  font-medium text-gray-400">Harga</p>
    </div>
    <div class="min-h-96  mt-10 px-2 lg:px-20 w-full flex flex-col gap-4 items-center">

      @foreach ($cartItems as $item)
        @php
          $itemTotal = $item->product->price * $item->quantity;
          $totalPrice += $itemTotal;
        @endphp
        <div class="w-full flex  flex-row justify-between items-center gap-10">
          <div class="w-2/4  flex flex-row gap-4 items-center">
            <div class="w-fit lg:w-24 h-24 bg-slate-200 flex justify-center items-center rounded-lg">
              <img class="h-full" src="{{ Storage::url($item->product->photo) }}" alt="">
            </div>
            <div class="">
              <p class="text-base font-medium">{{ $item->product->name }}</p>
              <p class="text-gray-400">{{ $item->quantity }} Pack</p>
            </div>
          </div>
          <div class="w-1/4 h-fit flex justify-center items-center gap-4 md:gap-4">
            <!-- Decrement Button -->
            <form action="{{ route('cart.quantity') }}" method="POST" style="display:inline;">
              @csrf
              <input type="hidden" name="item_id" value="{{ $item->id }}">
              <input type="hidden" name="action" value="decrement">
              <button type="submit" name="button-min"
                class="text-gray-400 hover:text-white border border-gray-400 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-1 text-center">-</button>
            </form>

            <!-- Display Quantity -->
            <span>{{ $item->quantity }}</span>

            <!-- Increment Button -->
            <form action="{{ route('cart.quantity') }}" method="POST" style="display:inline;">
              @csrf
              <input type="hidden" name="item_id" value="{{ $item->id }}">
              <input type="hidden" name="action" value="increment">
              <button type="submit" name="button-plus"
                class="text-gray-400 hover:text-white border border-gray-400 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-1 text-center">+</button>
            </form>
          </div>
          <p class="w-1/4 text-center hidden md:block font-medium text-gray-700"> Rp.
            {{ number_format($itemTotal, 0, ',', '.') }}</p>
        </div>
      @endforeach
    </div>

    <div class= "px-4 mt-10 lg:px-24 w-full flex flex-row justify-between items-center border-t border-slate-200 py-4">
      <p class="text-lg font-medium text-gray-400">Total</p>
      <p class="text-2xl font-bold text-gray-700"> Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
    </div>
    <div class="w-full flex justify-end lg:px-20">
      <a href="{{ route('order') }}">
        <button type="button"
          class="text-white bg-blue-950 hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 uppercase ">checkout
          sekarang</button>
      </a>
    </div>
  </section>
  <script></script>
</x-client-layout>
