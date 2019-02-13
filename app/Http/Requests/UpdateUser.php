<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'string',
            'email' => 'email|unique:users,email',
            'password' => 'string',
            'role' => 'integer|in:1,2'
        ];
    }

    public function update($user)
    {
        return tap($user)->update($this->validated());
    }
}
