<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'auther' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'auther.required' => 'The Auther Name is required.',
            'auther.string' => 'The Auther Name must be a string.',
            'auther.max' => 'The Auther Name cannot be longer than 255 characters.',
            'title.required' => 'The Blog Title is required.',
            'title.string' => 'The Blog Title must be a string.',
            'title.max' => 'The Blog Title cannot be longer than 255 characters.',
            'content.required' => 'The Content is required.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category does not exist.',
            'image.image' => 'Blog Image is required.',
            'image.mimes' => 'The Image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The Imge cannot be larger than 2MB.',
        ];
    }
}
