{{-- resources/views/comics/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold leading-tight tracking-tight text-gray-800 dark:text-gray-100">
                {{ __('📚 Daftar Komik Pilihan') }}
            </h2>
            <a href="{{ route('comics.create') }}"
                class="px-5 py-2 font-semibold text-white transition-all duration-200 rounded-lg shadow bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Komik Baru
                </span>
            </a>
        </div>
    </x-slot>

    <div
        class="py-12 bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-[#10101a] dark:via-[#181826] dark:to-[#1a1a2e] min-h-[80vh]">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="relative px-4 py-3 mb-6 text-sm text-green-100 bg-green-600 border border-green-700 rounded-lg shadow-md dark:bg-green-700 dark:border-green-600 dark:text-green-50"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($comics->isEmpty())
                <div
                    class="flex flex-col items-center justify-center min-h-[400px] p-8 py-16 text-center bg-white/80 rounded-xl shadow-2xl dark:bg-gray-800/80">
                    <svg class="mb-6 text-gray-300 w-28 h-28 dark:text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 9.75l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 15.75h16.5m-16.5 3.75h16.5M3.75 8.25h16.5M3.75 4.5h16.5" />
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold text-gray-700 dark:text-gray-200">
                        Yah, Belum Ada Komik di Rak!
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        Saat ini belum ada koleksi komik yang bisa ditampilkan.
                    </p>
                    <p class="mt-8">
                        <a href="{{ route('comics.create') }}"
                            class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition-all duration-200 rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                            <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            Tambahkan Komik Pertamamu
                        </a>
                    </p>
                </div>
            @else
                <div class="flex flex-wrap justify-start gap-8">
                    @foreach ($comics as $comic)
                        <div
                            class="w-[280px] flex flex-col overflow-hidden bg-white/90 dark:bg-[#181826]/90 shadow-xl group rounded-2xl hover:shadow-2xl hover:-translate-y-2 ring-1 ring-gray-200 dark:ring-gray-700 p-4 transition-all duration-300 ease-in-out">
                            <a href="{{ route('comics.show', $comic->id) }}" class="block overflow-hidden rounded-xl">
                                @if ($comic->cover_image)
                                    <img src="{{ asset('storage/' . $comic->cover_image) }}"
                                        alt="Sampul {{ $comic->title }}"
                                        class="object-cover w-full rounded-xl aspect-[2/3] group-hover:scale-105 transition-transform duration-500 ease-in-out shadow-md">
                                @else
                                    <div
                                        class="flex flex-col items-center justify-center w-full rounded-xl aspect-[2/3] bg-gradient-to-br from-gray-200 via-gray-300 to-gray-400 dark:from-[#23233a] dark:via-[#181826] dark:to-[#10101a] dark:text-gray-400">
                                        <svg class="mb-2 w-14 h-14 opacity-60" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="text-xs text-center opacity-80">Sampul tidak tersedia</p>
                                    </div>
                                @endif
                            </a>
                            <div class="flex flex-col flex-grow p-2">
                                <h3 class="mb-1 text-base font-bold leading-tight text-gray-800 truncate dark:text-gray-50"
                                    title="{{ $comic->title }}">
                                    <a href="{{ route('comics.show', $comic->id) }}"
                                        class="transition-colors hover:text-blue-600 dark:hover:text-blue-400">
                                        {{ $comic->title }}
                                    </a>
                                </h3>
                                <p class="text-xs text-gray-600 truncate dark:text-gray-300"
                                    title="{{ $comic->author }}">
                                    <span
                                        class="font-semibold text-blue-700 dark:text-blue-300">{{ $comic->author }}</span>
                                </p>
                                <p class="mt-1 mb-2 text-xs text-gray-500 dark:text-gray-400">Status:
                                    <span
                                        class="font-semibold text-gray-700 dark:text-gray-200">{{ $comic->status ?? 'N/A' }}</span>
                                </p>
                                <div
                                    class="flex items-center gap-2 pt-3 mt-auto text-xs border-t border-gray-200 dark:border-gray-700">
                                    <a href="{{ route('comics.show', $comic->id) }}"
                                        class="flex-1 px-3 py-1 font-medium text-center text-white transition-all rounded-md bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-700 dark:to-blue-900 hover:from-blue-600 hover:to-blue-800 dark:hover:from-blue-800 dark:hover:to-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 dark:focus:ring-offset-gray-900">Detail</a>
                                    <a href="{{ route('comics.edit', $comic->id) }}"
                                        class="p-2 font-medium text-gray-700 transition-colors bg-yellow-300 rounded-md hover:bg-yellow-400 dark:bg-yellow-400 dark:text-gray-900 dark:hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-1 dark:focus:ring-offset-gray-900"
                                        title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus komik ini?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 font-medium text-white transition-colors bg-red-500 rounded-md hover:bg-red-600 dark:bg-red-700 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 dark:focus:ring-offset-gray-900"
                                            title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($comics->hasPages())
                    <div class="flex justify-center mt-12">
                        {{ $comics->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
