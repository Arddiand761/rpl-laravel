{{-- resources/views/chapters/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{-- Menampilkan judul komik yang chapternya akan ditambahkan --}}
            {{ __('Tambah Chapter Baru untuk Komik: ') }} <span class="font-bold">{{ $comic->title }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8"> {{-- Ukuran form diperkecil agar lebih fokus --}}
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 md:p-8 dark:text-gray-100">
                    {{-- Menampilkan pesan error validasi jika ada --}}
                    @if ($errors->any())
                        <div class="relative px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded-md" role="alert">
                            <strong class="font-bold">{{ __('Oops! Ada yang salah:') }}</strong>
                            <ul class="mt-1 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Menampilkan pesan sukses jika ada (misalnya setelah berhasil menambah chapter sebelumnya) --}}
                    @if (session('success'))
                        <div class="relative px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-md shadow dark:bg-green-700 dark:border-green-600 dark:text-green-100" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form untuk menambahkan chapter baru --}}
                    {{-- Action form mengarah ke route 'chapters.store' dengan parameter ID komik --}}
                    <form method="POST" action="{{ route('chapters.store', $comic->id) }}">
                        @csrf

                        <!-- Nomor Chapter -->
                        <div class="mb-6">
                            <label for="chapter_number" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Nomor Chapter') }} <span class="text-red-500">*</span></label>
                            <input id="chapter_number" type="text" name="chapter_number" value="{{ old('chapter_number') }}" required autofocus
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
                                placeholder="Contoh: 1, 2.5, Extra">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Bisa berupa angka (1, 2, 3), desimal (1.5), atau teks (Prolog, Spesial). Wajib diisi.') }}</p>
                        </div>

                        <!-- Judul Chapter (Opsional) -->
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Judul Chapter (Opsional)') }}</label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}"
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
                                placeholder="Contoh: Awal Mula Petualangan">
                        </div>

                        <!-- Urutan (Opsional, bisa di-generate otomatis) -->
                        <div class="mb-6">
                            <label for="order" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Urutan Tampilan (Opsional)') }}</label>
                            <input id="order" type="number" name="order" value="{{ old('order') }}"
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
                                placeholder="Angka (misal: 10, 20)">
                             <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Angka lebih kecil akan tampil lebih dulu. Jika dikosongkan, akan diurutkan otomatis berdasarkan nomor chapter atau waktu pembuatan.') }}</p>
                        </div>

                        {{-- Di sinilah nanti kita bisa menambahkan input untuk mengunggah halaman-halaman (gambar) chapter --}}
                        {{-- Untuk sekarang, kita fokus pada pembuatan entitas chapter dulu --}}
                        <div class="p-4 my-8 border-l-4 border-blue-500 rounded-md bg-blue-50 dark:bg-gray-700 dark:border-blue-400">
                            <p class="text-sm text-blue-700 dark:text-blue-300">
                                <span class="font-semibold">Catatan:</span> Pengunggahan halaman (gambar) untuk chapter ini akan dilakukan pada langkah berikutnya atau melalui halaman edit chapter.
                            </p>
                        </div>


                        <div class="flex items-center justify-end pt-6 mt-8 border-t border-gray-200 dark:border-gray-700">
                            {{-- Tombol Batal akan mengarahkan kembali ke halaman detail komik --}}
                            <a href="{{ route('comics.show', $comic->id) }}" class="px-4 py-2 mr-3 text-sm font-medium text-gray-600 rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Batal') }}
                            </a>
                            <button type="submit"
                                class="px-6 py-2 font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Simpan Chapter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
