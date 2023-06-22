<?php get_header();?>
<div class="rd-category-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> <?php single_cat_title();?></h1>
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
        </div>
    </div>
</div>

<!-- .row -->
<?php get_footer();?>