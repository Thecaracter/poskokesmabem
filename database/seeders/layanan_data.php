<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class layanan_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layananData = [
            [
                'nama_layanan' => 'Kartu Tanda Mahasiswa (KTM)',
            ],
            [
                'nama_layanan' => 'Sarana Prasarana',
            ],
            [
                'nama_layanan' => 'Pembangunan',
            ],
            [
                'nama_layanan' => 'Jas Lab',
            ],
            [
                'nama_layanan' => 'Uang Kuliah Tunggal (UKT)',
            ],
        ];

        foreach ($layananData as $data) {
            Layanan::create($data);
        }
    }
}