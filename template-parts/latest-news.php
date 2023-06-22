<div class="title bg-title d-flex align-items-center justify-content-between">
    <h4><i class="fas fa-fire"></i> ताजा खबर</h4>
</div>
<div class="rd-wrap rd-trend">
    <ul>
        <?php
        $args = array( 'numberposts' => 5, 'order'=> 'DESC' );
        $postslist = get_posts( $args );
        $i = 1;
        foreach ($postslist as $post) :  setup_postdata($post); ?>
            <li class="d-flex align-items-center"><span class="pe-2"><?php echo convertNumbertoNepali($i++) ?></span><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>