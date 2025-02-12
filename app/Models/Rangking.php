<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangking extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'nilai_akhir',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function gap_kompetensi()
    {
        return $this->belongsTo(Gap::class);
    }
}
