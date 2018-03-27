<?php
$company_id = $_GET['company_id'];
$wac2_user_id = get_post_meta($company_id, 'wac2_user_id', true);
if($wac2_user_id == $user_ID){ ?>

<div id="wac2_company_personal_area_update">
    <?php
    $company_data = get_post($company_id);
    ?>

    <div class="widget_scroll_top_t"></div>

    <div class="widgets_post">
        <table>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/favorites-list.png', __FILE__ ); ?>"><div data-v="meta_box_reviews" class="wac2_reviews widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_reviews" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/text-document-outlined-symbol.png', __FILE__ ); ?>"><div data-v="meta_box_basic_description_company" class="wac2_basic_description widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_basic_description_company" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/voice-mail.png', __FILE__ ); ?>"><div data-v="meta_box_forms_consultations" class="wac2_feedback_form_telephone widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/email-outbox.png', __FILE__ ); ?>"><div data-v="meta_box_forms_consultations" class="wac2_feedback_form_mail widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/flag.png', __FILE__ ); ?>"><div data-v="meta_box_countries" class="wac2_countries widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_countries" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/contacts-agenda.png', __FILE__ ); ?>"><div data-v="meta_box_contacts" class="wac2_contacts widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_contacts" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
        </table>
    </div>

    <div id="company_post">
        <table>
            <?php
            $wac2_row_widget_one = get_post_meta($company_id, 'wac2_row_widget_one');
            $row_widget = get_post_meta($company_id, 'wac2_row_widget', true);

            if(!$row_widget){
                $row_widget = 2;
            }
            for($i = 1; (int)$row_widget >= $i; $i++){

                if( in_array($i ,$wac2_row_widget_one) ){
                    ?>
                    <tr>
                        <td colspan="2" class="one_get_widgets">
                            <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $company_id ?>">
                                <?php
                                ob_start();
                                do_action( 'widgets_post', $i, $company_id);
                                $widgets_post_l = ob_get_clean();
                                if($widgets_post_l){
                                    echo $widgets_post_l;
                                }else{
                                    ?>
                                    <button class="add_widget_plus"></button>
                                    <div class="add_widget_plus_i">
                                        <div>
                                            <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $company_id ?>" data-v="postimagediv" src="<?= plugins_url( '../img/photo-camera.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $company_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( '../img/world-location.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $company_id ?>" data-v="" src="<?= plugins_url( '../img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $company_id ?>" data-v="meta_box_slider" src="<?= plugins_url( '../img/photos.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $company_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( '../img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $company_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( '../img/left-justification-button.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $company_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( '../img/favorites-list.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $company_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( '../img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/voice-mail.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/email-outbox.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $company_id ?>" data-v="meta_box_countries" src="<?= plugins_url( '../img/flag.png', __FILE__ ); ?>">
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
                            <div class="get_widgets" draggable="false" data-i="<?= $i ?>" data-post_id="<?= $company_id ?>">
                                <?php
                                ob_start();
                                do_action( 'widgets_post', $i, $company_id);
                                $widgets_post_l = ob_get_clean();
                                if($widgets_post_l){
                                    echo $widgets_post_l;
                                }else{
                                    ?>
                                    <button class="add_widget_plus"></button>
                                    <div class="add_widget_plus_i">
                                        <div>
                                            <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $company_id ?>" data-v="postimagediv" src="<?= plugins_url( '../img/photo-camera.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $company_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( '../img/world-location.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $company_id ?>" data-v="" src="<?= plugins_url( '../img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $company_id ?>" data-v="meta_box_slider" src="<?= plugins_url( '../img/photos.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $company_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( '../img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $company_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( '../img/left-justification-button.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $company_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( '../img/favorites-list.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $company_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( '../img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/voice-mail.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/email-outbox.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $company_id ?>" data-v="meta_box_countries" src="<?= plugins_url( '../img/flag.png', __FILE__ ); ?>">
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <div class="get_widgets" draggable="false" data-i="<?= ++$i ?>" data-post_id="<?= $company_id ?>">
                                <?php
                                ob_start();
                                do_action( 'widgets_post', $i, $company_id);
                                $widgets_post_l = ob_get_clean();
                                if($widgets_post_l){
                                    echo $widgets_post_l;
                                }else{
                                    ?>
                                    <button class="add_widget_plus"></button>
                                    <div class="add_widget_plus_i">
                                        <div>
                                            <img data-i="<?= $i ?>" data-class="wac2_logo" data-post_id="<?= $company_id ?>" data-v="postimagediv" src="<?= plugins_url( '../img/photo-camera.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_map" data-post_id="<?= $company_id ?>" data-v="meta_box_map_setup" src="<?= plugins_url( '../img/world-location.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_rating" data-post_id="<?= $company_id ?>" data-v="" src="<?= plugins_url( '../img/mark-as-favorite-star.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_sliderr" data-post_id="<?= $company_id ?>" data-v="meta_box_slider" src="<?= plugins_url( '../img/photos.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_detailed_description" data-post_id="<?= $company_id ?>" data-v="meta_box_detailed_description_company" src="<?= plugins_url( '../img/text-document-black-interface-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_special_block" data-post_id="<?= $company_id ?>" data-v="meta_box_special_block" src="<?= plugins_url( '../img/left-justification-button.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_reviews" data-post_id="<?= $company_id ?>" data-v="meta_box_reviews" src="<?= plugins_url( '../img/favorites-list.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_basic_description" data-post_id="<?= $company_id ?>" data-v="meta_box_basic_description_company" src="<?= plugins_url( '../img/text-document-outlined-symbol.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_telephone" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/voice-mail.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_feedback_form_mail" data-post_id="<?= $company_id ?>" data-v="meta_box_forms_consultations" src="<?= plugins_url( '../img/email-outbox.png', __FILE__ ); ?>">
                                            <img data-i="<?= $i ?>" data-class="wac2_countries" data-post_id="<?= $company_id ?>" data-v="meta_box_countries" src="<?= plugins_url( '../img/flag.png', __FILE__ ); ?>">
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
            ?>
        </table>
        <button class="add_row_widget_one" data-post_id="<?= $company_id ?>">Добавить двойной блок</button>
        <button class="add_row_widget" data-post_id="<?= $company_id ?>">Добавить блок</button>
        <div>
            <button class="delete_row_widget" data-post_id="<?= $company_id ?>"></button>
        </div>
    </div>

    <div class="widgets_post">
        <table>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/photo-camera.png', __FILE__ ); ?>"><div data-v="postimagediv" class="wac2_logo widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="postimagediv" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/world-location.png', __FILE__ ); ?>"><div data-v="meta_box_map_setup" class="wac2_map widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_map_setup" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/mark-as-favorite-star.png', __FILE__ ); ?>"><div data-v="rating_f" class="wac2_rating widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="rating_f" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/photos.png', __FILE__ ); ?>"><div data-v="meta_box_slider" class="wac2_sliderr widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_slider" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/text-document-black-interface-symbol.png', __FILE__ ); ?>"><div data-v="meta_box_detailed_description_company" class="wac2_detailed_description widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_detailed_description_company" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="put_widgets" draggable="true" data-img="<?= plugins_url( '../img/left-justification-button.png', __FILE__ ); ?>"><div data-v="meta_box_special_block" class="wac2_special_block widgets_post_all_one"></div></div>
                    <span><img class="scroll_settings" data-v="meta_box_special_block" src="<?= plugins_url( '../img/settings-work-tool.png', __FILE__ ); ?>"></span>
                </td>
            </tr>
        </table>
    </div>

    <div class="widget_scroll_bottom_t" style="clear: both;"></div>

    <div class="widget_scroll_bottom"></div>
    <div class="widget_scroll_top"></div>


    <div class="choice_country">
        <?php
        $wac2_cat_this = get_post_meta($company_id, 'wac2_cat_this', true);
        ?>
        <div class="cc_s">Укажите страну</div>
        <div class="qwert">
            <div class="country_s_g_update">
                <?php
                $args = array(
                    'parent' => 0,
                    'hide_empty' => 0,
                    'taxonomy' => 'category_' . $this->type
                );
                $cat_p = get_categories($args);
                if($cat_p){
                    ?>
                    <select class="country_s_g">
                        <option value="0">Выберите страну</option>
                        <?php
                        foreach ($cat_p as $cat){
                            if($wac2_cat_this == $cat->term_id){
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
                <?php } ?>
            </div>
        </div>
        <?php if($cat_p){ ?>
            <div class="country_s_gg_update">
            </div>
        <?php } ?>
        <button data-post_id="<?= $company_id ?>">Сохранить</button>
    </div>

    <?php include dirname(__FILE__). '/all_modal_widget.php'; ?>
</div>

<?php }else{
    wp_redirect( $uri );
    exit;
} ?>