{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=""> {{-- Mulai tanpa kelas 'dark' --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pojok Komik - Baca Komik Digital Favoritmu</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-gray-800 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 font-instrument-sans">
    <div class="relative flex flex-col min-h-screen items-top">
        {{-- Header dengan Tombol Login/Register dan Dark Mode Toggle --}}
        <header class="w-full">
            {{-- Tambahkan kontainer ini untuk membatasi lebar dan menengahkan --}}
            <div class="w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-end py-4 space-x-4">
                    {{-- Dark Mode Toggle Button --}}
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM10 12a2 2 0 100-4 2 2 0 000 4zm-4.343-1.05a1 1 0 111.414-1.414l.707.707a1 1 0 11-1.414 1.414l-.707-.707zm8.686 0a1 1 0 11-1.414-1.414l-.707.707a1 1 0 111.414 1.414l.707-.707z">
                            </path>
                        </svg>
                    </button>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm font-semibold text-gray-700 transition-colors duration-200 hover:text-primary dark:text-gray-300 dark:hover:text-primary-dark">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-semibold text-gray-700 transition-colors duration-200 hover:text-primary dark:text-gray-300 dark:hover:text-primary-dark">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 rounded-lg bg-primary hover:bg-primary-dark">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main class="w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <section class="py-16 text-center sm:py-20">
                <div class="max-w-3xl px-4 mx-auto">
                    <h1
                        class="mb-6 text-4xl font-bold text-transparent sm:text-5xl md:text-6xl bg-clip-text bg-gradient-to-r from-primary-dark to-orange-400 dark:from-primary dark:to-orange-300">
                        Selamat Datang di Pojok Komik!
                    </h1>
                    <p class="mb-10 text-lg text-gray-700 sm:text-xl dark:text-gray-300">
                        Dunia petualangan tanpa batas ada di ujung jarimu. Temukan dan baca komik favoritmu sekarang!
                    </p>
                    <a href="{{ route('comics.index') }}"
                        class="inline-block px-10 py-4 text-lg font-bold text-white transition-all duration-300 transform rounded-lg shadow-lg bg-primary hover:bg-primary-dark hover:scale-105">
                        Jelajahi Koleksi Komik
                    </a>
                </div>
            </section>

                        <section class="py-16">
                <h2 class="mb-10 text-3xl font-bold text-center text-gray-900 dark:text-white">
                    Baru & Populer <span class="text-primary">🔥</span>
                </h2>
                {{-- Pastikan kamu mengirim variabel $featuredComics dari route/controller --}}
                @if(isset($featuredComics) && $featuredComics->count() > 0)
                    {{-- Diubah dari grid menjadi flex untuk menengahkan item --}}
                    <div
                        class="flex flex-wrap items-stretch justify-center gap-8">
                        @foreach($featuredComics as $comic)
                            {{-- Setiap kartu diberi lebar basis dan bisa 'shrink' jika perlu --}}
                            <div
                                class="flex flex-col w-full overflow-hidden transition-all duration-300 ease-in-out transform bg-white shadow-lg sm:w-64 group rounded-xl hover:shadow-2xl hover:-translate-y-2 dark:bg-gray-800 ring-1 ring-gray-900/5">
                                <a href="{{ route('comics.show', $comic->id) }}" class="block overflow-hidden">
                                    @if ($comic->cover_image)
                                        <img src="{{ asset('storage/' . $comic->cover_image) }}"
                                            alt="Sampul {{ $comic->title }}"
                                            class="object-cover w-full transition-transform duration-500 ease-in-out rounded-t-xl aspect-[2/3] group-hover:scale-105">
                                    @else
                                        <div
                                            class="flex flex-col items-center justify-center w-full text-gray-500 rounded-t-xl aspect-[2/3] bg-gray-200 dark:bg-gray-700">
                                            <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </a>
                                <div class="flex flex-col flex-grow p-4">
                                    <h3 class="mb-0.5 text-sm font-semibold leading-tight text-gray-900 truncate dark:text-white"
                                        title="{{ $comic->title }}">
                                        <a href="{{ route('comics.show', $comic->id) }}"
                                            class="hover:text-primary dark:hover:text-primary">
                                            {{ $comic->title }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-gray-600 truncate dark:text-gray-400"
                                        title="{{ $comic->author }}">
                                        {{ $comic->author }}
                                    </p>
                                    <a href="{{ route('comics.show', $comic->id) }}"
                                        class="inline-block w-full px-4 py-2 pt-3 mt-auto text-sm font-semibold text-center text-white transition-colors duration-200 rounded-lg bg-primary hover:bg-primary-dark">
                                        Baca Sekarang
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                        <p class="text-xl">📚 Segera Hadir: Komik-komik Unggulan! 📚</p>
                        <p class="mt-2">Kami sedang menyiapkan koleksi terbaik untuk Anda.</p>
                    </div>
                @endif
            </section>

            <section class="py-12 my-8 bg-gray-50 dark:bg-gray-800/50 rounded-2xl">
                <div class="max-w-3xl px-6 mx-auto text-center">
                    <h2 class="mb-6 text-3xl font-bold text-gray-900 dark:text-white">
                        Kenapa Memilih <span class="text-primary">Pojok Komik</span>?
                    </h2>
                    <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                        Pojok Komik adalah surga digital bagi para penikmat cerita bergambar! Kami mendedikasikan
                        platform ini untuk menyajikan koleksi komik terlengkap, dari judul legendaris hingga rilisan
                        terbaru. Nikmati pengalaman membaca yang mulus, fitur personalisasi, dan dukungan penuh untuk
                        para kreator.
                    </p>
                </div>
            </section>

            @guest
                <section class="py-16 text-center">
                    <h2 class="mb-4 text-2xl font-bold text-gray-900 sm:text-3xl dark:text-white">Siap Memulai
                        Petualanganmu?</h2>
                    <p class="max-w-xl mx-auto mb-8 text-gray-700 dark:text-gray-300">
                        Daftar atau masuk untuk menyimpan progres baca, membuat koleksi favorit, dan dapatkan rekomendasi
                        komik yang dibuat khusus untukmu!
                    </p>
                    <div class="flex flex-col items-center justify-center gap-4 sm:flex-row sm:gap-6">
                        <a href="{{ route('register') }}"
                            class="w-full px-8 py-3 text-lg font-semibold text-white transition-colors duration-300 transform rounded-lg shadow-md sm:w-auto bg-primary hover:bg-primary-dark hover:scale-105">
                            Daftar Gratis
                        </a>
                        <a href="{{ route('login') }}"
                            class="w-full px-8 py-3 text-lg font-semibold text-gray-800 transition-colors duration-300 transform bg-gray-200 rounded-lg shadow-md sm:w-auto hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                            Sudah Punya Akun?
                        </a>
                    </div>
                </section>
            @endguest
        </main>

        <footer
            class="w-full px-4 py-10 mx-auto mt-12 text-sm text-center text-gray-500 border-t border-gray-200 max-w-7xl sm:px-6 lg:px-8 dark:text-gray-400 dark:border-gray-700">
            &copy; {{ date('Y') }} Pojok Komik. Dirakit dengan <span class="text-red-500">❤️</span> untuk para
            pecinta komik.
        </footer>
    </div>
    <script>
        // JavaScript untuk Dark Mode Toggle
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Ganti ikon berdasarkan settingan sebelumnya di localStorage atau preferensi OS
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            document.documentElement.classList.remove('dark');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>

</html>
