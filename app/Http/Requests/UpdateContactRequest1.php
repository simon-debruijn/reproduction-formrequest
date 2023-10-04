<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateContactRequest1 extends FormRequest
{
    public function rules(): array
    {
        return [
            'contactName' => ['required', 'string']
        ];
    }
}
