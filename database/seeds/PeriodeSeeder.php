<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode::create([
            'nama' => 'Semester 1',
            'tgl_mulai' => '2023-01-01',
            'tgl_selesai' => '2024-01-31',
            'is_active' => true,
        ], [
            'nama' => 'Semester 2',
            'tgl_mulai' => '2024-01-31',
            'tgl_selesai' => '2021-01-1',
            'is_active' => true,
        ]);
    }
}

