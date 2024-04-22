<script>
    $('.category-list-group-item').click(function(){
        $(this).toggleClass('expanded');
        $(this).next('.subcategory-list').slideToggle();
    });
</script>
