<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agnikhabar
 */

get_header();
?>

<div class=" rd-category-page">
    <div class="container">
        <div class="row">

		<?php if ( have_posts() ) : ?>
			<div class="col-md-12">
				<?php the_archive_title( '<h1>', '</h1>' ); ?>
                <hr>
            </div>

			<div class="col-md-9">        	
				<div class="mt-3">
				<?php get_template_part('template-parts/loop/loop');?>
				</div>
			</div>

			<div class="col-md-3">
				<div class="rd-popular p-3">
				<?php get_template_part('template-parts/popular');?>
				</div>
					<?php get_sidebar();?>
			</div>

		<?php else :
		
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
    </div>
</div>

<?php
get_sidebar();
get_footer();
