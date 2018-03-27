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

            <input type="text" id="address" style="width:100%;" placeholder="Россия, Москва, улица Новый Арбат, 24" />
            <input type="button" class="search_on_map" value="Искать на карте" />
            <input type="button" class="add_mark" data-post_id="<?= $post->ID; ?>" data-post_title="<?= $post->post_title; ?>" value="Добавить метку">
            <div id="YMapsID" style="width:100%;height:400px"></div>
            <div style="font-size: 20px;font-weight: bold;">Список всех меток:</div>

            <div class="wac2_list_mark_address">
                <?php
                $wac2_list_mark_address = get_post_meta( $post->ID, 'wac2_list_mark_address' );
                $wac2_list_mark_address_point_lat_lon = get_post_meta( $post->ID, 'wac2_list_mark_address_point_lat_lon' );
                $wac2_list_mark_address_point_title = get_post_meta( $post->ID, 'wac2_list_mark_address_point_title' );
                for($i = 0; count($wac2_list_mark_address) > $i; $i++){

                    ?><a href="javascript:showAddress('<?= $wac2_list_mark_address[$i]; ?>')"><?= $wac2_list_mark_address[$i]; ?></a> <span data-post_id="<?= $post->ID ?>" data-address="<?= $wac2_list_mark_address[$i] ?>" data-position="<?= $wac2_list_mark_address_point_lat_lon[$i] ?>" data-title="<?= $wac2_list_mark_address_point_title[$i] ?>" class="delete_map_mark">Удалить</span><br /><?php

                }
                ?>
            </div>

        </div>
        <div class="wac2_tab wac2_tab_2">

            <input type="button" class="wac2_update_map" data-post_id="<?= $post->ID ?>" value="Обновить карту">

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

<img class="wac2_img_load" src="<?= plugins_url( '../../img/load.gif', __FILE__ ); ?>">