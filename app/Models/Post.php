<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //fillable
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function($post) {
            $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        });

        static::updating(function($post) {
            $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        });
    }


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
