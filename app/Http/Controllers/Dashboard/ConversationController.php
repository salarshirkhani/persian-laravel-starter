<?php

namespace App\Http\Controllers\Dashboard;

use App\Conversation;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SendMessageRequest;
use App\Http\Requests\Dashboard\StartConversationRequest;
use App\Message;
use App\User;
use Auth;

class ConversationController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Conversation::class);
    }

    public function index() {
        Auth::user()->load('conversations.lastMessage');
        return view('dashboard.conversations.index', [
            'conversations' => Auth::user()->conversations->sortByDesc('lastMessage.created_at')
        ]);
    }

    public function show(Conversation $conversation) {
        $conversation->load('messages.from');
        return view('dashboard.conversations.show', [
            'conversation' => $conversation
        ]);
    }

    public function store(StartConversationRequest $request) {
        $target = User::find($request->validated()['user_id']);

        if ($target->type == Auth::user()->type || $target->is(Auth::user()))
            abort(403);

        $existing = \DB::select("SELECT conversation_id FROM conversation_user WHERE user_id IN (?, ?)
                                        GROUP BY conversation_id HAVING COUNT(*) >= 2", [
            Auth::user()->id, $target->id
        ]);
        if (count($existing) > 0)
            return redirect()->route('dashboard.conversations.show', $existing[0]->conversation_id);
        $conversation = Conversation::create(['type' => 'private']);
        $conversation->parties()->save(Auth::user());
        $conversation->parties()->save($target);

        return redirect()->route('dashboard.conversations.show', $conversation->id);
    }

    public function sendMessage(SendMessageRequest $request, Conversation $conversation) {
        $this->authorize('update', $conversation);
        $message = new Message($request->validated());
        $message->conversation()->associate($conversation);
        $message->from()->associate(Auth::user());
        $message->type = 'text';
        $message->save();
        broadcast(new MessageSent($message));

        return $message;
    }
}
