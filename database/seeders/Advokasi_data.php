<?php

namespace Database\Seeders;

use App\Models\LayananAdvokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Advokasi_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layananAdvokasiData = [
            [
                'nama' => 'Rizqi',
                'no_telp' => '08883662780',
                'kritik_saran' => 'Lorem ipsum dolor sit amet',
                'angkatan_id' => 1,
                'jurusan_id' => 1,
                'prodi_id' => 1,
                'layanan_id' => 1,
            ],
            [
                'nama' => 'Jane Smith',
                'no_telp' => '0863552176319',
                'kritik_saran' => 'Lorem ipsum dolor sit amet',
                'angkatan_id' => 2,
                'jurusan_id' => 2,
                'prodi_id' => 2,
                'layanan_id' => 2,

            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke dalam tabel layanan_advokasi
        foreach ($layananAdvokasiData as $data) {
            LayananAdvokasi::create($data);
        }
    }
}