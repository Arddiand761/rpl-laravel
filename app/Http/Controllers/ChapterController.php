<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;


class ChapterController extends Controller
{
     /**
     * Show the form for creating a new chapter for a specific comic.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Comic $comic): View
    {
        // Mengirimkan instance $comic ke view agar kita tahu chapter ini untuk komik mana
        return view('chapters.create', compact('comic'));
    }

    /**
     * Store a newly created chapter in storage for a specific comic.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Comic $comic): RedirectResponse
    {
        $validatedData = $request->validate([
            'chapter_number' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer', // Opsional, bisa di-generate otomatis jika kosong
        ]);

        // Buat chapter baru yang berelasi dengan $comic
        $chapter = new Chapter($validatedData);
        $chapter->comic_id = $comic->id; // Pastikan comic_id di-set

        // Jika order tidak diisi, kita bisa set default atau hitung berikutnya
        if (!isset($validatedData['order'])) {
            $chapter->order = ($comic->chapters()->max('order') ?? 0) + 1;
        }

        $chapter->save();

        // Redirect ke halaman detail komik atau halaman daftar chapter komik tersebut
        // Untuk sekarang, kita redirect ke halaman form tambah chapter lagi dengan pesan sukses
        return redirect()->route('chapters.create', $comic->id)
                         ->with('success', 'Chapter berhasil ditambahkan untuk komik ' . $comic->title . '!');
    }
}
