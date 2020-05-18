<div class="direct-chat-msg{{ !empty($class) ? ' ' . $class : '' }}" data-message-id="{{ $id }}">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name">{{ $name }}</span>
        <span class="direct-chat-timestamp">{{ $date }}</span>
    </div>
    <img class="direct-chat-img" src="{{ asset('assets/dashboard/img/user1-128x128.jpg') }}" alt="message user image">
    <div class="direct-chat-text">
        {{ $text }}
    </div>
</div>
