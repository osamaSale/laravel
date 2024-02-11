    <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-outline mb-4 text-center">
                    <h3 class="dark:text-gray-400">Login</h3>
                    <small class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                        If you have an account, sign in with your email address.
                    </small>
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Enter To Email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" placeholder="Enter To Password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <div class="hstack gap-3">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                      
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">


                    <x-primary-button
                        class="ms-3 w-full bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn btn-primary">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
                <div class="form-outline mt-4">
                    <p class="ms-2 text-sm text-gray-600 dark:text-gray-400">Don't have an account?
                        <a href="{{ route('register') }}" class="ms-2 text-sm text-gray-600 dark:text-gray-400">Register</a>

                    </p>
                </div>
            </form>
        </x-guest-layout>
  

