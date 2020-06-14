<?php

namespace App\Http\Controllers\Dashboard;

use App\Conversation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SendMessageRequest;
use App\Http\Requests\Dashboard\StartConversationRequest;
use App\Message;
use App\User;
use Auth;

class ConversationController extends Controller
{
    public function index() {
        $this->authorize('viewAny', Conversation::class);
        Auth::user()->load('conversations.lastMessage');
        return view('dashboard.conversations.index', [
            'conversations' => Auth::user()->conversations->sortByDesc('lastMessage.created_at')
        ]);
    }

    public function show(Conversation $conversation) {
        $this->authorize('view', $conversation);
        $conversation->load('messages.from');
        return view('dashboard.conversations.show', [
            'conversation' => $conversation
        ]);
    }

    public function store(StartConversationRequest $request) {
        if (!Auth::user()->can('create', Conversation::class))
            return redirect()->back()
                ->with('error', 'شما به محدودیت ارسال پیام رسیده‌اید! لطفا اشتراک خود را ارتقا دهید.');
        $target = User::find($request->validated()['user_id']);

        if ($target->type == Auth::user()->type || $target->is(Auth::user()))
            abort(403);

        [$conversation, $isStartedNow] = Conversation::startConversation(Auth::user(), $target);

        return redirect()->route('dashboard.conversations.show', $conversation->id);
    }

    public function sendMessage(SendMessageRequest $request, Conversation $conversation) {
        $message = Message::sendMessage($conversation, $request->validated());
        return [
            'ok' => True,
            'message' => $message,
        ];
    }
}
