<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|required',
            'body' => 'string|required',
            'tags' => 'array|nullable'
        ];
    }

    public function store()
    {
        $tags = collect($this->tags)->map( function($tag) {
            if(is_array($tag)) {
                return $tag['id'];
            }
            return \App\Tag::create(['title' => $tag])->id;
        });

        $post = \App\Post::create([
            'author_id' => auth()->id(),
            'title' => $this->title,
            'body' => $this->body
        ]);

        $post->tags()->sync($tags);

        return $post;
    }
}
