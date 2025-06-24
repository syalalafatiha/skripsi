<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hitung extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'aspek_id',
        'kriteria_id',
        'sub_kriteria_id',
        'nilai',
        'nilai_target',
        'gap',
        'bobot_gap',
        'core_factor',
        'secondary_factor',
        'nilai_total',
        'rangking'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class, 'aspek_id', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function setNilaiTargetAttribute($value)
    {
        $kriteria = Kriteria::find($this->kriteria_id);
        $this->attributes['nilai_target'] = $kriteria->nilai_target;
    }
}
