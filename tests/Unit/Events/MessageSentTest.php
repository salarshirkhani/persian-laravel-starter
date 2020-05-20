<?php

namespace Tests\Unit\Events;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Broadcasting\PresenceChannel;
use Tests\TestCase;

class MessageSentTest extends TestCase
{
    public function test_broadcast_on_correct_channel() {
        $msg = new Message();
        $msg->conversation_id = 5;
        $event = new MessageSent($msg);
        $this->assertEquals(new PresenceChannel("conversation.5"), $event->broadcastOn());
    }
}
