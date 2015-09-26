$(document).ready(function () {
    $(document).on('click', '.e_ajax_link', function (e) {
        e.preventDefault();
        e_ajax_form($(this), 'insert');
    });
});

