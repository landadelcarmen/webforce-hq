<?php

namespace App\Filters;

class PostsFilter extends Filters
{
    public $filters = [ 'autor', 'etiqueta' ];

    protected function autor($author_id)
    {
        $this->builder->where('author_id', $author_id);
    }

    protected function etiqueta($tag_id)
    {
        $this->builder->join('taggables', 'taggables.taggable_id', 'posts.id')
                      ->join('tags', 'tags.id', 'taggables.tag_id')
                      ->where('taggables.taggable_type', 'App\Post')
                      ->where('tags.id', $tag_id)
                      ->select('posts.*');
    }



}