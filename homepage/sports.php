<div class="title d-flex align-items-center justify-content-between">
    <h4>मनोरञ्जन</h4>
    <a href="/category/entertainment">थप <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-4">
    <?php $i=0; $args = array('showposts' =>2, 'cat' => '5');$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();?>
    <div class="row align-items-center big">
        <div class="col-md-5">
                <h3 class="mb-3 t-line"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                <p class="t-line"><?php echo wp_trim_words(get_the_excerpt(),30,'');?></p>						
        </div>
        <div class="col-md-7">
            <div class="img-area overflow-hidden">
                <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" class="img-fluid border rounded" alt=""></a>
            </div>								
        </div>
    </div>
    <hr>
    <?php endwhile; endif; wp_reset_postdata();?>
</div>