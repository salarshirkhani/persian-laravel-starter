<?php

namespace App\Http\Requests\Dashboard\Owner;

use App\Http\Requests\SplitsKeywords;
use Illuminate\Foundation\Http\FormRequest;

abstract class CompanyRequest extends FormRequest
{
    use SplitsKeywords;

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
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:4000'],
            'description' => ['nullable', 'string', 'max:100000'],

            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],

            'phone_number' => ['required', 'string', 'regex:/^((\+98|0)[0-9]+)|((\+۹۸|۰)[۰-۹]+)$/'],
            'mobile_number' => ['nullable', 'string', 'regex:/^((\+98|0)[0-9]+)|((\+۹۸|۰)[۰-۹]+)$/'],
            'fax_number' => ['nullable', 'string', 'regex:/^((\+98|0)[0-9]+)|((\+۹۸|۰)[۰-۹]+)$/'],

            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'longitude' => ['required', 'numeric', 'min:-80', 'max:180'],

            'keywords' => ['required', 'string', 'regex:/^[a-zA-Z0-9۰-۹آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیيئ,،. ]+$/'],

            'social_instagram' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_telegram' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_facebook' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_twitter' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:1000'],
        ];
    }

    public function validated()
    {
        return $this->addKeywordsToData(parent::validated());
    }
}
