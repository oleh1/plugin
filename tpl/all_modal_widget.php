<div class="meta_box_detailed_description_company wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="title_modal_widget">Детальное описание</div>
    <form method="post" class="meta_box_detailed_description_company_f">
        <?php
        $detailed_description_company = get_post_meta($company_id, 'wac2_detailed_description_company', true);
        wp_editor($detailed_description_company, 'detailed_description_company', array(
            'textarea_name' => 'detailed_description_company',
            'wpautop'       => 1,
            'media_buttons' => 0,
            'textarea_rows' => 10,
            'tabindex'      => null,
            'editor_css'    => '',
            'editor_class'  => '',
            'teeny'         => 1,
            'dfw'           => 0,
            'tinymce'       => 1,
            'quicktags'     => 1,
            'drag_drop_upload' => false
        ) );
        ?>
        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_special_block wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="title_modal_widget">СПЕЦ. БЛОК</div>
    <form method="post" class="meta_box_special_block_f">
        <?php
        $special_block = get_post_meta($company_id, 'wac2_special_block', true);
        wp_editor($special_block, 'special_block', array(
            'textarea_name' => 'special_block',
            'wpautop'       => 1,
            'media_buttons' => 0,
            'textarea_rows' => 10,
            'tabindex'      => null,
            'editor_css'    => '',
            'editor_class'  => '',
            'teeny'         => 1,
            'dfw'           => 0,
            'tinymce'       => 1,
            'quicktags'     => 1,
            'drag_drop_upload' => false
        ) );
        ?>
        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_basic_description_company wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="title_modal_widget">Основное описание</div>
    <form method="post" class="meta_box_basic_description_company_f">
        <label for="title_company_modal">Название компании</label> <input id="title_company_modal" name="title_company" type="text" value="<?= $company_data->post_title ?>">
        <?php
        $special_block = get_post_meta($company_id, 'wac2_basic_description_company', true);
        wp_editor($special_block, 'basic_description_company', array(
            'textarea_name' => 'basic_description_company',
            'wpautop'       => 1,
            'media_buttons' => 0,
            'textarea_rows' => 10,
            'tabindex'      => null,
            'editor_css'    => '',
            'editor_class'  => '',
            'teeny'         => 1,
            'dfw'           => 0,
            'tinymce'       => 1,
            'quicktags'     => 1,
            'drag_drop_upload' => false
        ) );
        ?>

        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_forms_consultations wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <form method="post" class="meta_box_forms_consultations_f">
        <div><label for="consultations_mail">Укажите почту на которое будет приходить сообщение от формы "Консультация по почте" и "Консультация по телефону"</label></div>
        <input id="consultations_mail" name="consultations_mail" type="text" value="<?= get_post_meta($company_id, 'wac2_forms_consultations_mail', true); ?>">
        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_countries wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <?php
    $wac2_countries = get_post_meta($company_id, 'wac2_countries', true);
    $countries = $this->wac2_countries_all_array();
    ?>
    <form method="post" class="meta_box_countries_f">
        <div class="countries_title">Укажите страну компании</div>
        <select name="countries">
            <?php
            foreach ($countries as $name => $data){
                if($wac2_countries == $name){
                    $selected = ' selected ';
                }else{
                    $selected = '';
                }
                ?>
                <option value="<?= $name ?>" <?= $selected ?>><?= $data[0] ?></option>
                <?php
            }
            ?>
        </select>
        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_contacts wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="contacts_title">Контакты</div>
    <?php
    $wac2_contacts_address_company = get_post_meta($company_id, 'wac2_contacts_address_company', true);
    $wac2_contacts_site_company = get_post_meta($company_id, 'wac2_contacts_site_company', true);
    $wac2_contacts_mail_company = get_post_meta($company_id, 'wac2_contacts_mail_company', true);
    $wac2_contacts_phone_company = get_post_meta($company_id, 'wac2_contacts_phone_company', true);
    $wac2_contacts_fax_company = get_post_meta($company_id, 'wac2_contacts_fax_company', true);
    $wac2_contacts_consular_districts_company = get_post_meta($company_id, 'wac2_contacts_consular_districts_company', true);
    ?>
    <form class="meta_box_contacts_f" method="post">
        <div>
            <div><label for="contacts_address_company">Адрес</label></div> <input type="text" id="contacts_address_company" name="contacts_address_company" value="<?= $wac2_contacts_address_company ?>">
        </div>
        <div>
            <div><label for="contacts_site_company">Сайт</label></div> <input type="text" id="contacts_site_company" name="contacts_site_company" value="<?= $wac2_contacts_site_company ?>">
        </div>
        <div>
            <div><label for="contacts_mail_company">E-mail</label></div> <input type="text" id="contacts_mail_company" name="contacts_mail_company" value="<?= $wac2_contacts_mail_company ?>">
        </div>
        <div>
            <div><label for="contacts_phone_company">Телефон</label></div> <input type="text" id="contacts_phone_company" name="contacts_phone_company" value="<?= $wac2_contacts_phone_company ?>">
        </div>
        <div>
            <div><label for="contacts_fax_company">Факс</label></div> <input id="contacts_fax_company" type="text" name="contacts_fax_company" value="<?= $wac2_contacts_fax_company ?>">
        </div>
        <div>
            <div><label for="contacts_consular_districts_company">Консульские округа</label></div> <textarea id="contacts_consular_districts_company" name="contacts_consular_districts_company"><?= $wac2_contacts_consular_districts_company ?></textarea>
        </div>
        <input type="hidden" name="post_id" value="<?= $company_id ?>">
        <input type="submit" value="Сохранить">
    </form>
</div>



<div class="meta_box_reviews wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="reviews_title">Отзывы</div>
    <?php
    global $user_ID;
    $reviews_date = get_post_meta($company_id, 'reviews_date');
    $assessment_this = get_post_meta($company_id, 'assessment_this');
    $reviews_name = get_post_meta($company_id, 'reviews_name');
    $reviews = get_post_meta($company_id, 'reviews');
    $moderation_r = get_post_meta($company_id, 'moderation');

    $moderation_enable = get_option('wac2_moderation_user_id_'.$user_ID);
    if($moderation_enable == 'true'){
        $moderation = 'checked';
    }else{
        $moderation = '';
    }

    $approve_r = get_post_meta($company_id, 'approve');

    foreach ($moderation_r as $key => $v ){
        if(is_array($approve_r)){

            if(in_array($v, $approve_r)){
                $v = '0_'.$key;
            }else{
                $v = explode('_', $v);
                $v = $v[0].'_'.$key;
            }

        }else{
            $v = explode('_', $v);
            $v = $v[0].'_'.$key;
        }

        $res[] = $v;
    }
    ?>
    <div><label for="reviews_w">Включить модерацию для всех компаний</label> <input id="reviews_w" type="checkbox" class="wac2_moderation_enable" <?= $moderation; ?>></div>
    <div class="wac2_setting_tab_update">
        <?php for ($i = 0; $i < count($reviews); $i++){
            if($res[$i] == '1_'.$i){
                $r = true;
            }else{
                $r = false;
            }

            if($assessment_this[$i] == 1) {
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:darkgrey"';
                $style3 = 'style="color:darkgrey"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($assessment_this[$i] == 2){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:darkgrey"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($assessment_this[$i] == 3){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($assessment_this[$i] == 4){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:gold"';
                $style5 = 'style="color:darkgrey"';
            }else if($assessment_this[$i] == 5){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:gold"';
                $style5 = 'style="color:gold"';
            }
            ?>
            <div class="wac2_moderation">
                <div>
                    <div class="wac2_i wac2_moderation_name"><?= $reviews_name[$i]; ?></div>
                    <div class="wac2_i">
                        <?php if(!empty($assessment_this[$i])){ ?>
                            <div <?= $style1; ?> class="wac2_i">&#9733;</div><div <?= $style2; ?> class="wac2_i">&#9733;</div><div <?= $style3; ?> class="wac2_i">&#9733;</div><div <?= $style4; ?> class="wac2_i">&#9733;</div><div <?= $style5; ?> class="wac2_i">&#9733;</div>
                        <?php } ?>
                    </div>
                </div>
                <div><?= $reviews[$i]; ?></div>
                <div class="wac2_moderation_date wac2_i"><?= $reviews_date[$i]; ?></div><div class="wac2_i wac2_moderation_m"><?php if( $r ){ ?><a class="wac2_moderation_approve" data-approve="<?= $moderation_r[$i]; ?>" data-post_id="<?= $company_id; ?>">Одобрить</a><?php } ?><a data-name="<?= $reviews_name[$i]; ?>" data-date="<?= $reviews_date[$i]; ?>" data-reviews="<?= $reviews[$i]; ?>" data-assessment_this="<?= $assessment_this[$i]; ?>" data-post_id="<?= $post->ID; ?>" data-moderation_d="<?= $moderation_r[$i]; ?>" class="wac2_moderation_delete">Удалить</a></div>
            </div>
        <?php } ?>
    </div>
</div>



<div class="meta_box_slider wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="slider_title">Слайдер</div>
    <div class="wac2_slider_block">
        <div class="wac2_slider">
            <?php
            $slider_img = get_post_meta($company_id, 'wac2_slider_img');
            foreach ($slider_img as $s_i1){
                ?><div><img src="<?= $s_i1 ?>"></div><?php
            }
            ?>
        </div>
        <div class="slider_img_preview">
            <?php
            foreach ($slider_img as $s_i2){
                ?>
                <img src="<?= $s_i2 ?>" width="100px" height="70px">
                <span class="slider_img_preview_delete"><img data-post_id="<?= $company_id ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( '../img/delete.png', __FILE__ ); ?>"></span>
                <?php
            }
            ?>
        </div>
    </div>
    <div>
        <form class="meta_box_slider_f" enctype="multipart/form-data" method="post" data-post_id="<?= $company_id ?>">
            <input type="file" name="wac2_img_slider" id="wac2_img_slider" accept="image/*">
            <input type="submit" value="Загрузить изображение">
        </form>
    </div>
</div>



<div class="postimagediv wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="postimagediv_title">Логотип компании</div>
    <div class="postimagediv_logo_v">
    <?php
    $postimagediv_logo = get_the_post_thumbnail( $company_id, 'full' );
    if($postimagediv_logo){
    ?>
        <div class="postimagediv_delete"><img data-post_id="<?= $company_id ?>" src="<?= plugins_url( '../img/delete.png', __FILE__ ); ?>"></div>
        <div><?= $postimagediv_logo ?></div>
    <?php } ?>
    </div>
    <form class="postimagediv_f" enctype="multipart/form-data" method="post" data-post_id="<?= $company_id ?>">
        <input type="file" name="wac2_img_logo" id="wac2_img_logo" accept="image/*">
        <input type="submit" value="Загрузить логотип">
    </form>
</div>



<div class="meta_box_map_setup wac2_w_w_h">
    <div class="close_modal_widget"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div id="wac2_tabrl">
        <input type="radio" name="wac2_tablerl" id="wac2_n1" checked>
        <label for="wac2_n1">Добавление меток на карту</label>
        <input type="radio" name="wac2_tablerl" id="wac2_n2">
        <label for="wac2_n2">Расположение меток на карте</label>
        <div id="wac2_tablerl">
            <div class="wac2_tab wac2_tab_1">

                <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                <script type="text/javascript">
                    var map;

                    ymaps.ready(function () {

                        map = new ymaps.Map('YMapsID', {
                            center: [55.76, 37.64],
                            zoom: 10
                        });

                    });

                    function showAddress (value) {

                        map.geoObjects.remove( map.geoObjects.get(0) );

                        var geocoder = new ymaps.geocode(value, {results: 1, boundedBy: map.geoObjects.getBounds()});

                        geocoder.then(
                            function (res) {
                                if (res.geoObjects.getLength()) {

                                    // point - первый элемент коллекции найденных объектов
                                    var point = res.geoObjects.get(0);
                                    // Добавление полученного элемента на карту
                                    map.geoObjects.add(point);
                                    // Центрирование карты на добавленном объекте
                                    map.panTo(point.geometry.getCoordinates());
                                }
                            },
                            // Обработка ошибки
                            function (error) {
                                alert("Возникла ошибка: " + error.message);
                            }
                        );

                    }
                </script>

                <?php
                $post_company = get_post( $company_id );
                ?>

                <input type="text" id="address" placeholder="Россия, Москва, улица Новый Арбат, 24" />
                <input type="button" class="search_on_map" value="Искать на карте" />
                <input type="button" class="add_mark" data-post_id="<?= $post_company->ID ?>" data-post_title="<?= $post_company->post_title ?>" value="Добавить метку">
                <div id="YMapsID" style="width:100%;height:400px"></div>
                <div style="font-size: 20px;font-weight: bold;">Список всех меток:</div>

                <div class="wac2_list_mark_address">
                    <?php
                    $wac2_list_mark_address = get_post_meta( $post_company->ID, 'wac2_list_mark_address' );
                    $wac2_list_mark_address_point_lat_lon = get_post_meta( $post_company->ID, 'wac2_list_mark_address_point_lat_lon' );
                    $wac2_list_mark_address_point_title = get_post_meta( $post_company->ID, 'wac2_list_mark_address_point_title' );
                    for($i = 0; count($wac2_list_mark_address) > $i; $i++){

                        ?><a href="javascript:showAddress('<?= $wac2_list_mark_address[$i]; ?>')"><?= $wac2_list_mark_address[$i]; ?></a> <span data-post_id="<?= $post_company->ID ?>" data-address="<?= $wac2_list_mark_address[$i] ?>" data-position="<?= $wac2_list_mark_address_point_lat_lon[$i] ?>" data-title="<?= $wac2_list_mark_address_point_title[$i] ?>" class="delete_map_mark">Удалить</span><br /><?php

                    }
                    ?>
                </div>

            </div>
            <div class="wac2_tab wac2_tab_2">

                <input type="button" class="wac2_update_map" data-post_id="<?= $post_company->ID ?>" value="Обновить карту">

                <div class="wac2_update_map_go">

                    <div id="wac2_map" style="width:100%;height:400px"></div>

                    <?php
                    $point_home = explode('_', $wac2_list_mark_address_point_lat_lon[0]);
                    if($point_home[0] != ''){
                        $l1 = $point_home[1];
                        $l2 = $point_home[0];
                    }else{
                        $l1 = '55.76';
                        $l2 = '37.64';
                    }
                    ?>

                    <script type="text/javascript">
                        ymaps.ready(init);

                        function init () {
                            var myMap = new ymaps.Map('wac2_map', {
                                    center: [<?= $l1 ?>, <?= $l2 ?>],
                                    zoom: 10
                                }),
                                objectManager = new ymaps.ObjectManager({
                                    clusterize: true
                                });

                            myMap.geoObjects.add(objectManager);

                            var collection = {
                                type: 'FeatureCollection',
                                features: [

                                        <?php
                                        for($i = 0; count($wac2_list_mark_address) > $i; $i++){
                                        $point = explode('_', $wac2_list_mark_address_point_lat_lon[$i]);
                                        ?>{ type: 'Feature', id: <?= $i ?>, geometry: { type: 'Point', coordinates: [<?= $point[1] ?>, <?= $point[0] ?>] }, properties: { hintContent: '<?= $wac2_list_mark_address[$i] ?>', balloonContent: '<?= $wac2_list_mark_address_point_title[$i] ?>' } },<?php
                                    }
                                    ?>

                                ]
                            }

                            objectManager.add(collection);
                            myMap.setBounds(myMap.geoObjects.getBounds());

                        }
                    </script>

                </div>

            </div>
        </div>
    </div>
</div>