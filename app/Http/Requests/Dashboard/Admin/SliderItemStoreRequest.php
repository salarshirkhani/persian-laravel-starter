<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\SliderItem;

class SliderItemStoreRequest extends SliderItemRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', SliderItem::class);
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png'],
        ]);
    }
}
