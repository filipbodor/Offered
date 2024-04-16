<!-- Chat Header -->
<div class="top">
    <img src="{{ Storage::url($user->profile_picture) }}" alt="Avatar">
    <div>
        <p>{{ $user->name }}</p>
        <small>Online</small>
    </div>
</div>

<!-- Chat Messages -->
<div class="messages">
    @foreach($messages as $message)
        <div class="{{ $message->from_user_id == auth()->id() ? 'right' : 'left' }} message">
            <img src="{{ Storage::url($message->fromUser->profile_picture) }}" alt="Avatar">
            <p>{{ $message->content }}</p>
        </div>
    @endforeach
</div>

<!-- Chat Footer -->
<div class="bottom">
    <form class="chat-form" data-to-user-id="{{ $toUserId }}">
        <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
        <button type="submit"></button>
    </form>
</div>
