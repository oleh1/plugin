<div class="company_card">
    <?php
    $row_widget_list = get_option('wac2_row_widget_list');
    if(!$row_widget_list){
        $row_widget_list = 1;
    }
    for($i = 1; (int)$row_widget_list >= $i; $i++){
        ?>
            <div class="get_widgets" draggable="false" data-i="<?= $i ?>">
                <?php do_action( 'all_widgets', $i );  ?>
            </div>
        <?php
    }
    ?>
</div>

<button class="add_row_widget_list">Добавить виджет</button><br>
<button class="delete_row_widget_list">Удалить виджет</button>

<div style="clear: both;"></div>
<hr>

<div id="widgets">
    <div class="put_widgets" draggable="true"><div class="wac2_logo"></div></div>
    <div class="put_widgets" draggable="true"><div class="wac2_basic_description_list"></div></div>
    <div class="put_widgets" draggable="true"><div class="wac2_countries"></div></div>
    <div class="put_widgets" draggable="true"><div class="wac2_rating"></div></div>
</div>

<img class="wac2_img_load" src="<?= plugins_url( '../../img/load.gif', __FILE__ ); ?>">