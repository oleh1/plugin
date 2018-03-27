<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="wa-file"><br>
    <input type="submit" value="Загрузить"><br>
</form>
<?php
$file_size = $_FILES["wa-file"]["size"];
$file_name = $_FILES["wa-file"]["name"];
$file_tmp_name = $_FILES["wa-file"]["tmp_name"];

if($file_tmp_name){

    $row_widget = 10;

    $objPHPExcel = PHPExcel_IOFactory::load( $file_tmp_name );

    $dataArr = array();

    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheetTitle     = $worksheet->getTitle();
        $highestRow         = $worksheet->getHighestRow();
        $highestColumn      = $worksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

        for ($row = 1; $row <= $highestRow; ++ $row) {
            for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                $val = $cell->getValue();
                $dataArr[$row][$col] = $val;
            }
        }
    }

    function load_file( $url, $post_ID ){

        if( isset( $url ) && isset( $post_ID ) ){
            $desc    = 'test';

            $file_array = array();
            $tmp = download_url( $url );
            preg_match('/[^\?]+\.(jpg|jpeg|gif|png)/i', $url, $matches );
            $file_array['name'] = basename( $matches[0] );
            $file_array['tmp_name'] = $tmp;

            $id = media_handle_sideload( $file_array, $post_ID, $desc );

            if( is_wp_error( $id ) ) {
                @unlink($file_array['tmp_name']);
                return $id->get_error_messages();
            }

            @unlink( $file_array['tmp_name'] );

            return $id;
        }
    }

    foreach ($dataArr as $k => $v){
        if( $k >= 2){

            $post_id = wp_insert_post( array(
                'post_title' => $v[0],
                'post_type' => $this->type,
                'post_status' => 'publish'
            ) );

            if($v[1] != null){
                update_post_meta($post_id, 'wac2_basic_description_company', $v[1]);
            }else{
                $row_widget--;
            }

            if($v[2] != null){
                update_post_meta($post_id, 'wac2_detailed_description_company', $v[2]);
            }else{
                $row_widget--;
            }

            if($v[3] != null){
                update_post_meta($post_id, 'wac2_special_block', $v[3]);
            }else{
                $row_widget--;
            }


            if($v[4] != null){

                $p_a = array();
                $map_point = explode( '; ' ,$v[4] );
                foreach ($map_point as $p){

                    $xmlstr = @file_get_contents("https://geocode-maps.yandex.ru/1.x/?geocode=".urlencode($p));
                    $xml = new SimpleXMLElement($xmlstr);
                    $full_address_fix = $xml->{'GeoObjectCollection'}->{'featureMember'}[0]->{'GeoObject'}->{'metaDataProperty'}->{'GeocoderMetaData'}->{'text'};

                    $p_a[] = (string)$full_address_fix;

                    $position = $xml->{'GeoObjectCollection'}->{'featureMember'}[0]->{'GeoObject'}->{'Point'}->{'pos'};

                    $position = explode(' ', $position);

                    $position = implode('_', $position);

                    add_post_meta( $post_id, 'wac2_list_mark_address_point_lat_lon', $position );
                    add_post_meta( $post_id, 'wac2_list_mark_address_point_title', $v[0] );
                    add_post_meta( $post_id, 'wac2_list_mark_address', (string)$full_address_fix );

                }

                $address =  implode('; ', $p_a);

                update_post_meta($post_id, 'wac2_contacts_address_company', $address);

            }else{
                $row_widget--;
            }

            if($v[5] != null){
                update_post_meta($post_id, 'wac2_contacts_site_company', $v[5]);
            }

            if($v[6] != null){
                update_post_meta($post_id, 'wac2_contacts_mail_company', $v[6]);
                update_post_meta($post_id, 'wac2_forms_consultations_mail', $v[6]);
            }else{
                $row_widget--;
            }

            if($v[7] != null){
                update_post_meta($post_id, 'wac2_contacts_phone_company', $v[7]);
            }

            if($v[8] != null){
                update_post_meta($post_id, 'wac2_contacts_consular_districts_company', $v[8]);
            }

            if($v[5] == null && $v[6] == null && $v[7] == null && $v[8] == null){
                $row_widget--;
            }

            if($v[9] != null){

                $logo_id = load_file($v[9], $post_id);
                set_post_thumbnail( $post_id, $logo_id );

            }else{
                $row_widget--;
            }

            if($v[10] != null){

                $s_a = explode('; ', $v[10]);
                foreach ($s_a as $p){
                    $slider_id = load_file($p, $post_id);
                    $slider_url = wp_get_attachment_url( $slider_id );
                    add_post_meta($post_id, 'wac2_slider_img', $slider_url);
                }

            }else{
                $row_widget--;
            }


            global $user_ID;
            update_post_meta($post_id, 'wac2_user_id', $user_ID);

            var_dump($row_widget);

            update_post_meta($post_id, 'wac2_row_widget', $row_widget);

            if((int)$row_widget % 2 != 0){
                add_post_meta($post_id, 'wac2_row_widget_one', $row_widget);
            }

            $i = 1;
            if($v[9] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_logo');
                $i++;
            }

            if($v[1] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_basic_description');
                $i++;
            }

            if($v[2] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_detailed_description');
                $i++;
            }

            if($v[4] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_map');
                $i++;
            }

            if($v[10] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_sliderr');
                $i++;
            }

            if($v[3] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_special_block');
                $i++;
            }

            if($v[7] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_feedback_form_telephone');
                $i++;
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_feedback_form_mail');
                $i++;
            }

            if($v[5] != null || $v[6] != null || $v[7] != null || $v[8] != null){
                update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_contacts');
                $i++;
            }

            update_post_meta($post_id, 'wac2_widget'.$i.'_post_company', 'wac2_reviews');

        }

    }

}
?>