{{-- resources/views/comics/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Komik: ') }} {{ $comic->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($comic->cover_image)
                        <img src="{{ asset('storage/' . $comic->cover_image) }}" alt="{{ $comic->title }}" class="w-1/3 h-auto object-cover rounded-md mb-4 float-left mr-6">
                    @endif
                    <h3 class="text-2xl font-semibold mb-2">{{ $comic->title }}</h3>
                    <p class="text-md text-gray-600 dark:text-gray-400 mb-1"><strong>Penulis:</strong> {{ $comic->author }}</p>
                    <p class="text-md text-gray-600 dark:text-gray-400 mb-1"><strong>Penerbit:</strong> {{ $comic->publisher ?? '-' }}</p>
                    <p class="text-md text-gray-600 dark:text-gray-400 mb-4"><strong>Stok/Status:</strong> {{ $comic->stock }} {{-- Ganti sesuai kebutuhan --}}</p>
                    <div class="clear-both"></div>
                    <h4 class="text-lg font-semibold mt-4 mb-2">Deskripsi:</h4>
                    <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $comic->description ?? 'Tidak ada deskripsi.' }}</p>
                </div>
            </div>

            {{-- Bagian Chapter --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold">{{ __('Daftar Chapter') }}</h3>
                        <a href="{{ route('chapters.create', $comic->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-md shadow-sm">
                            {{ __('+ Tambah Chapter') }}
                        </a>
                    </div>

                    @if($comic->chapters->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">{{ __('Belum ada chapter untuk komik ini.') }}</p>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($comic->chapters as $chapter)
                                <li class="py-3 flex justify-between items-center">
                                    <div>
                                        <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                            Ch. {{ $chapter->chapter_number }} {{ $chapter->title ? '- ' . $chapter->title : '' }}
                                        </a>
                                    </div>
                                    <div>
                                        {{-- Tambahkan tombol aksi untuk chapter (edit, delete, lihat halaman) di sini nanti --}}
                                        <a href="#" class="text-xs text-blue-500 hover:underline mr-2">Lihat Halaman</a>
                                        <a href="#" class="text-xs text-yellow-500 hover:underline mr-2">Edit</a>
                                        <form action="#" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs text-red-500 hover:underline" onclick="return confirm('Yakin ingin hapus chapter ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
