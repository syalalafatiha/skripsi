<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'universitas',
        'prodi',
        'alamat',
        'ukt',
    ];

    public function hitungs()
    {
        return $this->hasMany(Hitung::class);
    }

    public function rangking()
    {
        return $this->hasMany(Rangking::class);
    }
}
