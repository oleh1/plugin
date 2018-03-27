<div id="list_created">
    <div class="list_created_title">Все компании</div>
    <?php
    global $user_ID;

    $query = new WP_Query( 'post_type=' . $this->type . '&author=' . $user_ID . '&posts_per_page=-1' );
    if($query->have_posts()) {
        while($query->have_posts()){ $query->the_post();
            $id = get_the_ID();
                ?>
                <div class="list_created">
                    <div class="wac2_i"><a href="<?= get_permalink() ?>"><?= get_the_title(); ?></a></div>
                    <?php
                    $uri = preg_replace_callback('#(.*)\?.*#', function ($v){
                        return $v[1];
                    }, $_SERVER['REQUEST_URI']);
                    ?>
                    <div class="wac2_i"><a href="<?= 'http://'.$_SERVER['HTTP_HOST'].$uri.'?personal_area=company&company_id='.$id; ?>">Ред.</a></div>
                </div>
            <?php }}else{ ?>
                <div class="company_empty">Cозданных компаний еще нет</div>
            <?php } ?>
</div>