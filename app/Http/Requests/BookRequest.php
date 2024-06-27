<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book.title' => 'required|string|max:255',
            'book.author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'book.title.required' => 'タイトルは必須です。',
            'book.author.required' => '作者は必須です。',
            'image.image' => 'ファイルは画像形式である必要があります。',
            'image.mimes' => '画像形式はjpeg、png、jpg、gifのみです。',
            'image.max' => '画像の最大サイズは2MBです。',
        ];
    }
}
