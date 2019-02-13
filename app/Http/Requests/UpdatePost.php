<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title' => 'sometimes|string|required',
            'body' => 'sometimes|string|required',
            'tags' => 'array|nullable'
        ];
    }

    public function update(\App\Post $post)
    {
        $tags = collect($this->tags)->map( function($tag) {
            if(is_array($tag)) {
                return $tag['id'];
            }
            return \App\Tag::create(['title' => $tag])->id;
        });

        $post->update($this->except('tags'));

        $post->tags()->sync($tags);

        return $post->fresh();
    }
}
