<?php

namespace Tests\Unit\Requests\Dashboard;

use App\Http\Controllers\Dashboard\ConversationController;
use App\Http\Requests\Dashboard\SendMessageRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

class SendMessageRequestTest extends TestCase
{
    use AdditionalAssertions;

    public function test_convo_controller_using_correct_request()
    {
        $this->assertActionUsesFormRequest(
            ConversationController::class,
            'sendMessage',
            SendMessageRequest::class
        );
    }

    public function test_rules_are_correct()
    {
        $this->assertEquals([
            'text' => ['required', 'string', 'max:20000'],
            'uuid' => ['required', 'string', 'regex:/^[0-9a-f]{32}$/']
        ],
            (new SendMessageRequest())->rules()
        );
    }
}
