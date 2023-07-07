<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class infokos_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infokos')->insert([
            'link_kos_jbr' => 'https://example.com/link_kos_jbr',
            'link_kos_bws' => 'https://example.com/link_kos_bws',
            'link_tanggapan' => 'https://example.com/link_tanggapan',
            'link_kebijakankampus' => 'https://example.com/link_kebijakankampus',
            'nama_cp' => 'Nama CP',
            'link_contact' => 'https://example.com/link_contact',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}