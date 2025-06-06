<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;       // <-- Tambahkan ini
use Illuminate\Http\RedirectResponse; // <-- Tambahkan ini

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View  // <--- SESUAIKAN INI
     */
    public function index(): View // <-- Anda juga bisa menambahkan ini (PHP 7.4+)
    {
       // Pastikan menggunakan paginate() bukan get()
    $comics = Comic::orderBy('created_at', 'desc')
                   ->paginate(12); // Menggunakan paginate
    // dd($comics); // Untuk debugging, bisa di-uncomment sementara
    return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View  // <--- SESUAIKAN INI
     */
    public function create(): View // <-- Opsional (PHP 7.4+)
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse // <--- SESUAIKAN INI
     */
    public function store(Request $request): RedirectResponse // <-- Opsional (PHP 7.4+)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:Ongoing,Completed,Hiatus', // <--- VALIDASI UNTUK STATUS
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $validatedData['cover_image'] = $path;
        }

        Comic::create($validatedData);

        return redirect()->route('comics.index')
            ->with('success', 'Komik berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Contracts\View\View  // <--- SESUAIKAN INI
     */
    public function show(Comic $comic): View // <-- Opsional (PHP 7.4+)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Contracts\View\View  // <--- SESUAIKAN INI
     */
    public function edit(Comic $comic): View // <-- Opsional (PHP 7.4+)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\RedirectResponse // <--- SESUAIKAN INI
     */
    public function update(Request $request, Comic $comic): RedirectResponse // <-- Opsional (PHP 7.4+)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:Ongoing,Completed,Hiatus', // <--- VALIDASI UNTUK STATUS (bukan stock)
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($comic->cover_image) {
                Storage::disk('public')->delete($comic->cover_image);
            }
            $path = $request->file('cover_image')->store('covers', 'public');
            $validatedData['cover_image'] = $path;
        }

        $comic->update($validatedData);

        return redirect()->route('comics.index')
            ->with('success', 'Data komik berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\RedirectResponse // <--- SESUAIKAN INI
     */
    public function destroy(Comic $comic): RedirectResponse // <-- Opsional (PHP 7.4+)
    {
        if ($comic->cover_image) {
            Storage::disk('public')->delete($comic->cover_image);
        }

        $comic->delete();

        return redirect()->route('comics.index')
            ->with('success', 'Komik berhasil dihapus!');
    }
}
