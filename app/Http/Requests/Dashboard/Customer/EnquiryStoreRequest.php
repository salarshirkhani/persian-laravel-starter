<?php

namespace App\Http\Requests\Dashboard\Customer;

use App\Enquiry;

class EnquiryStoreRequest extends EnquiryRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Enquiry::class);
    }
}
