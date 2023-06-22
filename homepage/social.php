<div class="title bg-title d-flex align-items-center justify-content-between">
    <h4>सामाजिक सञ्जाल</h4>
    <a href="/category/social-network">सबै <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-2">
    <?php $i=0; $args = array('showposts' =>5, 'cat' => '1155');$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();?>
    <div class="row rd-border g-3 d-flex align-items-center">
        <div class="col-9">
            <a href="<?php the_permalink();?>"><h3 class="d-line mb-2"><?php the_title();?></h3></a>
            <div class="meta d-flex">
                <div><i class="fas fa-user"></i>
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
        <div class="col-3">
            <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-thumb' ); ?>" class="img-fluid border rounded" alt="<?php the_title();?>"></a>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata();?>
</div>