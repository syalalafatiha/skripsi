<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'aspek',
        'bobot',
        'factor'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    const FACTOR_CORE = 'Core';
    const FACTOR_SECONDARY = 'Secondary';

    public static function getEnumValues()
    {
        return [
            self::FACTOR_CORE,
            self::FACTOR_SECONDARY
        ];
    }

    public function aspeks()
    {
        return $this->hasMany(Aspek::class);
    }

    public function kriterias()
    {
        return $this->hasMany(Kriteria::class);
    }

    public function sub_kriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }

    // public function hitungs()
    // {
    //     return $this->hasMany(Hitung::class);
    // }

    public function gaps()
    {
        return $this->hasMany(Gap::class);
    }

    public function ideals()
    {
        return $this->hasMany(Ideal::class);
    }
}
