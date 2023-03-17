<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function comments() {
        return $this->hasMany(comments::class);
    }


    public function scopeStatus($query, $bool){
        return $query->where('active', $bool);
    }


    public function scopeSelectById($query, $id) {
        return $query->where('id', $id );
    }
}
