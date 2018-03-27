<?php
$detailed_description_company = get_post_meta($post->ID, 'wac2_detailed_description_company', true);
wp_editor($detailed_description_company, 'detailed_description_company', array(
    'textarea_name' => 'detailed_description_company',
) );
?>