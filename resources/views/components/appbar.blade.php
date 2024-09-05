<nav class="bg-white sticky top-0 z-50 border-gray-200 border-b-2  md:px-20">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4">
    <a href="/" class="flex items-center w-fit">
      <img src="/icons/Logo-apotek.svg" class="h-16" alt="Logo" />
    </a>
    <div class="flex md:order-1">
      <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false"
        class="md:hidden text-gray-500  hover:bg-gray-100  focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2.5 me-1">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
        <span class="sr-only">Search</span>
      </button>
      <div class="relative hidden md:block">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search icon</span>
        </div>
        <input type="text" id="search-navbar"
          class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-blue-500 focus:border-blue-500 "
          placeholder="Cari obat...">
      </div>
      <button data-collapse-toggle="navbar-search" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
        aria-controls="navbar-search" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-search">
      <div class="relative mt-3 md:hidden">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <input type="text" id="search-navbar"
          class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-blue-500 focus:border-blue-500 "
          placeholder="Search...">
      </div>
      <ul
        class="flex items-center flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
        <li>
          <a href="/"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0"
            aria-current="page">Home</a>
        </li>
        <li>
          <a href="{{ route('cart.show', Auth::user()->id ?? 0) }}"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0"
            aria-current="page">Keranjang</a>
        </li>
        <li>
          <a href="{{ route('product_transactions.index') }}"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Transaksi</a>
        </li>
        <li class="flex items-center gap-2 h-7 text-blue-500">
          
          @guest
            <div class="flex items-center gap-2 h-7 text-blue-500">
              <img src="{{ asset('icons/avatar.svg') }}" class="h-full rounded-full" alt="">
              <a href="{{ route('login') }}"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Login</a>
            </div>
          @endguest
        </li>
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">
            @auth
            <div class="flex items-center gap-2 h-7 text-blue-500">
              <img src="{{ asset('icons/avatar.svg') }}" class="h-full rounded-full" alt="">
              {{ Auth::user()->name }}
            </div>
            
          @endauth
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
                </li>
                <li>
                  <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 ">Profile</a>
                </li>
              </ul>
              <div class="py-1">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
        
                  <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
        
                    {{ __('Keluar') }}
                  </x-responsive-nav-link>
                </form>
              </div>
          </div>
      </li>
      </ul>
    </div>
  </div>
</nav>
