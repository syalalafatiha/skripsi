<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'aspek_id',
        'kriteria',
        'nilai_target',
        'factor',
    ];

    public $incrementing = false;

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function getNamaAspekAttribute()
    {
        return $this->aspek->aspek;
    }


    const FACTOR_CORE = 'Core';
    const FACTOR_SECONDARY = 'Secondary';

    public static function getEnumValues()
    {
        return [
            self::FACTOR_CORE,
            self::FACTOR_SECONDARY
        ];
    }

    public function subkriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function hitungs()
    {
        return $this->hasMany(Hitung::class);
    }
}
