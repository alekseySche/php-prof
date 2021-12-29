$(document).ready(function () {
    console.log('Request.js [LOADED]');
    $('.delete_order').on('click', function (event) {
        let id = $(this).data('id');
        $.get(
            `/user.php?action=delete_order&id=${id}`,
            function (response, status) {
                console.log(status);
                console.log(response);
                console.log(response.result);
                $('.card-body#' + id).remove();
                alert('заказ удален')
            }
        );
    });
});