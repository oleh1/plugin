<?php
$special_block = get_post_meta($post->ID, 'wac2_special_block', true);
wp_editor($special_block, 'special_block', array(
    'textarea_name' => 'special_block',
) );
?>