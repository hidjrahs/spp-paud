<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tabungan extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tabungan';

    protected $fillable = [
        'siswa_id',
        'tipe',
        'jumlah',
        'saldo',
        'keperluan',
    ];

    // public function siswa()
    // {
    //     return $this->belongsTo('App\Models\Siswa', 'siswa_id', 'id');
    // }
    public function siswa()
{
    return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
}
public function tabungan()
{
    return $this->hasMany(Tabungan::class, 'siswa_id', 'id');
}
    public function keuangan()
    {
        return $this->hasOne('App\Models\Keuangan', 'tabungan_id', 'id');
    }
}
