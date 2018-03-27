<?php
class WAC{

    private $type;

    function __construct( $type ){

        $this->type = $type;

        $this->inint();
    }

    private function inint(){

        add_action('init',						                                [$this, 'create']);
        add_action('init',						                                [$this, 'taxonomy'], 0);
        add_action('admin_init',				                                [$this, 'metabox']);
        add_action('admin_menu',				                                [$this, 'menu'] );

        add_filter('post_link',					                                [$this, 'rules'], 20, 3);
        add_filter('post_type_link',			                                [$this, 'rules'], 20, 3);
        add_filter('request',					                                [$this, 'rewrite'], 1, 1);

        add_action('wp_enqueue_scripts',		                                [$this, 'fronted']);
        add_action('admin_enqueue_scripts',		                                [$this, 'backend']);
        add_filter('template_include',			                                [$this, 'include_tpl'], 1);

        add_action("all_widgets",                                               [$this, 'all_widgets'], 10, 1);

        add_action("wp_ajax_widget_list_company",                               [$this, 'widget_list_company']);
        add_action("wp_ajax_nopriv_widget_list_company",                        [$this, 'widget_list_company']);

        add_action("widgets_post",                                              [$this, 'widgets_post'], 10, 2);

        add_action("wp_ajax_widget_post_company",                               [$this, 'widget_post_company']);
        add_action("wp_ajax_nopriv_widget_post_company",                        [$this, 'widget_post_company']);

        add_action("wp_ajax_add_mark",                                          [$this, 'add_mark']);
        add_action("wp_ajax_nopriv_add_mark",                                   [$this, 'add_mark']);

        add_action("wp_ajax_wac2_update_map",                                   [$this, 'wac2_update_map']);
        add_action("wp_ajax_nopriv_wac2_update_map",                            [$this, 'wac2_update_map']);

        add_action("all_widgets_list",                                          [$this, 'all_widgets_list'], 10, 2);

        add_action("all_widgets_one_post",                                      [$this, 'all_widgets_one_post'], 10, 2);

        add_action("wp_ajax_wac2_widgets_delete",                               [$this, 'wac2_widgets_delete']);
        add_action("wp_ajax_nopriv_wac2_widgets_delete",                        [$this, 'wac2_widgets_delete']);

        add_action("wp_ajax_wac2_widgets_delete_post",                          [$this, 'wac2_widgets_delete_post']);
        add_action("wp_ajax_nopriv_wac2_widgets_delete_post",                   [$this, 'wac2_widgets_delete_post']);

        add_action('admin_init',						                        [$this, 'add_role_company']);

        add_shortcode('company_personal_area',                                  [$this, 'company_personal_area']);

        add_action('init',                                                      [$this, 'ajax_login_init']);

        add_action('init',                                                      [$this, 'remove_admin_bar']);

        add_action("wp_ajax_delete_map_mark",                                   [$this, 'delete_map_mark']);
        add_action("wp_ajax_nopriv_delete_map_mark",                            [$this, 'delete_map_mark']);

        add_action('admin_init',                                                [$this, 'remove_editor']);

        add_action('save_post',                                                 [$this, 'wac2_save_post']);

        add_action("wp_ajax_wac2_load_image_button",                            [$this, 'wac2_load_image_button']);
        add_action("wp_ajax_nopriv_wac2_load_image_button",                     [$this, 'wac2_load_image_button']);

        add_action("wp_ajax_slider_img_preview_delete",                         [$this, 'slider_img_preview_delete']);
        add_action("wp_ajax_nopriv_slider_img_preview_delete",                  [$this, 'slider_img_preview_delete']);

        add_action("wp_ajax_add_row_widget_one",                                [$this, 'add_row_widget_one']);
        add_action("wp_ajax_nopriv_add_row_widget_one",                         [$this, 'add_row_widget_one']);

        add_action("wp_ajax_add_row_widget",                                    [$this, 'add_row_widget']);
        add_action("wp_ajax_nopriv_add_row_widget",                             [$this, 'add_row_widget']);

        add_action("wp_ajax_delete_row_widget",                                 [$this, 'delete_row_widget']);
        add_action("wp_ajax_nopriv_delete_row_widget",                          [$this, 'delete_row_widget']);

        add_action("wp_ajax_add_row_widget_list",                               [$this, 'add_row_widget_list']);
        add_action("wp_ajax_nopriv_add_row_widget_list",                        [$this, 'add_row_widget_list']);

        add_action("wp_ajax_delete_row_widget_list",                            [$this, 'delete_row_widget_list']);
        add_action("wp_ajax_nopriv_delete_row_widget_list",                     [$this, 'delete_row_widget_list']);

        add_action("wac2_map",                                                  [$this, 'wac2_map'], 10, 1);

        add_action("wac2_sliderr",                                              [$this, 'wac2_sliderr'], 10, 1);

        add_action("wac2_basic_description",                                    [$this, 'wac2_basic_description'], 10, 1);

        add_action("wac2_basic_description_list",                               [$this, 'wac2_basic_description_list'], 10, 1);

        add_action("wac2_detailed_description",                                 [$this, 'wac2_detailed_description'], 10, 1);

        add_action("wac2_special_block",                                        [$this, 'wac2_special_block'], 10, 1);

        add_action("wac2_countries_all_array",                                  [$this, 'wac2_countries_all_array']);

        add_action("wac2_countries",                                            [$this, 'wac2_countries'], 10, 1);

        add_filter( 'comments_open',                                            [$this, 'wac2_comments_open'], 10, 2 );

        add_action("wac2_reviews",                                              [$this, 'wac2_reviews'], 10, 1);

        add_action("wp_ajax_wac2_moderation_enable",                            [$this, 'wac2_moderation_enable']);
        add_action("wp_ajax_nopriv_wac2_moderation_enable",                     [$this, 'wac2_moderation_enable']);

        add_action("wp_ajax_form_reviews_assessment",                           [$this, 'form_reviews_assessment']);
        add_action("wp_ajax_nopriv_form_reviews_assessment",                    [$this, 'form_reviews_assessment']);

        add_action("wp_ajax_wac2_moderation_approve",                           [$this, 'wac2_moderation_approve']);
        add_action("wp_ajax_nopriv_wac2_moderation_approve",                    [$this, 'wac2_moderation_approve']);

        add_action("wp_ajax_wac2_moderation_delete",                            [$this, 'wac2_moderation_delete']);
        add_action("wp_ajax_nopriv_wac2_moderation_delete",                     [$this, 'wac2_moderation_delete']);

        add_action("wac2_feedback_form_telephone",                              [$this, 'wac2_feedback_form_telephone'], 10, 1);

        add_action("wp_ajax_wac2_feedback_form_telephone",                      [$this, 'f_wac2_feedback_form_telephone']);
        add_action("wp_ajax_nopriv_wac2_feedback_form_telephone",               [$this, 'f_wac2_feedback_form_telephone']);

        add_action("wp_ajax_wac2_feedback_form_telephone_f",                    [$this, 'wac2_feedback_form_telephone_f']);
        add_action("wp_ajax_nopriv_wac2_feedback_form_telephone_f",             [$this, 'wac2_feedback_form_telephone_f']);

        add_action("wac2_feedback_form_mail",                                   [$this, 'wac2_feedback_form_mail'], 10, 1);

        add_action("wp_ajax_wac2_feedback_form_mail_f",                         [$this, 'wac2_feedback_form_mail_f']);
        add_action("wp_ajax_nopriv_wac2_feedback_form_mail_f",                  [$this, 'wac2_feedback_form_mail_f']);

        add_action("wac2_rating",                                               [$this, 'wac2_rating'], 10, 1);

        add_action('wp_head',                                                   [$this, 'wac2_recaptcha'], 1);

        add_action("wp_ajax_wac2_login_company_user_recaptch",                  [$this, 'wac2_login_company_user_recaptch']);
        add_action("wp_ajax_nopriv_wac2_login_company_user_recaptch",           [$this, 'wac2_login_company_user_recaptch']);

        add_action('wp_ajax_nopriv_lost_password',                              [$this, 'lost_password']);

        add_action('wp_ajax_nopriv_reset_password_front',                       [$this, 'reset_password_front']);

        add_action("wp_ajax_registration_check_update",                         [$this, 'registration_check_update']);
        add_action("wp_ajax_nopriv_registration_check_update",                  [$this, 'registration_check_update']);

        add_action("wac2_contacts",                                             [$this, 'wac2_contacts'], 10, 1);

        add_action("wp_ajax_meta_box_detailed_description_company_f",           [$this, 'meta_box_detailed_description_company_f']);
        add_action("wp_ajax_nopriv_meta_box_detailed_description_company_f",    [$this, 'meta_box_detailed_description_company_f']);

        add_action("wp_ajax_meta_box_special_block_f",                          [$this, 'meta_box_special_block_f']);
        add_action("wp_ajax_nopriv_meta_box_special_block_f",                   [$this, 'meta_box_special_block_f']);

        add_action("wp_ajax_meta_box_basic_description_company_f",              [$this, 'meta_box_basic_description_company_f']);
        add_action("wp_ajax_nopriv_meta_box_basic_description_company_f",       [$this, 'meta_box_basic_description_company_f']);

        add_action("wp_ajax_meta_box_forms_consultations_f",                    [$this, 'meta_box_forms_consultations_f']);
        add_action("wp_ajax_nopriv_meta_box_forms_consultations_f",             [$this, 'meta_box_forms_consultations_f']);

        add_action("wp_ajax_meta_box_countries_f",                              [$this, 'meta_box_countries_f']);
        add_action("wp_ajax_nopriv_meta_box_countries_f",                       [$this, 'meta_box_countries_f']);

        add_action("wp_ajax_meta_box_contacts_f",                               [$this, 'meta_box_contacts_f']);
        add_action("wp_ajax_nopriv_meta_box_contacts_f",                        [$this, 'meta_box_contacts_f']);

        add_action("wp_ajax_meta_box_slider_f",                                 [$this, 'meta_box_slider_f']);
        add_action("wp_ajax_nopriv_meta_box_slider_f",                          [$this, 'meta_box_slider_f']);

        add_action("wp_ajax_slider_img_preview_delete_f",                       [$this, 'slider_img_preview_delete_f']);
        add_action("wp_ajax_nopriv_slider_img_preview_delete_f",                [$this, 'slider_img_preview_delete_f']);

        add_action("wp_ajax_postimagediv_f",                                    [$this, 'postimagediv_f']);
        add_action("wp_ajax_nopriv_postimagediv_f",                             [$this, 'postimagediv_f']);

        add_action("wp_ajax_postimagediv_delete",                               [$this, 'postimagediv_delete']);
        add_action("wp_ajax_nopriv_postimagediv_delete",                        [$this, 'postimagediv_delete']);

        add_action("wp_ajax_modal_create_company",                              [$this, 'modal_create_company']);
        add_action("wp_ajax_nopriv_modal_create_company",                       [$this, 'modal_create_company']);

        add_action("wp_ajax_wac2_create_company",                               [$this, 'wac2_create_company']);
        add_action("wp_ajax_nopriv_wac2_create_company",                        [$this, 'wac2_create_company']);

        add_action("wp_ajax_delete_company",                                    [$this, 'delete_company']);
        add_action("wp_ajax_nopriv_delete_company",                             [$this, 'delete_company']);

        add_action("wp_ajax_country_s_g",                                       [$this, 'country_s_g']);
        add_action("wp_ajax_nopriv_country_s_g",                                [$this, 'country_s_g']);

        add_action("wp_ajax_add_sub_cat",                                       [$this, 'add_sub_cat']);
        add_action("wp_ajax_nopriv_add_sub_cat",                                [$this, 'add_sub_cat']);

        add_action("wp_ajax_add__cat",                                          [$this, 'add__cat']);
        add_action("wp_ajax_nopriv_add__cat",                                   [$this, 'add__cat']);

        add_action("wp_ajax_add_sub_cat_u",                                     [$this, 'add_sub_cat_u']);
        add_action("wp_ajax_nopriv_add_sub_cat_u",                              [$this, 'add_sub_cat_u']);

        add_action("wp_ajax_choice_country",                                    [$this, 'choice_country']);
        add_action("wp_ajax_nopriv_choice_country",                             [$this, 'choice_country']);

    }

    public function fronted(){
        wp_register_script( 'wac2-front', plugins_url( 'js/wac2-front.js', __FILE__ ), false, false, true );
        wp_enqueue_script( 'wac2-front' );

        wp_enqueue_style('wac2-front', plugins_url( 'css/wac2-front.css', __FILE__ ), false,'1.0','all');
        wp_enqueue_style('wac2-media-front', plugins_url( 'css/wac2-media-front.css', __FILE__ ), false,'1.0','all');

        wp_register_script( 'wac2-slick-js', plugins_url( 'slick-1.8.0/slick/slick.min.js', __FILE__ ), false, false, true );
        wp_enqueue_script( 'wac2-slick-js' );
        wp_enqueue_style('wac2-slick-css', plugins_url( 'slick-1.8.0/slick/slick.css', __FILE__ ), false,'1.0','all');
        wp_enqueue_style('wac2-slick-theme-css', plugins_url( 'slick-1.8.0/slick/slick-theme.css', __FILE__ ), false,'1.0','all');
    }

    public function backend(){
        wp_register_script( 'wac2-back', plugins_url( 'js/wac2-back.js', __FILE__ ), false, false, true );
        wp_enqueue_script( 'wac2-back' );

        wp_enqueue_style('wac2-back', plugins_url( 'css/wac2-back.css', __FILE__ ), false,'1.0','all');
        wp_enqueue_style('wac2-media-back', plugins_url( 'css/wac2-media-back.css', __FILE__ ), false,'1.0','all');

        wp_register_script( 'wac2-slick-js', plugins_url( 'slick-1.8.0/slick/slick.min.js', __FILE__ ), false, false, true );
        wp_enqueue_script( 'wac2-slick-js' );
        wp_enqueue_style('wac2-slick-css', plugins_url( 'slick-1.8.0/slick/slick.css', __FILE__ ), false,'1.0','all');
        wp_enqueue_style('wac2-slick-theme-css', plugins_url( 'slick-1.8.0/slick/slick-theme.css', __FILE__ ), false,'1.0','all');
    }

    public function create() {

        $args 	= [
            'labels'		=> [
                'name'			=> 'Каталог компаний2',
                'add_new'		=> 'Добавить',
                'edit_item' 	=> 'Редактировать',
                'new_item' 		=> 'Новая компания',
                'all_items' 	=> 'Все компании',
                'view_item' 	=> 'Просмотр',
            ],
            'description'	=> '',
            'public'		=> true,
            'menu_position'	=> 5,
            'supports'		=> [
                'title',
                'editor',
                'thumbnail',
                'comments'
            ],
            'has_archive'   => true,
            'taxonomies'	=> [ 'category_' . $this->type ],
            'rewrite'		=> [ 'slug' => $this->type ]
        ];
        register_post_type( $this->type, $args );
//         flush_rewrite_rules(true);	// clear cache rewrite rules
    }

    public function taxonomy() {
        register_taxonomy(
            'category_' . $this->type,
            [ $this->type ],
            [
                'labels' 		=> [
                    'name' 			=> 'Категории',
                    'add_new_item'	=> 'Добавить категорию',
                    'new_item_name' => "Новая категория"
                ],
                'show_ui' 		=> true,
                'show_tagcloud' => false,
                'hierarchical' 	=> true,
                'rewrite'		=> [ 'slug' => $this->type ]
            ]
        );
    }

    // rewrite rules
    public function rules($permalink, $post_id, $leavename) {

        $post = get_post( $post_id );

        if ( strpos( $permalink, $this->type ) !== FALSE || $post->post_type == $this->type ){
            $termini = wp_get_object_terms( $post->ID, 'category_' . $this->type );

            if (!is_wp_error($termini) && !empty($termini) && is_object($termini[0]))
                $permalink = str_replace( $this->type, $this->type . '/'.$termini[0]->slug, $permalink );
        }
        return $permalink;
    }

    public function rewrite( $query ){
        global $wpdb;

        $slug		= @$query['attachment'];
        $post_id	= $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$slug' AND post_type = '$this->type'");
        $termini	= wp_get_object_terms( $post_id, 'category_' . $this->type );

        if( isset( $slug ) && $post_id && !is_wp_error( $termini ) && !empty( $termini ) ){
            unset( $query['attachment'] );
            $query[ $this->type ]	= $slug;
            $query['post_type']		= $this->type;
            $query['name']			= $slug;
        }
        return $query;
    }

    public function include_tpl( $tpl ) {
        if ( get_post_type() == $this->type ){ //|| is_taxonomy( 'category_' . $this->type )
            $tpl = plugin_dir_path( __FILE__ ) . '/tpl/category.php';
        }
        return $tpl;
    }

    public function menu(){
        add_submenu_page( 'edit.php?post_type=' . $this->type, 'Отоброжение списка компаний', 'Отоброжение списка компаний', 'level_3', $this->type . '-options', [$this, 'menu_list_company'] );
        add_submenu_page( 'edit.php?post_type=' . $this->type, 'Import', 'Import', 'level_3', $this->type . '-import', [$this, 'menu_import'] );
    }

    public function menu_list_company( $post ){
        include dirname(__FILE__) . '/admin/menu/menu-list-company.php';
    }

    public function menu_import(){
        include dirname(__FILE__) . '/admin/menu/menu_import.php';
    }

    public function metabox(){
        add_meta_box( 'meta_box_visualization_company', 'Визуализация компании', [$this, 'box_visualization_company'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_basic_description_company', 'Основное описание компании', [$this, 'box_basic_description_company'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_special_block', 'СПЕЦ. БЛОК', [$this, 'box_special_block'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_detailed_description_company', 'Детальное описание компании', [$this, 'box_detailed_description_company'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_map_setup', 'Настройка карты', [$this, 'box_map_setup'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_slider', 'Настройка слайдера', [$this, 'box_slider'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_countries', 'Установка страны компании', [$this, 'box_countries'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_reviews', 'Отзывы', [$this, 'box_reviews'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_forms_consultations', 'Формы консультации', [$this, 'box_forms_consultations'], $this->type, 'normal', 'high', $this->type );
        add_meta_box( 'meta_box_contacts', 'Контакты', [$this, 'box_contacts'], $this->type, 'normal', 'high', $this->type );
    }

    public function box_visualization_company( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-visualization-company.php';
    }

    public function box_basic_description_company( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-basic-description-company.php';
    }

    public function box_special_block( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-special-block.php';
    }

    public function box_detailed_description_company( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-detailed-description-company.php';
    }

    public function box_map_setup( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-map-setup.php';
    }

    public function box_slider( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-slider.php';
    }

    public function box_countries( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-countries.php';
    }

    public function box_reviews( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-reviews.php';
    }

    public function box_forms_consultations( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-forms-consultations.php';
    }

    public function box_contacts( $post ){
        include dirname(__FILE__) . '/admin/metabox/box-contacts.php';
    }

    public function all_widgets($widget_i){
        $widget = get_option('wac2_widget'.$widget_i.'_list_company');
        if($widget){
            echo '<div class="' . $widget . '"></div>';
            ?><span><img data-widgets="<?= $widget_i ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span><?php
        }
    }

    public function widget_list_company(){
        $widget = $_POST['widget'];
        $widget_class = $_POST['widget_class'];
        update_option('wac2_widget'.$widget.'_list_company', $widget_class);
        $this->all_widgets($widget);

        wp_die();
    }

    public function widgets_post($widget_i, $post_id){
        $widget = get_post_meta($post_id, 'wac2_widget'.$widget_i.'_post_company', true);
        $scroll = get_post_meta($post_id, 'wac2_widget'.$widget_i.'_post_company_scroll', true);
        if($widget){

            echo '<div class="widgets_post_all_one ' . $widget . '"></div>';
            ?>
            <span><img data-post_id="<?= $post_id ?>" data-widgets="<?= $widget_i ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span>
            <span><img class="scroll_settings" data-v="<?= $scroll ?>" src="<?= plugins_url( 'img/settings-work-tool.png', __FILE__ ); ?>"></span>
            <?php
        }
    }

    public function widget_post_company(){
        $widget = $_POST['widget'];
        $widget_class = $_POST['widget_class'];
        $post_id = $_POST['post_id'];
        $scroll = $_POST['scroll'];
        update_post_meta($post_id ,'wac2_widget'.$widget.'_post_company', $widget_class);
        update_post_meta($post_id ,'wac2_widget'.$widget.'_post_company_scroll', $scroll);
        $this->widgets_post($widget, $post_id);

        wp_die();
    }

    public function add_mark(){
        $address = $_POST['address'];
        $post_id = $_POST['post_id'];
        $post_title = $_POST['post_title'];

        $xmlstr = @file_get_contents("https://geocode-maps.yandex.ru/1.x/?geocode=".urlencode($address));
        $xml = new SimpleXMLElement($xmlstr);
        $full_address_fix = $xml->{'GeoObjectCollection'}->{'featureMember'}[0]->{'GeoObject'}->{'metaDataProperty'}->{'GeocoderMetaData'}->{'text'};

        add_post_meta( $post_id, 'wac2_list_mark_address', (string)$full_address_fix );

        $position = $xml->{'GeoObjectCollection'}->{'featureMember'}[0]->{'GeoObject'}->{'Point'}->{'pos'};

        $position = explode(' ', $position);

        $position = implode('_', $position);

        add_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon', $position );

        add_post_meta( $post_id, 'wac2_list_mark_address_point_title', $post_title );

        $wac2_list_mark_address = get_post_meta( $post_id, 'wac2_list_mark_address' );
        $wac2_list_mark_address_point_lat_lon = get_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon' );
        $wac2_list_mark_address_point_title = get_post_meta( $post_id, 'wac2_list_mark_address_point_title' );
        for($i = 0; count($wac2_list_mark_address) > $i; $i++){

            ?><a href="javascript:showAddress('<?= $wac2_list_mark_address[$i]; ?>')"><?= $wac2_list_mark_address[$i]; ?></a> <span data-post_id="<?= $post_id ?>" data-address="<?= $wac2_list_mark_address[$i] ?>" data-position="<?= $wac2_list_mark_address_point_lat_lon[$i] ?>" data-title="<?= $wac2_list_mark_address_point_title[$i] ?>" class="delete_map_mark">Удалить</span><br /><?php

        }

        wp_die();
    }

    public function wac2_update_map(){
        $post_id = $_POST['post_id'];
        $wac2_list_mark_address_point_lat_lon = get_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon' );

        $wac2_list_mark_address = get_post_meta( $post_id, 'wac2_list_mark_address' );
        $wac2_list_mark_address_point_title = get_post_meta( $post_id, 'wac2_list_mark_address_point_title' );

        $point_home = explode('_', $wac2_list_mark_address_point_lat_lon[0]);
        if($point_home){
            $l1 = $point_home[1];
            $l2 = $point_home[0];
        }else{
            $l1 = '55.751574';
            $l2 = '37.573856';
        }
        ?>

        <div id="wac2_map" style="width:100%;height:400px"></div>
        <script type="text/javascript">
            ymaps.ready(init);

            function init () {
                var myMap = new ymaps.Map('wac2_map', {
                        center: [<?= $l1 ?>, <?= $l2 ?>],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
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
        <?php
        wp_die();
    }

    public function all_widgets_list($widget, $post_id){
        $widget = get_option('wac2_widget'.$widget.'_list_company');
        switch ($widget) {
            case 'wac2_map':
                $this->wac2_map($post_id);
                break;
            case 'wac2_rating':
                $this->wac2_rating($post_id);
                break;
            case 'wac2_sliderr':
                $this->wac2_sliderr($post_id);
                break;
            case 'wac2_detailed_description':
                $this->wac2_detailed_description($post_id);
                break;
            case 'wac2_special_block':
                $this->wac2_special_block($post_id);
                break;
            case 'wac2_logo':
                $this->wac2_logo($post_id);
                break;
            case 'wac2_countries':
                $this->wac2_countries($post_id);
                break;
            case 'wac2_reviews':
                $this->wac2_reviews($post_id);
                break;
            case 'wac2_basic_description_list':
                $this->wac2_basic_description_list($post_id);
                break;
            case 'wac2_feedback_form_telephone':
                $this->wac2_feedback_form_telephone($post_id);
                break;
            case 'wac2_feedback_form_mail':
                $this->wac2_feedback_form_mail($post_id);
                break;
            case 'wac2_contacts':
                $this->wac2_contacts($post_id);
                break;
        }
    }

    public function all_widgets_one_post($widget, $post_id){
        $widget = get_post_meta($post_id, 'wac2_widget'.$widget.'_post_company', true);
        switch ($widget) {
            case 'wac2_map':
                $this->wac2_map($post_id);
                break;
            case 'wac2_rating':
                $this->wac2_rating($post_id);
                break;
            case 'wac2_sliderr':
                $this->wac2_sliderr($post_id);
                break;
            case 'wac2_detailed_description':
                $this->wac2_detailed_description($post_id);
                break;
            case 'wac2_special_block':
                $this->wac2_special_block($post_id);
                break;
            case 'wac2_logo':
                $this->wac2_logo($post_id);
                break;
            case 'wac2_countries':
                $this->wac2_countries($post_id);
                break;
            case 'wac2_reviews':
                $this->wac2_reviews($post_id);
                break;
            case 'wac2_basic_description':
                $this->wac2_basic_description($post_id);
                break;
            case 'wac2_feedback_form_telephone':
                $this->wac2_feedback_form_telephone($post_id);
                break;
            case 'wac2_feedback_form_mail':
                $this->wac2_feedback_form_mail($post_id);
                break;
            case 'wac2_contacts':
                $this->wac2_contacts($post_id);
                break;
        }
    }

    public function wac2_widgets_delete(){
        $widgets = $_POST['widgets'];
        delete_option('wac2_widget'.$widgets.'_list_company');
    }

    public function wac2_widgets_delete_post(){
        $widgets = $_POST['widgets'];
        $post_id = $_POST['post_id'];
        delete_post_meta($post_id, 'wac2_widget'.$widgets.'_post_company');

        $row_widget = get_post_meta($post_id, 'wac2_row_widget', true);
        $wac2_row_widget_one = get_post_meta($post_id, 'wac2_row_widget_one');

        if($_POST['asd'] == 'front'){
            $asd = '';
        }else{
            $asd = '../../';
        }

        for($i = 1; $row_widget >= $i; $i++){

            if( in_array($i ,$wac2_row_widget_one) ){
                ?>
                <tr>
                    <td colspan="2" class="one_get_widgets">
                        <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td>
                        <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div class="get_widgets" draggable="false" data-i="<?= ++$i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            } }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php
        wp_die();
    }

    public function add_role_company(){
        add_role('wac2_company_user', 'Пользователь компании', array());
    }

    public function company_personal_area( $atts ){
        $atts = shortcode_atts( array(
            'company_personal_area_shortcode' => 'company_personal_area_shortcode',
        ), $atts, 'company_personal_area' );

        if(!is_admin()){
            include dirname(__FILE__) . '/tpl/company_personal_area.php';
        }
    }

    public function ajax_login_init(){
        /* Подключаем скрипт для авторизации */
        wp_register_script('ajax-login-script', plugins_url( 'js/ajax-login-script.js', __FILE__ ), array('jquery') );
        wp_enqueue_script('ajax-login-script');

        /* Локализуем параметры скрипта */
        wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'redirecturl' => $_SERVER['REQUEST_URI'],
            'loadingmessage' => __('Проверяются данные, секундочку...')
        ));

        // Разрешаем запускать функцию ajax_login() пользователям без привелегий
        add_action( 'wp_ajax_nopriv_wac2_login_company_user', [$this, 'wac2_login_company_user'] );
    }

    public function wac2_login_company_user(){
        // Первым делом проверяем параметр безопасности
        check_ajax_referer( 'ajax-login-nonce', 'security' );

        $info = array();
        $info['user_login'] = $_POST['username'];
        $info['user_password'] = $_POST['password'];
        if($_POST['rememberme'] == 'rememberme'){
            $remember = true;
        }else{
            $remember = false;
        }
        $info['remember'] = $remember;

        $user_signon = wp_signon( $info, false );

        if ( is_wp_error($user_signon) ){
            echo json_encode(array('loggedin'=>false, 'message'=>__('Неправильный логин или пароль!')));
        } else {
            //echo json_encode(array('loggedin'=>true, 'message'=>__('Авторизация прошла успешно!')));
            echo json_encode(array('loggedin'=>true));
        }

        wp_die();
    }

    public function remove_admin_bar(){
        if (current_user_can('wac2_company_user')){
            show_admin_bar(false);
        }
    }

    public function delete_map_mark(){
        $address = $_POST['address'];
        $position = $_POST['position'];
        $title = $_POST['title'];
        $post_id = $_POST['post_id'];

        delete_post_meta($post_id, 'wac2_list_mark_address', $address);
        delete_post_meta($post_id, 'wac2_list_mark_address_point_lat_lon', $position);
        delete_post_meta($post_id, 'wac2_list_mark_address_point_title', $title);

        $wac2_list_mark_address = get_post_meta( $post_id, 'wac2_list_mark_address' );
        $wac2_list_mark_address_point_lat_lon = get_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon' );
        $wac2_list_mark_address_point_title = get_post_meta( $post_id, 'wac2_list_mark_address_point_title' );

        for($i = 0; count($wac2_list_mark_address) > $i; $i++){

            ?><a href="javascript:showAddress('<?= $wac2_list_mark_address[$i]; ?>')"><?= $wac2_list_mark_address[$i]; ?></a> <span data-post_id="<?= $post_id ?>" data-address="<?= $wac2_list_mark_address[$i] ?>" data-position="<?= $wac2_list_mark_address_point_lat_lon[$i] ?>" data-title="<?= $wac2_list_mark_address_point_title[$i] ?>" class="delete_map_mark">Удалить</span><br /><?php

        }
        wp_die();
    }

    public function remove_editor() {
        remove_post_type_support($this->type, 'editor');
    }

    public function wac2_save_post( $post_id ){
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
        if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись
        if ( $this->type != $_POST['post_type'] ) return false;

        $basic_description_company = $_POST['basic_description_company'];
        $special_block = $_POST['special_block'];
        $detailed_description_company = $_POST['detailed_description_company'];
        $wac2_countries = $_POST['wac2_countries'];
        $wac2_forms_consultations_mail = $_POST['wac2_forms_consultations_mail'];

        update_post_meta($post_id, 'wac2_basic_description_company', $basic_description_company);
        update_post_meta($post_id, 'wac2_special_block', $special_block);
        update_post_meta($post_id, 'wac2_detailed_description_company', $detailed_description_company);
        update_post_meta($post_id, 'wac2_countries', $wac2_countries);
        update_post_meta($post_id, 'wac2_forms_consultations_mail', $wac2_forms_consultations_mail);

        global $user_ID;
        if(!get_post_meta($post_id, 'wac2_user_id', true)){
            update_post_meta($post_id, 'wac2_user_id', $user_ID);
        }

        $contacts_address_company = $_POST['contacts_address_company'];
        $contacts_site_company = $_POST['contacts_site_company'];
        $contacts_mail_company = $_POST['contacts_mail_company'];
        $contacts_phone_company = $_POST['contacts_phone_company'];
        $contacts_fax_company = $_POST['contacts_fax_company'];
        $contacts_consular_districts_company = $_POST['contacts_consular_districts_company'];

        update_post_meta($post_id, 'wac2_contacts_address_company', $contacts_address_company);
        update_post_meta($post_id, 'wac2_contacts_site_company', $contacts_site_company);
        update_post_meta($post_id, 'wac2_contacts_mail_company', $contacts_mail_company);
        update_post_meta($post_id, 'wac2_contacts_phone_company', $contacts_phone_company);
        update_post_meta($post_id, 'wac2_contacts_fax_company', $contacts_fax_company);
        update_post_meta($post_id, 'wac2_contacts_consular_districts_company', $contacts_consular_districts_company);
    }

    public function wac2_load_image_button(){
        $src = $_POST['src'];
        $post_id = $_POST['post_id'];
        add_post_meta($post_id, 'wac2_slider_img', $src);

        $slider_img = get_post_meta($post_id, 'wac2_slider_img');
        ?>
        <div class="slider_img_preview">
            <?php
            foreach ($slider_img as $s_i2){
                ?>
                <img src="<?= $s_i2 ?>" width="100px" height="70px">
                <span class="slider_img_preview_delete"><img data-post_id="<?= $post_id ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span>
                <?php
            }
            ?>
        </div>
        <?php
        wp_die();
    }

    public function slider_img_preview_delete(){
        $src = $_POST['src'];
        $post_id = $_POST['post_id'];
        delete_post_meta($post_id, 'wac2_slider_img', $src);

        $slider_img = get_post_meta($post_id, 'wac2_slider_img');

            foreach ($slider_img as $s_i2){
                ?>
                <img src="<?= $s_i2 ?>" width="100px" height="70px">
                <span class="slider_img_preview_delete"><img data-post_id="<?= $post_id ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span>
                <?php
            }

        wp_die();
    }

    public function add_row_widget_one(){
        $post_id = $_POST['post_id'];
        $row_widget = get_post_meta($post_id, 'wac2_row_widget', true);
        if(!$row_widget){
            $row_widget = 3;
            update_post_meta($post_id, 'wac2_row_widget', 3);
        }else{
            $row_widget = (int)$row_widget + 1;
            update_post_meta($post_id, 'wac2_row_widget', $row_widget);
        }

        add_post_meta($post_id, 'wac2_row_widget_one', $row_widget);

        $wac2_row_widget_one = get_post_meta($post_id, 'wac2_row_widget_one');

        if($_POST['asd'] == 'front'){
            $asd = '';
        }else{
            $asd = '../../';
        }

        for($i = 1; $row_widget >= $i; $i++){

            if( in_array($i ,$wac2_row_widget_one) ){
                ?>
                <tr>
                    <td colspan="2" class="one_get_widgets">
                        <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }else{
            ?>
            <tr>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= ++$i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <?php
        } }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php
        wp_die();
    }

    public function add_row_widget(){
        $post_id = $_POST['post_id'];
        $row_widget = get_post_meta($post_id, 'wac2_row_widget', true);
        if(!$row_widget){
            $row_widget = 4;
            update_post_meta($post_id, 'wac2_row_widget', 4);
        }else{
            $row_widget = (int)$row_widget + 2;
            update_post_meta($post_id, 'wac2_row_widget', $row_widget);
        }

        $wac2_row_widget_one = get_post_meta($post_id, 'wac2_row_widget_one');

        if($_POST['asd'] == 'front'){
            $asd = '';
        }else{
            $asd = '../../';
        }

        for($i = 1; $row_widget >= $i; $i++){

            if( in_array($i ,$wac2_row_widget_one) ){
                ?>
                <tr>
                    <td colspan="2" class="one_get_widgets">
                        <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }else{
            ?>
            <tr>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= ++$i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <?php
        } }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php
        wp_die();
    }

    public function delete_row_widget(){
        $post_id = $_POST['post_id'];
        $row_widget = get_post_meta($post_id, 'wac2_row_widget', true);
        $wac2_row_widget_one = get_post_meta($post_id, 'wac2_row_widget_one');
        if(!$row_widget){
            return false;
        }else{
            if( in_array($row_widget ,$wac2_row_widget_one) ){
                delete_post_meta($post_id, 'wac2_row_widget_one', $row_widget);
                $row_widget = (int)$row_widget - 1;
            }else{
                $row_widget = (int)$row_widget - 2;
            }
            update_post_meta($post_id, 'wac2_row_widget', $row_widget);
        }

        $wac2_row_widget_one = get_post_meta($post_id, 'wac2_row_widget_one');

        if($_POST['asd'] == 'front'){
            $asd = '';
        }else{
            $asd = '../../';
        }

        for($i = 1; $row_widget >= $i; $i++){

            if( in_array($i ,$wac2_row_widget_one) ){
                ?>
                <tr>
                    <td colspan="2" class="one_get_widgets">
                        <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                            <?php
                            ob_start();
                            do_action( 'widgets_post', $i, $post_id);
                            $widgets_post_plus = ob_get_clean();
                            if($widgets_post_plus){
                                echo $widgets_post_plus;
                            }else{
                                ?>
                                <button class="add_widget_plus"></button>
                                <div class="add_widget_plus_i">
                                    <div>
                                        <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                        <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }else{
            ?>
            <tr>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="get_widgets" draggable="false" data-i="<?= ++$i ?>" data-post_id="<?= $post_id ?>">
                        <?php
                        ob_start();
                        do_action( 'widgets_post', $i, $post_id);
                        $widgets_post_plus = ob_get_clean();
                        if($widgets_post_plus){
                            echo $widgets_post_plus;
                        }else{
                            ?>
                            <button class="add_widget_plus"></button>
                            <div class="add_widget_plus_i">
                                <div>
                                    <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $post_id ?>" data-v="postimagediv" src="<?= plugins_url( $asd.'img/photo-camera.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $post_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( $asd.'img/world-location.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $post_id ?>" data-v="" src="<?= plugins_url( $asd.'img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $post_id ?>" data-v="meta_box_slider" src="<?= plugins_url( $asd.'img/photos.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $post_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( $asd.'img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $post_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( $asd.'img/left-justification-button.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $post_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( $asd.'img/favorites-list.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $post_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( $asd.'img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/voice-mail.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $post_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( $asd.'img/email-outbox.png', __FILE__ ); ?>">
                                    <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $post_id ?>" data-v="meta_box_countries" src="<?= plugins_url( $asd.'img/flag.png', __FILE__ ); ?>">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <?php
        } }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php
        wp_die();
    }

    public function add_row_widget_list(){
        $row_widget_list = get_option('wac2_row_widget_list');
        if(!$row_widget_list){
            $row_widget_list = 2;
            update_option('wac2_row_widget_list', 2);
        }else{
            $row_widget_list = (int)$row_widget_list + 1;
            update_option('wac2_row_widget_list', $row_widget_list);
        }

        for($i = 1; (int)$row_widget_list >= $i; $i++){
            ?>
            <div class="get_widgets" draggable="false" data-i="<?= $i ?>">
                <?php do_action( 'all_widgets', $i );  ?>
            </div>
            <?php
        }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php

        wp_die();
    }

    public function delete_row_widget_list(){
        $row_widget_list = get_option('wac2_row_widget_list');
        if(!$row_widget_list){
            return false;
        }else{
            $row_widget_list = (int)$row_widget_list - 1;
            update_option('wac2_row_widget_list', $row_widget_list);
        }

        for($i = 1; (int)$row_widget_list >= $i; $i++){
            ?>
            <div class="get_widgets" draggable="false" data-i="<?= $i ?>">
                <?php do_action( 'all_widgets', $i );  ?>
            </div>
            <script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script>
            <?php
        }
        ?><script src="<?= plugins_url( 'js/dragdrop.js', __FILE__ ); ?>"></script><?php

        wp_die();
    }

    public function wac2_map($post_id){
        $wac2_list_mark_address = get_post_meta( $post_id, 'wac2_list_mark_address' );
        $wac2_list_mark_address_point_lat_lon = get_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon' );
        $wac2_list_mark_address_point_title = get_post_meta( $post_id, 'wac2_list_mark_address_point_title' );

        $point_home = explode('_', $wac2_list_mark_address_point_lat_lon[0]);
        if($point_home){
            $l1 = $point_home[1];
            $l2 = $point_home[0];
        }else{
            $l1 = '55.751574';
            $l2 = '37.573856';
        }
        ?>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <div class="title_map">Расположение компаний на карте</div>
        <div id="wac2_map" style="width:100%;height:300px;"></div>
        <script type="text/javascript">
            ymaps.ready(init);

            function init () {
                var myMap = new ymaps.Map('wac2_map', {
                        center: [<?= $l1 ?>, <?= $l2 ?>],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
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
        <?php
    }

    public function wac2_logo($post_id){
        $logo = get_the_post_thumbnail( $post_id, 'full' );
        if(!$logo){
            if(is_single()){
                echo '<div class="wac2_logo"><img src="'.plugins_url( 'img/no_img.png', __FILE__ ).'"></div>';
            }else{
                $first_letter = explode(' ', get_the_title());
                $first_letter = mb_substr($first_letter[0], 0, 1,"UTF-8");
                $color = sprintf( '#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
                echo '<div class="wac2_logo"><div style="background: '.$color.'"><div><div>'.$first_letter.'</div></div></div></div>';
            }
        }else{
            echo '<div class="wac2_logo">'.$logo.'</div>';
        }
    }

    public function wac2_sliderr($post_id){
        ?>
        <div class="wac2_slider">
            <?php
            $slider_img = get_post_meta($post_id, 'wac2_slider_img');
            foreach ($slider_img as $s_i1){
                ?><div><img src="<?= $s_i1 ?>"></div><?php
            }
            ?>
        </div>
        <?php
    }

    public function wac2_basic_description($post_id){
        ?>
        <div class="wac2_basic_description">
            <div><h1><?= get_the_title() ?></h1></div>
            <div><?= get_post_meta($post_id, 'wac2_basic_description_company', true) ?></div>
        </div>
        <?php
    }

    public function wac2_basic_description_list($post_id){
        $wac2_basic_description_company = get_post_meta($post_id, 'wac2_basic_description_company', true);
        if(!$wac2_basic_description_company){
            $s = ' style="height: 14px;" ';
        }else{
            $s = '';
        }
        ?>
        <div class="wac2_basic_description_list">
            <div><h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2></div>
            <div<?= $s ?>><?= $wac2_basic_description_company ?></div>
        </div>
        <?php
    }

    public function wac2_detailed_description($post_id){
        ?>
        <div class="wac2_detailed_description"><?= get_post_meta($post_id, 'wac2_detailed_description_company', true) ?></div>
        <?php
    }

    public function wac2_special_block($post_id){
        ?>
        <div class="wac2_special_block"><?= get_post_meta($post_id, 'wac2_special_block', true) ?></div>
        <?php
    }

    public function wac2_countries_all_array(){
        $countries = [
            'australia' => ['Австралия', plugins_url( 'img/all_flags/australia.gif', __FILE__ )],
            'austria' => ['Австрия', plugins_url( 'img/all_flags/austria.gif', __FILE__ )],
            'azerbaijan' => ['Азербайджан', plugins_url( 'img/all_flags/azerbaijan.gif', __FILE__ )],
            'aland_islands' => ['Аландские острова', plugins_url( 'img/all_flags/aland_islands.gif', __FILE__ )],
            'albania' => ['Албания', plugins_url( 'img/all_flags/albania.gif', __FILE__ )],
            'algeria' => ['Алжир', plugins_url( 'img/all_flags/algeria.gif', __FILE__ )],
            'virgin_islands_us' => ['Американские Виргинские острова', plugins_url( 'img/all_flags/virgin_islands_us.gif', __FILE__ )],
            'american_samoa' => ['Американское Самоа', plugins_url( 'img/all_flags/american_samoa.gif', __FILE__ )],
            'anguilla' => ['Ангилья', plugins_url( 'img/all_flags/anguilla.gif', __FILE__ )],
            'england' => ['Англия', plugins_url( 'img/all_flags/england.gif', __FILE__ )],
            'angola' => ['Ангола', plugins_url( 'img/all_flags/angola.gif', __FILE__ )],
            'andorra' => ['Андорра', plugins_url( 'img/all_flags/andorra.gif', __FILE__ )],
            'antarctica' => ['Антарктида', plugins_url( 'img/all_flags/antarctica.gif', __FILE__ )],
            'antigua_and_barbuda' => ['Антигуа и Барбуда', plugins_url( 'img/all_flags/antigua_and_barbuda.gif', __FILE__ )],
            'argentina' => ['Аргентина', plugins_url( 'img/all_flags/argentina.gif', __FILE__ )],
            'armenia' => ['Армения', plugins_url( 'img/all_flags/armenia.gif', __FILE__ )],
            'aruba' => ['Аруба', plugins_url( 'img/all_flags/aruba.gif', __FILE__ )],
            'afghanistan' => ['Афганистан', plugins_url( 'img/all_flags/afghanistan.gif', __FILE__ )],
            'bahamas' => ['Багамские Острова', plugins_url( 'img/all_flags/bahamas.gif', __FILE__ )],
            'bangladesh' => ['Бангладеш', plugins_url( 'img/all_flags/bangladesh.gif', __FILE__ )],
            'barbados' => ['Барбадос', plugins_url( 'img/all_flags/barbados.gif', __FILE__ )],
            'bahrain' => ['Бахрейн', plugins_url( 'img/all_flags/bahrain.gif', __FILE__ )],
            'belize' => ['Белиз', plugins_url( 'img/all_flags/belize.gif', __FILE__ )],
            'belarus' => ['Белоруссия', plugins_url( 'img/all_flags/belarus.gif', __FILE__ )],
            'belgium' => ['Бельгия', plugins_url( 'img/all_flags/belgium.gif', __FILE__ )],
            'benin' => ['Бенин', plugins_url( 'img/all_flags/benin.gif', __FILE__ )],
            'bermuda' => ['Бермуды', plugins_url( 'img/all_flags/bermuda.gif', __FILE__ )],
            'bulgaria' => ['Болгария', plugins_url( 'img/all_flags/bulgaria.gif', __FILE__ )],
            'bolivia' => ['Боливия', plugins_url( 'img/all_flags/bolivia.gif', __FILE__ )],
            'bonaire' => ['Бонайре', plugins_url( 'img/all_flags/bonaire.gif', __FILE__ )],
            'bosnia_and_herzegovina' => ['Босния и Герцеговина', plugins_url( 'img/all_flags/bosnia_and_herzegovina.gif', __FILE__ )],
            'botswana' => ['Ботсвана', plugins_url( 'img/all_flags/botswana.gif', __FILE__ )],
            'brazil' => ['Бразилия', plugins_url( 'img/all_flags/brazil.gif', __FILE__ )],
            'british_indian_ocean_territory' => ['Британская территория в Индийском океане', plugins_url( 'img/all_flags/british_indian_ocean_territory.gif', __FILE__ )],
            'virgin_islands_british' => ['Британские Виргинские острова', plugins_url( 'img/all_flags/virgin_islands_british.gif', __FILE__ )],
            'brunei' => ['Бруней', plugins_url( 'img/all_flags/brunei.gif', __FILE__ )],
            'bouvet_island' => ['Буве', plugins_url( 'img/all_flags/bouvet_island.gif', __FILE__ )],
            'burkina_faso' => ['Буркина Фасо', plugins_url( 'img/all_flags/burkina_faso.gif', __FILE__ )],
            'burundi' => ['Бурунди', plugins_url( 'img/all_flags/burundi.gif', __FILE__ )],
            'bhutan' => ['Бутан', plugins_url( 'img/all_flags/bhutan.gif', __FILE__ )],
            'vanuatu' => ['Вануату', plugins_url( 'img/all_flags/vanuatu.gif', __FILE__ )],
            'vatican_city' => ['Ватикан', plugins_url( 'img/all_flags/vatican_city.gif', __FILE__ )],
            'united_kingdom' => ['Великобритания', plugins_url( 'img/all_flags/united_kingdom.gif', __FILE__ )],
            'hungary' => ['Венгрия', plugins_url( 'img/all_flags/hungary.gif', __FILE__ )],
            'venezuela' => ['Венесуэла', plugins_url( 'img/all_flags/venezuela.gif', __FILE__ )],
            'east_timor' => ['Восточный Тимор', plugins_url( 'img/all_flags/east_timor.gif', __FILE__ )],
            'vietnam' => ['Вьетнам', plugins_url( 'img/all_flags/vietnam.gif', __FILE__ )],
            'gabon' => ['Габон', plugins_url( 'img/all_flags/gabon.gif', __FILE__ )],
            'haiti' => ['Гаити', plugins_url( 'img/all_flags/haiti.gif', __FILE__ )],
            'guyana' => ['Гайана', plugins_url( 'img/all_flags/guyana.gif', __FILE__ )],
            'gambia' => ['Гамбия', plugins_url( 'img/all_flags/gambia.gif', __FILE__ )],
            'ghana' => ['Гана', plugins_url( 'img/all_flags/ghana.gif', __FILE__ )],
            'guadeloupe' => ['Гваделупа', plugins_url( 'img/all_flags/guadeloupe.gif', __FILE__ )],
            'guatemala' => ['Гватемала', plugins_url( 'img/all_flags/guatemala.gif', __FILE__ )],
            'french_guiana' => ['Гвиана', plugins_url( 'img/all_flags/french_guiana.gif', __FILE__ )],
            'guinea' => ['Гвинея', plugins_url( 'img/all_flags/guinea.gif', __FILE__ )],
            'guinea_bissau' => ['Гвинея-Бисау', plugins_url( 'img/all_flags/guinea_bissau.gif', __FILE__ )],
            'germany' => ['Германия', plugins_url( 'img/all_flags/germany.gif', __FILE__ )],
            'guernsey' => ['Гернси', plugins_url( 'img/all_flags/guernsey.gif', __FILE__ )],
            'gibraltar' => ['Гибралтар', plugins_url( 'img/all_flags/gibraltar.gif', __FILE__ )],
            'honduras' => ['Гондурас', plugins_url( 'img/all_flags/honduras.gif', __FILE__ )],
            'hong_kong' => ['Гонконг', plugins_url( 'img/all_flags/hong_kong.gif', __FILE__ )],
            'grenada' => ['Гренада', plugins_url( 'img/all_flags/grenada.gif', __FILE__ )],
            'greenland' => ['Гренландия', plugins_url( 'img/all_flags/greenland.gif', __FILE__ )],
            'greece' => ['Греция', plugins_url( 'img/all_flags/greece.gif', __FILE__ )],
            'georgia' => ['Грузия', plugins_url( 'img/all_flags/georgia.gif', __FILE__ )],
            'guam' => ['Гуам', plugins_url( 'img/all_flags/guam.gif', __FILE__ )],
            'denmark' => ['Дания', plugins_url( 'img/all_flags/denmark.gif', __FILE__ )],
            'democratic_republic_of_the_congo' => ['Демократическая Республика Конго', plugins_url( 'img/all_flags/democratic_republic_of_the_congo.gif', __FILE__ )],
            'jersey' => ['Джерси', plugins_url( 'img/all_flags/jersey.gif', __FILE__ )],
            'djibouti' => ['Джибути', plugins_url( 'img/all_flags/djibouti.gif', __FILE__ )],
            'dominica' => ['Доминика', plugins_url( 'img/all_flags/dominica.gif', __FILE__ )],
            'dominican_republic' => ['Доминиканская Республика', plugins_url( 'img/all_flags/dominican_republic.gif', __FILE__ )],
            'european_union' => ['Европейский союз', plugins_url( 'img/all_flags/european_union.gif', __FILE__ )],
            'egypt' => ['Египет', plugins_url( 'img/all_flags/egypt.gif', __FILE__ )],
            'zambia' => ['Замбия', plugins_url( 'img/all_flags/zambia.gif', __FILE__ )],
            'western_sahara' => ['Западная Сахара', plugins_url( 'img/all_flags/western_sahara.gif', __FILE__ )],
            'zimbabwe' => ['Зимбабве', plugins_url( 'img/all_flags/zimbabwe.gif', __FILE__ )],
            'israel' => ['Израиль', plugins_url( 'img/all_flags/israel.gif', __FILE__ )],
            'india' => ['Индия', plugins_url( 'img/all_flags/india.gif', __FILE__ )],
            'indonesia' => ['Индонезия', plugins_url( 'img/all_flags/indonesia.gif', __FILE__ )],
            'jordan' => ['Иордания', plugins_url( 'img/all_flags/jordan.gif', __FILE__ )],
            'iran' => ['Иран', plugins_url( 'img/all_flags/iran.gif', __FILE__ )],
            'ireland' => ['Ирландия', plugins_url( 'img/all_flags/ireland.gif', __FILE__ )],
            'iceland' => ['Исландия', plugins_url( 'img/all_flags/iceland.gif', __FILE__ )],
            'spain' => ['Испания', plugins_url( 'img/all_flags/spain.gif', __FILE__ )],
            'italy' => ['Италия', plugins_url( 'img/all_flags/italy.gif', __FILE__ )],
            'yemen' => ['Йемен', plugins_url( 'img/all_flags/yemen.gif', __FILE__ )],
            'cape_verde' => ['Кабо-Верде', plugins_url( 'img/all_flags/cape_verde.gif', __FILE__ )],
            'kazakhstan' => ['Казахстан', plugins_url( 'img/all_flags/kazakhstan.gif', __FILE__ )],
            'cayman_islands' => ['Каймановы острова', plugins_url( 'img/all_flags/cayman_islands.gif', __FILE__ )],
            'cambodia' => ['Камбоджа', plugins_url( 'img/all_flags/cambodia.gif', __FILE__ )],
            'cameroon' => ['Камерун', plugins_url( 'img/all_flags/cameroon.gif', __FILE__ )],
            'canada' => ['Канада', plugins_url( 'img/all_flags/canada.gif', __FILE__ )],
            'qatar' => ['Катар', plugins_url( 'img/all_flags/qatar.gif', __FILE__ )],
            'kenya' => ['Кения', plugins_url( 'img/all_flags/kenya.gif', __FILE__ )],
            'cyprus' => ['Кипр', plugins_url( 'img/all_flags/cyprus.gif', __FILE__ )],
            'kyrgyzstan' => ['Киргизия', plugins_url( 'img/all_flags/kyrgyzstan.gif', __FILE__ )],
            'kiribati' => ['Кирибати', plugins_url( 'img/all_flags/kiribati.gif', __FILE__ )],
            'china' => ['Китай', plugins_url( 'img/all_flags/china.gif', __FILE__ )],
            'cocos_islands' => ['Кокосовые острова', plugins_url( 'img/all_flags/cocos_islands.gif', __FILE__ )],
            'colombia' => ['Колумбия', plugins_url( 'img/all_flags/colombia.gif', __FILE__ )],
            'comoros' => ['Коморы', plugins_url( 'img/all_flags/comoros.gif', __FILE__ )],
            'kosovo' => ['Косово', plugins_url( 'img/all_flags/kosovo.gif', __FILE__ )],
            'costa_rica' => ['Коста-Рика', plugins_url( 'img/all_flags/costa_rica.gif', __FILE__ )],
            'cote_d_Ivoire' => ['Кот-д\'Ивуар', plugins_url( 'img/all_flags/cote_d_Ivoire.gif', __FILE__ )],
            'cuba' => ['Куба', plugins_url( 'img/all_flags/cuba.gif', __FILE__ )],
            'kuwait' => ['Кувейт', plugins_url( 'img/all_flags/kuwait.gif', __FILE__ )],
            'curacao' => ['Кюрасао', plugins_url( 'img/all_flags/curacao.gif', __FILE__ )],
            'laos' => ['Лаос', plugins_url( 'img/all_flags/laos.gif', __FILE__ )],
            'latvia' => ['Латвия', plugins_url( 'img/all_flags/latvia.gif', __FILE__ )],
            'lesotho' => ['Лесото', plugins_url( 'img/all_flags/lesotho.gif', __FILE__ )],
            'liberia' => ['Либерия', plugins_url( 'img/all_flags/liberia.gif', __FILE__ )],
            'lebanon' => ['Ливан', plugins_url( 'img/all_flags/lebanon.gif', __FILE__ )],
            'libya' => ['Ливия', plugins_url( 'img/all_flags/libya.gif', __FILE__ )],
            'lithuania' => ['Литва', plugins_url( 'img/all_flags/lithuania.gif', __FILE__ )],
            'liechtenstein' => ['Лихтенштейн', plugins_url( 'img/all_flags/liechtenstein.gif', __FILE__ )],
            'luxembourg' => ['Люксембург', plugins_url( 'img/all_flags/luxembourg.gif', __FILE__ )],
            'mauritius' => ['Маврикий', plugins_url( 'img/all_flags/mauritius.gif', __FILE__ )],
            'mauritania' => ['Мавритания', plugins_url( 'img/all_flags/mauritania.gif', __FILE__ )],
            'madagascar' => ['Мадагаскар', plugins_url( 'img/all_flags/madagascar.gif', __FILE__ )],
            'mayotte' => ['Майотта', plugins_url( 'img/all_flags/mayotte.gif', __FILE__ )],
            'macao' => ['Макао', plugins_url( 'img/all_flags/macao.gif', __FILE__ )],
            'macedonia' => ['Македония', plugins_url( 'img/all_flags/macedonia.gif', __FILE__ )],
            'malawi' => ['Малави', plugins_url( 'img/all_flags/malawi.gif', __FILE__ )],
            'malaysia' => ['Малайзия', plugins_url( 'img/all_flags/malaysia.gif', __FILE__ )],
            'mali' => ['Мали', plugins_url( 'img/all_flags/mali.gif', __FILE__ )],
            'maldives' => ['Мальдивы', plugins_url( 'img/all_flags/maldives.gif', __FILE__ )],
            'malta' => ['Мальта', plugins_url( 'img/all_flags/malta.gif', __FILE__ )],
            'morocco' => ['Марокко', plugins_url( 'img/all_flags/morocco.gif', __FILE__ )],
            'martinique' => ['Мартиника', plugins_url( 'img/all_flags/martinique.gif', __FILE__ )],
            'marshall_islands' => ['Маршалловы Острова', plugins_url( 'img/all_flags/marshall_islands.gif', __FILE__ )],
            'mexico' => ['Мексика', plugins_url( 'img/all_flags/mexico.gif', __FILE__ )],
            'micronesia' => ['Микронезия', plugins_url( 'img/all_flags/micronesia.gif', __FILE__ )],
            'mozambique' => ['Мозамбик', plugins_url( 'img/all_flags/mozambique.gif', __FILE__ )],
            'moldova' => ['Молдавия', plugins_url( 'img/all_flags/moldova.gif', __FILE__ )],
            'monaco' => ['Монако', plugins_url( 'img/all_flags/monaco.gif', __FILE__ )],
            'mongolia' => ['Монголия', plugins_url( 'img/all_flags/mongolia.gif', __FILE__ )],
            'montserrat' => ['Монтсеррат', plugins_url( 'img/all_flags/montserrat.gif', __FILE__ )],
            'myanmar' => ['Мьянма', plugins_url( 'img/all_flags/myanmar.gif', __FILE__ )],
            'namibia' => ['Намибия', plugins_url( 'img/all_flags/namibia.gif', __FILE__ )],
            'nauru' => ['Науру', plugins_url( 'img/all_flags/nauru.gif', __FILE__ )],
            'nepal' => ['Непал', plugins_url( 'img/all_flags/nepal.gif', __FILE__ )],
            'niger' => ['Нигер', plugins_url( 'img/all_flags/niger.gif', __FILE__ )],
            'nigeria' => ['Нигерия', plugins_url( 'img/all_flags/nigeria.gif', __FILE__ )],
            'netherlands' => ['Нидерланды', plugins_url( 'img/all_flags/netherlands.gif', __FILE__ )],
            'nicaragua' => ['Никарагуа', plugins_url( 'img/all_flags/nicaragua.gif', __FILE__ )],
            'niue' => ['Ниуэ', plugins_url( 'img/all_flags/niue.gif', __FILE__ )],
            'new_zealand' => ['Новая Зеландия', plugins_url( 'img/all_flags/new_zealand.gif', __FILE__ )],
            'new_caledonia' => ['Новая Каледония', plugins_url( 'img/all_flags/new_caledonia.gif', __FILE__ )],
            'norway' => ['Норвегия', plugins_url( 'img/all_flags/norway.gif', __FILE__ )],
            'norfolk_island' => ['Норфолк', plugins_url( 'img/all_flags/norfolk_island.gif', __FILE__ )],
            'united_arab_emirates' => ['Объединённые Арабские Эмираты', plugins_url( 'img/all_flags/united_arab_emirates.gif', __FILE__ )],
            'oman' => ['Оман', plugins_url( 'img/all_flags/oman.gif', __FILE__ )],
            'isle_of_man' => ['Остров Мэн', plugins_url( 'img/all_flags/isle_of_man.gif', __FILE__ )],
            'christmas_island' => ['Остров Рождества', plugins_url( 'img/all_flags/christmas_island.gif', __FILE__ )],
            'heard_island_and_mcdonald_islands' => ['Остров Херд и Острова Макдоналд', plugins_url( 'img/all_flags/heard_island_and_mcdonald_islands.gif', __FILE__ )],
            'cook_islands' => ['Острова Кука', plugins_url( 'img/all_flags/cook_islands.gif', __FILE__ )],
            'pitcairn_islands' => ['Острова Питкэрн', plugins_url( 'img/all_flags/pitcairn_islands.gif', __FILE__ )],
            'saint_helena' => ['Острова Святой Елены, Вознесения и Тристан-да-Кунья', plugins_url( 'img/all_flags/saint_helena.gif', __FILE__ )],
            'pakistan' => ['Пакистан', plugins_url( 'img/all_flags/pakistan.gif', __FILE__ )],
            'palau' => ['Палау', plugins_url( 'img/all_flags/palau.gif', __FILE__ )],
            'palestinian_territory' => ['Палестинские территории', plugins_url( 'img/all_flags/palestinian_territory.gif', __FILE__ )],
            'panama' => ['Панама', plugins_url( 'img/all_flags/panama.gif', __FILE__ )],
            'papua_new_guinea' => ['Папуа — Новая Гвинея', plugins_url( 'img/all_flags/papua_new_guinea.gif', __FILE__ )],
            'paraguay' => ['Парагвай', plugins_url( 'img/all_flags/paraguay.gif', __FILE__ )],
            'peru' => ['Перу', plugins_url( 'img/all_flags/peru.gif', __FILE__ )],
            'poland' => ['Польша', plugins_url( 'img/all_flags/poland.gif', __FILE__ )],
            'portugal' => ['Португалия', plugins_url( 'img/all_flags/portugal.gif', __FILE__ )],
            'puerto_rico' => ['Пуэрто-Рико', plugins_url( 'img/all_flags/puerto_rico.gif', __FILE__ )],
            'iraq' => ['Ирак', plugins_url( 'img/all_flags/iraq.gif', __FILE__ )],
            'republic_of_the_congo' => ['Республика Конго', plugins_url( 'img/all_flags/republic_of_the_congo.gif', __FILE__ )],
            'reunion' => ['Реюньон', plugins_url( 'img/all_flags/reunion.gif', __FILE__ )],
            'russia' => ['Россия', plugins_url( 'img/all_flags/russia.gif', __FILE__ )],
            'rwanda' => ['Руанда', plugins_url( 'img/all_flags/rwanda.gif', __FILE__ )],
            'romania' => ['Румыния', plugins_url( 'img/all_flags/romania.gif', __FILE__ )],
            'el_salvador' => ['Сальвадор', plugins_url( 'img/all_flags/el_salvador.gif', __FILE__ )],
            'samoa' => ['Самоа', plugins_url( 'img/all_flags/samoa.gif', __FILE__ )],
            'san_marino' => ['Сан-Марино', plugins_url( 'img/all_flags/san_marino.gif', __FILE__ )],
            'sao_tome_and_principe' => ['Сан-Томе и Принсипи', plugins_url( 'img/all_flags/sao_tome_and_principe.gif', __FILE__ )],
            'saudi_arabia' => ['Саудовская Аравия', plugins_url( 'img/all_flags/saudi_arabia.gif', __FILE__ )],
            'swaziland' => ['Свазиленд', plugins_url( 'img/all_flags/swaziland.gif', __FILE__ )],
            'korea_north' => ['Северная Корея', plugins_url( 'img/all_flags/korea_north.gif', __FILE__ )],
            'northern_mariana_islands' => ['Северные Марианские острова', plugins_url( 'img/all_flags/northern_mariana_islands.gif', __FILE__ )],
            'seychelles' => ['Сейшельские Острова', plugins_url( 'img/all_flags/seychelles.gif', __FILE__ )],
            'saint_barthelemy' => ['Сен-Бартелеми', plugins_url( 'img/all_flags/saint_barthelemy.gif', __FILE__ )],
            'saint_martin' => ['Сен-Мартен', plugins_url( 'img/all_flags/saint_martin.gif', __FILE__ )],
            'saint_pierre_and_miquelon' => ['Сен-Пьер и Микелон', plugins_url( 'img/all_flags/saint_pierre_and_miquelon.gif', __FILE__ )],
            'senegal' => ['Сенегал', plugins_url( 'img/all_flags/senegal.gif', __FILE__ )],
            'saint_vincent_and_the_grenadines' => ['Сент-Винсент и Гренадины', plugins_url( 'img/all_flags/saint_vincent_and_the_grenadines.gif', __FILE__ )],
            'saint_kitts_and_nevis' => ['Сент-Китс и Невис', plugins_url( 'img/all_flags/saint_kitts_and_nevis.gif', __FILE__ )],
            'saint_lucia' => ['Сент-Люсия', plugins_url( 'img/all_flags/saint_lucia.gif', __FILE__ )],
            'serbia' => ['Сербия', plugins_url( 'img/all_flags/serbia.gif', __FILE__ )],
            'singapore' => ['Сингапур', plugins_url( 'img/all_flags/singapore.gif', __FILE__ )],
            'sint_maarten' => ['Синт-Мартен', plugins_url( 'img/all_flags/sint_maarten.gif', __FILE__ )],
            'syria' => ['Сирия', plugins_url( 'img/all_flags/syria.gif', __FILE__ )],
            'slovakia' => ['Словакия', plugins_url( 'img/all_flags/slovakia.gif', __FILE__ )],
            'slovenia' => ['Словения', plugins_url( 'img/all_flags/slovenia.gif', __FILE__ )],
            'solomon_islands' => ['Соломоновы Острова', plugins_url( 'img/all_flags/solomon_islands.gif', __FILE__ )],
            'somalia' => ['Сомали', plugins_url( 'img/all_flags/somalia.gif', __FILE__ )],
            'ussr' => ['СССР', plugins_url( 'img/all_flags/ussr.gif', __FILE__ )],
            'sudan' => ['Судан', plugins_url( 'img/all_flags/sudan.gif', __FILE__ )],
            'suriname' => ['Суринам', plugins_url( 'img/all_flags/suriname.gif', __FILE__ )],
            'united_states_of_america' => ['США', plugins_url( 'img/all_flags/united_states_of_america.gif', __FILE__ )],
            'sierra_leone' => ['Сьерра-Леоне', plugins_url( 'img/all_flags/sierra_leone.gif', __FILE__ )],
            'tajikistan' => ['Таджикистан', plugins_url( 'img/all_flags/tajikistan.gif', __FILE__ )],
            'thailand' => ['Таиланд', plugins_url( 'img/all_flags/thailand.gif', __FILE__ )],
            'republic_of_china' => ['Тайвань', plugins_url( 'img/all_flags/republic_of_china.gif', __FILE__ )],
            'tanzania' => ['Танзания', plugins_url( 'img/all_flags/tanzania.gif', __FILE__ )],
            'turks_and_caicos_islands' => ['Тёркс и Кайкос', plugins_url( 'img/all_flags/turks_and_caicos_islands.gif', __FILE__ )],
            'togo' => ['Того', plugins_url( 'img/all_flags/togo.gif', __FILE__ )],
            'tokelau' => ['Токелау', plugins_url( 'img/all_flags/tokelau.gif', __FILE__ )],
            'tonga' => ['Тонга', plugins_url( 'img/all_flags/tonga.gif', __FILE__ )],
            'trinidad_and_tobago' => ['Тринидад и Тобаго', plugins_url( 'img/all_flags/trinidad_and_tobago.gif', __FILE__ )],
            'tuvalu' => ['Тувалу', plugins_url( 'img/all_flags/tuvalu.gif', __FILE__ )],
            'tunisia' => ['Тунис', plugins_url( 'img/all_flags/tunisia.gif', __FILE__ )],
            'turkmenistan' => ['Туркмения', plugins_url( 'img/all_flags/turkmenistan.gif', __FILE__ )],
            'turkey' => ['Турция', plugins_url( 'img/all_flags/turkey.gif', __FILE__ )],
            'uganda' => ['Уганда', plugins_url( 'img/all_flags/uganda.gif', __FILE__ )],
            'uzbekistan' => ['Узбекистан', plugins_url( 'img/all_flags/uzbekistan.gif', __FILE__ )],
            'ukraine' => ['Украина', plugins_url( 'img/all_flags/ukraine.gif', __FILE__ )],
            'wallis_and_futuna' => ['Уоллис и Футуна', plugins_url( 'img/all_flags/wallis_and_futuna.gif', __FILE__ )],
            'uruguay' => ['Уругвай', plugins_url( 'img/all_flags/uruguay.gif', __FILE__ )],
            'wales' => ['Уэльс', plugins_url( 'img/all_flags/wales.gif', __FILE__ )],
            'faroe_islands' => ['Фарерские острова', plugins_url( 'img/all_flags/faroe_islands.gif', __FILE__ )],
            'fiji' => ['Фиджи', plugins_url( 'img/all_flags/fiji.gif', __FILE__ )],
            'philippines' => ['Филиппины', plugins_url( 'img/all_flags/philippines.gif', __FILE__ )],
            'finland' => ['Финляндия', plugins_url( 'img/all_flags/finland.gif', __FILE__ )],
            'falkland_islands' => ['Фолклендские острова', plugins_url( 'img/all_flags/falkland_islands.gif', __FILE__ )],
            'france' => ['Франция', plugins_url( 'img/all_flags/france.gif', __FILE__ )],
            'french_polynesia' => ['Французская Полинезия', plugins_url( 'img/all_flags/french_polynesia.gif', __FILE__ )],
            'french_southern_territories' => ['Французские Южные и Антарктические территории', plugins_url( 'img/all_flags/french_southern_territories.gif', __FILE__ )],
            'croatia' => ['Хорватия', plugins_url( 'img/all_flags/croatia.gif', __FILE__ )],
            'central_african_republic' => ['Центральноафриканская Республика', plugins_url( 'img/all_flags/central_african_republic.gif', __FILE__ )],
            'chad' => ['Чад', plugins_url( 'img/all_flags/chad.gif', __FILE__ )],
            'montenegro' => ['Черногория', plugins_url( 'img/all_flags/montenegro.gif', __FILE__ )],
            'czech_republic' => ['Чехия', plugins_url( 'img/all_flags/czech_republic.gif', __FILE__ )],
            'chile' => ['Чили', plugins_url( 'img/all_flags/chile.gif', __FILE__ )],
            'switzerland' => ['Швейцария', plugins_url( 'img/all_flags/switzerland.gif', __FILE__ )],
            'sweden' => ['Швеция', plugins_url( 'img/all_flags/sweden.gif', __FILE__ )],
            'scotland' => ['Шотландия', plugins_url( 'img/all_flags/scotland.gif', __FILE__ )],
            'svalbard_and_jan_mayen' => ['Шпицберген и Ян-Майен', plugins_url( 'img/all_flags/svalbard_and_jan_mayen.gif', __FILE__ )],
            'sri_lanka' => ['Шри-Ланка', plugins_url( 'img/all_flags/sri_lanka.gif', __FILE__ )],
            'ecuador' => ['Эквадор', plugins_url( 'img/all_flags/ecuador.gif', __FILE__ )],
            'equatorial_guinea' => ['Экваториальная Гвинея', plugins_url( 'img/all_flags/equatorial_guinea.gif', __FILE__ )],
            'eritrea' => ['Эритрея', plugins_url( 'img/all_flags/eritrea.gif', __FILE__ )],
            'estonia' => ['Эстония', plugins_url( 'img/all_flags/estonia.gif', __FILE__ )],
            'ethiopia' => ['Эфиопия', plugins_url( 'img/all_flags/ethiopia.gif', __FILE__ )],
            'south_africa' => ['ЮАР', plugins_url( 'img/all_flags/south_africa.gif', __FILE__ )],
            'south_georgia_and_the_south_sandwich_islands' => ['Южная Георгия и Южные Сандвичевы острова', plugins_url( 'img/all_flags/south_georgia_and_the_south_sandwich_islands.gif', __FILE__ )],
            'korea_south' => ['Южная Корея', plugins_url( 'img/all_flags/korea_south.gif', __FILE__ )],
            'south_sudan' => ['Южный Судан', plugins_url( 'img/all_flags/south_sudan.gif', __FILE__ )],
            'jamaica' => ['Ямайка', plugins_url( 'img/all_flags/jamaica.gif', __FILE__ )],
            'japan' => ['Япония', plugins_url( 'img/all_flags/japan.gif', __FILE__ )]
        ];
        return $countries;
    }

    public function wac2_countries($post_id){
        $wac2_countries = get_post_meta($post_id, 'wac2_countries', true);
        $countries = $this->wac2_countries_all_array();

        foreach ($countries as $name => $data){
            if($wac2_countries == $name){
                if(is_single()){
                    echo '<div class="title_countries">Страна</div>';
                }
                ?>
                <div class="wac2_countries_view">
                    <div class="l_c"><span><?= $data[0] ?></span></div>
                    <div class="r_c"><img src="<?= $data[1] ?>"></div>
                </div>
                <?php
            }
        }
    }

    public function wac2_comments_open( $open, $post_id ) {

        $post = get_post( $post_id );

        if ( 'wac' == $post->post_type )
            $open = true;

        return $open;
    }

    public function wac2_reviews($post_id){
        $reviews_date = get_post_meta($post_id, 'reviews_date');
        $assessment_this = get_post_meta($post_id, 'assessment_this');
        $reviews_name = get_post_meta($post_id, 'reviews_name');
        $reviews = get_post_meta($post_id, 'reviews');
        $moderation_r = get_post_meta($post_id, 'moderation');
        $approve_r = get_post_meta($post_id, 'approve');

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

            $res_one_company[] = $v;
        }

        $user_id = get_post_meta($post_id, 'wac2_user_id');
        $moderation_enable = get_option('wac2_moderation_user_id_'.$user_id, true);
        ?>
        <div class="title_reviews">Отзывы</div>
        <div class="reviews_assessment">
            <form method="post" class="form_reviews_assessment" data-moderation_enable="<?= $moderation_enable; ?>">
                <input class="wac2_i" type="text" name="reviews_name" placeholder="Ф.И.О" required> <div class="wac2_i all_assessment"><div class="assessment_text">Оцените:</div> <div class="assessment a1" data-number="1">&#9733;</div><div class="assessment a2" data-number="2">&#9733;</div><div class="assessment a3" data-number="3">&#9733;</div><div class="assessment a4" data-number="4">&#9733;</div><div class="assessment a5" data-number="5">&#9733;</div></div>
                <textarea name="reviews" placeholder="Оставить отзыв..." required></textarea>
                <input type="hidden" name="assessment" value="">
                <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                <div class="captcha-item" id="captcha_callback3"></div>
                <input type="submit" value="Опубликовать">
                <div class="massege"></div>
            </form>

            <div class="name_reviews_assessment_reviews_update">
                <?php
                for ($i = 0; $i < count($reviews); $i++){
                    if($res_one_company[$i] != '1_'.$i){
                        $r = true;
                    }else{
                        $r = false;
                    }

                    if( $r ){
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
                        <div class="name_reviews_assessment_reviews">
                            <div>
                                <div class="name_reviews"><?= $reviews_name[$i]; ?></div>
                                <div class="assessment_reviews">
                                    <?php if(!empty($assessment_this[$i])){ ?>
                                        <div <?= $style1; ?> class="assessment_this">&#9733;</div><div <?= $style2; ?> class="assessment_this">&#9733;</div><div <?= $style3; ?> class="assessment_this">&#9733;</div><div <?= $style4; ?> class="assessment_this">&#9733;</div><div <?= $style5; ?> class="assessment_this">&#9733;</div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="reviews"><?= $reviews[$i]; ?></div>
                            <div class="reviews_data"><?= $reviews_date[$i]; ?></div>
                        </div>
                    <?php } } ?>
            </div>

            <div class="expectation_moderation">Ваш отзыв ожидает модерации</div>
        </div><?php
    }

    public function wac2_moderation_enable(){
        $moderation_enable = $_POST['moderation_enable'];
        $user_id = get_current_user_id();
        update_option('wac2_moderation_user_id_'.$user_id, $moderation_enable);
    }

    public function form_reviews_assessment(){
        $assessment = $_POST['assessment'];
        $post_id = $_POST['post_id'];
        $reviews_name = htmlspecialchars($_POST['reviews_name'], ENT_QUOTES);
        $reviews = htmlspecialchars($_POST['reviews'], ENT_QUOTES);

        require_once "recaptchalib.php";
        $secret = "6LfKUz8UAAAAANf7psgqAWVAFXBgrcPBESktBWAp";

        $response = null;

        $reCaptcha = new ReCaptcha($secret);

        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {

            $user_id = get_post_meta($post_id, 'wac2_user_id', true);
            $moderation = get_option('wac2_moderation_user_id_'.$user_id);

            $c = get_post_meta($post_id, 'reviews');
            $c = count($c);
            if($moderation == 'true'){
                $r = '1_'.$c;
            }else{
                $r = '0_'.$c;
            }

            add_post_meta($post_id, 'moderation', $r);

            $reviews_date = date('d.m.Y H:m:s');
            add_post_meta($post_id, 'reviews_date', $reviews_date);
            add_post_meta($post_id, 'assessment_this', $assessment);
            add_post_meta($post_id, 'reviews_name', $reviews_name);
            add_post_meta($post_id, 'reviews', $reviews);

            $reviews_date = get_post_meta($post_id, 'reviews_date');
            $assessment_this = get_post_meta($post_id, 'assessment_this');
            $reviews_name = get_post_meta($post_id, 'reviews_name');
            $reviews = get_post_meta($post_id, 'reviews');
            $moderation_r = get_post_meta($post_id, 'moderation');
            $approve_r = get_post_meta($post_id, 'approve');

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

                $res_one_company[] = $v;
            }

            for ($i = 0; $i < count($reviews); $i++) {
                if($res_one_company[$i] != '1_'.$i){
                    $r = true;
                }else{
                    $r = false;
                }

                if( $r ){
                    if ($assessment_this[$i] == 1) {
                        $style1 = 'style="color:gold"';
                        $style2 = 'style="color:darkgrey"';
                        $style3 = 'style="color:darkgrey"';
                        $style4 = 'style="color:darkgrey"';
                        $style5 = 'style="color:darkgrey"';
                    } else if ($assessment_this[$i] == 2) {
                        $style1 = 'style="color:gold"';
                        $style2 = 'style="color:gold"';
                        $style3 = 'style="color:darkgrey"';
                        $style4 = 'style="color:darkgrey"';
                        $style5 = 'style="color:darkgrey"';
                    } else if ($assessment_this[$i] == 3) {
                        $style1 = 'style="color:gold"';
                        $style2 = 'style="color:gold"';
                        $style3 = 'style="color:gold"';
                        $style4 = 'style="color:darkgrey"';
                        $style5 = 'style="color:darkgrey"';
                    } else if ($assessment_this[$i] == 4) {
                        $style1 = 'style="color:gold"';
                        $style2 = 'style="color:gold"';
                        $style3 = 'style="color:gold"';
                        $style4 = 'style="color:gold"';
                        $style5 = 'style="color:darkgrey"';
                    } else if ($assessment_this[$i] == 5) {
                        $style1 = 'style="color:gold"';
                        $style2 = 'style="color:gold"';
                        $style3 = 'style="color:gold"';
                        $style4 = 'style="color:gold"';
                        $style5 = 'style="color:gold"';
                    }
                    ?>
                    <div class="name_reviews_assessment_reviews">
                        <div>
                            <div class="name_reviews"><?= $reviews_name[$i]; ?></div>
                            <div class="assessment_reviews">
                                <?php if(!empty($assessment_this[$i])){ ?>
                                    <div <?= $style1; ?> class="assessment_this">&#9733;</div><div <?= $style2; ?> class="assessment_this">&#9733;</div><div <?= $style3; ?> class="assessment_this">&#9733;</div><div <?= $style4; ?> class="assessment_this">&#9733;</div><div <?= $style5; ?> class="assessment_this">&#9733;</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="reviews"><?= $reviews[$i]; ?></div>
                        <div class="reviews_data"><?= $reviews_date[$i]; ?></div>
                    </div>
                    <?php
                }
            }

        }else{
            echo 'false';
        }

        wp_die();
    }

    public function wac2_moderation_approve(){
        global $user_ID;
        $post_id = $_POST['post_id'];
        $approve = $_POST['approve'];

        $wac_user_id = get_post_meta($post_id, 'wac2_user_id', true);

        if($wac_user_id == $user_ID || is_admin()){
            add_post_meta($post_id, 'approve', $approve);
        }

        $reviews_date = get_post_meta($post_id, 'reviews_date');
        $assessment_this = get_post_meta($post_id, 'assessment_this');
        $reviews_name = get_post_meta($post_id, 'reviews_name');
        $reviews = get_post_meta($post_id, 'reviews');
        $moderation_r = get_post_meta($post_id, 'moderation');

        $approve_r = get_post_meta($post_id, 'approve');

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

        for ($i = 0; $i < count($reviews); $i++){
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
                <div class="wac2_moderation_date wac2_i"><?= $reviews_date[$i]; ?></div><div class="wac2_i wac2_moderation_m"><?php if( $r ){ ?><a class="wac2_moderation_approve" data-approve="<?= $moderation_r[$i]; ?>" data-post_id="<?= $post_id; ?>">Одобрить</a><?php } ?><a data-name="<?= $reviews_name[$i]; ?>" data-date="<?= $reviews_date[$i]; ?>" data-reviews="<?= $reviews[$i]; ?>" data-assessment_this="<?= $assessment_this[$i]; ?>" data-post_id="<?= $post_id; ?>" data-moderation_d="<?= $moderation_r[$i]; ?>" class="wac2_moderation_delete">Удалить</a></div>
            </div>
        <?php }

        wp_die();
    }

    public function wac2_moderation_delete(){
        global $user_ID;

        $post_id = $_POST['post_id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $reviews = $_POST['reviews'];
        $assessment_this = $_POST['assessment_this'];
        $moderation_d = $_POST['moderation_d'];

        $wac_user_id = get_post_meta($post_id, 'wac2_user_id', true);

        if($wac_user_id == $user_ID || is_admin()){
            delete_post_meta( $post_id, 'reviews_name', $name );
            delete_post_meta( $post_id, 'reviews_date', $date );
            delete_post_meta( $post_id, 'reviews', $reviews );
            delete_post_meta( $post_id, 'assessment_this', $assessment_this );
            delete_post_meta( $post_id, 'moderation', $moderation_d );
            delete_post_meta( $post_id, 'approve', $moderation_d);
        }

        $reviews_date = get_post_meta($post_id, 'reviews_date');
        $assessment_this = get_post_meta($post_id, 'assessment_this');
        $reviews_name = get_post_meta($post_id, 'reviews_name');
        $reviews = get_post_meta($post_id, 'reviews');
        $moderation_r = get_post_meta($post_id, 'moderation');

        $approve_r = get_post_meta($post_id, 'approve');

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

        for ($i = 0; $i < count($reviews); $i++){
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
                <div class="wac2_moderation_date wac2_i"><?= $reviews_date[$i]; ?></div><div class="wac2_i wac2_moderation_m"><?php if( $r ){ ?><a class="wac2_moderation_approve" data-approve="<?= $moderation_r[$i]; ?>" data-post_id="<?= $post_id; ?>">Одобрить</a><?php } ?><a data-name="<?= $reviews_name[$i]; ?>" data-date="<?= $reviews_date[$i]; ?>" data-reviews="<?= $reviews[$i]; ?>" data-assessment_this="<?= $assessment_this[$i]; ?>" data-post_id="<?= $post_id; ?>" data-moderation_d="<?= $moderation_r[$i]; ?>" class="wac2_moderation_delete">Удалить</a></div>
            </div>
        <?php }

        wp_die();
    }

    public function wac2_feedback_form_telephone($post_id){
        global $wpdb;
        $wac2_country = $wpdb->get_results("SELECT * FROM distr_country ORDER BY name_ru");
        ?>
        <form method="post" class="wac2_feedback_form_telephone_f">
        <div class="wac2_feedback_form_telephone">
            <div class="f_l_title">Консультация по телефону</div>
            <div>Укажите регион в котором Вы сейчас находитесь</div>
            <div>
                <div class="f_l_country">
                    <select required>
                        <option value="0">Выберите страну</option>
                        <?php
                        if(geoCoordinate()){
                            $geoCoordinate = geoCoordinate();
                        }else{
                            $geoCoordinate = '';
                        }
                        foreach ($wac2_country as $r){
                            if($r->name_ru == $geoCoordinate['country']['name_ru']){
                                $s = ' selected ';
                            }else{
                                $s = '';
                            }
                            ?><option <?= $s ?> data-phone="<?= $r->phone ?>" value="<?= $r->iso ?>"><?= $r->name_ru ?></option><?php
                        }
                        ?>
                    </select>
                </div>
                <div class="f_l_city">
                    <select required name="city">
                        <option value="0">Выберите город</option>
                    </select>
                </div>
            </div>
            <div>Ваш номер телефона с кодом страны</div>
            <div class="f_l_telephone" data-phone=""><input name="telephone" type="text" value="" pattern="(\+|)[0-9]{6,12}" required placeholder="+XXXXXXXXXXXX"></div>
            <div>Желаемое время звонка</div>
            <div>
                <div class="f_l_time1"><input required name="time" type="radio" value="8:00-13:00">8:00-13:00</div>
                <div class="f_l_time2"><input name="time" type="radio" value="13:00-18:00">13:00-18:00</div>
                <div class="f_l_time3"><input name="time" type="radio" value="18:00-22:00">18:00-22:00</div>
            </div>
            <input type="hidden" name="country" value="0">
            <input type="hidden" name="post_id" value="<?= $post_id ?>">
            <div class="captcha-item" id="captcha_callback1"></div>
            <input type="submit" value="Отправить">
            <div class="massege"></div>
        </div>
        </form>
        <?php
    }

    public function f_wac2_feedback_form_telephone(){
        $id_country = $_POST['id_country'];

        global $wpdb;
        $wac2_city = $wpdb->get_results("SELECT c.* FROM distr_regions as r LEFT JOIN distr_cities as c ON r.id = c.region_id WHERE r.country= '{$id_country}' ORDER BY c.name_ru ASC");
        echo '<option value="0">Выберите город</option>';
        if(geoCoordinate()){
            $geoCoordinate = geoCoordinate();
        }else{
            $geoCoordinate = '';
        }
        foreach ($wac2_city as $r){
            if($r->name_ru == $geoCoordinate['city']['name_ru']){
                $s = ' selected ';
            }else{
                $s = '';
            }
            ?><option <?= $s ?> value="<?= $r->name_ru ?>"><?= $r->name_ru ?></option><?php
        }
        wp_die();
    }

    public function wac2_feedback_form_telephone_f(){
        $city = $_POST['city'];
        $telephone = $_POST['telephone'];
        $time = $_POST['time'];
        $country = $_POST['country'];
        $post_id = $_POST['post_id'];

        require_once "recaptchalib.php";
        $secret = "6LfKUz8UAAAAANf7psgqAWVAFXBgrcPBESktBWAp";

        $response = null;

        $reCaptcha = new ReCaptcha($secret);

        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {
            $message = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'] . ' от формы "Консультация по телефону".' . "\r\n";
            $message .= 'Страна: ' . $country . "\r\n";
            $message .= 'Город: ' . $city . "\r\n";
            $message .= 'Телефон: ' . $telephone . "\r\n";
            $message .= 'Время: ' . $time . "\r\n";

            $subject = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'];

            $headers = 'From: ' . $_SERVER['HTTP_HOST'] . ' <webakcent@'. $_SERVER['HTTP_HOST'] .'>' . "\r\n";

            $wac2_forms_consultations_mail = get_post_meta($post_id, 'wac2_forms_consultations_mail', true);
            if($wac2_forms_consultations_mail){
                $r = wp_mail($wac2_forms_consultations_mail, $subject, $message, $headers);
                if($r){
                    echo 'Ваша заявка отправлено';
                }else{
                    echo 'Ошибка при отправке заявки';
                }
            }else{
                echo 'Ошибка при отправке заявки';
            }
        }else{
            echo 'false';
        }
        wp_die();

    }

    public function wac2_feedback_form_mail($post_id){
        ?>
        <form method="post" class="wac2_feedback_form_mail_f">
        <div class="wac2_feedback_form_mail">
            <div>Консультация по почте</div>
            <div><input name="mail" type="text" placeholder="Введите Ваш E-mail" required pattern="^(\S+)@([a-z0-9-]+)(\.)([a-z]{2,4})(\.?)([a-z]{0,4})+$"></div>
            <div><textarea name="question" placeholder="Ваш вопрос..." required></textarea></div>
            <input type="hidden" name="post_id" value="<?= $post_id ?>">
            <div class="captcha-item" id="captcha_callback2"></div>
            <div><input type="submit" value="Отправить"></div>
            <div class="massege"></div>
        </div>
        </form>
        <?php
    }

    public function wac2_feedback_form_mail_f(){
        $mail = $_POST['mail'];
        $question = $_POST['question'];
        $post_id = $_POST['post_id'];

        require_once "recaptchalib.php";
        $secret = "6LfKUz8UAAAAANf7psgqAWVAFXBgrcPBESktBWAp";

        $response = null;

        $reCaptcha = new ReCaptcha($secret);

        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {

            $message = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'] . ' от формы "Консультация по почте".' . "\r\n";
            $message .= 'Почта: ' . $mail . "\r\n";
            $message .= 'Сообщение: ' . $question . "\r\n";

            $subject = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'];

            $headers = 'From: ' . $_SERVER['HTTP_HOST'] . ' <webakcent@'. $_SERVER['HTTP_HOST'] .'>' . "\r\n";

            $wac2_forms_consultations_mail = get_post_meta($post_id, 'wac2_forms_consultations_mail', true);
            if($wac2_forms_consultations_mail){
                $r = wp_mail($wac2_forms_consultations_mail, $subject, $message, $headers);
                if($r){
                    echo 'Ваше сообщение отправлено';
                }else{
                    echo 'Ошибка при отправке сообщения';
                }
            }else{
                echo 'Ошибка при отправке сообщения';
            }

        } else {
            echo 'false';
        }
        wp_die();
    }

    public function wac2_rating($post_id){
        $assessment_this = get_post_meta($post_id, 'assessment_this');
        $moderation_r = get_post_meta($post_id, 'moderation');
        $approve_r = get_post_meta($post_id, 'approve');

        if( !empty($assessment_this) ){

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

                $res_one_company[] = $v;
            }

            $number_ratings = 0;
            $ratings = 0;
            for ($i = 0; $i < count($assessment_this); $i++) {
                if ($res_one_company[$i] != '1_' . $i) {
                    $r = true;
                } else {
                    $r = false;
                }

                if ($r) {
                    $number_ratings++;
                    $ratings += $assessment_this[$i];
                }
            }

            if($ratings != 0 && $number_ratings != 0){
                $result_r_n_r = $ratings / $number_ratings;
                $result_r_n_r = round($result_r_n_r);
            }else{
                $result_r_n_r = '';
            }

            if($result_r_n_r == 1) {
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:darkgrey"';
                $style3 = 'style="color:darkgrey"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($result_r_n_r == 2){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:darkgrey"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($result_r_n_r == 3){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:darkgrey"';
                $style5 = 'style="color:darkgrey"';
            }else if($result_r_n_r == 4){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:gold"';
                $style5 = 'style="color:darkgrey"';
            }else if($result_r_n_r == 5){
                $style1 = 'style="color:gold"';
                $style2 = 'style="color:gold"';
                $style3 = 'style="color:gold"';
                $style4 = 'style="color:gold"';
                $style5 = 'style="color:gold"';
            }

        }else{
            $result_r_n_r = '';
        }
        update_post_meta($post_id, 'wac_sorting_ratings', $result_r_n_r);

        if(is_single()){
            ?>
            <div class="wac2_rating">
                <div>Рейтинг</div>
                <div class="assessment_one_r"><div <?= $style1; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style2; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style3; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style4; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style5; ?> class="wac2_i assessment_one">&#9733;</div></div>
            </div>
            <?php
        }else{
            ?>
            <div class="assessment_one_r"><div <?= $style1; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style2; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style3; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style4; ?> class="wac2_i assessment_one">&#9733;</div><div <?= $style5; ?> class="wac2_i assessment_one">&#9733;</div></div>
            <?php
        }
    }

    public function registration_check_update(){

        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        $website    =   esc_url( $_POST['website'] );
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
        $nickname   =   sanitize_text_field( $_POST['nickname'] );
        $bio        =   esc_textarea( $_POST['bio'] );
        $remember   = $_POST['remember'];

        $username_r   =   '0';
        $password_r   =   '0';
        $email_r      =   '0';
        $website_r    =   '0';

        global $reg_errors;
        $reg_errors = new WP_Error;

        if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
            $reg_errors->add('field', 'Поле обязательной формы отсутствует:');
            $username_r = '1';
            $password_r = '1';
            $email_r = '1';
        }else{
            $username_r = '0';
            $password_r = '0';
            $email_r = '0';
        }

        if ( 4 > strlen( $username ) ) {
            $reg_errors->add( 'username_length', 'Логин пользователя слишком короткое. Требуется не менее 4 символов' );
            $username_r = '1';
        }else{
            $username_r = '0';
        }

        if ( username_exists( $username ) ){
            $reg_errors->add('user_name', 'Извините, этот логин пользователя уже существует!');
            $username_r = '1';
        }else{
            $username_r = '0';
        }

        if ( ! validate_username( $username ) ) {
            $reg_errors->add( 'username_invalid', 'Извините, введенный вами логин пользователя недействителен' );
            $username_r = '1';
        }else{
            $username_r = '0';
        }

        if ( 5 > strlen( $password ) ) {
            $reg_errors->add( 'password', 'Длина пароля должна быть больше 5' );
            $password_r = '1';
        }else{
            $password_r = '0';
        }

        if ( email_exists( $email ) ) {
            $reg_errors->add( 'email', 'Этот электронный адрес уже занят' );
            $email_r = '1';
        }else{
            $email_r = '0';
        }

        if ( !is_email( $email ) ) {
            $reg_errors->add( 'email_invalid', 'Адрес электронной почты не является допустимым' );
            $email_r = '1';
        }else{
            $email_r = '0';
        }

        if ( ! empty( $website ) ) {
            if ( ! filter_var( $website, FILTER_VALIDATE_URL ) ) {
                $reg_errors->add( 'website', 'Веб-сайт не является допустимым URL-адресом' );
                $website_r = '1';
            }else{
                $website_r = '0';
            }
        }

        if ( is_wp_error( $reg_errors ) ) {
            $error_all = '';
            foreach ( $reg_errors->get_error_messages() as $error ) {

                $error_all .= '<div style="color: red;">'.$error . '</div>';

            }
        }

        if ( 1 > count( $reg_errors->get_error_messages() ) ) {

            require_once "recaptchalib.php";
            $secret = "6LfKUz8UAAAAANf7psgqAWVAFXBgrcPBESktBWAp";

            $response = null;

            $reCaptcha = new ReCaptcha($secret);

            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                    $_POST["wac2_remote_addr"],
                    $_POST["g-recaptcha-response"]
                );
            }

            if ($response != null && $response->success) {

                $userdata = array(
                    'user_login'    =>   $username,
                    'user_email'    =>   $email,
                    'user_pass'     =>   $password,
                    'user_url'      =>   $website,
                    'first_name'    =>   $first_name,
                    'last_name'     =>   $last_name,
                    'nickname'      =>   $nickname,
                    'description'   =>   $bio,
                    'role'          =>   'wac2_company_user'
                );
                $user = wp_insert_user( $userdata );

                $creds = array();
                $creds['user_login'] = $username;
                $creds['user_password'] = $password;

                if($remember == 'remember'){
                    $remember = true;
                }else{
                    $remember = false;
                }

                $creds['remember'] = $remember;


                $login = wp_signon($creds, false);

                if ( !is_wp_error($login) ){
                    echo json_encode(array('loggedin'=>true, 'url'=> $_POST['url'] ));
                }

            }else{
                echo json_encode(array( 'loggedin'=>'recaptcha' ));
            }
        }else{
            echo json_encode(array(
                'loggedin'=>false,
                'username'=>( isset( $_POST['username'] ) ? $username : null ),
                'password'=>( isset( $_POST['password'] ) ? $password : null ),
                'email'=>( isset( $_POST['email']) ? $email : null ),
                'website'=>( isset( $_POST['website']) ? $website : null ),
                'fname'=>( isset( $_POST['fname']) ? $first_name : null ),
                'lname'=>( isset( $_POST['lname']) ? $last_name : null ),
                'nickname'=>( isset( $_POST['nickname']) ? $nickname : null ),
                'bio'=>( isset( $_POST['bio']) ? $bio : null ),
                'error_all'=>$error_all,
                'username_r'=>$username_r,
                'password_r'=>$password_r,
                'email_r'=>$email_r,
                'website_r'=>$website_r
            ));
        }

        wp_die();

    }

    public function wac2_recaptcha(){
        echo '<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=[[++cultureKey]]" async defer></script>';
    }

    public function wac2_login_company_user_recaptch(){

        $authenticate = wp_authenticate_username_password(null, $_POST['username'], $_POST['password']);
        if($authenticate->errors){
            echo '1';
        }else{

            require_once "recaptchalib.php";
            $secret = "6LfKUz8UAAAAANf7psgqAWVAFXBgrcPBESktBWAp";

            $response = null;

            $reCaptcha = new ReCaptcha($secret);

            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                    $_POST["wac2_remote_addr"],
                    $_POST["g-recaptcha-response"]
                );
            }

            if ($response != null && $response->success) {
                echo '1';
            }else{
                echo '0';
            }

        }
        wp_die();
    }

    public function lost_password(){
        require dirname(__FILE__) . '/tpl/lost_password.php';
    }

    public function reset_password_front(){
        require dirname(__FILE__) . '/tpl/reset_password.php';
    }

    public function wac2_contacts($post_id){
        $wac2_contacts_address_company = get_post_meta($post_id, 'wac2_contacts_address_company', true);
        $wac2_contacts_site_company = get_post_meta($post_id, 'wac2_contacts_site_company', true);
        $wac2_contacts_mail_company = get_post_meta($post_id, 'wac2_contacts_mail_company', true);
        $wac2_contacts_phone_company = get_post_meta($post_id, 'wac2_contacts_phone_company', true);
        $wac2_contacts_fax_company = get_post_meta($post_id, 'wac2_contacts_fax_company', true);
        $wac2_contacts_consular_districts_company = get_post_meta($post_id, 'wac2_contacts_consular_districts_company', true);
        ?>
        <div id="wac2_contacts_f">
            <div class="wac2_contacts_f_title">Контакты</div>
        <?php if($wac2_contacts_address_company){ ?>
            <div>
                <div>Адрес:</div>
                <div>
                    <?= $wac2_contacts_address_company ?>
                </div>
            </div>
        <?php } ?>
        <?php if($wac2_contacts_site_company){ ?>
            <div>
                <div>Сайт:</div>
                <div>
                    <?= $wac2_contacts_site_company ?>
                </div>
            </div>
        <?php } ?>
        <?php if($wac2_contacts_mail_company){ ?>
            <div>
                <div>E-mail:</div>
                <div>
                    <?= $wac2_contacts_mail_company ?>
                </div>
            </div>
        <?php } ?>
        <?php if($wac2_contacts_phone_company){ ?>
            <div>
                <div>Телефон:</div>
                <div>
                    <?= $wac2_contacts_phone_company ?>
                </div>
            </div>
        <?php } ?>
        <?php if($wac2_contacts_fax_company){ ?>
            <div>
                <div>Факс:</div>
                <div>
                    <?= $wac2_contacts_fax_company ?>
                </div>
            </div>
        <?php } ?>
        <?php if($wac2_contacts_consular_districts_company){ ?>
            <div>
                <div>Консульские округа:</div>
                <div>
                    <?= $wac2_contacts_consular_districts_company ?>
                </div>
            </div>
        <?php } ?>
        </div>
        <?php
    }

    public function meta_box_detailed_description_company_f(){
        $detailed_description_company = $_POST['detailed_description_company'];
        $post_id = $_POST['post_id'];
        update_post_meta($post_id, 'wac2_detailed_description_company', $detailed_description_company);
    }

    public function meta_box_special_block_f(){
        $special_block = $_POST['special_block'];
        $post_id = $_POST['post_id'];
        update_post_meta($post_id, 'wac2_special_block', $special_block);
    }

    public function meta_box_basic_description_company_f(){
        $basic_description_company = $_POST['basic_description_company'];
        $post_id = $_POST['post_id'];
        $title_company = $_POST['title_company'];
        update_post_meta($post_id, 'wac2_basic_description_company', $basic_description_company);

        wp_insert_post( array(
            'ID' => $post_id,
            'post_title' => $title_company,
            'post_type' => $this->type,
            'post_status' => 'publish'
        ) );
    }

    public function meta_box_forms_consultations_f(){
        $consultations_mail = $_POST['consultations_mail'];
        $post_id = $_POST['post_id'];
        update_post_meta($post_id, 'wac2_forms_consultations_mail', $consultations_mail);
    }

    public function meta_box_countries_f(){
        $countries = $_POST['countries'];
        $post_id = $_POST['post_id'];
        update_post_meta($post_id, 'wac2_countries', $countries);
    }

    public function meta_box_contacts_f(){
        $contacts_address_company = $_POST['contacts_address_company'];
        $contacts_site_company = $_POST['contacts_site_company'];
        $contacts_mail_company = $_POST['contacts_mail_company'];
        $contacts_phone_company = $_POST['contacts_phone_company'];
        $contacts_fax_company = $_POST['contacts_fax_company'];
        $contacts_consular_districts_company = $_POST['contacts_consular_districts_company'];
        $post_id = $_POST['post_id'];

        update_post_meta($post_id, 'wac2_contacts_address_company', $contacts_address_company);
        update_post_meta($post_id, 'wac2_contacts_site_company', $contacts_site_company);
        update_post_meta($post_id, 'wac2_contacts_mail_company', $contacts_mail_company);
        update_post_meta($post_id, 'wac2_contacts_phone_company', $contacts_phone_company);
        update_post_meta($post_id, 'wac2_contacts_fax_company', $contacts_fax_company);
        update_post_meta($post_id, 'wac2_contacts_consular_districts_company', $contacts_consular_districts_company);
    }

    public function meta_box_slider_f(){
        $post_id = $_POST['post_id'];

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        foreach( $_FILES as $file_id => $data ){
            $attach_id = media_handle_upload( $file_id, 0 );

            if( is_wp_error( $attach_id ) ) {
                echo 'Ошибка загрузки файла `' . $data['name'] . '`: ' . $attach_id->get_error_message();
            }else{
                $wac2_img_slider = wp_get_attachment_url( $attach_id );
            }
        }

        add_post_meta($post_id, 'wac2_slider_img', $wac2_img_slider);

        ?>
        <div class="wac2_slider">
            <?php
            $slider_img = get_post_meta($post_id, 'wac2_slider_img');
            foreach ($slider_img as $s_i1){
                ?><div><img src="<?= $s_i1 ?>"></div><?php
            }
            ?>
        </div>
        <div class="slider_img_preview">
            <?php
            foreach ($slider_img as $s_i2){
                ?>
                <img src="<?= $s_i2 ?>" width="100px" height="70px">
                <span class="slider_img_preview_delete"><img data-post_id="<?= $post_id ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span>
                <?php
            }
            ?>
        </div>
        <script>
            jQuery('.wac2_slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true
            });
        </script>
        <?php
        wp_die();
    }

    public function slider_img_preview_delete_f(){
        $src = $_POST['src'];
        $post_id = $_POST['post_id'];
        delete_post_meta($post_id, 'wac2_slider_img', $src);
        ?>
        <div class="wac2_slider">
            <?php
            $slider_img = get_post_meta($post_id, 'wac2_slider_img');
            foreach ($slider_img as $s_i1){
                ?><div><img src="<?= $s_i1 ?>"></div><?php
            }
            ?>
        </div>
        <div class="slider_img_preview">
            <?php
            foreach ($slider_img as $s_i2){
                ?>
                <img src="<?= $s_i2 ?>" width="100px" height="70px">
                <span class="slider_img_preview_delete"><img data-post_id="<?= $post_id ?>" data-src="<?= $s_i2 ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></span>
                <?php
            }
            ?>
        </div>
        <script>
            jQuery('.wac2_slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true
            });
        </script>
        <?php
        wp_die();
    }

    public function postimagediv_f(){
        $post_id = $_POST['post_id'];

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        foreach( $_FILES as $file_id => $data ){
            $attach_id = media_handle_upload( $file_id, 0 );

            if( is_wp_error( $attach_id ) ) {
                echo 'Ошибка загрузки файла `' . $data['name'] . '`: ' . $attach_id->get_error_message();
            }else{
                $wac2_img_logo = wp_get_attachment_url( $attach_id );
            }
        }

        set_post_thumbnail( $post_id, $attach_id );

        ?>
        <div class="postimagediv_delete"><img data-post_id="<?= $post_id ?>" src="<?= plugins_url( 'img/delete.png', __FILE__ ); ?>"></div>
        <div><?= get_the_post_thumbnail( $post_id, 'full' ) ?></div>
        <?php

        wp_die();
    }

    public function postimagediv_delete(){
        $post_id = $_POST['post_id'];
        delete_post_thumbnail( $post_id );
    }

    public function modal_create_company(){
        $name_company = $_POST['name_company'];
        $url = $_POST['url'];
        $cat_id = $_POST['cat_id'];

        global $user_ID;
        $count = count_user_posts( $user_ID, $this->type, true );

        if($count >= 1){
            echo $url.'?personal_area=rate';
        }else{
            $post_id = wp_insert_post( array(
                'post_title' => $name_company,
                'post_type' => $this->type,
                'post_status' => 'publish'
            ) );

//            wp_set_object_terms( $post_id, (int)$cat_id, 'category_' . $this->type, false );

            update_post_meta($post_id, 'wac2_user_id', $user_ID);

            echo $url.'?personal_area=company&company_id='.$post_id;
        }

        wp_die();
    }

    public function wac2_create_company(){
        $url = $_POST['url'];

        global $user_ID;
        $count = count_user_posts( $user_ID, $this->type, true );

        if($count >= 1){
            echo '1';
//            echo $url.'?personal_area=rate';
        }else{
            echo '0';
        }

        wp_die();
    }

    public function delete_company(){
        $company_id = $_POST['company_id'];
        $url = $_POST['url'];
        $r = wp_delete_post( $company_id );
        if($r){
            echo $url;
        }
        wp_die();
    }

    public function country_s_g(){
        $id_country = $_POST['id_country'];
        $post_id = $_POST['post_id'];
        $wac2_cat_sub_this = get_post_meta($post_id, 'wac2_cat_sub_this', true);
        $args = array(
            'parent' => $id_country,
            'hide_empty' => 0,
            'taxonomy' => 'category_' . $this->type
        );
        $cat_p = get_categories($args);
        if($cat_p){
        ?>
        <div class="cc_s">Укажите категорию</div>
        <select class="country_s_gg">
            <option value="0">Выберите категорию</option>
            <?php
            foreach ($cat_p as $cat){
                if($wac2_cat_sub_this == $cat->term_id){
                    $s = 'selected';
                }else{
                    $s = '';
                }
                ?>
                <option <?= $s ?> value="<?= $cat->term_id ?>"><?= $cat->name ?></option>
                <?php
            }
            ?>
        </select>
        <!--<div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?/*= plugins_url( 'img/plus.png', __FILE__ ); */?>"></div>-->
        <?php
        }else{
            ?>
            <!--<div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?/*= plugins_url( 'img/plus.png', __FILE__ ); */?>"></div>-->
            <?
        }
        wp_die();
    }

    public function add_sub_cat(){
        $cat_sub_name = $_POST['cat_sub_name'];
        $id_cat = $_POST['id_cat'];

        $cat = array(
            'cat_name' => $cat_sub_name,
            'category_parent' => $id_cat,
            'taxonomy' => 'category_' . $this->type
        );
        wp_insert_category( $cat );

        $args = array(
            'parent' => $id_cat,
            'hide_empty' => 0,
            'taxonomy' => 'category_' . $this->type
        );
        $cat_p = get_categories($args);
        if($cat_p){
            ?>
            <select class="country_s_gg">
                <?php
                foreach ($cat_p as $cat){
                    ?>
                    <option value="<?= $cat->term_id ?>"><?= $cat->name ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?= plugins_url( 'img/plus.png', __FILE__ ); ?>"></div>
            <?php
        }else{
            ?>
            <div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?= plugins_url( 'img/plus.png', __FILE__ ); ?>"></div>
            <?
        }
        wp_die();
    }

    public function add__cat(){
        $cat__name = $_POST['cat__name'];

        $cat = array(
            'cat_name' => $cat__name,
            'category_parent' => 0,
            'taxonomy' => 'category_' . $this->type
        );
        $c = wp_insert_category( $cat );

        $args = array(
            'parent' => 0,
            'hide_empty' => 0,
            'taxonomy' => 'category_' . $this->type
        );
        $cat_p = get_categories($args);
        $s = '<select class="country_s_g">';
        foreach ($cat_p as $cat){
            $s .= '<option value="'. $cat->term_id .'">'. $cat->name .'</option>';
        }
        $s .= '</select>';

        echo json_encode(array(
            's'=>$s,
            'c'=>$c
        ));
        wp_die();
    }

    public function add_sub_cat_u(){
        $id_cat = $_POST['id_cat'];

        $args = array(
            'parent' => $id_cat,
            'hide_empty' => 0,
            'taxonomy' => 'category_' . $this->type
        );
        $cat_p = get_categories($args);
        if($cat_p){
            ?>
            <select class="country_s_gg">
                <?php
                foreach ($cat_p as $cat){
                    ?>
                    <option value="<?= $cat->term_id ?>"><?= $cat->name ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?= plugins_url( 'img/plus.png', __FILE__ ); ?>"></div>
            <?php
        }else{
            ?>
            <div class="add_sub_cat"><input type="text" class="wac2_i"><img class="wac2_i" src="<?= plugins_url( 'img/plus.png', __FILE__ ); ?>"></div>
            <?
        }
        wp_die();
    }

    public function choice_country(){
        $cat_id = $_POST['cat_id'];
        $post_id = $_POST['post_id'];
        $cat_id_h = $_POST['cat_id_h'];

        update_post_meta($post_id, 'wac2_cat_this', $cat_id_h);
        update_post_meta($post_id, 'wac2_cat_sub_this', $cat_id);

        wp_set_object_terms( $post_id, (int)$cat_id, 'category_' . $this->type, false );

        echo get_permalink( $post_id );
        wp_die();
    }

}
?>