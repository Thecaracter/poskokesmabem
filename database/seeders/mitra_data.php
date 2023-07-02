<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mitra_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitra')->insert([
            [
                'link_mitra' => 'https://example.com/mitra1',
                'nama_cp' => 'John Doe',
                'link_cp' => 'https://example.com/johndoe',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}