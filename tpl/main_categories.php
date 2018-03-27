<div class="wac2_breadcrumbs">
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

<div class="title_categories">Каталог стран по бизнесу</div>
<?php
$args = array(
    'type' => 'wac',
    'taxonomy' => 'category_wac',
    'order' => 'DESC',
    'parent' => 0,
    'hide_empty' => 0
);
$categories = get_categories( $args );

if( $categories ){
    foreach( $categories as $cat ){
        ?>
        <div class="wac2_main_categories">
            <div>
                <a href="<?= get_term_link( $cat->term_id, 'category_wac' ); ?>"><?= $cat->name; ?></a>
            </div>
            <div>
                <a href="<?= get_term_link( $cat->term_id, 'category_wac' ); ?>"><img src="<?= get_option('z_taxonomy_image'.$cat->term_id ); ?>"></a>
            </div>
        </div>
        <?php
    }
}
?>