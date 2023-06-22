<div class="title bg-title d-flex align-items-center justify-content-between">
    <h4><a href="#"><i class="fas fa-user-edit"></i> सम्पादकीय</a></h4>
    <a href="/category/editorial">थप <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-3">
<?php $i=0; $args = array('showposts' =>2, 'cat' => '1');$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();?>
    <div class="row rd-border d-flex align-items-center">
        <div class="col-4">
            <div class="img-area">
                <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-thumb' ); ?>" alt="" class="img-fluid rounded-circle border"></a>
                <span><i class="fas fa-feather-alt"></i></span>
            </div>            
        </div>
        <div class="col-8">
            <h3 class="t-line mb-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p><?php if( get_field('author_name') ): ?>
                   <?php the_field('author_name'); ?>
                    <?php else : ?>	
                    <?php the_author_posts_link(); ?>
                <?php endif; ?></p>
        </div>
    </div>
<?php endwhile; endif; wp_reset_postdata();?>
</div>