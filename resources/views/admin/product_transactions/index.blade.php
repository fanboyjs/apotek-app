<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Orders') : __('My Transaction') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden gap-y-5 p-10 shadow-sm sm:rounded-lg">
                @forelse ($product_transactions as $transaction)
                    <div class="item-card flex p-3 flex-row justify-between items-center">
                        <a href="{{ route('product_transactions.show', $transaction) }}" class="font-bold py-3 px-5 ">
                            <div class="flex flex-row gap-x-3 items-center">
                                <div>
                                    <p class="text-base font-bold">Total Transaksi</p>
                                    <h3 class="font-bold text-xl text-blue-500">
                                        Rp {{ $transaction->total_amount }}
                                    </h3>
                                </div>
                            </div>
                        </a>

                        <div class="hidden md:flex flex-col">
                            <p class="text-base font-bold">Date</p>
                            <h3 class="font-bold text-xl text-blue-500">
                                {{ $transaction->created_at ? $transaction->created_at : date('Y-m-d') }}
                            </h3>
                        </div>
                        @if ($transaction->is_paid)
                            <span class="font-bold py-1 px-3 rounded-full bg-green-500">
                                <p class="text-white font-bold text-sm">
                                    SUCCESS
                                </p>
                            </span>
                        @else
                            <span class="font-bold py-1 px-3 rounded-full bg-orange-500">
                                <p class="text-white font-bold text-sm">
                                    PENDING
                                </p>
                            </span>
                        @endif
                        <div class="hidden md:flex flex-row gap-x-3 items-center">
                            <a href="{{ route('product_transactions.show', $transaction) }}"
                                class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">View Details</a>
                        </div>
                    </div>
                    <hr class="my-3">
                @empty
                    <p>Belum Tersedia Transaksi Terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
