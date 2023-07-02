<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class angkatan_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $angkatanData = [
            [
                'tahun_angkatan' => 2020,
            ],
            [
                'tahun_angkatan' => 2021,
            ],
            [
                'tahun_angkatan' => 2022,
            ],
        ];

        foreach ($angkatanData as $data) {
            Angkatan::create($data);
        }
    }
}