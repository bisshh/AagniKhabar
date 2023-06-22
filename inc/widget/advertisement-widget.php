<?php
/****** Widget ******/
class Advertisement_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('description' => 'Add Selected Advertise to the Sidebar' );
        parent::__construct(false, __('&rarr; Advertise List', 'sabaiko_online'),$widget_ops);      
    }

    function widget($args, $instance) {  
        extract( $args );
        $title = esc_attr($instance['title']);
        $cat_name = esc_attr($instance['cat_name']);
        $posts = esc_attr($instance['posts']);
        $order = esc_attr($instance['order']);

        echo $before_widget; ?>

            <?php if ( $title ) echo $before_title . $title . $after_title; ?>

            <?php // The Loop
            $wq = new WP_Query();
            $wq->query( array( 'post_type' => 'advertisement', 'advertisement-category' => $cat_name, 'posts_per_page' => $posts, 'orderby' => $order )); 
            if( $wq->have_posts() ) :
            ?>
                <?php while($wq->have_posts()) : $wq->the_post(); ?>
					<a class="clearfix" href="<?php $ad_link = advertisement_link(); if($ad_link != ''){ echo $ad_link; } else { echo '';}?>" target="_blank">
                        <img src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
					</a>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

       <?php echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
        $title = esc_attr($instance['title']);
        $cat_name = esc_attr($instance['cat_name']);
        $posts = esc_attr($instance['posts']);
        $order = esc_attr($instance['order']);
        ?>

        <p><!-- Widget Title -->
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','sabaiko_online'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

        <p><!-- Category Name -->
            <label for="<?php echo $this->get_field_id('cat_name'); ?>"><?php _e('Category Name:','sabaiko_online'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('cat_name'); ?>" value="<?php echo $cat_name; ?>" id="<?php echo $this->get_field_id('cat_name'); ?>" class="widefat" />
        </p>

        <p><!-- Number Of Posts -->
            <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts to show:','sabaiko_online'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('posts'); ?>" id="<?php echo $this->get_field_id('posts'); ?>" value="<?php echo $posts; ?>" size="2" />
        </p>

        <p><!-- Order Posts -->
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order of posts:','sabaiko_online'); ?></label>
            <select name="<?php echo $this->get_field_name('order'); ?>">
                <option value="title" <?php if ($order == 'title') { echo 'selected="selected"'; } ?>>Order Posts by Title</option>
                <option value="ID" <?php if ($order == 'ID') { echo 'selected="selected"'; } ?>>Order Posts by ID</option>
                <option value="date" <?php if ($order == 'date') { echo 'selected="selected"'; } ?>>Order Posts by Date</option>
                <option value="rand" <?php if ($order == 'rand') { echo 'selected="selected"'; } ?>>Randomize Posts</option>
            </select>
        </p>

        <?php
    }
} 
?>