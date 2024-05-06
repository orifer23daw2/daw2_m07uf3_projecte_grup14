<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';
    protected $primaryKey = ['passaport_client', 'codi_vol'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'passaport_client',
        'codi_vol',
        'localitzador',
        'numero_seient',
        'equipatge_ma',
        'equipatge_cabina',
        'quantitat_equipatges',
        'tipus_assegurança',
        'preu_vol',
        'tipus_checking',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'passaport_client', 'passaport_client');
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class, 'codi_vol', 'codi_vol');
    }
}
