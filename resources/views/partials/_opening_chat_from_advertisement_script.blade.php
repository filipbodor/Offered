<script>
    function scrollDownMessages() {
        var messagesBox = document.querySelector('.messages');
        messagesBox.scrollTop = messagesBox.scrollHeight;
    }

    function loadChatWithUser(userId) {
        console.log("Loading chat with user ID:", userId);
        $.get('/load-chat-interface', {user_id: userId}, function(response) {
            $('.chat').html(response);
            scrollDownMessages();
        });
    }

    $('.start-chat-icon').on('click', function() {
        var userId = $(this).data('user-id');
        loadChatWithUser(userId);
    });
</script>
