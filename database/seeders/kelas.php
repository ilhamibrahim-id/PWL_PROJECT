<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class kelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas =[
            [
                'id_kelas' => 'TI-1A',
                'nama_kelas' => 'TI-1A',
            ],
            [
                'id_kelas' => 'TI-1B',
                'nama_kelas' => 'TI-1B',
            ],
            [
                'id_kelas' => 'TI-1C',
                'nama_kelas' => 'TI-1C',
            ],
            [
                'id_kelas' => 'TI-2A',
                'nama_kelas' => 'TI-2A',
            ],
            [
                'id_kelas' => 'TI-2B',
                'nama_kelas' => 'TI-2B',
            ],
            [
                'id_kelas' => 'TI-2C',
                'nama_kelas' => 'TI-2C',
            ],
            [
                'id_kelas' => 'TI-3A',
                'nama_kelas' => 'TI-3A',
            ],
            [
                'id_kelas' => 'TI-3B',
                'nama_kelas' => 'TI-3B',
            ],
            [
                'id_kelas' => 'TI-3C',
                'nama_kelas' => 'TI-3C',
            ],
            [
                'id_kelas' => 'TI-4A',
                'nama_kelas' => 'TI-4A',
            ],
            [
                'id_kelas' => 'TI-4B',
                'nama_kelas' => 'TI-4B',
            ],
            [
                'id_kelas' => 'TI-4C',
                'nama_kelas' => 'TI-4C',
            ],
        ];
            DB::table('table_kelas')->insert($kelas);
        }
    }

