<?php

namespace App\Http\Requests\Dashboard\Customer;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class EnquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'in:product,service'],
            'category_id' => ['nullable', Rule::exists('categories', 'id')->where(function (Builder $query) {
                $query->where('type', $this->get('type', null));
            })],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:8000'],
        ];
    }
}
