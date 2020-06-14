@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.' . Auth::user()->type . '.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" :route="'dashboard.' . Auth::user()->type . '.index'" />
    <x-breadcrumb-item title="پیغام‌های شما" :route="'dashboard.conversations.index'" />
@endsection
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <x-card type="info">
            <x-card-header>
                <div class="text-center">پیغام‌های شما</div>
            </x-card-header>

            @if(!$conversations->count())
                <h6 style="text-align:center;margin-top:24px;">
                    شما هنوز با هیچکس ارتباط برقرار نکرده‌اید.
                </h6>
            @endempty

            <ul class="contacts-list list-group list-group-flush">
                @foreach($conversations as $conversation)
                    <li>
                        <a href="{{ route('dashboard.conversations.show', $conversation) }}">
                            <img class="contacts-list-img" src="{{ asset('assets/dashboard/img/user8-128x128.jpg') }}">

                            <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    {{ $conversation->otherParty(Auth::user())->name }}
                                    @if(!empty($conversation->lastMessage))
                                    <small class="contacts-list-date float-right">
                                    {{ \Morilog\Jalali\Jalalian::fromCarbon($conversation->lastMessage->created_at)
                                           ->format('%A, %d %B %y') }}
                                    </small>
                                    @endif
                                </span>
                                <span class="contacts-list-msg">
                                    {{ $conversation->lastMessage->text ?? 'هنوز هیچ پیامی ندارید...' }}
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </x-card>
    </div>
@endsection
