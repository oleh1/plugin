jQuery(document).ready(function ($) {

    var wac2_img_load = $('.wac2_img_load');

    $("#wac2_registration_company_user").submit(function(e){
        var data, message;
        wac2_img_load.fadeIn("slow");
        data = $(this).serialize();
        message = $(".wac2_registration_company .message");

        message.html('');

        jQuery.ajax({
            url:'/wp-admin/admin-ajax.php',
            data:data + '&action=wac2_registration_company_user',
            type:'POST',
            success:function(result){
                wac2_img_load.fadeOut("slow");
                if(result != 'Вы успешно зарегистрировались'){
                    message.css({'color':'red'});
                }else{
                    message.css({'color':'green'});
                }
                message.html(result);
            }
        });

        e.preventDefault();
    });

    //slider
    $('.wac2_slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true
    });
    //slider

    //reviews
    var click_assessment_mouseenter_mouseleave = 1;

    $('.reviews_assessment .assessment').click(function () {
        click_assessment_mouseenter_mouseleave = 0;
        var assessment, post_id, a1, a2, a3, a4, assessment_all, n;
        assessment = $(this);
        post_id = $('.reviews_assessment').attr('data-post_id');
        a1 = $('.reviews_assessment .a1');
        a2 = $('.reviews_assessment .a2');
        a3 = $('.reviews_assessment .a3');
        a4 = $('.reviews_assessment .a4');
        assessment_all = $('.reviews_assessment .assessment');
        n = assessment.attr('data-number');

        $('.reviews_assessment input[name="assessment"]').val(n);

        assessment_all.css({'color':'darkgrey'});

        if(n == 5){
            assessment_all.css({'color':'gold'});
        }
        if(n == 4){
            a1.css({'color':'gold'});
            a2.css({'color':'gold'});
            a3.css({'color':'gold'});
            a4.css({'color':'gold'});
        }
        if(n == 3){
            a1.css({'color':'gold'});
            a2.css({'color':'gold'});
            a3.css({'color':'gold'});
        }
        if(n == 2){
            a1.css({'color':'gold'});
            a2.css({'color':'gold'});
        }
        if(n == 1){
            a1.css({'color':'gold'});
        }

    });

    $('.reviews_assessment .assessment').mouseenter(function () {
        if(click_assessment_mouseenter_mouseleave == 1){
            var n, a1, a2, a3, a4;
            n = $(this).attr('data-number');
            a1 = $('.reviews_assessment .a1');
            a2 = $('.reviews_assessment .a2');
            a3 = $('.reviews_assessment .a3');
            a4 = $('.reviews_assessment .a4');

            if(n == 5){
                $('.assessment').css({'color':'gold'});
            }
            if(n == 4){
                a1.css({'color':'gold'});
                a2.css({'color':'gold'});
                a3.css({'color':'gold'});
                a4.css({'color':'gold'});
            }
            if(n == 3){
                a1.css({'color':'gold'});
                a2.css({'color':'gold'});
                a3.css({'color':'gold'});
            }
            if(n == 2){
                a1.css({'color':'gold'});
                a2.css({'color':'gold'});
            }
            if(n == 1){
                a1.css({'color':'gold'});
            }
        }
    });

    $('.reviews_assessment .assessment').mouseleave(function () {
        if(click_assessment_mouseenter_mouseleave == 1) {
            $('.assessment').css({'color': 'darkgrey'});
        }
    });

    $('.form_reviews_assessment').submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize(),
            moderation_enable = $(this).attr('data-moderation_enable'),
            expectation_moderation = $('.expectation_moderation');

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: data + '&action=form_reviews_assessment',
            success: function(data){

                if('false' == data){
                    $('.form_reviews_assessment .massege').html('Подтвердите что вы не робот');
                }else{

                    $('.name_reviews_assessment_reviews_update').html(data);

                    $('.form_reviews_assessment input[name="reviews_name"]').val('');
                    $('.form_reviews_assessment textarea[name="reviews"]').val('');

                    if(moderation_enable == 'true'){
                        expectation_moderation.fadeIn("slow");
                        setTimeout(function(){
                            expectation_moderation.fadeOut("slow");
                        }, 3000);
                    }

                    $('.form_reviews_assessment .massege').html('');

                }

                wac2_img_load.fadeOut("slow");
            }
        });

    });
    //reviews

    //feedback_form
    $(".wac2_feedback_form_telephone .f_l_country select").change(function () {
        var t = $(this);
        ajaxurl = '/wp-admin/admin-ajax.php';
        $(".wac2_feedback_form_telephone input[name='telephone']").val( $("option:selected", this).attr('data-phone') );
        $('.wac2_feedback_form_telephone .f_l_telephone').attr('data-phone', $("option:selected", this).attr('data-phone'));
        jQuery.post(
            ajaxurl,
            {
                'action': 'wac2_feedback_form_telephone',
                'id_country': t.val()
            },
            function(result){
                $(".wac2_feedback_form_telephone .f_l_city select").html(result);
                $(".wac2_feedback_form_telephone input[name='country']").val($("option:selected", this).html());
            }
        );
    }).trigger("change");

    $('.wac2_feedback_form_telephone_f').submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize(),
        data_a = data.split('&'),
        city = data_a[0].split('='),
        country = data_a[3].split('='),
        f_l_country = $(".wac2_feedback_form_telephone .f_l_country select"),
        f_l_city = $(".wac2_feedback_form_telephone .f_l_city select");

        if(country[1] == '0'){
            f_l_country.css('background', 'red');
            setTimeout(function () {
                f_l_country.css('background', 'rgba(0,0,0,.05)');
            }, 1000);

            return false;
        }

        if(city[1] == '0'){
            f_l_city.css('background', 'red');
            setTimeout(function () {
                f_l_city.css('background', 'rgba(0,0,0,.05)');
            }, 1000);

            return false;
        }

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            data + '&action=wac2_feedback_form_telephone_f',
            function(result){
                if('false' == result){
                    $('.wac2_feedback_form_telephone .massege').html('Подтвердите что вы не робот');
                }else{
                    $('.wac2_feedback_form_telephone_f .massege').html(result);
                    if('Ваше сообщение отправлено' == result){
                        $('.wac2_feedback_form_telephone input[name="telephone"]').val( $('.wac2_feedback_form_telephone .f_l_telephone').attr('data-phone') );
                    }
                }

                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $('.wac2_feedback_form_mail_f').submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            data + '&action=wac2_feedback_form_mail_f',
            function(result){
                if('false' == result){
                    $('.wac2_feedback_form_mail_f .massege').html('Подтвердите что вы не робот');
                }else{
                    $('.wac2_feedback_form_mail_f .massege').html(result);
                    if('Ваше сообщение отправлено' == result){
                        $('.wac2_feedback_form_mail input[name="mail"]').val('');
                        $('.wac2_feedback_form_mail textarea[name="question"]').val('');
                    }
                }

                wac2_img_load.fadeOut("slow");
            }
        );

    });
    //feedback_form

    var onloadCaptchaCallback = function() {
        if(jQuery("div").is("#captcha_callback1")){

            grecaptcha.render('captcha_callback1', {
                'sitekey' : '6LfKUz8UAAAAAG7ewMHrTGzgubPYLRgfwexGC8QV'
            });

        }

        if(jQuery("div").is("#captcha_callback2")){

            grecaptcha.render('captcha_callback2', {
                'sitekey' : '6LfKUz8UAAAAAG7ewMHrTGzgubPYLRgfwexGC8QV'
            });

        }

        if(jQuery("div").is("#captcha_callback3")){

            grecaptcha.render('captcha_callback3', {
                'sitekey' : '6LfKUz8UAAAAAG7ewMHrTGzgubPYLRgfwexGC8QV'
            });

        }
    };

    window.onload = function () {
        onloadCaptchaCallback();
    }

    //password recovery
    $('#lostpasswordform').submit(function (e) {
        e.preventDefault();

        wac2_img_load.fadeIn("slow");

        var data = $(this).serialize();

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data,
            function(result){
                $('.password_recovery .message').html(result.data.message);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $('#resetpassform').submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data,
            function(result){
                $('.change_password .message').html(result.data.message);
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    //password recovery

    $("body").on("submit", ".wac2_registration_company2",function(e){
        e.preventDefault();

        var t = $(this), data = t.serialize(),
            password_repeat = $('#password_repeat'),
            password = $('#password');

        if(password_repeat.val() != password.val()){
            password_repeat.css({
                'background': 'red'
            });
            $('.message').html('<div style="color: red;">Пароли не совпадают</div>');
            return false;
        }else{
            password_repeat.css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: data + '&action=registration_check_update',
            success: function(data){

                if(data.loggedin == 'recaptcha'){
                    $('.message').html('<div style="color: red;">Подтвердите что вы не робот</div>');

                    if(data.password_r == '1'){
                        $('.wac2_registration_company2 input[name="password"]').css({
                            'background': 'red'
                        });
                    }else{
                        $('.wac2_registration_company2 input[name="password"]').css({
                            'background': 'rgba(0,0,0,.05)'
                        });
                    }

                }else if(data.loggedin){
                    document.location.href = data.url;
                }else{

                    if(data.password_r == '1'){
                        $('.wac2_registration_company2 input[name="password"]').css({
                            'background': 'red'
                        });
                    }else{
                        $('.wac2_registration_company2 input[name="password"]').css({
                            'background': 'rgba(0,0,0,.05)'
                        });
                    }

                    if(data.username_r == '1'){
                        $('.wac2_registration_company2 input[name="username"]').css({
                            'background': 'red'
                        });
                    }else{
                        $('.wac2_registration_company2 input[name="username"]').css({
                            'background': 'rgba(0,0,0,.05)'
                        });
                    }

                    if(data.email_r == '1'){
                        $('.wac2_registration_company2 input[name="email"]').css({
                            'background': 'red'
                        });
                    }else{
                        $('.wac2_registration_company2 input[name="email"]').css({
                            'background': 'rgba(0,0,0,.05)'
                        });
                    }

                    if(data.website_r == '1'){
                        $('.wac2_registration_company2 input[name="website"]').css({
                            'background': 'red'
                        });
                    }else{
                        $('.wac2_registration_company2 input[name="website"]').css({
                            'background': 'rgba(0,0,0,.05)'
                        });
                    }

                    $('.wac2_registration_company2 input[name="username"]').val(data.username);
                    $('.wac2_registration_company2 input[name="password"]').val(data.password);
                    $('.wac2_registration_company2 input[name="email"]').val(data.email);
                    $('.wac2_registration_company2 input[name="website"]').val(data.website);
                    $('.wac2_registration_company2 input[name="fname"]').val(data.fname);
                    $('.wac2_registration_company2 input[name="lname"]').val(data.lname);
                    $('.wac2_registration_company2 input[name="nickname"]').val(data.nickname);
                    $('.wac2_registration_company2 input[name="bio"]').val(data.bio);
                    $('.message').html(data.error_all);

                }

                wac2_img_load.fadeOut("slow");

            }
        });

    });

    /*visualization company*/

    //Drag'n'Drop post
    var dragSrcEl_post = null;

    function handleDragStart1_post(e) {
//        console.log('1 0'); // 1 раз когда мышка взяла элемент
        this.style.opacity = '0.4';
    }

    function handleDragOver1_post(e) {
//        console.log('1 1'); // постоянно когда мишка сдвинута и находится на элементе
        if (e.preventDefault) {
            e.preventDefault();
        }
        return false;
    }

    function handleDragEnter1_post(e) {
//        console.log('1 2'); // 1 раз когда мышка на элементе
        this.classList.add('over');
    }

    function handleDragLeave1_post(e) {
//        console.log('1 3'); // 1 раз когда мышка выходит за элемент
        this.classList.remove('over');
    }

    function handleDrop1_post(e) {
//        console.log('1 4'); // 1 раз когда отпускаем мышку на чужом элементе
        if (e.stopPropagation) {
            e.stopPropagation();
        }

        this.classList.remove('over');

        if (dragSrcEl_post != this) {
//            dragSrcEl_post.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');

            var t = this;

            wac2_img_load.fadeIn("slow");

            var v = e.dataTransfer.getData('text/html');

            ajaxurl = '/wp-admin/admin-ajax.php';
            $.post(
                ajaxurl,
                {
                    'action': 'widget_post_company',
                    'widget': t.getAttribute('data-i'),
                    'widget_class': t.childNodes[0].className.split(/\s+/)[0],
                    'post_id': t.getAttribute('data-post_id'),
                    'scroll': $(v).attr('data-v')
                },
                function(result){
                    t.innerHTML = result;
                    wac2_img_load.fadeOut("slow");
                }
            );

        }

        return false;
    }

    function handleDragEnd1_post(e) {
//        console.log('1 5'); // 1 раз когда отпускаем мышку
        this.style.opacity = '1';
    }

    function handleDrag1_post() {
//        console.log('1 6'); // постоянно когда мышка сдвинута и находится на элементе
    }

    var company_post = document.querySelectorAll('#company_post .get_widgets');
    [].forEach.call(company_post, function(col) {
        // col.addEventListener('dragstart', handleDragStart1_post, false); // 1 раз когда мышка взяла элемент
        col.addEventListener('dragover', handleDragOver1_post, false); // постоянно когда мишка сдвинута и находится на элементе
        col.addEventListener('dragenter', handleDragEnter1_post, false); // 1 раз когда мышка на элементе
        col.addEventListener('dragleave', handleDragLeave1_post, false); // 1 раз когда мышка выходит за элемент
        col.addEventListener('drop', handleDrop1_post, false); // 1 раз когда отпускаем мышку на чужом элементе
        // col.addEventListener('dragend', handleDragEnd1_post, false); // 1 раз когда отпускаем мышку
//        col.addEventListener('drag', handleDrag1_post, false); // постоянно когда мышка сдвинута и находится на элементе
    });

//------------------------------------------------------------------------------------------------------------------------

    function handleDragStart2_post(e) {
//        console.log('2 0'); // 1 раз когда мышка взяла элемент
        this.style.opacity = '0.4';

        dragSrcEl_post = this;

        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);

        var dragIcon = document.createElement('img');
        dragIcon.src = this.getAttribute('data-img');
        e.dataTransfer.setDragImage(dragIcon, 64, 64);

        $('.widget_scroll_bottom').fadeIn("slow");
        $('.widget_scroll_top').fadeIn("slow");
    }

    function handleDragOver2_post(e) {
//        console.log('2 1'); // постоянно когда мишка сдвинута и находится на элементе
        if (e.preventDefault) {
            e.preventDefault();
        }
        return false;
    }

    function handleDragEnter2_post(e) {
//        console.log('2 2'); // 1 раз когда мышка на элементе
        this.classList.add('over');
    }

    function handleDragLeave2_post(e) {
//        console.log('2 3'); // 1 раз когда мышка выходит за элемент
        this.classList.remove('over');
    }

    function handleDrop2_post(e) {
//        console.log('2 4'); // 1 раз когда отпускаем мышку на чужом элементе
        if (e.stopPropagation) {
            e.stopPropagation();
        }

        return false;
    }

    function handleDragEnd2_post(e) {
//        console.log('2 5'); // 1 раз когда отпускаем мышку
        this.style.opacity = '1';

        $('.widget_scroll_bottom').fadeOut("slow");
        $('.widget_scroll_top').fadeOut("slow");
    }

    function handleDrag2_post() {
//        console.log('2 6'); // постоянно когда мышка сдвинута и находится на элементе
    }

    var widgets_post = document.querySelectorAll('.widgets_post .put_widgets');
    [].forEach.call(widgets_post, function(col) {
        col.addEventListener('dragstart', handleDragStart2_post, false); // 1 раз когда мышка взяла элемент
//        col.addEventListener('dragover', handleDragOver2_post, false); // постоянно когда мишка сдвинута и находится на элементе
//        col.addEventListener('dragenter', handleDragEnter2_post, false); // 1 раз когда мышка на элементе
//        col.addEventListener('dragleave', handleDragLeave2_post, false); // 1 раз когда мышка выходит за элемент
//        col.addEventListener('drop', handleDrop2_post, false); // 1 раз когда отпускаем мышку на чужом элементе
        col.addEventListener('dragend', handleDragEnd2_post, false); // 1 раз когда отпускаем мышку
//        col.addEventListener('drag', handleDrag2_post, false); // постоянно когда мышка сдвинута и находится на элементе
    });
    //Drag'n'Drop post

    //Drag'n'Drop post scroll
    function handleDragEnter1_post_scroll(e) {

        var widget_scroll_bottom_t = $('.' + e.target.className + '_t').offset().top, w_h;

        if(e.target.className == 'widget_scroll_top'){
            w_h = 76;
        }else{
            w_h = document.documentElement.clientHeight;
        }

        $('html').animate({ scrollTop: widget_scroll_bottom_t - w_h }, 1100);

    }

    var widget_scroll = document.querySelectorAll('.widget_scroll_bottom, .widget_scroll_top');
    [].forEach.call(widget_scroll, function(col) {
        col.addEventListener('dragenter', handleDragEnter1_post_scroll, false);
    });
    //Drag'n'Drop post scroll

    $("body").on("click", ".company_card .get_widgets > span img",function(){

        var t = $(this),
            wac2_img_load = $('.wac2_img_load'),
            widgets = t.attr('data-widgets');
        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_widgets_delete',
                'widgets': widgets
            },
            function(result){
                t.parent().parent().html('');
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("click", "#company_post .get_widgets > span:nth-child(2) img",function(){

        var t = $(this),
            wac2_img_load = $('.wac2_img_load'),
            widgets = t.attr('data-widgets');
        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_widgets_delete_post',
                'widgets': widgets,
                'post_id': t.attr('data-post_id'),
                'asd': 'front'
            },
            function(result){
                t.closest('table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("click", ".add_row_widget_one" ,function(){

        var wac2_img_load = $('.wac2_img_load'),
            t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_row_widget_one',
                'post_id': t.attr('data-post_id'),
                'asd': 'front'
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".add_row_widget" ,function(){

        var wac2_img_load = $('.wac2_img_load'),
            t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_row_widget',
                'post_id': t.attr('data-post_id'),
                'asd': 'front'
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".delete_row_widget" ,function(){

        var wac2_img_load = $('.wac2_img_load'),
            t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'delete_row_widget',
                'post_id': t.attr('data-post_id'),
                'asd': 'front'
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    // ----------------------------

    $("body").on("click", ".add_widget_plus" ,function(){

        $(this).next().fadeIn("slow");

        return false;
    });

    $("body").on("click", ".add_widget_plus_i img" ,function(){

        var t = $(this);

        t.css({
            'background': 'greenyellow'
        });

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'widget_post_company',
                'widget': t.attr('data-i'),
                'widget_class': t.attr('data-class'),
                'post_id': t.attr('data-post_id'),
                'scroll': t.attr('data-v')
            },
            function(result){
                t.parent().parent().parent().html(result);
                t.css({
                    'background': 'none'
                });
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    /*visualization company*/

    // modal widget
    $('body').on('click', '.scroll_settings', function () {
        var elementClick = $(this).attr("data-v");
        $('.' + elementClick).fadeIn("slow");
        if(!$("div").is(".wac2_fon_z")){
            $( 'body' ).prepend( '<div class="wac2_fon_z"></div>' );
        }
        $('.wac2_fon_z').fadeIn("slow");
    });

    $('body').on('click', '.close_modal_widget img', function () {
        $(this).parent().parent().fadeOut("slow");
        $('.wac2_fon_z').fadeOut("slow");
    });

    $("body").on("submit", ".meta_box_detailed_description_company_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_detailed_description_company_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("submit", ".meta_box_special_block_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_special_block_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("submit", ".meta_box_basic_description_company_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_basic_description_company_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("submit", ".meta_box_forms_consultations_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_forms_consultations_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("submit", ".meta_box_countries_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_countries_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("submit", ".meta_box_contacts_f" ,function(e){
        e.preventDefault();

        var t = $(this),
            data = t.serialize();

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            data + '&action=meta_box_contacts_f',
            function(result){
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    //reviews
    $('.wac2_moderation_enable').click(function () {
        var moderation_enable = $(this).is(':checked');

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'wac2_moderation_enable',
                'moderation_enable': moderation_enable
            },
            success: function(data){
                wac2_img_load.fadeOut("slow");
            }
        });

    });

    $('body').on('click', '.wac2_moderation_approve', function () {
        var post_id, approve;
        post_id = $(this).attr('data-post_id');
        approve = $(this).attr('data-approve');

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'wac2_moderation_approve',
                'post_id': post_id,
                'approve': approve
            },
            success: function(data){
                $('.wac2_setting_tab_update').html(data);
                wac2_img_load.fadeOut("slow");
            }
        });

    });

    $('body').on('click', '.wac2_moderation_delete', function () {
        $('.wac_load_all').fadeIn("slow");
        var post_id, name, date, reviews, assessment_this, moderation_d;
        post_id = $(this).attr('data-post_id');
        name = $(this).attr('data-name');
        date = $(this).attr('data-date');
        reviews = $(this).attr('data-reviews');
        assessment_this = $(this).attr('data-assessment_this');
        moderation_d = $(this).attr('data-moderation_d');

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'wac2_moderation_delete',
                'post_id': post_id,
                'name': name,
                'date': date,
                'reviews': reviews,
                'assessment_this': assessment_this,
                'moderation_d': moderation_d
            },
            success: function(data){
                $('.wac2_setting_tab_update').html(data);
                wac2_img_load.fadeOut("slow");
            }
        });

    });
    //reviews

    //slider
    var files, wac2_img_slider_test = 0;

    $('#wac2_img_slider').change(function(e){
        files = this.files;
        wac2_img_slider_test = files.length;
    });

    $("body").on("submit", ".meta_box_slider_f" ,function(e){
        e.preventDefault();

        wac2_img_load.fadeIn("slow");
        var post_id = $(this).attr('data-post_id');

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            processData: false,
            contentType: false,
            data:  function() {
                var result = new FormData();

                result.append('action', 'meta_box_slider_f');
                result.append('post_id', post_id);

                if(wac2_img_slider_test == 1){
                    $.each(files, function(key, value) {
                        result.append(key, value);
                    });
                }

                return result;
            }(),
            success: function(data){
                $('.meta_box_slider .wac2_slider_block').html(data);
                wac2_img_load.fadeOut("slow");
            }
        });

    });

    $("body").on("click", ".slider_img_preview_delete img" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'slider_img_preview_delete_f',
                'src': t.attr('data-src'),
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('.meta_box_slider .wac2_slider_block').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    //slider

    var files_logo, wac2_img_logo_test = 0;

    $('#wac2_img_logo').change(function(e){
        files_logo = this.files;
        wac2_img_logo_test = files_logo.length;
    });

    $('.postimagediv_f').submit(function(e){
        e.preventDefault();

        wac2_img_load.fadeIn("slow");
        var post_id = $(this).attr('data-post_id');

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            processData: false,
            contentType: false,
            data:  function() {
                var result = new FormData();

                result.append('action', 'postimagediv_f');
                result.append('post_id', post_id);

                if(wac2_img_logo_test == 1){
                    $.each(files_logo, function(key, value) {
                        result.append(key, value);
                    });
                }

                return result;
            }(),
            success: function(data){
                $('.postimagediv_logo_v').html(data);
                wac2_img_load.fadeOut("slow");
            }
        });

    });

    $("body").on("click", ".postimagediv_delete img" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'postimagediv_delete',
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('.postimagediv_logo_v div').detach();
                $('#wac2_img_logo').val('');
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    //map
    $('.search_on_map').click(function () {
        showAddress( $('#address').val() );
    });

    $('.add_mark').click(function () {

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_mark',
                'address': $('#address').val(),
                'post_id': $(this).attr('data-post_id'),
                'post_title': $(this).attr('data-post_title')
            },
            function(result){
                $('.wac2_list_mark_address').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $('.wac2_update_map').click(function () {

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_update_map',
                'post_id': $(this).attr('data-post_id')
            },
            function(result){
                $('.wac2_update_map_go').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("click", ".delete_map_mark",function(){

        var t = $(this);
        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'delete_map_mark',
                'address': t.attr('data-address'),
                'position': t.attr('data-position'),
                'title': t.attr('data-title'),
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('.wac2_list_mark_address').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    //map
    // modal widget

    /*create all company*/
    $("body").on("click", ".wac2_create_company" ,function(){

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_create_company'
            },
            function(result){
                if(result == '0'){
                    $('.modal_create_company').fadeIn("slow");
                    if(!$("div").is(".wac2_fon_z")){
                        $( 'body' ).prepend( '<div class="wac2_fon_z"></div>' );
                    }
                    $('.wac2_fon_z').fadeIn("slow");
                }else{
                    $('.modal_rate').fadeIn("slow");
                    if(!$("div").is(".wac2_fon_z")){
                        $( 'body' ).prepend( '<div class="wac2_fon_z"></div>' );
                    }
                    $('.wac2_fon_z').fadeIn("slow");
                    // location.href = result;
                }
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("click", ".close_modal_create img" ,function(){

        $('.modal_create_company').fadeOut("slow");
        $('.wac2_fon_z').fadeOut("slow");

    });

    $("body").on("click", ".close_modal_rate img" ,function(){

        $('.modal_rate').fadeOut("slow");
        $('.wac2_fon_z').fadeOut("slow");

    });

    $("body").on("click", ".modal_create_company button" ,function(){

        if($('#create_title_company').val() == ''){
            $('#create_title_company').css({
                'background': 'red'
            });
            return false;
        }else{
            $('#create_title_company').css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        // if( !$('select').is('.country_s_g') ){
        //     $('.add__cat input').css({
        //         'background': 'red'
        //     });
        //     return false;
        // }else{
        //     $('.add__cat input').css({
        //         'background': 'rgba(0,0,0,.05)'
        //     });
        // }
        //
        // if( !$('select').is('.country_s_gg') ){
        //     $('.add_sub_cat input').css({
        //         'background': 'red'
        //     });
        //     return false;
        // }else{
        //     $('.add_sub_cat input').css({
        //         'background': 'rgba(0,0,0,.05)'
        //     });
        // }

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'modal_create_company',
                'name_company': $('#create_title_company').val(),
                'url': $(this).attr('data-url'),
                // 'cat_id': $('.country_s_gg').val()
            },
            function(result){
                location.href = result;
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    /*create all company*/

    $("body").on("click", ".delete_company" ,function(){

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'delete_company',
                'company_id': $(this).attr('data-company_id'),
                'url': $(this).attr('data-url')
            },
            function(result){
                wac2_img_load.fadeOut("slow");
                location.href = result;
            }
        );

    });

    $("body").on("change", ".country_s_g" ,function(){

        var t = $(this);

        if(t.val() == '0'){
            t.css({
                'background': 'red'
            });
            return false;
        }else{
            t.css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            {
                'action': 'country_s_g',
                'id_country': t.val(),
                'post_id': $('.choice_country button').attr('data-post_id')
            },
            function(result){
                $('.country_s_gg_update').html(result);
            }
        );

    }).trigger("change");

    $('.country_s_g').change(function () {

        var t = $(this);

        if(t.val() == '0'){
            t.css({
                'background': 'red'
            });
            return false;
        }else{
            t.css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            {
                'action': 'country_s_g',
                'id_country': t.val(),
                'post_id': $('.choice_country button').attr('data-post_id')
            },
            function(result){
                $('.country_s_gg_update').html(result);
            }
        );

    }).trigger("change");

    $("body").on("click", ".add_sub_cat img" ,function(){

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            {
                'action': 'add_sub_cat',
                'cat_sub_name': $('.add_sub_cat input').val(),
                'id_cat': $('.country_s_g').val()
            },
            function(result){
                $('.country_s_gg_update').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    $("body").on("click", ".add__cat img" ,function(){

        wac2_img_load.fadeIn("slow");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: {
                'action': 'add__cat',
                'cat__name': $('.add__cat input').val()
            },
            success: function(data){
                $('.country_s_g_update').html(data.s);

                console.log(data);
                console.log(data.s);
                console.log(data.c);

                ajaxurl = '/wp-admin/admin-ajax.php';
                jQuery.post(
                    ajaxurl,
                    {
                        'action': 'add_sub_cat_u',
                        'id_cat': data.c
                    },
                    function(result){
                        if(!$("div").is(".country_s_gg_update")){
                            $( '.qwert' ).after( '<div class="cc_s">Укажите категорию</div><div class="country_s_gg_update"></div>' );
                        }
                        $('.country_s_gg_update').html(result);
                    }
                );

                wac2_img_load.fadeOut("slow");
            }
        });

    });

    $("body").on("click", ".choice_country button" ,function(){

        if($('.country_s_g').val() == '0'){
            $('.country_s_g').css({
                'background': 'red'
            });
            return false;
        }else{
            $('.country_s_g').css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        if($('.country_s_gg').val() == '0'){
            $('.country_s_gg').css({
                'background': 'red'
            });
            return false;
        }else{
            $('.country_s_gg').css({
                'background': 'rgba(0,0,0,.05)'
            });
        }

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        jQuery.post(
            ajaxurl,
            {
                'action': 'choice_country',
                'cat_id': $('.country_s_gg').val(),
                'cat_id_h': $('.country_s_g').val(),
                'post_id': $(this).attr('data-post_id')
            },
            function(result){
                $('.preview_company > a').attr('href', result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });

    var view = 0;
    $("body").on("click", ".row_wac2_registration_company2 > div:nth-child(3) > div > img" ,function(){

        if(view == 0){
            $(this).parent().parent().parent().find('input').attr('type', 'text');
            view = 1;
        }else{
            $(this).parent().parent().parent().find('input').attr('type', 'password');
            view = 0;
        }

    });

});