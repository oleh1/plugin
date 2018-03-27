<?php
$wac2_countries = get_post_meta($post->ID, 'wac2_countries', true);
$countries = $this->wac2_countries_all_array();
?>
<select name="wac2_countries">
    <?php
    foreach ($countries as $name => $data){
        if($wac2_countries == $name){
            $selected = ' selected ';
        }else{
            $selected = '';
        }
        ?>
        <option value="<?= $name ?>" <?= $selected ?>><?= $data[0] ?></option>
        <?php
    }
    ?>
</select>