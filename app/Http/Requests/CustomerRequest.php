<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "fname" => ["required", "max:255"],
            "lname" => ["required", "max:255"],
            "phone" => ["required", "max:255"],
            "email" => ["required", "email", "max:255"],
            "about" => ["nullable", "max:5000"],
            "bank" => ["required", "min:10", "max:10"],
            "image" => ["nullable", "image", "max:3000"],
        ];
    }
}
