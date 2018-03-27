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

        var wac2_img_load = $('.wac2_img_load');
        wac2_img_load.show();

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
                wac2_img_load.hide();
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

        var wac2_img_load = $('.wac2_img_load');
        wac2_img_load.show();

        ajaxurl = '/wp-admin/admin-ajax.php';
        $.post(
            ajaxurl,
            {
                'action': 'widget_post_company',
                'widget': t.getAttribute('data-i'),
                'widget_class': t.childNodes[0].className.split(/\s+/)[0],
                'post_id': t.getAttribute('data-post_id'),
                'scroll': t.childNodes[0].getAttribute('data-v')
            },
            function(result){
                t.innerHTML = result;
                wac2_img_load.hide();
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
//        col.addEventListener('dragstart', handleDragStart1_post, false); // 1 раз когда мышка взяла элемент
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

    $('.widget_scroll_bottom').show();
    $('.widget_scroll_top').show();
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

    $('.widget_scroll_bottom').hide();
    $('.widget_scroll_top').hide();
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