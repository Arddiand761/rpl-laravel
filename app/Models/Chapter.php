<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Chapter extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'comic_id',
        'chapter_number',
        'title',
        'order',
    ];

    // Relasi ke Comic
    public function comic(): BelongsTo // <-- Tambahkan ini
    {
        return $this->belongsTo(Comic::class);
    }


    // Nanti kita tambahkan relasi ke Pages di sini
    // public function pages(): HasMany
    // {
    //     return $this->hasMany(Page::class)->orderBy('page_number', 'asc');
    // }
}
