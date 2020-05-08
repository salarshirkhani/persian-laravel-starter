<?php

namespace Tests\Unit\Requests\Dashboard\Owner;

use App\Http\Controllers\Dashboard\Owner\CompanyController;
use App\Http\Requests\Dashboard\Owner\CompanyStoreRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class CompanyStoreRequestTest extends TestCase
{
    use AdditionalAssertions;

    private $request;

    public function test_company_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            CompanyController::class,
            'store',
            CompanyStoreRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
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

            'social_instagram' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_telegram' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_facebook' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'social_twitter' => ['nullable', 'string', 'regex:/^@?[a-zA-Z0-9_\-.]+$/'],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:1000'],

            'type' => ['required', 'in:product,service']
        ],
            (new CompanyStoreRequest())->rules()
        );
    }
}
