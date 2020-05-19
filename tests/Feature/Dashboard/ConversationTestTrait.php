<?php

namespace Tests\Feature\Dashboard;

use App\Conversation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @mixin TestCase
 */
trait ConversationTestTrait
{
    use RefreshDatabase;
    use CreateUser;
    use AdditionalAssertions;

    public function test_user_can_create_convo_and_gets_redirected()
    {
        $other = factory(User::class)->create(['type' => 'customer']);
        $response = $this->post(route('dashboard.conversations.store', [], false), [
            'user_id' => $other->id,
        ]);

        $response->assertRedirect(
            route(
                'dashboard.conversations.show',
                Conversation::orderBy('id', 'desc')->first(),
                false
            )
        );
    }

    public function test_participant_can_view_convo()
    {
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([
            $this->user,
            factory(User::class)->make(['type' => 'customer'])
        ]);
        $response = $this->get(route('dashboard.conversations.show', $convo, false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.conversations.show');
    }

}
