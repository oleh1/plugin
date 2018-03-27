jQuery(document).ready(function ($) {

    var wac2_img_load = $('.wac2_img_load');

    //Drag'n'Drop list
    var dragSrcEl = null;

    function handleDragStart1(e) {
//        console.log('1 0'); // 1 раз когда мышка взяла элемент
        this.style.opacity = '0.4';
    }

    function handleDragOver1(e) {
//        console.log('1 1'); // постоянно когда мишка сдвинута и находится на элементе
        if (e.preventDefault) {
            e.preventDefault();
        }
        return false;
    }

    function handleDragEnter1(e) {
//        console.log('1 2'); // 1 раз когда мышка на элементе
        this.classList.add('over');
    }

    function handleDragLeave1(e) {
//        console.log('1 3'); // 1 раз когда мышка выходит за элемент
        this.classList.remove('over');
    }

    function handleDrop1(e) {
//        console.log('1 4'); // 1 раз когда отпускаем мышку на чужом элементе
        if (e.stopPropagation) {
            e.stopPropagation();
        }

        this.classList.remove('over');

        if (dragSrcEl != this) {
//            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');

            var t = this;

            wac2_img_load.fadeIn("slow");

            ajaxurl = '/wp-admin/admin-ajax.php';
            $.post(
                ajaxurl,
                {
                    'action': 'widget_list_company',
                    'widget': t.getAttribute('data-i'),
                    'widget_class': t.childNodes[0].className.split(/\s+/)[0]
                },
                function(result){
                    t.innerHTML = result;
                    wac2_img_load.fadeOut("slow");
                }
            );

        }

        return false;
    }

    function handleDragEnd1(e) {
//        console.log('1 5'); // 1 раз когда отпускаем мышку
        this.style.opacity = '1';
    }

    function handleDrag1() {
//        console.log('1 6'); // постоянно когда мышка сдвинута и находится на элементе
    }

    var company_card = document.querySelectorAll('.company_card .get_widgets');
    [].forEach.call(company_card, function(col) {
       // col.addEventListener('dragstart', handleDragStart1, false); // 1 раз когда мышка взяла элемент
        col.addEventListener('dragover', handleDragOver1, false); // постоянно когда мишка сдвинута и находится на элементе
        col.addEventListener('dragenter', handleDragEnter1, false); // 1 раз когда мышка на элементе
        col.addEventListener('dragleave', handleDragLeave1, false); // 1 раз когда мышка выходит за элемент
        col.addEventListener('drop', handleDrop1, false); // 1 раз когда отпускаем мышку на чужом элементе
        // col.addEventListener('dragend', handleDragEnd1, false); // 1 раз когда отпускаем мышку
       // col.addEventListener('drag', handleDrag1, false); // постоянно когда мышка сдвинута и находится на элементе
    });

//------------------------------------------------------------------------------------------------------------------------

    function handleDragStart2(e) {
//        console.log('2 0'); // 1 раз когда мышка взяла элемент
        this.style.opacity = '0.4';

        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragOver2(e) {
//        console.log('2 1'); // постоянно когда мишка сдвинута и находится на элементе
        if (e.preventDefault) {
            e.preventDefault();
        }
        return false;
    }

    function handleDragEnter2(e) {
//        console.log('2 2'); // 1 раз когда мышка на элементе
        this.classList.add('over');
    }

    function handleDragLeave2(e) {
//        console.log('2 3'); // 1 раз когда мышка выходит за элемент
        this.classList.remove('over');
    }

    function handleDrop2(e) {
//        console.log('2 4'); // 1 раз когда отпускаем мышку на чужом элементе
        if (e.stopPropagation) {
            e.stopPropagation();
        }

        return false;
    }

    function handleDragEnd2(e) {
//        console.log('2 5'); // 1 раз когда отпускаем мышку
        this.style.opacity = '1';
    }

    function handleDrag2() {
//        console.log('2 6'); // постоянно когда мышка сдвинута и находится на элементе
    }

    var widgets = document.querySelectorAll('#widgets .put_widgets');
    [].forEach.call(widgets, function(col) {
        col.addEventListener('dragstart', handleDragStart2, false); // 1 раз когда мышка взяла элемент
//        col.addEventListener('dragover', handleDragOver2, false); // постоянно когда мишка сдвинута и находится на элементе
//        col.addEventListener('dragenter', handleDragEnter2, false); // 1 раз когда мышка на элементе
//        col.addEventListener('dragleave', handleDragLeave2, false); // 1 раз когда мышка выходит за элемент
//        col.addEventListener('drop', handleDrop2, false); // 1 раз когда отпускаем мышку на чужом элементе
       col.addEventListener('dragend', handleDragEnd2, false); // 1 раз когда отпускаем мышку
//        col.addEventListener('drag', handleDrag2, false); // постоянно когда мышка сдвинута и находится на элементе
    });
    //Drag'n'Drop list

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
            w_h = document.body.clientHeight + 16;
        }

        if ($.browser.safari) {
            $('body').animate({ scrollTop: widget_scroll_bottom_t - w_h }, 1100);
        } else {
            $('html').animate({ scrollTop: widget_scroll_bottom_t - w_h }, 1100);
        }

    }

    var widget_scroll = document.querySelectorAll('.widget_scroll_bottom, .widget_scroll_top');
    [].forEach.call(widget_scroll, function(col) {
        col.addEventListener('dragenter', handleDragEnter1_post_scroll, false);
    });
    //Drag'n'Drop post scroll

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

    $("body").on("click", ".company_card .get_widgets > span img",function(){

        var t = $(this),
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
            widgets = t.attr('data-widgets');
        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_widgets_delete_post',
                'widgets': widgets,
                'post_id': t.attr('data-post_id')
            },
            function(result){
                t.closest('table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

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

    $("body").on("click", ".wac2_upload_image_button",function(){

        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $('.wac2_img_slider').attr('src', attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });

    $("body").on("click", ".wac2_load_image_button",function(){

        var img_slider = $('.wac2_img_slider');

        if(img_slider.attr('src').match(/no_img/)){
            return false;
        }

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'wac2_load_image_button',
                'src': img_slider.attr('src'),
                'post_id': img_slider.attr('data-post_id')
            },
            function(result){
                $('.slider_img_preview').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".slider_img_preview_delete img" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'slider_img_preview_delete',
                'src': t.attr('data-src'),
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('.slider_img_preview').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );

    });
    //slider

    $("body").on("click", ".add_row_widget_one" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_row_widget_one',
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".add_row_widget" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_row_widget',
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".delete_row_widget" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'delete_row_widget',
                'post_id': t.attr('data-post_id')
            },
            function(result){
                $('#company_post > table').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".add_row_widget_list" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'add_row_widget_list'
            },
            function(result){
                $('.company_card').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
    });

    $("body").on("click", ".delete_row_widget_list" ,function(){

        var t = $(this);

        wac2_img_load.fadeIn("slow");

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'delete_row_widget_list'
            },
            function(result){
                $('.company_card').html(result);
                wac2_img_load.fadeOut("slow");
            }
        );
        return false;
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

    $('body').on('click', '.scroll_settings', function () {
        var elementClick = $(this).attr("data-v");
        var destination = $( "#" + elementClick ).offset().top;
        if ($.browser.safari) {
            $('body').animate({ scrollTop: destination - 42 }, 500);
            $( "#" + elementClick ).css({
                'box-shadow': '0 0 45px rgba(47,360,0,0.5)'
            });
            setTimeout(function () {
                $( "#" + elementClick ).css({
                    'box-shadow': '0 1px 1px rgba(0,0,0,.04)'
                });
            }, 1000);
        } else {
            $( "#" + elementClick ).css({
                'box-shadow': '0 0 45px rgba(47,360,0,0.5)'
            });
            setTimeout(function () {
                $( "#" + elementClick ).css({
                    'box-shadow': '0 1px 1px rgba(0,0,0,.04)'
                });
            }, 1000);
            $('html').animate({ scrollTop: destination - 42 }, 500);
        }
        return false;
    });

    // visualization company
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
    // visualization company

});