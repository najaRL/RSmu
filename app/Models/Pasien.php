<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    public function kunjungans()
{
    return $this->hasMany(Kunjungan::class);
}
    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];
}