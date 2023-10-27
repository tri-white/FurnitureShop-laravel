<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $guard = 'admin';

    protected $fillable = [
        'username', 'password',
    ];
    
    protected $hidden = [
      'password',
    ];
}