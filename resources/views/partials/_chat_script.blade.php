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
                    let messageHTML = `<div class="left message"><p class="message-bg-neutral">${data.content}</p></div>`;
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
                    let messageHTML = `<div class="right message">
                                <p class="message-bg-green">${message}</p>
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

                $('#userListContainer').addClass('d-none');
                $('#chatContainer').removeClass('d-none');
            });

            function toggleChatView() {
                const userListContainer = document.getElementById('userListContainer');
                const chatContainer = document.getElementById('chatContainer');
                userListContainer.classList.toggle('d-none');
                chatContainer.classList.toggle('d-none');
            }

            // Handle user list item click on small screens
            $('#userList').on('click', '.chat-user', function() {
                // Check if it's a small screen
                if ($(window).width() < 960) {
                    console.log('click');
                    // Show the chat interface
                    toggleChatView();
                }
            });
            function performSearch() {
                var searchText = $('#searchInput').val().toLowerCase(); // Get the search input value and convert it to lowercase for case-insensitive comparison
                $('#userList li').each(function() {
                    var userName = $(this).find('span').text().toLowerCase(); // Get the user name from the list item and convert it to lowercase
                    if (userName.includes(searchText)) { // Check if the user name contains the search input value
                        $(this).show(); // Show the user list item if it matches the search input value
                    } else {
                        $(this).hide(); // Hide the user list item if it does not match the search input value
                    }
                });
            }

            // Trigger search on keyup
            $('#searchInput').on('keyup', function() {
                performSearch();
            });

            // Trigger search on button click
            $('#searchButton').on('click', function() {
                performSearch();
            });


        @endauth
    });
</script>
