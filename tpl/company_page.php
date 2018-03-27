<?php
if (have_posts()) {
    while (have_posts()) { the_post();

        $wac2_row_widget_one = get_post_meta(get_the_ID(), 'wac2_row_widget_one');
        $row_widget = get_post_meta(get_the_ID(), 'wac2_row_widget', true);
        if(!$row_widget){
            $row_widget = 2;
        }
        ?>
        <div class="wac2_one_post_company">

            <?php
            if (function_exists('breadcrumbs')){
                ob_start();
                breadcrumbs();
                $breadcrumbs = ob_get_clean();
                $breadcrumbs = preg_replace_callback('#<meta itemprop="position" content="1" />#Ui', function ($v){
                    static $i = 0;
                    $i++;
                    return '<meta itemprop="position" content="'.$i.'" />';
                }, $breadcrumbs);
                echo $breadcrumbs;
            }
            ?>

        <?php
        for($i = 1; (int)$row_widget >= $i; $i++){

            if( in_array($i ,$wac2_row_widget_one) ){
                ?>
                <div class="wac2_grid_one"><?php do_action( 'all_widgets_one_post', $i, get_the_ID() ); ?></div>
                <?php
            }else{
            ?>
            <div class="wac2_grid">
                <div>
                    <?php do_action( 'all_widgets_one_post', $i, get_the_ID() ); ?>
                </div>
                <div>
                    <?php do_action( 'all_widgets_one_post', ++$i, get_the_ID() ); ?>
                </div>
            </div>
            <?php
        }
        ?><div style="clear: both;"></div><?php
        }
        ?>
        </div>
        <?php
    }
}
?>

<img class="wac2_img_load" src="<?= plugins_url( '../img/load.gif', __FILE__ ); ?>">