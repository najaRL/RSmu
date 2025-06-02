<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    public function kunjungans()
{
    return $this->hasMany(Kunjungan::class);
}

    protected $fillable = [
        'nama',
        'spesialis',
        'jadwal_praktek',
        'no_str',
    ];
}
