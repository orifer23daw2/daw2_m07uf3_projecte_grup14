<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $table = 'clients';
    protected $primaryKey = 'passaport_client';
    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = [
        'passaport_client',
        'nom_cognoms',
        'edat',
        'telefon',
        'adreca',
        'ciutat',
        'pais',
        'email',
        'tipus_targeta',
        'numero_targeta',
    ];
}
