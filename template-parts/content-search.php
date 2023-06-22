<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agnikhabar
 */

?>

<div class="col-md-12">        
	<div class="mt-3">
		<div class="row">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="col-md-3">
				<div class="cat-post">
					<a href="<?php the_permalink();?>">
						<img src="<?php echo get_the_post_thumbnail_url( $post->ID,'medium' ); ?>" alt="<?php echo wp_trim_words( get_the_title(), 10); ?>" class="img-fluid">
					</a>
					<div class="cat-info">
						<a href="<?php the_permalink();?>"><h3><?php echo wp_trim_words( get_the_title(), 10); ?></h3></a>
					</div>
				</div>	
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>