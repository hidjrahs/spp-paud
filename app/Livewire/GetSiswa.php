<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;

class GetSiswa extends Component
{
    public $siswa;

    public function mount($siswa){

        $this->siswa = $siswa;
        // dump($siswa);
        // $this->siswa = Siswa::get();
    }
    public function render()
    {

        // if(getType($this->siswaID) == 'array'){
        //     dump( array_keys($this->siswaID));
        //     $this->siswaID = $this->siswaID['value'];
        // }
        // dump(isSet($this->siswaID)??$this->siswaID);
        return view('components.get-siswa');
    }
}
