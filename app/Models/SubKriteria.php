<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriterias';
    protected $fillable = [
        'id',
        'kriteria_id',
        'sub_kriteria',
        'nilai',
    ];

    public $incrementing = false;

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function hitung()
    {
        return $this->hasMany(Hitung::class);
    }
}
