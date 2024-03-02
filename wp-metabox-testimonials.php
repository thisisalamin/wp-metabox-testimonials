<?php
/**
 * Plugin Name: WP Metabox Testimonials
 * Plugin URI: google.com
 * Description: This is a plugin for creating a portfolio
 * Version: 1.0
 * Author: Tung Nguyen
 * Author URI: google.com
 * License: GPLv2 or later
 * Text Domain: wp-metabox-portfolio
 * Domain Path: /languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WP_Metabox_Testimonials {
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    public function init() {
        $this->wpc_testimonials_cpt();
        $this->wpc_testimonials_tax();

        require_once plugin_dir_path( __FILE__ ) . 'includes/wpc-testimonials-metabox.php';
        new WPC_Testimonials_Metabox();

        require_once plugin_dir_path( __FILE__ ) . 'shortcodes/wpc-testimonials-shortcodes.php';
        new WPC_Testimonials_Shortcodes();

        add_action( 'wp_enqueue_scripts', array( $this, 'wpc_testimonials_scripts' ) );

    }

    public function wpc_testimonials_scripts() {
        wp_enqueue_style( 'wpc-testimonials-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
        wp_enqueue_script( 'wpc-testimonials-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array( 'jquery' ), '1.0', true );
    }


    function wpc_testimonials_cpt() {

        /**
         * Post Type: WPC Testimonials.
         */
    
        $labels = [
            "name" => esc_html__( "WPC Testimonials", "wpc_testimonials" ),
            "singular_name" => esc_html__( "Testimonial", "wpc_testimonials" ),
            "menu_name" => esc_html__( "WPC Testimonials", "wpc_testimonials" ),
            "all_items" => esc_html__( "All Testimonials", "wpc_testimonials" ),
            "add_new" => esc_html__( "Add New Testimonial", "wpc_testimonials" ),
            "add_new_item" => esc_html__( "Add New Testimonial", "wpc_testimonials" ),
            "edit_item" => esc_html__( "Edit Testimonial", "wpc_testimonials" ),
            "new_item" => esc_html__( "New Testimonial", "wpc_testimonials" ),
            "view_item" => esc_html__( "View Testimonial", "wpc_testimonials" ),
            "view_items" => esc_html__( "View Testimonials", "wpc_testimonials" ),
            "search_items" => esc_html__( "Search Testimonial", "wpc_testimonials" ),
            "not_found" => esc_html__( "No Testimonials Found", "wpc_testimonials" ),
            "name_admin_bar" => esc_html__( "Testimonial", "wpc_testimonials" ),
        ];
    
        $args = [
            "label" => esc_html__( "WPC Testimonials", "wpc_testimonials" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => [ "slug" => "wpc_testimonials", "with_front" => true ],
            "query_var" => true,
            "menu_icon" => "dashicons-testimonial",
            "supports" => [ "title", "editor", "thumbnail" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "wpc_testimonials", $args );
    }


    function wpc_testimonials_tax() {

        /**
         * Taxonomy: Categories.
         */
    
        $labels = [
            "name" => esc_html__( "Categories", "wpc_testimonials" ),
            "singular_name" => esc_html__( "Category", "wpc_testimonials" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Categories", "wpc_testimonials" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'recipes_categories', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "recipes_categories",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "recipes_categories", [ "recipie" ], $args );
    
        /**
         * Taxonomy: Categories.
         */
    
        $labels = [
            "name" => esc_html__( "Categories", "wpc_testimonials" ),
            "singular_name" => esc_html__( "Category", "wpc_testimonials" ),
        ];
    
        
        $args = [
            "label" => esc_html__( "Categories", "wpc_testimonials" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'testimonial_categories', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "testimonial_categories",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "testimonial_categories", [ "wpc_testimonials" ], $args );
    }
    
}

new WP_Metabox_Testimonials();