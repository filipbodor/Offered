<script>
    $(document).ready(function() {

        // Function to toggle the chat container
        @auth
        // Function to scroll down the message box to the latest message
            function scrollDownMessages() {
                var messagesBox = document.querySelector('.chat-box');
                messagesBox.scrollTop = messagesBox.scrollHeight;
            }

            // Initialize Pusher
            const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {cluster: 'eu', encrypted: true});
            const userId = document.head.querySelector('meta[name="user-id"]').content; // Ensure you have a meta tag with user-id in your HTML
            const channel = pusher.subscribe('chat');
            var selectedUserId = -1

            // Function to handle received messages
            channel.bind('message', function(data) {
                console.log(data, userId, selectedUserId);
                if (data.toUserId === userId && data.fromUserId === selectedUserId) {
                    let messageHTML = '<li class="chat-left"><div class="chat-avatar"><img src="${data.fromUserProfilePicUrl}" alt="Avatar"><div class="chat-name">${data.fromUserId}</div> </div> <div class="chat-text">${data.content}</div><div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div></li>'
                    $(".messages").append(messageHTML);
                    scrollDownMessages();
                }
            });

            // Handle message sending
            $(document).on('submit', '.chat-form', function(event) {
                console.log( $(this).find("#message").val())
                event.preventDefault();
                let message = $(this).find("#message").val();
                let toUserId = $(this).data('to-user-id');

                $.ajax({
                    url: "/broadcast", // Update this line to point to the broadcast route
                    method: 'POST',
                    headers: {
                        'X-Socket-Id': pusher.connection.socket_id
                    },
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message,
                        to_user_id: toUserId
                    }
                }).done(function(res) {
                    // Append message to chat and clear input field
                    let messageHTML = '<li class="chat-right"><div class="chat-avatar"><img src="{{ auth()->user()->profile_photo_url }}" alt="Avatar"><div class="chat-name">{{ auth()->user()->name }}</div> </div> <div class="chat-text">${message}</div><div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div></li>';
                    $(".messages").append(messageHTML);
                    $("#message").val('');
                    scrollDownMessages();
                });
            });

            function loadChatWithUser(userId) {
                console.log("Loading chat with user ID:", userId);
                $.get('/load-chat-interface', {user_id: userId}, function(response) {
                    selectedUserId = userId;
                    $('.chat').html(response);
                    scrollDownMessages();
                });
            }

            // Handle user list item click
            $('.users').on('click', '.person', function() {
                console.log("Loading chat with user ID:", userId);
                loadChatWithUser(selectedUserId);
                $('.person').removeClass('active');
                $(this).addClass('active');
            });

            $('.start-chat-icon').on('click', function() {
                var userId = $(this).data('user-id');
                loadChatWithUser(userId);
            });

        @endauth
    });
</script>
