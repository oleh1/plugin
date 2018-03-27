<ul class="commentlist comment_g">
    <?php wp_list_comments( 'type=comment&callback=wac2_comment' ); ?>
</ul>

<?php
$fields =  array(
    'author' =>
        '<p class="comment-form-author"><label for="author">Имя</label> ' .
        ( $req ? '<span class="required">*</span> ' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . ' /></p>',
    'email' =>
        '<p class="comment-form-email"><label for="email">E-mail</label> ' .
        ( $req ? '<span class="required">*</span> ' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . ' /></p>',
);
$args = array(
    'id_form'           => 'commentform',
    'class_form'        => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit',
    'name_submit'       => 'submit',
    'title_reply_before' => '<div>',
    'title_reply'       => 'Оставить отзыв',
    'title_reply_after' => '</div>',
    'label_submit'      => 'Добавить',
    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" class="comment_form_text" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __('Вы вошли как <a href="%1$s">%2$s</a>. <a href="%3$s" title="Выйти из этого аккаунта">Выйти?</a>', 'wac2'),
            admin_url('profile.php'),
            $user_identity,
            wp_logout_url(apply_filters('the_permalink', get_permalink()))
        ) . '</p>',
    'comment_notes_before' => '',
    'fields' => apply_filters('comment_form_default_fields', $fields),
);
global $post;
comment_form($args, $post->ID);
?>