<?php

namespace App\Livewire\Pages;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Tabungan;

class Dashboard extends Component
{
    public function render()
    {
        $total_uang = Keuangan::where('tipe', 'in')->sum('jumlah') - Keuangan::where('tipe', 'out')->sum('jumlah');
        $total_uang_tabungan = Keuangan::where('tipe', 'in')->where('tabungan_id', '!=', 'null')->sum('jumlah') - Keuangan::where('tipe', 'out')->where('tabungan_id', '!=', 'null')->sum('jumlah');
        $total_uang_masuk = Keuangan::where('tipe', 'in')->sum('jumlah');
        $total_uang_keluar = Keuangan::where('tipe', 'out')->sum('jumlah');

        $tabungan = Tabungan::orderBy('created_at', 'desc')->paginate(10);

        $siswa = Siswa::count();
        $item = Tagihan::count();
        $kelas = Kelas::count();

        return view('pages.dashboard', [
            'total_uang' => $total_uang,
            'total_uang_tabungan' => $total_uang_tabungan,
            'total_uang_masuk' => $total_uang_masuk,
            'total_uang_keluar' => $total_uang_keluar,
            'tabungan' => $tabungan,
            'jumlah' => '0',
            'siswa' => $siswa,
            'item' => $item,
            'kelas' => $kelas,
        ]);

        // return view('pages.dashboard');
    }
}
