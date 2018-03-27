<div class="create_all_company">

    <div><button class="wac2_create_company">Создать компанию</button></div>

    <div><button class="wac2_all_company" onclick="location.href = '?personal_area=all_company'">Все компании</button></div>

</div>

<div class="modal_create_company">
    <div class="close_modal_create"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>
    <div class="create_title_company"><label for="create_title_company">Название компании</label></div>
    <div><input id="create_title_company" type="text"></div>
    <!--<div class="cc_s">Укажите страну</div>
    <div class="qwert">
    <div class="country_s_g_update">
    <?php
/*    $args = array(
        'parent' => 0,
        'hide_empty' => 0,
        'taxonomy' => 'category_' . $this->type
    );
    $cat_p = get_categories($args);
    if($cat_p){
    */?>
    <select class="country_s_g">
    <?php
/*    foreach ($cat_p as $cat){
        */?>
        <option value="<?/*= $cat->term_id */?>"><?/*= $cat->name */?></option>
        <?php
/*    }
    */?>
    </select>
    <?php /*} */?>
    </div>
    <div class="add__cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?/*= plugins_url( '../img/plus.png', __FILE__ ); */?>"></div>
    </div>
    <?php /*if($cat_p){ */?>
    <div class="cc_s">Укажите категорию</div>
    <div class="country_s_gg_update">
    </div>
    --><?php /*} */?>
    <div><button data-url="<?= $_SERVER['REQUEST_URI'] ?>">Создать</button></div>
</div>

<div class="modal_rate">
    <div class="close_modal_rate"><img src="<?= plugins_url( '../img/cross-remove-sign.png', __FILE__ ); ?>"></div>

    <div>Ваш тариф включает создание только одной компании. Чтобы изменить тариф перейдите по <a href="https://<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?personal_area=rate' ?>">ссылке</a>.</div>

</div>