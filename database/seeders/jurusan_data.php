<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jurusan_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusanData = [
            [
                'nama_jurusan' => 'Produksi Pertanian',
            ],
            [
                'nama_jurusan' => 'Teknologi Pertanian',
            ],
            [
                'nama_jurusan' => 'Peternakan',
            ],
            [
                'nama_jurusan' => 'Manajemen Agribisnis',
            ],
            [
                'nama_jurusan' => 'Teknologi Informasi',
            ],
            [
                'nama_jurusan' => 'Bahasa, Komunikasi Dan Pariwisata',
            ],
            [
                'nama_jurusan' => 'Kesehatan',
            ],
            [
                'nama_jurusan' => 'Teknik',
            ],
        ];

        foreach ($jurusanData as $data) {
            Jurusan::create($data);
        }
    }
}