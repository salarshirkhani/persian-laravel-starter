@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.' . Auth::user()->type . '.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" :route="'dashboard.' . Auth::user()->type . '.index'" />
    <x-breadcrumb-item title="پیغام‌های شما" :route="'dashboard.conversations.index'" />
    <x-breadcrumb-item title="مشاهده مکالمه" :route="'dashboard.conversations.show'" />
@endsection
@section('content')
    <div class="container" style="height: 100%">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class=" col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <x-card type="primary" class="direct-chat direct-chat-primary">
                    <x-card-header>
                        <div class="text-center">مکالمه با {{ $conversation->otherParty(Auth::user())->name }}</div>
                    </x-card-header>

                    <div id="messages" class="direct-chat-messages">
                        @foreach($conversation->messages->sortBy('created_at') as $message)
                            @include('dashboard.conversations.message', [
                                'id' => $message->uuid,
                                'class' => !$message->from->is(Auth::user()) ? "right" : "",
                                'name' => $message->from->name,
                                'date' => $message->toArray()['created_at'],
                                'text' => $message->text,
                            ])
                        @endforeach
                    </div>

                    <x-card-footer>
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="پیغام خود را بنویسید...">

                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="btn-chat">
                                    ارسال
                                </button>
                            </span>
                        </div>
                    </x-card-footer>
                </x-card>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/dashboard/plugins/pusher-js/pusher.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/laravel-echo/echo.js') }}"></script>
    <script>
        (function ($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const messageTemplate = `
        @include('dashboard.conversations.message', [
            'id' => '(id)',
            'class' => '',
            'name' => '',
            'date' => '',
            'text' => '',
        ])`;

            const genHexString = (len) => {
                let output = '';
                for (let i = 0; i < len; ++i) {
                    output += (Math.floor(Math.random() * 16)).toString(16);
                }
                return output;
            }

            const addMessage = (id, name, date, text, isPending, otherParty) => {
                $("#messages").append(messageTemplate.replace(/\(id\)/, id));
                updateMessage($(`*[data-message-id=${id}]`), name, date, text, isPending, otherParty);
                scrollDown();
            }

            const updateMessage = ($message, name, date, text, isPending, otherParty) => {
                $message.find(".direct-chat-name").html(name);
                $message.find(".direct-chat-timestamp").html(date);
                $message.find(".direct-chat-text").html(text);
                isPending && !$message.hasClass("pending") && $message.addClass("pending");
                !isPending && $message.hasClass("pending") && $message.removeClass("pending");
                otherParty && !$message.hasClass("right") && $message.addClass("right");
                !otherParty && $message.hasClass("right") && $message.removeClass("right");
            }

            const sendMessage = () => {
                let text = $("input[name=message]").val().trim();
                if (!text) return;
                let uuid = genHexString(32);
                addMessage(uuid, "{{ Auth::user()->name }}", "", text, true);
                $.ajax({
                    url: "{{ route('dashboard.sendMessage', $conversation) }}",
                    method: "POST",
                    data: {
                        text: text,
                        uuid: uuid,
                    }
                });
                $("input[name=message]").val("");
            }

            const scrollDown = () => {
                let objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            }

            const processEvent = (e) => {
                let $msg;
                if (($msg = $(`*[data-message-id=${e.message.uuid}]`)).length)
                    updateMessage($msg, e.message.from.name, e.message.created_at, e.message.text, false, e.message.from.id !== {{ Auth::user()->id }});
                else
                    addMessage(e.message.uuid, e.message.from.name, e.message.created_at, e.message.text, false, e.message.from.id !== {{ Auth::user()->id }});
            }

            $("#btn-chat").click(sendMessage);

            $("input[name=message]").on('keyup', (e) => {
                e.keyCode === 13 && sendMessage();
            });

            scrollDown();

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ config('broadcasting.connections.pusher.key') }}',
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                encrypted: {{ config('broadcasting.connections.pusher.options.useTLS') }},
            });

            window.Echo.join('conversation.{{ $conversation->id }}').listen('MessageSent', processEvent);
        })(jQuery);
    </script>
@endsection
