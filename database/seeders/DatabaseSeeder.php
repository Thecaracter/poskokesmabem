<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            user_data::class,
            jurusan_data::class,
            angkatan_data::class,
            prodi_data::class,
            layanan_data::class,
            infokos_data::class,
            Advokasi_data::class,
            faq::class,
        ]);
    }
}