<x-guest-layout>
    <div class="w-full max-w-sm p-8 bg-white dark:bg-[#23272f] shadow-lg rounded-xl">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-[#F53003] rounded-full w-16 h-16 flex items-center justify-center mb-2">
                <span class="text-3xl">📝</span>
            </div>
            <h2 class="mb-2 text-2xl font-bold text-gray-800 dark:text-white">Daftar Akun</h2>
        </div>
        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-200" />
                <x-text-input id="name" class="block w-full mt-1 bg-yellow-100 dark:bg-[#23272f] border-2 border-[#F53003] rounded-lg text-gray-900 dark:text-white focus:ring-[#F53003] focus:border-[#F53003]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-200" />
                <x-text-input id="email" class="block w-full mt-1 bg-yellow-100 dark:bg-[#23272f] border-2 border-[#F53003] rounded-lg text-gray-900 dark:text-white focus:ring-[#F53003] focus:border-[#F53003]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-200" />
                <x-text-input id="password" class="block w-full mt-1 bg-yellow-100 dark:bg-[#23272f] border-2 border-[#F53003] rounded-lg text-gray-900 dark:text-white focus:ring-[#F53003] focus:border-[#F53003]"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-200" />
                <x-text-input id="password_confirmation" class="block w-full mt-1 bg-yellow-100 dark:bg-[#23272f] border-2 border-[#F53003] rounded-lg text-gray-900 dark:text-white focus:ring-[#F53003] focus:border-[#F53003]"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="w-full py-2 rounded bg-[#F53003] text-white font-bold text-lg hover:bg-red-600 transition mt-2">REGISTER</button>
        </form>
        <div class="mt-6 text-sm text-center text-gray-700 dark:text-gray-200">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-[#F53003] font-semibold hover:underline">Login disini</a>
        </div>
        <!-- Toggle Dark Mode Button -->
        <button onclick="toggleDarkMode()" type="button"
            class="px-4 py-2 mt-6 text-white transition bg-gray-800 rounded hover:bg-gray-700">
            Toggle Dark Mode
        </button>
    </div>
</x-guest-layout>
