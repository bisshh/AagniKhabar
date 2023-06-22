<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agnikhabar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="fb:pages" content="2512268395665728" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60bfaa66d6a5c10011109c49&product=sop' async='async'></script>
	
</head>

<body <?php body_class(); ?>>
<a href="https://www.techie.com.np" style="display:none;">Techie IT</a>    

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=2358789964361367&autoLogAppEvents=1"></script>
<?php wp_body_open(); ?>

<?php if ( is_active_sidebar( 'top' ) ) : ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="rd-ads">
				<div class="widgets" data-adName="top"></div>
			</div>
		</div>
	</div>
</div>
<?php endif?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
	<div class="offcanvas-header">
		<div class="logo">
			<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					
					<?php
				else :
					?>
					
					<?php
				endif;?>
		</div>
	  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">	 
		<?php wp_nav_menu( array('theme_location' => 'menu-3') ); ?>
	</div>
	<div class="offcanvas-footer">
		<ul class="social">
			<li><a href="<?php echo get_option('facebook_link'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="<?php echo get_option('twitter_link'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
			<li><a href="<?php echo get_option('insta_link'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
			<li><a href="<?php echo get_option('youtube_link'); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
		</ul>
	</div>
</div> <!-- /nav mobile -->

<header class="hide-mb">
	<div class="container">
		<div class="row d-flex align-items-center justify-content-between">
			<div class="col-md-3 logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					
					<?php
				else :
					?>
					
					<?php
				endif;?>
			</div>			
			<div class="col-md-7">
				<?php if ( is_active_sidebar( 'beside-logo' ) ) : ?>
					<div class="widgets" data-adName="beside-logo"></div>
				<?php endif?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<ul class="date">
					<li><i class="fas fa-calendar-alt"></i> <span class="time_date"><?php echo getNepaliDate()->techieConvertNepaliDate(date('j F Y, l'),'j F Y, l'); ?></span></li>
					<li><i class="fas fa-clock"></i> <span class="clock"></span></li>
				</ul>
			</div>
		</div>
	</div>
</header>

<header class="show-mb rd-display">
	<div class="container">
		<div class="d-flex align-items-center">
			<div class="me-2">
				<button class="navbar-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" role="button" aria-controls="offcanvasWithBackdrop"><span class="rd-icon"><i class="fas fa-bars"></i></span></button>
			</div>
			<div>
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					
					<?php
				else :
					?>
					
					<?php
				endif;?>
			</div>
			<div class="col-auto col-sm-5">
				<ul class="d-flex justify-content-end">
					<li><a href="#"><span class="rd-icon"><i class="fas fa-chart-line"></i></span></a></li>
					<li><a data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="rd-icon"><i class="fas fa-search"></i></span></a></li>
				</ul>
			</div>			
		</div>
	</div>
</header>

<nav class="hide-mb rd-display">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<div class="col-1">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						
						<?php
					else :
						?>
						
						<?php
					endif;?>
			</div>
			<div class="col-auto">
				<ul>
					<?php wp_nav_menu( array('theme_location' => 'menu-1') ); ?>
				</ul>
			</div>
			<div class="col-auto">
				<ul class="social">
					<li><a href="<?php echo get_option('facebook_link'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="<?php echo get_option('twitter_link'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<li><a href="<?php echo get_option('insta_link'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<li><a href="<?php echo get_option('youtube_link'); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</nav> <!-- /nav desktop-->

<?php $tags=get_trending_posts(); ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="rd-trending rounded my-2">
				<?php $wpdb->show_errors(); ?>
				<ul>
					<li><strong><i class="fas fa-chart-line"></i> TRENDING</strong></li>
					<?php if(!empty($tags)): foreach($tags as $tag):?>
                        <li><a href="<?php echo get_tag_link($tag->term_id); ?>" rel="tag">#<?php echo $tag->name ?></a></li>
                    <?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div> <!-- /Trending -->

<?php if ( is_active_sidebar( 'after-menu' ) ) : ?>	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="rd-ads">
				<?php dynamic_sidebar('after-menu');?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
