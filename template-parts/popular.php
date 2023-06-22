<div class="title bg-title d-flex align-items-center justify-content-between">
    <h4><i class="fas fa-fire"></i> धेरै पढिएका</h4>
</div>
<div class="rd-wrap rd-trend">
    <ul>
        <?php 
            $week = date( 'W' );
            $year = date( 'Y' );
            $popularpost = new WP_Query( 
                array( 'posts_per_page' => 8,
                'date_query' => array(
                    array(
                        'year' => $year,
                        'w' => $week,
                    ),
                ),   
                'meta_key' => 'post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC'  ) 
            );
            $i = 1;
            while ( $popularpost->have_posts() ) : $popularpost->the_post();
            ?>
                <li class="d-flex align-items-center"><span class="pe-2"><?php echo convertNumbertoNepali($i++) ?></span><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
            <?php
            endwhile;
            wp_reset_postdata();
        ?>
    </ul>
</div>