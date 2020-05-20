<?php

namespace App\Http\Requests\Dashboard\Owner;

use App\Product;
use App\Service;

class ServiceStoreRequest extends ServiceRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Service::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);
    }
}
