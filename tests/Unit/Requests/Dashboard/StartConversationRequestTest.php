<?php

namespace Tests\Unit\Requests\Dashboard;

use App\Http\Controllers\Dashboard\ConversationController;
use App\Http\Requests\Dashboard\StartConversationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class StartConversationRequestTest extends TestCase
{
    use AdditionalAssertions;

    public function test_convo_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            ConversationController::class,
            'store',
            StartConversationRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'user_id' => ['required', 'exists:users,id'],
        ],
            (new StartConversationRequest())->rules()
        );
    }
}
