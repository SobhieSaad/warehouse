<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateTaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'manufacturer' => [
                'required', 'string',
            ],
            'quantity' => [
                'required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            ],
            'expiry_date' => [
                'required', 'date',
            ],
            'image' => [
                'required', 'string',
            ]

        ];
    }

    public function authorize()
    {
        return Gate::allows('item_access');
    }
}
