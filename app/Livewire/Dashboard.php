<?php

namespace App\Livewire;

use App\Models\Kelas;
use App\Models\Keuangan;
use App\Models\Tabungan;
use App\Models\Tagihan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Dashboard extends Component
{

    public function render()
    {
        $total_uang = Keuangan::where('tipe', 'in')->sum('jumlah') - Keuangan::where('tipe', 'out')->sum('jumlah');
        $total_uang_masuk = Keuangan::where('tipe', 'in')->sum('jumlah');
        $total_uang_tabungan = Keuangan::where('tipe', 'in')->where('tabungan_id', '!=', 'null')->sum('jumlah') - Keuangan::where('tipe', 'out')->where('tabungan_id', '!=', 'null')->sum('jumlah');
        $total_uang_keluar = Keuangan::where('tipe', 'out')->sum('jumlah');

        $tabungan = Tabungan::orderBy('created_at', 'desc')->paginate(5);

        // $siswa = Siswa::count();
        $siswa = \App\Models\Tabungan::select('siswa_id')->groupBy('siswa_id')->get()->count();
        $item = Tagihan::count();
        // $kelas = Kelas::with('siswa.tabungan')->get();
        $saldoAkhir = DB::table('tabungan')->select('siswa_id', DB::raw('MAX(id) as max_id'))
            ->groupBy('siswa_id');
            $kelas = Kelas::with('siswa.tabungan')
            ->get();
        // $kelas = Kelas::with(['siswa.tabungan' => function($query) {
        //     $query->selectRaw('siswa_id, sum(saldo) as total_saldo')
        //           ->groupBy('siswa_id');
        // }])->get();
        // $kelas = Kelas::withCount(['siswa', 'tabungan'])->get();
        // $kelas = Kelas::select('kelas.id', 'kelas.nama')
        //     ->leftJoin('siswa', 'siswa.kelas_id', '=', 'kelas.id')
        //     ->leftJoin('tabungan', 'tabungan.siswa_id', '=', 'siswa.id')
        //     ->selectRaw('kelas.id, kelas.nama, SUM(tabungan.saldo) as total_saldo')
        //     ->groupBy('kelas.id', 'kelas.nama')
        //     ->get();
        // $inkelas = Kelas::with(['siswa.tabungan' => function ($query) {
        //     $query->where('tipe', 'in');
        // }])->get();
        // $outkelas = Kelas::with(['siswa.tabungan' => function ($query) {
        //     $query->where('tipe', 'out');
        // }])->get();
        // $dataout = $outkelas->map(function ($outkelas) {
        //     $total = $outkelas->siswa->reduce(function ($carry, $siswa) {
        //         $sum = $siswa->tabungan->sum('jumlah');
        //         return $carry + $sum;
        //     }, 0);
        //     return [
        //         'nama_kelas' => $outkelas->nama,
        //         'total' => $total,
        //     ];
        // });

        // $datain = $inkelas->map(function ($inkelas) {
        //     $total = $inkelas->siswa->reduce(function ($carry, $siswa) {
        //         $sum = $siswa->tabungan->sum('jumlah');
        //         return $carry + $sum;
        //     }, 0);

        //     return [
        //         'nama_kelas' => $inkelas->nama,
        //         'total' => $total,
        //     ];
        // });
        // $datainIndexed = $datain->keyBy('nama_kelas')->all();
        // $dataoutIndexed = $dataout->keyBy('nama_kelas')->all();

// Mengurangi datain dengan dataout
        // $difference = collect($datainIndexed)->map(function ($item, $key) use ($dataoutIndexed) {
        //     $outTotal = isset($dataoutIndexed[$key]) ? $dataoutIndexed[$key]['total'] : 0;
        //     return [
        //         'nama_kelas' => $key,
        //         'total' => $item['total'] - $outTotal,
        //     ];
        // });
        // dd($total_uang_masuk, $difference);
        return view('livewire.dashboard', [
            'total_uang' => format_idr($total_uang),
            'total_uang_tabungan' => $total_uang_tabungan,
            'total_uang_masuk' => $total_uang_masuk,
            'total_uang_keluar' => $total_uang_keluar,
            'tabungan' => $tabungan,
            'jumlah' => '0',
            'siswa' => $siswa,
            'item' => $item,
            'kelas' => $kelas,

        ]);
    }
}
