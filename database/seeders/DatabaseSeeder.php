<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nama' => 'Nurul Mustofa',
            'email' => 'nioke8090@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'alamat' => 'Dusun Krajan RT 08 RW 03 Desa Banyuanyar Lor Gending Probolinggo',
            'no_telp' => '085161644408',
            'level' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
