<?php

if(!class_exists("Techie_Custom_Menu")){
    class Techie_Custom_Menu{

        public function __construct()
        {
            //Display Admin Menu
            add_filter('wp_nav_menu_items',array($this,'add_admin_link'), 10, 2);
            add_filter('wp_nav_menu_items',array($this,'add_custom_menu_items'), 10, 2);
        }

        public function add_admin_link($items, $args){

            if( $args->theme_location == 'menu-1' ){
                $items= '<li><a title="Admin" href="'. esc_url( admin_url() ) .'">' . __( 'Admin' ) . '</a></li>'.$items;
            }
            return $items;
        }

        public function add_custom_menu_items($items,$args){
            var_dump($items);
            return $items;
        }
    }

    new Techie_Custom_Menu();
}



