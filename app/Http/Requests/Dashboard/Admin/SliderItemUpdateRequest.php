<?php

namespace App\Http\Requests\Dashboard\Admin;

class SliderItemUpdateRequest extends SliderItemRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('slider_item'));
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
        ]);
    }
}
