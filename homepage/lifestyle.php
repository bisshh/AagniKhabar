<div class="title d-flex align-items-center justify-content-between">
    <h4>जीवनशैली</h4>
    <a href="/category/lifestyle">थप <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-1">
    <?php $i=0; $args = array('showposts' =>4, 'cat' => '9');
                    $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) : 
                            while($loop->have_posts()): 
                                $loop->the_post();
                if($i++<1){?>
    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" class="img-fluid w-100 border rounded" alt="<?php echo get_the_title(); ?>"></a>
    <h3 class="d-line"><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
    <div class="meta mt-2 d-flex">
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
    <ul class="list">
    <?php } else{?>
        <li class="rd-border-top d-flex align-items-start"><span><i class="fas fa-stop"></i></span> <a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></li>
        <?php } endwhile; endif; wp_reset_postdata();?>
    </ul>
</div>