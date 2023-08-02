<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Buat role 'admin' jika belum ada di tabel roles
        $role = DB::table('roles')->where('name', 'admin')->first();
        if (!$role) {
            DB::table('roles')->insert([
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Tambahkan user admin ke tabel users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'role_id' => $role->id,
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'), // Ganti 'password' dengan password yang diinginkan
            'role_id' => $role->id,
        ]);
    }
}
