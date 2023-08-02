<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    protected $fillable = ['title', 'description', 'cover_image'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
