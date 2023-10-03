<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_administrador',
        'email_administrador',
        'password_administrador',
    ];

    protected $hidden = [
        'password_administrador',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
