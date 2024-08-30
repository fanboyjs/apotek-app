
<x-client-layout>
    
    <section class="w-full h-full flex flex-1 flex-col ">
        <div class="p-8 border-gray-200 border-2 bg-white">
            <h1 class="text-xl text-center font-bold uppercase text-blue-700">Form Pemesanan</h1>
            <form class="max-w-md mx-auto " action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text"  name="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Telepon</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="post_code" id="post_code" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="post_code" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode Pos</label>
                </div>
                
                <div class="relative z-0 w-full mb-5 group">
                    <label for="city" class="sr-only">Kota/Kabupaten</label>
                    <select required id="city" name="city" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none  focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Pilih Kota</option>
                        <option value="Nganjuk">Nganjuk</option>
                    </select>
                </div>
             
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Lengkap</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="notes" id="notes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="notes" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Catatan kepada penjual</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="proof" id="proof" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="proof" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bank dan No Rek anda</label>
                </div>
                <div class="p-8 border-gray-200 border-2 mt-14 bg-white">
                    <h1 class="text-xl text-center font-bold uppercase text-blue-700">Form Pembayaran</h1>
                    <div class="max-w-md mt-8 mx-auto flex flex-col items-center gap-4">
                      <p class="text-base text-gray-400 font-normal">Silahkan Transfer ke Rekening Berikut</p>
                      <span class="flex flex-row gap-2 items-center text-base font-medium text-gray-500"> <img class="w-16 h-8" src="/images/bca-bank.png" alt=""> 784894990000098 Sherlina Tzu </span>  
                      <span class="flex flex-row gap-2 items-center text-base font-medium text-gray-500"> <img class="w-16 h-8" src="/images/mandiri-bank.png" alt=""> 665894990000098 Sherlina Tzu </span>  
                    </div>
                    <div class="max-w-md mt-8 mx-auto flex flex-col items-center gap-4" >
                      <p class="text-base text-gray-400 font-normal">Nominal Yang Perlu di Bayar:</p>  
                      <p class="text-4xl font-bold text-slate-800 animate-blink">Rp.{{ number_format($totalAmount, 0, ',', '.') }}</p>
                    </div>
                    <div class="max-w-md mt-8 mx-auto flex flex-col items-center gap-4">
                      <p class="text-base text-gray-400 font-normal">Upload Bukti Pembayaran:</p> 
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <div class="form-group w-full flex flex-col justify-center items-center">
                                    <label for="transfer_slip"></label>
                                    <input type="file" name="transfer_slip" id="transfer_slip" class="form-control-file text-white border mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                </div>
                                
                            </label>
                        </div> 
                    </div>
                </div>
                <div class="w-full  flex justify-center items-center">
                     <button type="submit" class="text-white border mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                </div>
            </form>
        </div>
    </section>
  </x-client-layout>