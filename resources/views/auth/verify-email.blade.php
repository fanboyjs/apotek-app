<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terimakasih sudah bergabung dengan kami! Sebelum memulai, dapatkah anda melakukan verifikasi alamat email anda dengan meng-klik pada link yang kita kirimkan ke alamat email anda! Jika anda tidak menerima pesan email yang berisi link verifikasi, kami akan mengirimkan pesan email lagi kepada anda.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Link verifikasi baru telah dikirim ke alamat email anda.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Kirim Ulang Verifikasi Pesan Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Keluars') }}
            </button>
        </form>
    </div>
</x-guest-layout>
