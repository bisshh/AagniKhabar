<?php if ( is_active_sidebar( 'detail-top' ) ) : ?>
    <div class="col-12">
        <div class="rd-ads">
            <div class="widgets" data-adName="detail-top"></div>
        </div>
    </div>
<?php endif; ?>

<div class="news-top col-12">
    <div class="rd-heading">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="single-heading" itemprop="name">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        ?>

        <?php if( get_field('sub_heading') ): ?>
            <h2><?php the_field('sub_heading'); ?></h2>
        <?php else : ?>
        <?php endif; ?>

        <div class="row post-meta d-flex align-items-center">
            <div class="col-lg-5 pr-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-info d-flex align-items-center">
                            <?php
                            $image = get_field('author_photo');
                            if( !empty( $image ) ):
                                ?>
                                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid rounded-circle" alt="<?php echo esc_attr($image['alt']); ?>" width="40" />
                            <?php else : ?>
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40  ); ?>

                            <?php endif; ?>
                            <span class="rduser border-right ms-2">
								<?php if( get_field('author_name') ): ?>
                                    <span itemprop="author"><?php the_field('author_name'); ?></span>
                                <?php else : ?>
                                    <span itemprop="author"><?php the_author_posts_link(); ?></span>
                                <?php endif; ?>
                            </span>

                            <span class="rddate" itemprop="datePublished"><i class="fal fa-clock"></i> <?php echo get_the_date("Y F d"); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex justify-content-end">
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
        <hr>
    </div>
</div> <!-- /news top -->

<?php if ( is_active_sidebar( 'after-title' ) ) : ?>
    <div class="col-12">
        <div class="rd-ads">
            <div class="widgets" data-adName="after-title"></div>
        </div>
    </div>
<?php endif; ?>
