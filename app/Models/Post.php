<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //fillable
    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'user_id',
    ];

    // public static function boot() {
    //     parent::boot();

    //     static::creating(function($post) {
    //         $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
    //     });

    // }



    public function scopeStatus($query, $bool){
        return $query->where('active', $bool);
    }


    public function scopeSelectById($query, $id) {
        return $query->where('id', $id );
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postwriter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(comments::class, 'post_id', 'id');
    }
}
