<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class prodi_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiData = [
            [
                'nama_prodi' => 'D-III Produksi Tanaman Holtikultura',
            ],
            [
                'nama_prodi' => 'D-III Produksi Tanaman Perkebunan',
            ],
            [
                'nama_prodi' => 'D-III Teknologi Industri Pangan',
            ],
            [
                'nama_prodi' => 'D-III Produksi Ternak',
            ],
            [
                'nama_prodi' => 'D-III Manajemen Agribisnis',
            ],
            [
                'nama_prodi' => 'D-III Keteknikan Pertanian',
            ],
            [
                'nama_prodi' => 'D-III Manajemen Informatika',
            ],
            [
                'nama_prodi' => 'D-III Teknik Komputer',
            ],
            [
                'nama_prodi' => 'D-III Bahasa Inggris Terapan',
            ],
            [
                'nama_prodi' => 'D-IV Akuntansi Sektor Publik',
            ],
            [
                'nama_prodi' => 'D-IV Gizi Klinik',
            ],
            [
                'nama_prodi' => 'D-IV Teknik Energi Terbarukan',
            ],
            [
                'nama_prodi' => 'D-IV Mesin Otomotif',
            ],
            [
                'nama_prodi' => 'D-IV Teknik Produksi Benih',
            ],
            [
                'nama_prodi' => 'D-IV Teknologi Produksi Tanaman Pangan',
            ],
            [
                'nama_prodi' => 'D-IV Budidaya Tanaman Perkebunan',
            ],
            [
                'nama_prodi' => 'D-IV Teknologi Rekayasa Pangan',
            ],
            [
                'nama_prodi' => 'D-IV Manajemen Bisnis Unggas',
            ],
            [
                'nama_prodi' => 'D-IV Manajemen Agro Industri',
            ],
            [
                'nama_prodi' => 'D-IV Teknik Informatika',
            ],
            [
                'nama_prodi' => 'D-IV Rekam Medik',
            ],
        ];

        foreach ($prodiData as $data) {
            Prodi::create($data);
        }
    }
}