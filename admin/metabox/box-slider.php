<div class="wac2_slider_block">
    <div class="wac2_slider">
        <?php
        $slider_img = get_post_meta($post->ID, 'wac2_slider_img');
        foreach ($slider_img as $s_i1){
            ?><div><img src="<?= $s_i1 ?>"></div><?php
        }
        ?>
    </div>

    <img class="wac2_img_slider" data-post_id="<?= $post->ID ?>" src="<?= plugins_url( '../../img/no_img.png', __FILE__ ); ?>" width="100px" height="70px">
    <div>
        <button class="wac2_upload_image_button">Выбрать изображение</button>
        <button class="wac2_load_image_button">Загрузить изображение</button>
    </div>

    <div class="slider_img_preview">
    <?php
    foreach ($slider_img as $s_i2){
        ?>
        <img src="<?= $s_i2 ?>" width="100px" height="70px">
        <span class="slider_img_preview_delete"><img data-post_id="<?= $post->ID ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( '../../img/delete.png', __FILE__ ); ?>"></span>
        <?php
    }
    ?>
    </div>
</div>

<img class="wac2_img_load" src="<?= plugins_url( '../../img/load.gif', __FILE__ ); ?>">