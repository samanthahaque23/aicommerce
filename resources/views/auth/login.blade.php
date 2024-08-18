<x-app-layout>
    <form method="POST" action="{{ route('login') }}" class="w-[400px] mx-auto p-6 my-16">
@csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
              Login to your account
            </h2>
            <p class="text-center text-gray-500 mb-6">
              or
              <a
                 href="{{ route('register') }}"
                class="text-sm text-purple-700 hover:text-purple-600"
                >create new account</a
              >
            </p>
            <x-auth-validation-errors :errors="$errors" />

            <div class="mb-4">
              <x-text-input
                id="loginEmail"
                type="email"
                name="email"
                :errors="$errors"
                :value="old('email')"
                placeholder="Your email address"
                class=" w-full"
              />
            </div>
            <div class="mb-4">
              <x-text-input
                id="loginPassword"
                type="password"
                name="password"
                placeholder="Your password"
                class=" w-full"
              />
            </div>
    
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center">
                    <input
                        id="loginRememberMe"
                        type="checkbox"
                        class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                    />
                    <label for="loginRememberMe">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-purple-700 hover:text-purple-600">
                        Forgot Password?
                    </a>
                @endif
            </div>
            <button
              class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
            >
              Login
            </button>
          </form>
</x-app-layout>