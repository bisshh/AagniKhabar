<div class="title d-flex align-items-center justify-content-between">
	<h4>विचार</h4>
	<a href="/category/thought">थप <i class="fas fa-chevron-circle-right"></i></a>
</div>
<div class="rd-wrap layout-1">
	<div class="row">
		<?php $i=0; $args = array('showposts' =>4, 'cat' => '10');$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();?>
		<div class="col-md-3">
			<a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" class="img-fluid border rounded" alt=""></a>
			<a href="<?php the_permalink();?>"><h3 class="d-line mb-2"><?php the_title();?></h3></a>
			<div class="meta d-flex justify-content-between">
				<div><i class="fas fa-user"></i><?php if( get_field('author_name') ): ?>
		<?php the_field('author_name'); ?>
			<?php else : ?>	
			<?php the_author_posts_link(); ?>
		<?php endif; ?></div>
				<div>
					<i class="fas fa-clock"></i> <?php echo get_the_date(); ?>
				</div>							
			</div>
		</div>
		<?php endwhile; endif; wp_reset_postdata();?>
	</div>
</div>