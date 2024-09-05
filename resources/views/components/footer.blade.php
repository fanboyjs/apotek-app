

<footer class="bg-white border-t-2 mt-40 border-gray-100 rounded-lg shadow">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="/icons/Logo-apotek.svg" class="h-16" alt="Logo" />
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-400 sm:mb-0 ">
                <li>
                    <a href="{{ route('home') }}" class="hover:underline me-4 md:me-6">Home</a>
                </li>
                <li>
                    <a href="{{ route('cart.show', Auth::user()->id ?? 0) }}" class="hover:underline me-4 md:me-6">Keranjang</a>
                </li>
                <li>
                    <a href="{{ route('product_transactions.index') }}" class="hover:underline me-4 md:me-6">Transaksi</a>
                </li>
                <li>
                    <a href="/profile" class="hover:underline">Profile</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">PharmaShop || nasibungkusdev</a>. All Rights Reserved.</span>
    </div>
</footer>

