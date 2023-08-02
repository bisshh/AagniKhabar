<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agnikhabar
 */

?>

<article class="row g-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part('template-parts/single-heading');?>
	<div class="col-md-9 news-detail border-right">		
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="img-area mb-3" itemscope="" itemtype="http://schema.org/ImageObject">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="" class="img-fluid">	
				<!-- <div class="fill" style="background-image: url('<?php echo $image[0]; ?>')"></div> -->
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'after-feature-image' ) ) : ?>
			<div class="rd-ads">
				<div class="widgets" data-adName="after-feature-image"></div>
			</div>
		<?php endif; ?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'healthaawaj' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<br>
		
		<?php if( get_field('video_link') ): ?>
			<div class="rd-video">
				<?php the_field('video_link'); ?>
			</div>
			<div class="clearfix"></div>
			<br><br>
			<?php else : ?>			
		<?php endif; ?>

		<br>
		<?php 
			if( $tags = get_the_tags() ) {
				foreach( $tags as $tag ) {
					$sep = ( $tag === end( $tags ) ) ? '' : ' ';
					echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '" class="tag-li">#' . $tag->name . '</a>' . $sep;
				}
			}
		?>
		<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
			<div class="rd-ads">
				<div class="widgets" data-adName="after-content"></div>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div>
		<hr>
		<div class="rd-fb-comments">
			<h3>तपाईको कमेन्ट लेख्नुहोस्</h3>
			<div class="fb-comments" data-href="<?php echo get_permalink() ?>" data-numposts="5" data-width="100%"></div>
		</div>
		<hr>
		<?php get_template_part('related');?><!-- /related post -->
	</div>

	<div class="col-md-3">
		<div class="rd-ads">
			<div class="widgets" data-adName="before-latest"></div>
		</div>
		<?php get_template_part('template-parts/latest-news');?>
		<div class="rd-ads">
			<?php dynamic_sidebar('sidebar');?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
