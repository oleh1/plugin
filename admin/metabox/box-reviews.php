<?php
global $user_ID;
$reviews_date = get_post_meta($post->ID, 'reviews_date');
$assessment_this = get_post_meta($post->ID, 'assessment_this');
$reviews_name = get_post_meta($post->ID, 'reviews_name');
$reviews = get_post_meta($post->ID, 'reviews');
$moderation_r = get_post_meta($post->ID, 'moderation');

$moderation_enable = get_option('wac2_moderation_user_id_'.$user_ID);
if($moderation_enable == 'true'){
    $moderation = 'checked';
}else{
    $moderation = '';
}

$approve_r = get_post_meta($post->ID, 'approve');

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
<div>Включить модерацию для всех компаний <input type="checkbox" class="wac2_moderation_enable" <?= $moderation; ?>></div>

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
            <div class="wac2_moderation_date wac2_i"><?= $reviews_date[$i]; ?></div><div class="wac2_i wac2_moderation_m"><?php if( $r ){ ?><a class="wac2_moderation_approve" data-approve="<?= $moderation_r[$i]; ?>" data-post_id="<?= $post->ID; ?>">Одобрить</a><?php } ?><a data-name="<?= $reviews_name[$i]; ?>" data-date="<?= $reviews_date[$i]; ?>" data-reviews="<?= $reviews[$i]; ?>" data-assessment_this="<?= $assessment_this[$i]; ?>" data-post_id="<?= $post->ID; ?>" data-moderation_d="<?= $moderation_r[$i]; ?>" class="wac2_moderation_delete">Удалить</a></div>
        </div>
    <?php } ?>
</div>

<img class="wac2_img_load" src="<?= plugins_url( '../../img/load.gif', __FILE__ ); ?>">