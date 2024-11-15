<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DareRequestCreate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "dare" => ["required", "string"],
            "author"=> ["required","string"],
        ];
    }

    public function messages(): array
    {
        return [
            "dare.required" => "Youre dare contain no text or challenge.",
            "author.required" => "You need to sign youre dare.",
        ];
    }
}
