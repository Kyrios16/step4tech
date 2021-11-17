<x-guest-layout>
  <!-- <x-auth-card> -->


  <div id="sign-in">
    <div class="container">
      <div class="circle-btn" align="right">
        <a href="/" class="round-btn"><i class="fas fa-times"></i></a>
      </div>
      <div class="login-content clearfix">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="content-sec">

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
              <h1 class="title">Sign in</h1>
              <h2 class="ttl">New User?
                @if (Route::has('login'))
                <a href="{{ route('register') }}" class="link-text">Create Account</a>
                @endif
              </h2><br>
              <x-label for="email" :value="__('Email')" />

              <x-input id="email" class="block mt-1 w-full" type="email" name="email"  required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
              <x-label for="password" :value="__('Password')" />

              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
              @endif

              <x-button class="ml-3 btn">
                {{ __('Log in') }}
              </x-button>
            </div>
          </form>
        </div>
        <div class="img-sec">
          <img src="{{ asset('images/signin_bannar.png')}}" alt="BANNAR">
        </div>
      </div>
    </div>
  </div>
  <!-- </x-auth-card> -->
</x-guest-layout>