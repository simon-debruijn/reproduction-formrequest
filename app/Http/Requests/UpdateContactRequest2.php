<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateContactRequest2 extends FormRequest
{
    public function rules(): array
    {
        return [
            'contact.name' => ['required', 'string']
        ];
    }
}
