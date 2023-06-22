<div class="title d-flex align-items-center justify-content-between">
    <h4>प्रमुख समाचार</h4>
    <a href="/category/prime-news">सबै <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-2">
    <div class="row">
        <?php $i=0; $args = array('showposts' =>5, 'cat' => '160');
                    $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) : 
                            while($loop->have_posts()): 
                                $loop->the_post();
                if($i++<1){?>
        <div class="col-md-6">
            <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="" class="img-fluid border rounded"></a>
            <a href="<?php the_permalink();?>"><h2 class="t-line mb-2"><?php echo get_the_title(); ?></h2></a>
            <div class="meta d-flex">
                <?php if( get_field('author_name') ): ?>
                   <?php the_field('author_name'); ?>
                    <?php else : ?>	
                    <?php the_author_posts_link(); ?>
                <?php endif; ?>
                <div class="ms-2">
                    <i class="fas fa-clock"></i> <?php echo get_the_date(); ?>
                </div>							
            </div>
        </div>
        <div class="col-md-6">
            <?php } else{?>
            <div class="row rd-border g-3 d-flex align-items-center">
                <div class="col-3">
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="" class="img-fluid border rounded"></a>
                </div>
                <div class="col-9">
                    <a href="<?php the_permalink();?>"><h3 class="d-line mb-2"><?php echo get_the_title(); ?></h3></a>
                    <div class="meta d-flex">
                    <?php if( get_field('author_name') ): ?>
                        <?php the_field('author_name'); ?>
                            <?php else : ?>	
                            <?php the_author_posts_link(); ?>
                        <?php endif; ?>
                        <div class="ms-2">
                            <i class="fas fa-clock"></i> <?php echo get_the_date(); ?>
                        </div>							
                    </div>
                </div>
            </div>
            <?php } endwhile; endif; wp_reset_postdata();?>
        </div>
    </div>
</div>	