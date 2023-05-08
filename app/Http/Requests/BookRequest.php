<?php

namespace App\Http\Requests;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books')->where(function ($query) {
                    return $query->where('author_id', Author::firstOrCreate(['name' => $this->input('author_name')])->id);
                }),
            ],
            'author_name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'This book already exists for this author.',
        ];
    }
}
