<?php

namespace Tests\Unit\Requests\Dashboard\Owner;

use App\Http\Controllers\Dashboard\Owner\ServiceController;
use App\Http\Requests\Dashboard\Owner\ServiceStoreRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class ServiceStoreRequestTest extends TestCase
{
    use AdditionalAssertions;

    private $request;

    public function test_product_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            ServiceController::class,
            'store',
            ServiceStoreRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:4000'],
            'description' => ['required', 'string', 'max:100000'],
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],
        ],
            (new ServiceStoreRequest())->rules()
        );
    }
}
