<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]

class Tabungan extends Component
{

    #[Rule('required')]
    public $jumlah = 0;
    #[Rule('required')]
    public $siswaID = 1;
    public $siswa;
    public function mount()
    {
        $this->siswa = \App\Models\Siswa::get();
    }

    public function store()
    {
        if (getType($this->siswaID) == 'array') {
            // dump(array_keys($this->siswaID));
            $this->siswaID = $this->siswaID['value'];
        }

        // $this->dispatch('idSiswa', $this->siswaID);
        dump($this->validate());
        // $this->reset();
        // $this->siswa = \App\Models\Siswa::get();
    }
    // #[On('idSiswa')]
    public function updatedSiswaID($value)
    {
         if (getType($value) == 'array') {

            $this->siswaID = $value['value'];;
        }
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
