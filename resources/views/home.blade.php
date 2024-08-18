<x-client-layout>
    {{-- hero-section --}}
    <section class="w-full h-full flex-1 flex-col ">
        <div class="absolute   left-1/2  transform -translate-x-1/2 max-w-[800px] flex items-center justify-center">
           <img src="/images/farma.png" alt="" class="object-cover opacity-20 xl:opacity-50"> 
        </div>
        <div class="w-full flex flex-1 flex-col md:flex-row ">
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
    <section></section>

</x-client-layout>