<div class="container">
	<div class="row">
		<div class="col-md-12">
            <?php $i=0; $args = array('showposts' =>10, 'meta_query' => array(
                    array(
                        'key'   => 'breaking',
                        'value' => '1',
                    )
                ));$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();
            ?>
			<div class="b-wrap">
                <?php if( get_field('custom_category') ): ?>
                    <p class="cust-cat"><?php the_field('custom_category'); ?></p>
                    <?php else : ?>			
                <?php endif; ?>
				<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <?php if( get_field('sub_heading') ): ?>
                    <h3 class="my-2"><?php the_field('sub_heading'); ?></h3>
                    <?php else : ?>			
                <?php endif; ?>  
                
				<p class="d-flex align-items-center justify-content-center mb-2"><?php
                            $image = get_field('author_photo');
                            if( !empty( $image ) ):
                                ?>
                                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid rounded-circle" alt="<?php echo esc_attr($image['alt']); ?>" width="35" />
                            <?php else : ?>
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 35  ); ?>

                            <?php endif; ?> <?php if( get_field('author_name') ): ?>
                    <?php the_field('author_name'); ?>
                    <?php else : ?>	
                    <?php the_author_posts_link(); ?>
                <?php endif; ?></p>

                <?php if( get_field('hide_feature_image') == 'enable_sidebar' ): ?>
                <?php else : ?>	
                    <div class="image">
                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>" alt="<?php the_title();?>" class="img-fluid"></a>
                    </div>
                <?php endif; ?>
			</div>
            <?php endwhile; endif; wp_reset_postdata();?>
        </div>    
	</div>
</div> <!-- /Breaking-->