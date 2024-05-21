<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'periode_id',
        'nama',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
    // public function tabungan()
    // {
    //     return $this->hasManyThrough(Tabungan::class, Siswa::class,'id', 'siswa_id');
    // }
    public function periode()
    {
        return $this->hasOne('App\Models\Periode', 'id', 'periode_id');
    }
}
