<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeightTarget extends Model
{
    use HasFactory;
    protected $table = 'weight_target';

    protected $fillable = [
        'user_id',
        'target_weight',

    ];

    // 関連
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
