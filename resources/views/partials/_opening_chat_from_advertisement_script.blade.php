<script>
    $('.start-chat-icon').on('click', function() {
        var userId = $(this).data('user-id');
        loadChatWithUser(userId);
    });
</script>
