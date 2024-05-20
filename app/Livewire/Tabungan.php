<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.app')]

class Tabungan extends Component
{

    #[Rule('required')]
    public $jumlah = '';
    #[Rule('required')]
    public $siswaID = '';
    public $siswa;

    public $saldo = 0;
    public $pesan;
    public function mount()
    {
        $this->siswa = \App\Models\Siswa::query()
            ->get();
    }

    public function store()
    {
        if (getType($this->siswaID) == 'array') {
            // dump(array_keys($this->siswaID));
            $this->siswaID = $this->siswaID['value'];
        }

        // $this->dispatch('idSiswa', $this->siswaID);
        // $this->validate();
        // $this->reset();
        // $this->siswa = \App\Models\Siswa::get();

        $jumlah_bersih = preg_replace("/[,.]/", "", $this->jumlah);
        DB::beginTransaction();
        $tabungan = \App\Models\Tabungan::where('siswa_id', $this->siswaID)->orderBy('created_at', 'desc')->first();
        if ($tabungan != null) {
            $menabung = \App\Models\Tabungan::make([
                'siswa_id' => $this->siswaID,
                'tipe' => 'in',
            ]);
            $menabung->jumlah = $jumlah_bersih;

            $menabung->saldo = $jumlah_bersih + $tabungan->saldo;

            if ($menabung->saldo >= 0) {
                $menabung->save();
                $pesan = 'Berhasil melakukan transaksi';
            } else {
                $pesan = 'Transaksi gagal';
            }
        } else {
            $menabung = \App\Models\Tabungan::make([
                'siswa_id' => $this->siswaID,
                'tipe' => 'in',
            ]);
            $menabung->jumlah = $jumlah_bersih;
            $menabung->saldo = $jumlah_bersih;
            $menabung->save();
            $pesan = 'Berhasil melakukan transaksi';
        }

        //tambahkan tabungan ke keuangan
        $keuangan = \App\Models\Keuangan::orderBy('created_at', 'desc')->first();
        if ($keuangan != null) {

            $jumlah = $keuangan->total_kas + $menabung->jumlah;

        } else {
            $jumlah = $menabung->jumlah;
        }
        $keuangan = \App\Models\Keuangan::create([
            'tabungan_id' => $menabung->id,
            'tipe' => $menabung->tipe,
            'jumlah' => $menabung->jumlah,
            'total_kas' => $jumlah,
            'keterangan' => 'Transaksi tabungan oleh ' . $menabung->siswa->nama . "(" . $menabung->siswa->kelas->nama . ")" .
            ' menabung' . ' sebesar ' . $menabung->jumlah
            . ' pada ' . $menabung->created_at . ' dengan total tabungan ' . $menabung->saldo .
            ((isset($menabung->keperluan)) ? ' dengan catatan: ' . $menabung->keperluan : ''),
        ]);

        if ($keuangan) {
            DB::commit();
            $this->jumlah = '';
            $this->saldo=$menabung->saldo;
            session()->flash('message', 'Transaksi tabungan oleh ' . $menabung->siswa->nama . " (" . $menabung->siswa->kelas->nama . ")" .
                ' menabung' . ' sebesar ' . $menabung->jumlah
                . ' pada ' . $menabung->created_at->isoFormat('dddd, D MMMM Y') . ' dengan total salo: ' . $menabung->saldo);
            // return response()->json(['msg' => $pesan]);
        } else {
            DB::rollBack();
            return redirect()->route('menabung')->with([
                'type' => 'danger',
                'msg' => 'terjadi kesalahan',
            ]);
        }
    }

    public function updatedSiswaID($value)
    {
        if (getType($value) == 'array') {

            $this->siswaID = $value['value'];
        }
        $this->saldo = \App\Models\Tabungan::where('siswa_id', $this->siswaID)->orderBy('created_at', 'desc')->first()->saldo ?? 0;

    }
    // public function updated($poperty,$value)
    // {
    //    dump($poperty);
    //     dump('ini bukan array: ' . $value);
    // }
    public function render()
    {

        // if (getType($this->siswaID) == 'array') {
        //     dump(array_keys($this->siswaID));
        //     $this->siswaID = $this->siswaID['value'];
        // }
        // dump('ini render: ' . $this->siswaID);

        // $tabungan = \App\Models\Tabungan::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.tabungan', [

        ]);
    }

}
