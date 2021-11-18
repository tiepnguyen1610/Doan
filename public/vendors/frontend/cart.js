function updateCart(qty,rowId) {
    let urlUpdateCart = $('.update_cart_url').data('url');
    $.ajax({
        type: 'GET',
        url: urlUpdateCart,
        data:{rowId:rowId,qty:qty},
        success: function (data) {
            if (data.code === 200) {
                location.reload();
                alertify.success('Cập Nhật Thành Công');
            }
        },
        error: function () {
            // body...
        }
    });
}

$("div.alert").delay(2000).slideUp();