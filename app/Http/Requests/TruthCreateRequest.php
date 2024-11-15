<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruthCreateRequest extends FormRequest
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
            "truth" => ["required", "string"],
            "author"=> ["required","string"],
        ];
    }

    public function messages(): array
    {
        return [
            "truth.required" => "Youre truth contain no text.",
            "author.required" => "You need to sign youre truth.",
        ];
    }
}
