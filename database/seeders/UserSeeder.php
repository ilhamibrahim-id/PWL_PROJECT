<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            [
                'username' => '1941720065',
                'password' => bcrypt('12345'),
                'role' => 'mahasiswa'
            ],
            [
                'username' => '987654321',
                'password' => bcrypt('54321'),
                'role' => 'dosen'
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
        ];

        DB::table('users')->insert($user);
    }
}
