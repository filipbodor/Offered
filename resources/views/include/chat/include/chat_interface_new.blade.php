<div class="chat-container">
    <div class="selected-user">
        <span>To: <span class="name">{{ $user->name }}</span></span>
    </div>
    <ul class="chat-box chatContainerScroll">
        @foreach($messages as $message)
            @if($message->from_user_id == auth()->id())
                <li class="chat-right">
                    <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                    <div class="chat-text">{{ $message->content }}</div>
                    <div class="chat-avatar">
                        <img src="{{ $message->fromUser->profile_photo_url }}" alt="Avatar">
                        <div class="chat-name">{{$message->fromUser->name}}</div>
                    </div>
                </li>
            @else
                <li class="chat-left">
                    <div class="chat-avatar">
                        <img src="{{ $message->fromUser->profile_photo_url }}" alt="Avatar">
                        <div class="chat-name">{{$message->fromUser->name}}</div>
                    </div>
                    <div class="chat-text">{{ $message->content }}</div>
                    <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                </li>
            @endif
        @endforeach
    </ul>
    <form class="form-group mt-3 mb-0 chat-form" data-to-user-id="{{ $toUserId }}">
        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Type your message here..."></textarea>
        <button type="submit"></button>
    </form>
</div>
