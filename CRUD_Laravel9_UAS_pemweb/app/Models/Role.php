<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Nama tabel yang terhubung dengan model Role
    protected $primaryKey = 'id'; // Nama primary key dari tabel roles

    // Daftar kolom yang dapat diisi (fillable) pada model Role
    protected $fillable = [
        'name',
    ];

    // Relationship untuk menghubungkan model Role dengan model User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}