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
            var selectedAdvertisementId = -1

            // Function to handle received messages
            channel.bind('message', function(data) {
                console.log(data, userId, selectedUserId, selectedAdvertisementId);
                if (data.toUserId === userId && data.fromUserId === selectedUserId && data.advertisementId == selectedAdvertisementId) {
                    let messageHTML = `<div class="left message"><p class="text-break message-bg-neutral">${data.content}</p></div>`;
                    $(".messages").append(messageHTML);
                    scrollDownMessages();
                }
            });

            // Handle message sending
            $(document).on('submit', '.chat-form', function(event) {
                event.preventDefault();
                let message = $(this).find("#message").val();
                let toUserId = $(this).data('to-user-id');

                // Send message via AJAX
                $.ajax({
                    url: "/broadcast", // Update this line to point to the broadcast route
                    method: 'POST',
                    headers: {
                        'X-Socket-Id': pusher.connection.socket_id
                    },
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message,
                        to_user_id: toUserId,
                        advertisement_id: selectedAdvertisementId // Include advertisement_id in the data
                    },
                    success: function(res) {
                        // Append sent message to chat and clear input field
                        let messageHTML = `<div class="right message">
                                    <p class="text-break message-bg-green">${message}</p>
                                </div>`;
                        $(".messages").append(messageHTML);
                        $("#message").val('');
                        scrollDownMessages();

                        // Send notification
                        sendNotification(toUserId, {{ auth()->id() }}); // Pass advertisement_id to sendNotification function
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to send message. Please try again.');
                    }
                });
            });

            function sendNotification(receiverId, senderId, message) {
                $.ajax({
                    url: "/send/" + senderId + "/" + receiverId, // Replace with the actual route for sending notifications
                    method: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message
                    },
                    success: function(response) {
                        console.log('Notification sent successfully:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to send notification:', xhr.responseText);
                    }
                });
            }


            function loadChatWithUser(userId, advertisementId) {
                $.get('/load-chat-interface', {user_id: userId, advertisement_id: advertisementId}, function(response) {
                    $('.chat').html(response);
                    scrollDownMessages();
                });
            }

            // Handle user list item click
            $('#userList').on('click', '.chat-user', function() {
                selectedUserId = $(this).data('user-id');
                selectedAdvertisementId = $(this).data('advertisement-id');
                console.log("Loading chat with user ID:", selectedUserId, selectedAdvertisementId);
                loadChatWithUser(selectedUserId, selectedAdvertisementId);
                $('.chat-user').removeClass('active');
                $(this).addClass('active');


                if ($(window).width() < 992) {
                    console.log('click');
                    // Show the chat interface
                    toggleChatView();
                }
            });

            $('.start-chat-icon').on('click', function() {
                selectedUserId = $(this).data('user-id');
                selectedAdvertisementId = $(this).data('advertisement-id'); // Get advertisement_id from the clicked advertisement
                $('.chat-user').removeClass('active');
                $('[data-user-id="' + selectedUserId + '"][data-advertisement-id="' + selectedAdvertisementId + '"]').closest('.chat-user').addClass('active');

                // Load the chat interface with both user_id and advertisement_id
                loadChatWithUser(selectedUserId, selectedAdvertisementId);

                $('#userListContainer').addClass('d-none');
                $('#chatContainer').removeClass('d-none');
            });

            function toggleChatView() {
                const userListContainer = document.getElementById('userListContainer');
                const chatContainer = document.getElementById('chatContainer');
                userListContainer.classList.toggle('d-none');
                chatContainer.classList.toggle('d-none');
            }

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
