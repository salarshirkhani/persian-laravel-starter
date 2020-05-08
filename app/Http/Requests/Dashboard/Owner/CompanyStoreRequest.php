<?php

namespace App\Http\Requests\Dashboard\Owner;

use App\Company;

class CompanyStoreRequest extends CompanyRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Company::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'type' => ['required', 'in:product,service']
        ]);
    }
}
