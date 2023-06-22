<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package agnikhabar
 */

get_header();
?>

	<main id="primary" class="rd-error">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-6">
					<div class="img-area">
						<img src="<?php echo get_template_directory_uri(); ?>/img/snoor.gif" alt="" class="img-fluid rd-snoor">
						<img src="<?php echo get_template_directory_uri(); ?>/img/bear.png" alt="" class="img-fluid">
					</div>	
				</div>
				<div class="col-md-6">
					<!-- <a href="/"> <img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.svg" class="logo" alt="Logo" style="height:80px;"></a> -->
					<h1><?php esc_html_e( 'माफ गर्नुहोला, पृष्ठ भेटिएन', 'healthaawaj' ); ?></h1>
					<p><?php esc_html_e( 'तपाईले खोज्नुभएको पृष्ठ भेटिएन । पृष्ठ सरेको वा हटाईएको हुनसक्छ..', 'healthaawaj' ); ?></p>
					<a href="/" class="btn btn-lg btn-default"><i class="fas fa-long-arrow-alt-left"></i> गृहपृष्ठमा जानुहोस</a>
					<p>अर्को पृष्ठ खोज्नुहोस् <i class="fas fa-long-arrow-alt-down"></i></p>
					<div class="search-wrap row">
						<div class="col-md-6">
							<?php
								get_search_form();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
