<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agnikhabar
 */

get_header();
?>
	<main class="main-cont">
		<div class="container">
			<?php
				setPostViews(get_the_ID());
				setDateView(get_the_ID());
			?>	

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );
				endwhile; // End of the loop.
			?>
		</div>
	</main>

<?php
get_footer();
