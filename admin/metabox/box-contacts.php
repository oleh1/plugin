<?php
$wac2_contacts_address_company = get_post_meta($post->ID, 'wac2_contacts_address_company', true);
$wac2_contacts_site_company = get_post_meta($post->ID, 'wac2_contacts_site_company', true);
$wac2_contacts_mail_company = get_post_meta($post->ID, 'wac2_contacts_mail_company', true);
$wac2_contacts_phone_company = get_post_meta($post->ID, 'wac2_contacts_phone_company', true);
$wac2_contacts_fax_company = get_post_meta($post->ID, 'wac2_contacts_fax_company', true);
$wac2_contacts_consular_districts_company = get_post_meta($post->ID, 'wac2_contacts_consular_districts_company', true);
?>

<div id="wac2_contacts">
    <div>
        <div><label for="contacts_address_company">Адрес</label></div> <input type="text" id="contacts_address_company" name="contacts_address_company" value="<?= $wac2_contacts_address_company ?>">
    </div>
    <div>
        <div><label for="contacts_site_company">Сайт</label></div> <input type="text" id="contacts_site_company" name="contacts_site_company" value="<?= $wac2_contacts_site_company ?>">
    </div>
    <div>
        <div><label for="contacts_mail_company">E-mail</label></div> <input type="text" id="contacts_mail_company" name="contacts_mail_company" value="<?= $wac2_contacts_mail_company ?>">
    </div>
    <div>
        <div><label for="contacts_phone_company">Телефон</label></div> <input type="text" id="contacts_phone_company" name="contacts_phone_company" value="<?= $wac2_contacts_phone_company ?>">
    </div>
    <div>
        <div><label for="contacts_fax_company">Факс</label></div> <input id="contacts_fax_company" type="text" name="contacts_fax_company" value="<?= $wac2_contacts_fax_company ?>">
    </div>
    <div>
        <div><label for="contacts_consular_districts_company">Консульские округа</label></div> <textarea id="contacts_consular_districts_company" name="contacts_consular_districts_company"><?= $wac2_contacts_consular_districts_company ?></textarea>
    </div>
</div>