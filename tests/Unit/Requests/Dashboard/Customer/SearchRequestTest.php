<?php

namespace Tests\Unit\Requests\Dashboard\Customer;

use App\Http\Controllers\Dashboard\Customer\SearchController;
use App\Http\Requests\Dashboard\Customer\SearchRequest;
use App\Http\Requests\SplitsKeywords;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\Rule;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class SearchRequestTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;

    public function test_search_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            SearchController::class,
            'search',
            SearchRequest::class
        );
    }

    public function test_request_using_correct_gate()
    {
        $request = new SearchRequest();

        \Gate::shouldReceive('allows')->twice()->andReturnValues([true, false]);
        $this->assertTrue($request->authorize());
        $this->assertFalse($request->authorize());
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'type' => ['required', 'in:company,product,service'],
            'category' => ['required', Rule::exists('categories', 'id')->where(function (Builder $query) {
                $query->where('type', $this->get('type', null));
            })],
            'keywords' => ['required', 'string', 'regex:/^[a-zA-Z0-9۰-۹آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیيئ,،. ]+$/'],
        ],
            (new SearchRequest())->rules()
        );
    }

    public function test_request_splitting_keywords()
    {
        $this->assertTrue(in_array(SplitsKeywords::class, class_uses(SearchRequest::class)));
    }
}
