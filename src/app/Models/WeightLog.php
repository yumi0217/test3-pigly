<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeightLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content',
    ];

    protected $casts = [
        'date' => 'date',
        'exercise_time' => 'datetime:H:i:s',
    ];

    // 関連
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
