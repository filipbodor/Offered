<script>
    $('.category-list-group-item').click(function(){
        $(this).toggleClass('expanded');
        $(this).next('.subcategory-list').slideToggle();
    });

    function collapseAllExceptOne(clickedElement) {
        var targetCollapseId = clickedElement.getAttribute('data-bs-target');
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'));
        collapseElementList.forEach(function (collapseEl) {
            if (collapseEl.getAttribute('id') !== targetCollapseId.slice(1)) {
                var collapse = bootstrap.Collapse.getInstance(collapseEl);
                if (collapse) {
                    collapse.hide();
                }
            }
        });
    }


</script>
