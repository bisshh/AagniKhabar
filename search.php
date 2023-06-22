<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package agnikhabar
 */

get_header();
?>

<div class="rd-category-page">
    <div class="container">
        <div class="row">

		<?php if ( have_posts() ) : ?>
				<div class="col-md-12">
				<h1>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'तपाईले खोज्नुभएको शब्द: %s', 'healthaawaj' ), '<span style="text-decoration:underline; color:#30b774;">' . get_search_query() . '</span>' );
					?> संग सम्बन्धित 
				</h1>
				</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
    </div>
</div>

<?php
get_sidebar();
get_footer();
