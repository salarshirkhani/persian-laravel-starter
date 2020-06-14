<?php

namespace Tests\Unit\Requests\Dashboard\Customer;

use App\Http\Controllers\Dashboard\Customer\EnquiryController;
use App\Http\Requests\Dashboard\Customer\EnquiryStoreRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\Rule;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class EnquiryStoreRequestTest extends TestCase
{
    use AdditionalAssertions;

    private $request;

    public function test_company_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            EnquiryController::class,
            'store',
            EnquiryStoreRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'type' => ['required', 'in:product,service'],
            'category_id' => ['nullable', Rule::exists('categories', 'id')->where(function (Builder $query) {
                $query->where('type', $this->get('type', null));
            })],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:8000'],
        ],
            (new EnquiryStoreRequest())->rules()
        );
    }
}
