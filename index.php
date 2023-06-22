<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agnikhabar
 */

get_header();
?>
	<?php if ( is_active_sidebar( 'before-breaking' ) ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="rd-ads">
					<div class="widgets" data-adName="before-breaking"></div>
				</div>				
			</div>
		</div>
	</div>
	<?php endif;?>

	<?php get_template_part('homepage/breaking');?> <!-- /Breaking -->

	<?php if ( is_active_sidebar( 'after-breaking' ) ) : ?>	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="rd-ads">
					<div class="widgets" data-adName="after-breaking"></div>
				</div>				
			</div>
		</div>
	</div> <!-- /advertisement -->
	<?php endif;?>

	<div class="container rd-home">
	<div class="row">		
		<div class="col-md-9">
			<?php get_template_part('homepage/samachar'); ?>
					
			<div class="rd-ads">
				<a href="#"><img src="img/ads/ncell.gif" class="img-fluid border rounded w-100" alt=""></a>
			</div>

			<?php get_template_part('homepage/janagunaso'); ?>
			
			<div class="rd-ads">
				<a href="#"><img src="img/ads/ncell.gif" class="img-fluid border rounded w-100" alt=""></a>
			</div>
			<?php get_template_part('homepage/rajniti'); ?>
		</div>
		<div class="col-md-3">
			<?php get_template_part('template-parts/latest-news');?>
			<hr>
			<?php get_template_part('homepage/editorial'); ?>
			
			<div class="rd-ads">
				<a href="#"><img src="img/ads/worldremit.gif" class="img-fluid w-100" alt=""></a>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="rd-ads">
				<a href="#"><img src="img/ads/Subisu.gif" class="img-fluid w-100" alt=""></a>
			</div>
			<?php get_template_part('homepage/province'); ?>
			
			<div class="rd-ads">
				<a href="#"><img src="img/ads/ncell.gif" class="img-fluid w-100" alt=""></a>
			</div>
		</div>
		<div class="col-md-8">
			<?php get_template_part('homepage/sports'); ?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/social'); ?>
		</div>
		<div class="col-md-12">
			<div class="rd-ads">
				<a href="#"><img src="img/ads/nepal-ice-ad_825x100.gif" class="img-fluid w-100" alt=""></a>
			</div>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/desh'); ?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/economy'); ?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/video'); ?>
		</div>
		<div class="col-md-12">
			<div class="rd-ads">
				<a href="#"><img src="img/ads/ncell.gif" class="img-fluid w-100" alt=""></a>
			</div>
		</div>
		<div class="col-md-12">
			<div class="rd-ads">
				<a href="#"><img src="img/ads/esewa.gif" class="img-fluid w-100" alt=""></a>
			</div>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/lifestyle'); ?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('homepage/tourism'); ?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('template-parts/popular'); ?>
		</div>
	</div>
</div>

<?php
get_footer();
