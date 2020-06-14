<?php

namespace App\Http\Requests\Dashboard\Customer;

use App\Http\Requests\SplitsKeywords;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class SearchRequest extends FormRequest
{
    use SplitsKeywords;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('search-database', $this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'in:company,product,service'],
            'category' => ['required', Rule::exists('categories', 'id')->where(function (Builder $query) {
                $query->where('type', $this->get('type', null));
            })],
            'keywords' => ['nullable', 'string', 'regex:/^[a-zA-Z0-9۰-۹آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیيئ,،. ]+$/'],
        ];
    }

    public function validated()
    {
        return $this->addKeywordsToData(parent::validated());
    }
}
