<x-client-layout>
    {{-- hero-section --}}
    <section class="w-full h-full flex-1 flex-col ">
        <div class="absolute   left-1/2  transform -translate-x-1/2 max-w-[800px] flex items-center justify-center">
           <img src="/images/farma.png" alt="" class="object-cover opacity-20 xl:opacity-50"> 
        </div>
        <div class="w-full flex flex-1 justify-center items-center flex-col md:flex-row ">
            <div class="w-fit p-2 max-w-[500px] flex flex-col justify-center gap-8">
                <p class="text-xl font-medium text-gray-600 text-center md:text-left">
                    Tak perlu keluar rumah untuk mendapatkan obat yang Anda butuhkan. Praktis, cepat, dan aman, solusi cerdas untuk kebutuhan medis Anda!
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
            <div class="z-10">
                <img src="/images/apotek-thumbnail.png" alt="">
            </div>
        </div>
    </section>
    {{-- List Obat --}}
    <section class="w-full h-full flex flex-col gap-8 mt-40">
        <h2 class="text-2xl font-bold text-gray-500">Kategori</h2>
        <div class="hidden lg:flex flex-row justify-evenly gap-4">
            <div class=" flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-[#f39d84] text-[#f39d84]"></span>
                <p class="font-semibold text-base">Diabetes</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-purple-300 text-purple-300"></span>
                <p class="font-semibold text-base">Vitamins</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-green-300 text-green-300"></span>
                <p class="font-semibold text-base">Suplemen</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-blue-300 text-blue-300"></span>
                <p class="font-semibold text-base">Flu & Batuk</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-red-400 text-red-400"></span>
                <p class="font-semibold text-base">Demam</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-yellow-300 text-yellow-300"></span>
                <p class="font-semibold text-base">Alergi</p>
            </div>
            <div class="flex flex-row items-center gap-2">
                <span class="w-10 h-10 rounded-full bg-fuchsia-400 text-fuchsia-400"></span>
                <p class="font-semibold text-base">Obat mata</p>
            </div>
        </div>
        <div class="w-full h-full flex flex-1 flex-row flex-wrap justify-center gap-4">
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="{{ route('cart') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-[300px] h-[400px] bg-white border border-gray-200 rounded-lg shadow">
                <div class="bg-slate-100 flex justify-center items-center p-4">
                    <img class="rounded-t-lg w-30" src="/images/obat-1.png" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-BASE font-bold tracking-tight text-gray-900 ">Noteworthy technology</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vitamin </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Masukan Keranjang
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-client-layout>