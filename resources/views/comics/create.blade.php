{{-- resources/views/comics/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Komik Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Menampilkan pesan error validasi jika ada --}}
                    @if ($errors->any())
                        <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded-md" role="alert">
                            <strong class="font-bold">{{ __('Oops! Ada yang salah:') }}</strong>
                            <ul class="mt-1 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Menampilkan pesan sukses jika ada --}}
                    @if (session('success'))
                        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded-md shadow" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('comics.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Judul Komik') }}</label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}" required autofocus
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                        </div>

                        <div class="mb-4">
                            <label for="author" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Penulis') }}</label>
                            <input id="author" type="text" name="author" value="{{ old('author') }}" required
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                        </div>

                        <div class="mb-4">
                            <label for="publisher" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Penerbit') }}</label>
                            <input id="publisher" type="text" name="publisher" value="{{ old('publisher') }}"
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Deskripsi') }}</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Stok') }}</label>
                            <input id="stock" type="number" name="stock" value="{{ old('stock', 0) }}" required min="0"
                                class="w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                        </div>

                        <div class="mb-4">
                            <label for="cover_image" class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ __('Gambar Sampul') }}</label>
                            <input id="cover_image" type="file" name="cover_image"
                                class="w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer dark:text-gray-100 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-800 file:text-indigo-700 dark:file:text-indigo-300 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-700">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Kosongkan jika tidak ingin mengunggah atau mengubah gambar.') }}</p>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit"
                                class="px-4 py-2 font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Simpan Komik') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
