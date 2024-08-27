<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-6">
      <div class="mb-6 grid grid-cols-3 gap-3">
        <div>
          <a href="auth/redirect"
            class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="#000000" viewBox="0 0 256 256">
              <path
                d="M224,128a96,96,0,1,1-21.95-61.09,8,8,0,1,1-12.33,10.18A80,80,0,1,0,207.6,136H128a8,8,0,0,1,0-16h88A8,8,0,0,1,224,128Z">
              </path>
            </svg>
          </a>
        </div>
      </div>
      <div class="relative">
        <div class="relative flex justify-center text-sm">
          <span class="px-2 bg-gray-100 text-gray-500">
            Atau masuk dengan
          </span>
        </div>
      </div>
    </div>

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Alamat Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
      </label>
    </div>

    {{-- Dont have an account --}}
    <div>
      <p>
        Belum punya akun? <a href="{{ route('register') }}"
          class="text-blue-500 hover:text-blue-700 hover:underline">Daftar</a>
      </p>
    </div>


    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          href="{{ route('password.request') }}">
          {{ __('Lupa password?') }}
        </a>
      @endif

      <x-primary-button class="ms-3">
        {{ __('Masuk') }}
      </x-primary-button>
    </div>

    <div>
      {{-- <a href="auth/redirect" class="text-blue">Masuk dengan google</a> --}}
    </div>
  </form>
</x-guest-layout>
