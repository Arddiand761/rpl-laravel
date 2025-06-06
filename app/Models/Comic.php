<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- Tambahkan ini


class Comic extends Model
{
     use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'description',
        'cover_image',
        'status', // Mungkin 'status' (Ongoing, Completed) lebih relevan untuk komik digital?
    ];

    // Relasi ke Chapter
    public function chapters(): HasMany // <-- Tambahkan ini
    {
        return $this->hasMany(Chapter::class)->orderBy('order', 'asc')->orderBy('chapter_number', 'asc');
    }
}
