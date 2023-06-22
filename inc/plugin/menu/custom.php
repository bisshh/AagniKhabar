<?php

class CustomMenu
{

    public function __construct()
    {
        //Show Front Page
        add_filter("walker_nav_menu_start_el", array($this, 'show_front_end_view'), 10, 4);
        add_filter('wp_nav_menu_items', array($this, 'show_custom_items'), 10, 2);

        //Admin Page
        add_action('wp_nav_menu_item_custom_fields', array($this, 'show_custom_field'), 10, 4);
        add_filter('wp_setup_nav_menu_item', array($this, 'rc_scm_add_custom_nav_fields'), 10);
        add_action('wp_update_nav_menu_item', array($this, 'rc_scm_update_custom_nav_fields'), 10, 3);

    }

    public function show_front_end_view($item_output, $item, $depth, $args)
    {
        $subtitle = get_post_meta($item->ID, '_menu_item_subtitle', true);
        if (!empty($subtitle)) {
            $item_output = str_replace("</a>", "<span class='rd-info'>{$subtitle}</span></a>", $item_output);
        }
        if (in_array("menu-item-has-children", $item->classes)) {
            $item_output = str_replace("</a>", " <i class='fas fa-sort-down'></i></a>", $item_output);
        }
        return $item_output;
    }

    function show_custom_items($items, $args)
    {
        $url=home_url( "/?s" );
        if ($args->theme_location == 'menu-1') {
            $items= "<li><a data-bs-toggle='offcanvas' data-bs-target='#offcanvasWithBackdrop' role='button' aria-controls='offcanvasWithBackdrop'><i class='fas fa-bars'></i></a></li> <li><a href='/'><i class='fas fa-home'></i></a></li>".$items;
            $items .= "<li><a href='javascript:void(0)' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-search'></i></a></li>";
        }
        return $items;
    }

    public function show_custom_field($item_id, $item, $depth, $args)
    {
        ob_start();
        ?>
        <p class="field-custom description description-wide">
            <label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
                <?php _e('Subtitle'); ?><br/>
                <input type="text" id="edit-menu-item-subtitle-<?php echo $item_id; ?>"
                       class="widefat code edit-menu-item-custom" name="menu-item-subtitle[<?php echo $item_id; ?>]"
                       value="<?php echo esc_attr($item->subtitle); ?>"/>
            </label>
        </p>
        <?php
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

    public function rc_scm_add_custom_nav_fields($menu_item)
    {
        $menu_item->subtitle = get_post_meta($menu_item->ID, '_menu_item_subtitle', true);
//        $menu_item->menu_id=$menu_item->ID;
        return $menu_item;
    }

    public function rc_scm_update_custom_nav_fields($menu_id, $menu_item_db_id, $args)
    {

        // Check if element is properly sent
        if (is_array($_REQUEST['menu-item-subtitle'])) {
            $subtitle_value = $_REQUEST['menu-item-subtitle'][$menu_item_db_id];
            update_post_meta($menu_item_db_id, '_menu_item_subtitle', $subtitle_value);
        }
    }

    public function show_custom_menu_field()
    {

    }
}

new CustomMenu();

