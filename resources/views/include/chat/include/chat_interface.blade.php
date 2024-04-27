<!-- Chat Header -->
<div class="top">
    <!-- Back Button -->

    <!-- User Profile and Name -->
    <div class="d-flex align-items-center">
        <button type="button" class="backToUserListBtn d-block d-sm-none" id="backToUserListBtn">
            <i class="bi bi-arrow-left"></i>
        </button>


        <img src="{{ $user->profile_photo_url }}" alt="Avatar">

        <span>{{ $user->name }}</span>
    </div>
</div>

<!-- Chat Messages -->
<div class="messages">

    @foreach($messages as $message)
        <div class="{{ $message->from_user_id == auth()->id() ? 'right' : 'left' }} message">
            <p class="message-bg-{{ $message->from_user_id == auth()->id() ? 'green' : 'neutral' }}">{{ $message->content }}</p>
        </div>
    @endforeach
</div>

<!-- Chat Footer -->
<div class="bottom">
    <form class="chat-form" data-to-user-id="{{ $toUserId }}">
        <x-input type="text" class="form-control" id="message" name="message" placeholder="Enter message..." autocomplete="off"/>
        <button type="submit" class="custom-button">
            <i class="fas fa-arrow-up"></i>
        </button>

    </form>
</div>

<script>
    function toggleChatView() {
        const userListContainer = document.getElementById('userListContainer');
        const chatContainer = document.getElementById('chatContainer');
        userListContainer.classList.toggle('d-none');
        chatContainer.classList.toggle('d-none');
    }

    // Attach event listener to the back button
    $('#backToUserListBtn').on('click', function() {
        console.log('click');
        toggleChatView();
    });

</script>
