jQuery(document).ready(function ($) {

    $('#wac2_login_company_user').submit(function(e){

        var message, wac2_img_load, data;
        message = $('#wac2_login_company_user .message');
        wac2_img_load = $(".wac2_img_load");
        data = $(this).serialize();

        wac2_img_load.show();

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: data + '&action=wac2_login_company_user_recaptch',
            success: function(res){
                if(res == '1'){

                    // message.show().text(ajax_login_object.loadingmessage);
                    message.text('');

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: ajax_login_object.ajaxurl,
                        data: data + '&action=wac2_login_company_user',
                        success: function(data){
                            if (data.loggedin == true){
                                message.css({'color':'green'});
                            }else{
                                message.css({'color':'red'});
                            }
                            wac2_img_load.hide();
                            message.text(data.message);
                            if (data.loggedin == true){
                                document.location.href = ajax_login_object.redirecturl;
                            }
                        }
                    });

                }else{

                    wac2_img_load.hide();
                    message.css({'color':'red'});
                    message.text('Подтвердите что вы не робот');

                }
            }
        });

        e.preventDefault();
    });

});