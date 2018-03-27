<?php get_header(); ?>

    <div id="main-content">
        <div class="container">
            <div id="content-area" class="clearfix">
                <div class="et_pb_extra_column_main">

                    <?php
                    $url_cat = $_SERVER['REQUEST_URI'];
                    $url_cat = explode('/', $url_cat);

                    if($url_cat[1] == 'wac' && count($url_cat) == 2){

                        include 'main_categories.php';

                    }else if(count($url_cat) == 3){

                        include 'subcategories.php';

                    }else if(is_single()){

                        include 'company_page.php';

                    }

                    ?>

                </div><!-- /.et_pb_extra_column.et_pb_extra_column_main -->
                <?php get_sidebar(); ?>
            </div> <!-- #content-area -->
        </div> <!-- .container -->
    </div>

<?php get_footer(); ?>