$('.checkbox_wrapper').on('click', function () {
    $(this).parents('.panel').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
});