{{-- resources/views/comics/index.blade.php --}}
<x-app-layout> {{-- Asumsi kamu menggunakan layout default Breeze/Jetstream (app-layout) --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Daftar Komik') }}
            </h2>
            <a href="{{ route('comics.create') }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-600">
                Tambah Komik Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Tampilkan pesan sukses jika ada --}}
            @if (session('success'))
                <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded shadow" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($comics->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400">Belum ada data komik.</p>
                    @else
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($comics as $comic)
                                <div class="overflow-hidden rounded-lg shadow-md bg-gray-50 dark:bg-gray-700">
                                    @if ($comic->cover_image)
                                        <img src="{{ asset('storage/' . $comic->cover_image) }}" alt="{{ $comic->title }}" class="object-cover w-full h-64">
                                    @else
                                        <div class="flex items-center justify-center w-full h-64 bg-gray-200 dark:bg-gray-600">
                                            <span class="text-gray-400 dark:text-gray-500">Tidak ada gambar</span>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h3 class="mb-1 text-lg font-semibold truncate" title="{{ $comic->title }}">{{ $comic->title }}</h3>
                                        <p class="mb-1 text-sm text-gray-600 dark:text-gray-400">Penulis: {{ $comic->author }}</p>
                                        <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Stok: {{ $comic->stock }}</p>
                                        <div class="flex flex-wrap gap-2 text-xs">
                                            <a href="{{ route('comics.show', $comic->id) }}" class="px-3 py-1 text-white bg-blue-500 rounded-md hover:bg-blue-600">Detail</a>
                                            <a href="{{ route('comics.edit', $comic->id) }}" class="px-3 py-1 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komik ini?');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Jika menggunakan pagination --}}
                        {{-- <div class="mt-6">
                            {{ $comics->links() }}
                        </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
