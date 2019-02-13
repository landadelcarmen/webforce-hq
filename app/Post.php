<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [ 'title', 'body', 'slug', 'author_id' ];

    public static function boot() {
        parent::boot();
        static::creating(function (Post $post) {
            $post->slug = mt_rand(1000, 9999).'-'.str_slug($post->title);
        });

        static::updating(function (Post $post) {
            if (request('title')) {
                $post->slug = mt_rand(1000, 9999) . '-' . str_slug($post->title);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags()
    {
        return $this->MorphToMany(Tag::class, 'taggable');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
