<?php
if (is_user_logged_in()) {
    global $user_ID;

    $uri = preg_replace_callback('#(.*)\?.*#', function ($v){
        return $v[1];
    }, $_SERVER['REQUEST_URI']);

    $user_data = get_userdata( $user_ID );
?>
    <div class="wac2_head_user">
        <?php if(!empty($_GET['personal_area'])){ ?>
            <div class="wac2_i"><a href="https://<?= $_SERVER['HTTP_HOST'].$uri ?>">Назад</a></div>
        <?php } ?>
        <div class="wac2_i"><?= $user_data->data->display_name ?></div>
        <?php if(!empty($_GET['personal_area'] == 'company')){ ?>
            <div class="wac2_i preview_company"><a href="<?= get_permalink( $_GET['company_id'] ) ?>">Просмотреть</a></div>
            <div class="wac2_i delete_company" data-url="<?= $uri ?>" data-company_id="<?= $_GET['company_id'] ?>">Удалить компанию</div>
        <?php } ?>
        <div class="wac2_i"><a class="logout_button" href="<?php echo wp_logout_url( $uri ); ?>">Выйти</a></div>
    </div>

    <div id="wac2_company_personal_area">

        <?php
        if($_GET['personal_area'] == 'all_company'){
            include dirname(__FILE__). '/wac2_company_personal_area_all_company.php';
        }else if($_GET['personal_area'] == 'company'){
            include dirname(__FILE__). '/wac2_company_personal_area_update.php';
        }else if($_GET['personal_area'] == 'rate'){
            include dirname(__FILE__). '/rate.php';
        }else{
            include dirname(__FILE__). '/wac2_company_personal_area_create_all.php';
        }
        ?>

    </div>

<?php } else {
    include dirname(__FILE__) . '/registration_login_form.php';
} ?>

<img class="wac2_img_load" src="<?= plugins_url( '../img/load.gif', __FILE__ ); ?>">