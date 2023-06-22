<div class="title bg-title d-flex align-items-center justify-content-between">
    <h4><i class="fas fa-leaf"></i> सिफारिस</h4>
</div>

<div class="rd-wrap layout-2">
    <?php 
        $today = getdate();
        $popularpost = new WP_Query( 
            array( 
                'posts_per_page' => 5,
                'meta_key' => 'post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC',
                'meta_query'=>array(
                    'key' => 'post_view_date', // Check the start date field
                    'value' => date("Y-m-d"), // Set today's date (note the similar format)
                    'compare' => '=', // Return the ones greater than today's date
                    'type' => 'DATE' // Let WordPress know we're working with date
                )
            ) 
        );
    while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
    <div class="row rd-border g-3 d-flex align-items-center">
        <div class="col-3">
            <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-thumb' ); ?>" class="img-fluid border rounded" alt="<?php the_title(); ?>"></a>
        </div>
        <div class="col-9">
            <a href="<?php the_permalink();?>"><h3 class="d-line mb-2"><?php the_title(); ?></h3></a>
            <div class="meta d-flex">
                <div>
                <i class="fas fa-user"></i>      
                    <?php if( get_field('author_name') ): ?>
                        <?php the_field('author_name'); ?>
                            <?php else : ?>	
                            <?php the_author_posts_link(); ?>
                        <?php endif; ?>
                </div>
                <div class="ms-2">
                    <i class="fas fa-clock"></i> <?php echo get_the_date(); ?>
                </div>							
            </div>
        </div>					
    </div>
    <?php
        endwhile;
    ?>    
</div>