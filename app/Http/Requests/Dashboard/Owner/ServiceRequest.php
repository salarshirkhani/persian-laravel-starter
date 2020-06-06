<?php

namespace App\Http\Requests\Dashboard\Owner;

use Illuminate\Foundation\Http\FormRequest;

abstract class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:4000'],
            'description' => ['required', 'string', 'max:100000'],
        ];
    }
}
