<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];

    public function commentwriter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
