<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class faq extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            'pertanyaan' => 'Pertanyaan 1',
            'jawaban' => 'Jawaban 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('faq')->insert([
            'pertanyaan' => 'Pertanyaan 2',
            'jawaban' => 'Jawaban 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}