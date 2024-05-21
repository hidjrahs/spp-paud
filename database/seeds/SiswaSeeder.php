<?php


namespace Database\Seeds;



use App\Models\Siswa;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::factory()->count(6)->create();
    }
}
