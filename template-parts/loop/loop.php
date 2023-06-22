<div class="row">
	<?php $i=0; while ( have_posts() ) : the_post();?>
 	<div class="col-md-4">
	 	<div class="cat-post">
			<a href="<?php the_permalink();?>">
				<img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
			</a>
			<div class="cat-info">
				<a href="<?php the_permalink();?>"><h3 class="d-line"><?php echo wp_trim_words( get_the_title(), 10); ?></h3></a>
			</div>
		</div>	
	</div>
		<?php endwhile;?>
	<div class="col-md-12">
		<?php techie_paging(); ?>
	</div>
</div>