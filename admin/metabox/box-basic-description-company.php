<?php
$basic_description_company = get_post_meta($post->ID, 'wac2_basic_description_company', true);
wp_editor($basic_description_company, 'basic_description_company', array(
    'textarea_name' => 'basic_description_company',
) );
?>