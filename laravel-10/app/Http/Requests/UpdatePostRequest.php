<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest 
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:200'],
            'body' => ['sometimes', 'nullable', 'string', 'max:20000'],
            'published_at' => ['sometimes', 'nullable', 'date'],

        ];
    }
}