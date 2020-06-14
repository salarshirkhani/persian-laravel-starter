<?php

namespace Tests\Unit\Requests\Dashboard\Owner;

use App\Http\Controllers\Dashboard\Owner\ProductController;
use App\Http\Requests\Dashboard\Owner\ProductStoreRequest;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class ProductStoreRequestTest extends TestCase
{
    use AdditionalAssertions;

    private $request;

    public function test_product_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            ProductController::class,
            'store',
            ProductStoreRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:4000'],
            'description' => ['required', 'string', 'max:100000'],
            'price' => ['required', 'numeric', 'min:0'],
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],
        ],
            (new ProductStoreRequest())->rules()
        );
    }
}
