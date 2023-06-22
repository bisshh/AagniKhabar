<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agnikhabar
 */

?>

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<h4>हाम्राे बारेमा</h4>
						<div class="f-logo">
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
                        <?php dynamic_sidebar('about');?>
						<ul class="social">
                            <li><a href="<?php echo get_option('facebook_link'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo get_option('twitter_link'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo get_option('insta_link'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?php echo get_option('youtube_link'); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>
					<div class="col-md-4">
                        <?php dynamic_sidebar('team');?>
					</div>
					<div class="col-md-4">
						<h4>सामाजिक सञ्जालमा</h4>
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fagnikhabar-105703157797464&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>					
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<footer>
	<div class="container">
		<div class="row d-flex justify-content-between">					
			<div class="col-md-4">
				<p>&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - All Rights Reserved.</p>
			</div>
			<div class="col-md-4">
				<ul class="text-center">
                    <?php wp_nav_menu( array('theme_location' => 'menu-2') ); ?>
				</ul>
			</div>
			<div class="col-md-4">
				<p class="text-end">Design with <i class="fas fa-heart"></i> by <a href="https://www.resham.info.np" target="_blank">Resham</a></p>
			</div>	
		</div>
	</div>	
</footer>

<?php if (is_active_sidebar('footer-ad')) : ?>
    <div class="rd-bottom-popup" id="popup">
        <span class="close">&times;</span>
        <?php dynamic_sidebar('footer-ad'); ?>
    </div> <!-- /bottom popup -->
<?php endif; ?>

<?php if (is_active_sidebar('skip-ad')) : ?>
    <!-- Modal -->
    <div class="modal fade modal-load" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="clock">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" scale="0" style="width:170px">
                    </h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        Skip Ad
                    </button>
                </div>
                <div class="modal-body">
                    <?php dynamic_sidebar('skip-ad'); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body bg-dark p-5 text-white">
				<div class="position-absolute top-0 start-100 translate-middle rd-close-btn">
					<button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
				</div>		
				<p class="fs-3 py-3">समाचार खोज्नुहोस</p>		
				<div class="input-group search" itemscope itemtype="https://schema.org/WebSite">
					<meta itemprop="url" content="https://www.nepalaawaj.com/"/>
					<form class="d-flex w-100" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
						<meta itemprop="target" content="https://www.nepalaawaj.com/search?q={search_term_string}"/>
						<button class="btn" type="button" id="search"><i class="fas fa-search"></i></button>
						<input itemprop="query-input" type="text" id="Search" name="search_term_string" class="form-control" placeholder="टाईप गर्नुहोस.." aria-describedby="search" required>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/bootstrap.bundle.min.js" defer></script>
<script>
    window.addEventListener("load",function(){
        (function(d, s, id){ 
            var js, fjs = d.getElementsByTagName(s)[0]; 
            if (d.getElementById(id)) {return;} 
            js = d.createElement(s); 
            js.id = id; 
            js.src = "//connect.facebook.net/en_US/sdk.js"; 
            fjs.parentNode.insertBefore(js, fjs); 
        }(document, 'script', 'facebook-jssdk'));
        $(function() {
            $('#myModal').modal('show').css({
                'background': '#333'
            }, {
                'opacity': '0.5'
            });
            setTimeout(function() {
                $('#myModal').modal('hide');
            }, 5000);
        });
    });
</script>

<a class="back-to-top" id="back-top"></a> <!-- /back to top -->

<?php wp_footer(); ?>

</body>

</html>