<?php

namespace Database\Seeders;

use App\Models\{ Mahasiswa, Dosen };
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Mahasiswa::factory(10)->create();
        Dosen::factory(10)->create();
    }
}
