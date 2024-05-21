<?php


namespace Database\Seeds;


use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = ['Kelas 1', 'Kelas 2', 'Kelas 3', 'Kelas 4', 'Kelas 5', 'Kelas 6'];
        foreach ($kelas as $kelas) {
            \App\Models\Kelas::create([
                'nama' => $kelas,
                'periode_id' => 1,
                'created_at' => now(),
            ]);
        }

    }
}
