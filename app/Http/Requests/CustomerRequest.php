<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "fname" => ["required", "max:255"],
            "lname" => ["required", "max:255"],
            "phone" => ["required", "max:255", 'regex:/^01\d{9}$/'],
            "email" => ["required", "email", "max:255"],
            "about" => ["nullable", "max:5000"],
            "bank" => ["required", "min:10", "max:10"],
            "image" => ["nullable", "image", "max:3000"],
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'phone must be like this: 01043424643'
        ];
    }
}
