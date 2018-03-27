<?php
$cat_id = $wp_query->get_queried_object_id();
$cat_name = get_term( $cat_id, 'category_wac');
?>

    <div class="wac2_breadcrumbs_sub">
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
    </div>

<h1><?= $cat_name->name; ?></h1>

<?php
$args = array(
    'type' => 'wac',
    'taxonomy' => 'category_wac',
    'order' => 'DESC',
    'hide_empty' => 0,
    'parent' => $cat_id
);
$categories = get_categories( $args );

if( $categories ){
    foreach( $categories as $cat ){

        ?>
        <div class="wac2_sub_categories">
            <div>
                <a href="<?= get_term_link( $cat->term_id, 'category_wac' ); ?>"><?= $cat->name; ?></a>
            </div>
            <div>
                <a href="<?= get_term_link( $cat->term_id, 'category_wac' ); ?>"><img src="<?= get_option('z_taxonomy_image'.$cat->term_id ); ?>"></a>
            </div>
        </div>
        <?php

    }
}else{

    if (have_posts()) {
        while (have_posts()) { the_post();

        ?><div class="one_company_list">
            <div class="wac2_r_list">
            <?php
            $row_widget_list = get_option('wac2_row_widget_list');
            if(!$row_widget_list){
                $row_widget_list = 1;
            }
            for($i = 1; (int)$row_widget_list >= $i; $i++){
                do_action( 'all_widgets_list', $i, get_the_ID() );
            }

            ?></div></div><?php

        }

    }

}
?>