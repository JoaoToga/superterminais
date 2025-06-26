<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // importante usar esse para auth
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Empresa extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'empresas';

    protected $fillable = [
        'email',
        'nome',
        'pass',
    ];

    protected $hidden = [
        'pass',
    ];

    // Se o campo de senha no banco for 'pass', vamos usar um accessor para ele funcionar como password padrão
    public function getAuthPassword()
    {
        return $this->pass;
    }
}
