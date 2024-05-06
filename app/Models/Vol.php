<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    public $table = 'vols';
    protected $primaryKey = 'codi_vol';
    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = [
        'codi_vol',
        'codi_model_avio',
        'ciutat_origen',
        'ciutat_destinacio',
        'terminal_origen',
        'terminal_destinacio',
        'data_sortida',
        'data_arribada',
        'hora_sortida',
        'hora_arribada',
        'classe',
    ];
}
