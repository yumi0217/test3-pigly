<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 関連
    public function weightTarget()
    {
        return $this->hasOne(WeightTarget::class);
    }

    public function weightLogs()
    {
        return $this->hasMany(WeightLog::class);
    }
}
