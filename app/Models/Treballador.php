<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Treballador extends Authenticatable
{
    use AuthenticableTrait;
    use HasFactory, Notifiable;

    protected $table = 'treballadors';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = [
        'nom_cognoms',
        'email',
        'contrasenya',
        'tipus',
        'darrera_hora_entrada',
        'darrera_hora_sortida',
    ];

    public function getAuthPassword()
    {
        return $this->contrasenya;
    }

    protected $hidden = [
        'contrasenya',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'contrasenya' => 'hashed',
    ];
}
