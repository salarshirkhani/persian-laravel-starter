<?php

namespace Tests\Feature\Dashboard;

use App\Conversation;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @mixin TestCase
 */
trait ConversationTestTrait
{
    use CreateUser;

    public function test_user_can_create_convo_and_gets_redirected()
    {
        $other = factory(User::class)->create(['type' => $this->user->type == 'customer' ? 'owner' : 'customer']);
        $response = $this->post(route('dashboard.conversations.store', [], false), [
            'user_id' => $other->id,
        ]);

        $response->assertRedirect(
            route(
                'dashboard.conversations.show',
                Conversation::orderBy('id', 'desc')->first() ?? 0,
                false
            )
        );
    }

    public function test_user_can_view_convo_list() {
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([
            $this->user,
            factory(User::class)->make(['type' => $this->user->type == 'customer' ? 'owner' : 'customer'])
        ]);
        $response = $this->get(route('dashboard.conversations.index', [], false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.conversations.index');
    }

    public function test_participant_can_view_convo()
    {
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([
            $this->user,
            factory(User::class)->make(['type' => $this->user->type == 'customer' ? 'owner' : 'customer'])
        ]);
        $response = $this->get(route('dashboard.conversations.show', $convo, false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.conversations.show');
    }

    public function test_participant_can_send_message()
    {
        $this->withoutExceptionHandling();
        $convo = factory(Conversation::class)->create();
        $convo->parties()->saveMany([
            $this->user,
            factory(User::class)->make(['type' => $this->user->type == 'customer' ? 'owner' : 'customer'])
        ]);
        $response = $this->post(route('dashboard.sendMessage', $convo, false), [
            'uuid' => '00000000000000000000000000000000',
            'text' => 'test'
        ]);

        $response->assertSuccessful();
    }
}
