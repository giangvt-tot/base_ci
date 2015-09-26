/* 
 * @descreption: Tổng hợp các hàm sử dụng
 * @author: giangvt.sami@gmail.com
 * @version: 1.0.0
 */

function e_ajax_form(obj, action) {
    var url = obj.attr('href');
    if (action !== 'insert' && action !== 'view' && action !== 'delete') {
        //jgrow Thông báo action ko hợp lệ
        alert('sai action');
        return false;
    }
    if (action !== 'insert') {
        var id = obj.attr('data-id');
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            action: action
        },
        dataType: 'json',
//        async: false,
        success: function (result) {
            if (result.status) {
                if (window[result.callback]) {
                    console.log("Gọi hàm: ", result.callback);
                    window[result.callback](result, obj);
                } else {
                    console.log("Không tìm thấy hàm yêu cầu:'", result.callback, "'-->Tự động gọi hàm xử lý mặc định 'default_ajax_form'");
                    default_ajax_form(result, obj);
                }
            } else {
                //jgrow báo lỗi
            }
        },
        error: function () {
            //jgrow Thông báo action ko hợp lệ
            alert('url không hợp lệ');
            return false;
        }
    });
}

function default_ajax_form(result, obj) {
    $('#modal-form form').attr('action', result.url);
    $('#modal-form form .modal-body').html(result.msg);
    $('#modal-form').modal({
        "backdrop": "static",
        "keyboard": true
    });
}
function demo(a, b) {
    alert('demo');
}