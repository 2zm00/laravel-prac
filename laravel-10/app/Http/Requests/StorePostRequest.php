<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest 
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:200'],
            'body' => ['nullable', 'string', 'max:20000'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}

// Request 요청사항 체크하나?