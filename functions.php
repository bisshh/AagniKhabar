<?php

/**
 * agnikhabar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agnikhabar
 */

include get_template_directory() . "/inc/init.php";

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('agnikhabar_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function agnikhabar_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on agnikhabar, use a find and replace
		 * to change 'agnikhabar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('agnikhabar', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Main Menu', 'agnikhabar'),
				'menu-2' => esc_html__('Footer Menu', 'agnikhabar'),
				'menu-3' => esc_html__('Side Menu', 'agnikhabar'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'agnikhabar_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_filter( 'get_custom_logo', 'change_logo_class' );
		function change_logo_class( $html ) {

			$html = str_replace( 'custom-logo', 'img-fluid', $html );
			$html = str_replace( 'custom-logo-link', 'rd-logo-link', $html );

			return $html;
		}
	}
endif;
add_action('after_setup_theme', 'agnikhabar_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agnikhabar_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('agnikhabar_content_width', 640);
}
add_action('after_setup_theme', 'agnikhabar_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function agnikhabar_scripts()
{
	wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-style', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
	wp_enqueue_style('vue-style', 'https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css');
	wp_enqueue_style('agnikhabar-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('ui-style', get_stylesheet_directory_uri() . '/css/jquery-ui.min.css');
	wp_enqueue_style('techie-style', get_stylesheet_directory_uri() . '/css/agnikhabar.min.css');
	wp_style_add_data('agnikhabar-style', 'rtl', 'replace');

	// wp_enqueue_script( 'fontawesome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('ui-js', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('techie-js', get_template_directory_uri() . '/js/techie.js', array(), _S_VERSION, true);
	wp_localize_script("techie-js", "ajaxObj", [
		"ajaxURL" => admin_url('admin-ajax.php')
	]);

	wp_enqueue_script('agnikhabar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'agnikhabar_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// require get_template_directory(). "/inc/graphql/widget-type.php";

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Custom Image Crop
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
	add_image_size('rd-m-thumb', 425, 300, true); // 300 pixels wide (and unlimited height)
	add_image_size('rd-thumb', 180, 180, true); // profile Image
}

//Add Open Graph Meta Info
function insert_fb_in_head()
{
	global $post;
	if (!is_singular()) //if it is not a post or a page
		return;
	echo '<meta property="fb:admins" content="bisshh"/>';
	echo '<meta property="fb:app_id" content="392407004533654">';
	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
	if (!has_post_thumbnail($post->ID)) {
		$default_image = get_stylesheet_directory_uri() . "/wp-content/uploads/2020/06/default.jpg";
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	} else {
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
	}
	echo "";
}

add_action('wp_head', 'insert_fb_in_head', 5);

//Registering Widgets
function techie_widgets_init()
{
	$widgets = array(
		array('id' => 'skip-ad', 'name' => 'Skip Ads'),
		array('id' => 'footer-ad', 'name' => 'Footer Pop Up'),
		array('id' => 'top', 'name' => 'हेडरको माथि'),
		array('id' => 'beside-logo', 'name' => 'लोगोको छेउमा'),
		array('id' => 'after-menu', 'name' => 'मेनुको तल'),
		array('id' => 'before-breaking', 'name' => 'ब्रेकिङको माथी'),
		array('id' => 'after-breaking', 'name' => 'ब्रेकिङको तल'),
		array('id' => 'before-samachar-full', 'name' => 'समाचारको माथी'),
		array('id' => 'after-samachar-full', 'name' => 'समाचारको तल'),
		array('id' => 'after-interview-quarter', 'name' => 'अन्तरवार्ताको तल क्वाटर'),
		array('id' => 'after-interview-full', 'name' => 'अन्तरवार्ताको तल लामो'),
		array('id' => 'after-interview-left-small', 'name' => 'अन्तरवार्ताको तल सानो दायाँ'),
		array('id' => 'after-interview-right-small', 'name' => 'अन्तरवार्ताको तल सानो बायाँ'),
		array('id' => 'after-feature-full', 'name' => 'फिचरको तल'),
		array('id' => 'after-feature-small-left', 'name' => 'फिचरको तल सानो दायाँ'),
		array('id' => 'after-feature-small-right', 'name' => 'फिचरको तल सानो बायाँ'),
		array('id' => 'after-corporate-full', 'name' => 'कर्पोरेट/वित्तको तल'),
		array('id' => 'after-corporate-small-left', 'name' => 'कर्पोरेट/वित्तको तल सानो दायाँ'),
		array('id' => 'after-corporate-small-right', 'name' => 'कर्पोरेट/वित्तको तल सानो बायाँ'),
		array('id' => 'after-entertainment-full', 'name' => 'मनोरञ्जनको तल'),
		array('id' => 'after-entertainment-small-left', 'name' => 'मनोरञ्जनको तल सानो दायाँ'),
		array('id' => 'after-entertainment-small-right', 'name' => 'मनोरञ्जनको तल सानो बायाँ'),
		array('id' => 'before-khel-full', 'name' => 'खेलकुदको माथी'),
		array('id' => 'before-khel-small-left', 'name' => 'खेलकुदको माथी सानो दायाँ'),
		array('id' => 'before-khel-small-right', 'name' => 'खेलकुदको माथी सानो बायाँ'),
		array('id' => 'after-khel-full', 'name' => 'खेलकुदको तल'),
		array('id' => 'after-khel-small-left', 'name' => 'खेलकुदको तल सानो दायाँ'),
		array('id' => 'after-khel-small-right', 'name' => 'खेलकुदको तल सानो बायाँ'),
		array('id' => 'sidebar', 'name' => 'भित्रको पेजमा साइडबार'),
		array('id' => 'detail-top', 'name' => 'भित्रको पेजमा सबै भन्दा माथी'),
		array('id' => 'after-title', 'name' => 'भित्रको पेजमा हेडलाईन पछि'),
		array('id' => 'after-feature-image', 'name' => 'भित्रको पेजमा फोटो पछि'),
		array('id' => 'after-content', 'name' => 'भित्रको पेजमा न्युज पछि'),
		array('id' => 'before-latest', 'name' => 'भित्रको पेजमा ताजा खबरको माथि'),
		array('id' => 'about', 'name' => 'हाम्रो बारे'),
		array('id' => 'team', 'name' => 'टिम'),
	);
	foreach ($widgets as $widget) {
		register_sidebar(array(
			'name'          => esc_html__($widget['name'], 'techie'),
			'id'            => $widget['id'],
			'description'   => esc_html__('Add widgets here.', 'techie'),
			'before_widget' => '<section class="widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		));
	}
}
add_action('widgets_init', 'techie_widgets_init');


// Original User Detail
add_action("save_post", function ($post_id, $post, $update) {
	$slug = "post";
	if ($slug !== $post->post_type)
		return $post_id;
	if ($update)
		return $post_id;
	update_post_meta($post_id, "techie_original_author", get_current_user_id());
	update_post_meta($post_id, "techie_original_post_date", current_time('Y-m-d H:i:s'));
}, 10, 3);

add_action("save_post", function ($post_id, $post, $update) {
	$slug = "post";
	if ($slug !== $post->post_type)
		return $post_id;
	if ($post->post_status === "publish" && get_post_meta($post_id, "techie_first_publisher", true) === "") {
		update_post_meta($post_id, "techie_first_publisher", get_current_user_id());
		update_post_meta($post_id, "techie_first_post_date", current_time('Y-m-d H:i:s'));
	} else if ($post->post_status === "publish") {
		update_post_meta($post_id, "techie_last_publisher", get_current_user_id());
		update_post_meta($post_id, "techie_last_post_date", current_time('Y-m-d H:i:s'));
	}
	// update_post_meta($post_id,"techie_original_author",get_current_user_id());
}, 20, 3);

function techie_admin_original_author_detail()
{
	$original_author = get_post_meta(get_the_ID(), "techie_original_author", true);
	$first_publisher = get_post_meta(get_the_ID(), "techie_first_publisher", true);
	$last_publisher = get_post_meta(get_the_ID(), "techie_last_publisher", true);
	$name = get_author_name(absint($original_author));
	$first_publisher_name = get_author_name(absint($first_publisher));
	$last_publisher_name = get_author_name(absint($last_publisher));
	$original_date = get_post_meta(get_the_ID(), "techie_original_post_date", true);
	$first_date = get_post_meta(get_the_ID(), "techie_first_post_date", true);
	$last_date = get_post_meta(get_the_ID(), "techie_last_post_date", true);

	echo "<div>";
	echo "Original Author Name: " . $name . "\n";
	echo "Original Date: " . $original_date;
	echo "</div>";
	echo "<div>";
	echo "First Publisher Name: " . $first_publisher_name . "\n";
	echo "First Date: " . $first_date;
	echo "</div>";
	echo "<div>";
	echo "Last Publisher Name: " . $last_publisher_name . "\n";
	echo "Last Date: " . $last_date;
	echo "</div>";
}


function add_custom_meta_box()
{
	if (current_user_can('administrator')) {
		add_meta_box("techie-original-author", "Original Author Detail", "techie_admin_original_author_detail", "post", "side", "high", null);
	}
}

add_action("add_meta_boxes", "add_custom_meta_box");

//Post View Action
function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count . ' Views';
}
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$today = getdate();
	$query = new WP_Query('year=' . $today['year'] . '&monthnum=' . $today['mon'] . '&day=' . $today['mday']);

	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function setDateView($postID)
{
	$dateKey = 'post_view_date';
	$todayDate = new DateTime("now");
	$todayDate->setTime(0, 0, 0);
	$currentPostViewDate = get_post_meta($postID, $dateKey, true);
	$currentPostViewDate = new DateTime($currentPostViewDate);
	if ($currentPostViewDate) {
		//find the difference between two dates
		if ($currentPostViewDate != $todayDate) {
			update_post_meta($postID, $dateKey, $todayDate->format("Y-m-d"));
		}
	} else {
		add_post_meta($postID, $dateKey, $todayDate->format("Y-m-d"));
	}
}

// Add View Column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
function posts_column_views($defaults)
{
	$defaults['post_views'] = __('Views');
	return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
	if ($column_name === 'post_views') {
		echo getPostViews(get_the_ID());
	}
}

//Category for Detail Page
function categories()
{
	$categories = get_the_category();
	$category_names = array();
	foreach ($categories as $category) {
		$category_names[] = $category->cat_name;
	}
	echo implode(', ', $category_names);
}

// Description
function my_custom_excerpt($content, $limit = 20, $more = '...')
{
	return $data = wp_trim_words(strip_tags($content), $limit, $more);
}

//Custom Logo and homepage url for Login Page
function wpb_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo.png);
			height: 100px;
			width: 320px;
			background-size: contain;
			background-repeat: no-repeat;
			padding: 10px 0;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'wpb_login_logo');

function wpb_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
	return 'Your Site Name and Info';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');

//Paging Require
require get_template_directory() . '/template-parts/loop/paging.php';

//Custom Search
function wpdocs_my_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    <div class="input-group">
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="समाचार खोज्नुहोस.." />
	<div class="input-group-append">
		<button class="btn btn-default" type="submit" id="searchsubmit"><i class="fas fa-search"></i></div>
	</div>
    </div>
    </form>';

	return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');

add_action("wp_footer", function () { ?>
	<script>
		WebFontConfig = {
			google: {
				families: ['Mukta:400,700']
			}
		};

		(function(d) {
			var wf = d.createElement('script'),
				s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

<?php
});

add_action("wp", function () {
	if (is_front_page()) {
		add_filter('wpcf7_load_js', '__return_false');
		add_filter('wpcf7_load_css', '__return_false');
	}
});

// wp_dequeue_style( 'wp-block-library' );
// wp_dequeue_style( 'wp-block-library-theme' );

add_action('wp_enqueue_scripts', 'eikra_child_styles', 18);
function eikra_child_styles()
{

	//remove gutenberg
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
}

add_action("wp_ajax_nopriv_getAdData", 'getAdData');
add_action("wp_ajax_getAdData", 'getAdData');

//Get Trending Tags
function get_trending_posts(){
    global $wpdb;
    $wpdb->show_errors();
    $sql="SELECT {$wpdb->terms}.*,SUM({$wpdb->postmeta}.meta_value) as post_view_counts 
			FROM {$wpdb->term_taxonomy}
			INNER JOIN {$wpdb->terms} ON {$wpdb->term_taxonomy}.term_id={$wpdb->terms}.term_id
			INNER JOIN {$wpdb->term_relationships} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
			INNER JOIN {$wpdb->postmeta} ON  {$wpdb->term_relationships}.object_id={$wpdb->postmeta}.post_id
			WHERE {$wpdb->term_taxonomy}.taxonomy='post_tag' AND {$wpdb->postmeta}.meta_key='post_views_count'
			AND {$wpdb->terms} .term_id IN (
				SELECT {$wpdb->terms}.term_id FROM {$wpdb->term_taxonomy}
				INNER JOIN {$wpdb->terms} ON {$wpdb->term_taxonomy}.term_id={$wpdb->terms}.term_id
				INNER JOIN {$wpdb->term_relationships} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
				INNER JOIN {$wpdb->postmeta} ON  {$wpdb->term_relationships}.object_id={$wpdb->postmeta}.post_id
				WHERE {$wpdb->term_taxonomy}.taxonomy='post_tag' AND {$wpdb->postmeta}.meta_key='post_view_date'
				AND DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= CAST({$wpdb->postmeta}.meta_value AS datetime) 
				GROUP BY {$wpdb->term_taxonomy}.term_id
			)
			GROUP BY {$wpdb->term_taxonomy}.term_id
			ORDER BY CAST({$wpdb->postmeta}.meta_value as SIGNED) ASC
			LIMIT 7";
    return $wpdb->get_results($sql,OBJECT);
}

function getAdData()
{
	global $wp_registered_widgets;
	$sidebars_widgets = wp_get_sidebars_widgets();
	$response = [];
	$widgetName=sanitize_title($_POST['adName']);
	if (isset($widgetName)&&isset($sidebars_widgets[$widgetName])) {
		foreach ((array)$sidebars_widgets[$widgetName] as $widget_id) {
			$widgetCallback=current($wp_registered_widgets[$widget_id]['callback']);
			if(!is_null($widgetCallback)){
				$settings=$widgetCallback->get_settings();
				if(!is_null($settings)){
					$params=current($wp_registered_widgets[$widget_id]["params"]);
					$response[]=$settings[$params["number"]];
				}
			}
		}
	}

	return wp_send_json([
		"images" => $response,
	]);
}
