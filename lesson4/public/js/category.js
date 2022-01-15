$(document).ready(function () {
    console.log('Request.js [LOADED]');
    $('.delete_category').on('click', function (event) {
        let id = $(this).data('id');
        $.get(
            `/shop/category.php?action=DeleteCategory&id=${id}`,
            function (response, status) {
                console.log(status);
                console.log(response);
                let parent = $('#'+id );
                parent.remove();
                alert('Заказ удален')
            }
        );
    });
});