<x-guest-layout>
  <div id="sign-in">
    <div class="container">
      <div class="circle-btn" align="right">
        <a href="/" class="round-btn"><i class="fas fa-times"></i></a>
      </div>
      <div class="login-content">
        <div class="content-sec">
          <x-auth-session-status class="mb-4" :status="session('status')" />
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
              <h1 class="title">Sign in</h1>
              <h2 class="ttl">New User?
                @if (Route::has('login'))
                <a href="{{ route('register') }}" class="link-text">Create Account</a>
                @endif
              </h2><br>
              <x-label for="email" :value="__('Email')" />
              <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4">
              <x-label for="password" :value="__('Password')" />

              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
              <label class="flex items-center">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
              </label>
            </div>

            <div class="flex items-center mt-4">
              <x-button class="btn">
                {{ __('Log in') }}
              </x-button>
              @if (Route::has('password.request'))
              <a class="ml-5 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
              @endif
            </div>
          </form>
        </div>
        <div class="img-sec">
          <img src="{{ asset('images/signin_bannar.png')}}" class="signin-bannar">
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>