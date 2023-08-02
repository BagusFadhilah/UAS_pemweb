<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['title', 'chapter_number', 'content', 'page_count', 'image', 'komik_id'];

    public function komik()
    {
        return $this->belongsTo(Komik::class);
    }

    public function chapterImages()
    {
        return $this->hasMany(ChapterImage::class);
    }
}
