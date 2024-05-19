<?php

namespace Database\Factories;

use App\Models\Tabungan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tabungan>
 */
class TabunganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = rand(1, 100);
        $nabung = rand(10000, 20000);
        $saldo = Tabungan::where('tipe', 'in')->where('siswa_id', $id)->sum('jumlah');
        return [

            'siswa_id' => $id,
            'tipe' => 'in',
            'jumlah' => $nabung,
            'saldo' => $saldo + $nabung,
            'keperluan' => 'Tabungan',

            //   [
            //         'siswa_id' => $id,
            //         'tipe' => 'out',
            //         'jumlah' => 500,
            //         'saldo' => 500,
            //         'keperluan' => 'Pengeluaran',
            //     ];
        ];
    }
}
