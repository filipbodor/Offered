<script>
    $(document).ready(function() {

        $('.first-button').on('click', function () {

            $('.animated-icon').toggleClass('open');
        });

        // Function to toggle the chat container
        @auth
            // Function to scroll down the message box to the latest message
            function scrollDownMessages() {
                var messagesBox = document.querySelector('.messages');
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
                    let messageHTML = `<div class="left message"><img src="${data.fromUserProfilePicUrl}" alt="Avatar"><p>${data.content}</p></div>`;                        $(".messages").append(messageHTML);
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
                    let messageHTML = `<div class="right message">
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="Avatar">
                                <p>${message}</p>
                            </div>`;
                    $(".messages").append(messageHTML);
                    $("#message").val('');
                    scrollDownMessages();
                });
            });

            function loadChatWithUser(userId) {
                $.get('/load-chat-interface', {user_id: userId}, function(response) {
                    $('.chat').html(response);
                    scrollDownMessages();
                });
            }

            // Handle user list item click
            $('#userList').on('click', '.chat-user', function() {
                selectedUserId = $(this).data('user-id');
                console.log("Loading chat with user ID:", selectedUserId);
                loadChatWithUser(selectedUserId);
                $('.chat-user').removeClass('active');
                $(this).addClass('active');
            });

            $('.start-chat-icon').on('click', function() {
                selectedUserId = $(this).data('user-id');
                $('.chat-user').removeClass('active');
                $('[data-user-id="' + selectedUserId + '"]').closest('.chat-user').addClass('active'); // Add active class to clicked user
                loadChatWithUser(selectedUserId);
            });

        document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.getElementById('hamburger');
            const userList = document.querySelector('.user-list-container');

            if (hamburger && userList) {
                hamburger.addEventListener('click', function () {
                    userList.classList.toggle('open');
                });
            } else {
                console.error('Hamburger or user list not found.');
            }
        });


        @endauth
    });
</script>