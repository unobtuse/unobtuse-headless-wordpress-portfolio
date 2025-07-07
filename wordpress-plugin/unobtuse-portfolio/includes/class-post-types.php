<?php
/**
 * Custom Post Types Class
 * 
 * Handles registration of custom post types for the portfolio
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Unobtuse_Portfolio_Post_Types {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', array($this, 'register_post_types'));
    }
    
    /**
     * Register all custom post types
     */
    public function register_post_types() {
        $this->register_case_studies();
        $this->register_portfolio_items();
        $this->register_testimonials();
    }
    
    /**
     * Register Case Studies post type
     */
    private function register_case_studies() {
        if (!Unobtuse_Portfolio::get_option('enable_case_studies', true)) {
            return;
        }
        
        $slug = Unobtuse_Portfolio::get_option('case_studies_slug', 'case-studies');
        
        $labels = array(
            'name'                  => _x('Case Studies', 'Post Type General Name', 'unobtuse-portfolio'),
            'singular_name'         => _x('Case Study', 'Post Type Singular Name', 'unobtuse-portfolio'),
            'menu_name'             => __('Case Studies', 'unobtuse-portfolio'),
            'name_admin_bar'        => __('Case Study', 'unobtuse-portfolio'),
            'archives'              => __('Case Study Archives', 'unobtuse-portfolio'),
            'attributes'            => __('Case Study Attributes', 'unobtuse-portfolio'),
            'parent_item_colon'     => __('Parent Case Study:', 'unobtuse-portfolio'),
            'all_items'             => __('All Case Studies', 'unobtuse-portfolio'),
            'add_new_item'          => __('Add New Case Study', 'unobtuse-portfolio'),
            'add_new'               => __('Add New', 'unobtuse-portfolio'),
            'new_item'              => __('New Case Study', 'unobtuse-portfolio'),
            'edit_item'             => __('Edit Case Study', 'unobtuse-portfolio'),
            'update_item'           => __('Update Case Study', 'unobtuse-portfolio'),
            'view_item'             => __('View Case Study', 'unobtuse-portfolio'),
            'view_items'            => __('View Case Studies', 'unobtuse-portfolio'),
            'search_items'          => __('Search Case Studies', 'unobtuse-portfolio'),
            'not_found'             => __('Not found', 'unobtuse-portfolio'),
            'not_found_in_trash'    => __('Not found in Trash', 'unobtuse-portfolio'),
            'featured_image'        => __('Featured Image', 'unobtuse-portfolio'),
            'set_featured_image'    => __('Set featured image', 'unobtuse-portfolio'),
            'remove_featured_image' => __('Remove featured image', 'unobtuse-portfolio'),
            'use_featured_image'    => __('Use as featured image', 'unobtuse-portfolio'),
            'insert_into_item'      => __('Insert into case study', 'unobtuse-portfolio'),
            'uploaded_to_this_item' => __('Uploaded to this case study', 'unobtuse-portfolio'),
            'items_list'            => __('Case Studies list', 'unobtuse-portfolio'),
            'items_list_navigation' => __('Case Studies list navigation', 'unobtuse-portfolio'),
            'filter_items_list'     => __('Filter case studies list', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'label'                 => __('Case Study', 'unobtuse-portfolio'),
            'description'           => __('Client case studies and project showcases', 'unobtuse-portfolio'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
            'taxonomies'            => array('case_study_category', 'case_study_technology'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-analytics',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rest_base'             => 'case-studies',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql'       => true,
            'graphql_single_name'   => 'caseStudy',
            'graphql_plural_name'   => 'caseStudies',
            'rewrite'               => array(
                'slug'                  => $slug,
                'with_front'            => false,
                'pages'                 => true,
                'feeds'                 => true,
            ),
        );
        
        register_post_type('case_study', $args);
    }
    
    /**
     * Register Portfolio Items post type
     */
    private function register_portfolio_items() {
        if (!Unobtuse_Portfolio::get_option('enable_portfolio_items', true)) {
            return;
        }
        
        $slug = Unobtuse_Portfolio::get_option('portfolio_slug', 'portfolio');
        
        $labels = array(
            'name'                  => _x('Portfolio Items', 'Post Type General Name', 'unobtuse-portfolio'),
            'singular_name'         => _x('Portfolio Item', 'Post Type Singular Name', 'unobtuse-portfolio'),
            'menu_name'             => __('Portfolio', 'unobtuse-portfolio'),
            'name_admin_bar'        => __('Portfolio Item', 'unobtuse-portfolio'),
            'archives'              => __('Portfolio Archives', 'unobtuse-portfolio'),
            'attributes'            => __('Portfolio Item Attributes', 'unobtuse-portfolio'),
            'parent_item_colon'     => __('Parent Portfolio Item:', 'unobtuse-portfolio'),
            'all_items'             => __('All Portfolio Items', 'unobtuse-portfolio'),
            'add_new_item'          => __('Add New Portfolio Item', 'unobtuse-portfolio'),
            'add_new'               => __('Add New', 'unobtuse-portfolio'),
            'new_item'              => __('New Portfolio Item', 'unobtuse-portfolio'),
            'edit_item'             => __('Edit Portfolio Item', 'unobtuse-portfolio'),
            'update_item'           => __('Update Portfolio Item', 'unobtuse-portfolio'),
            'view_item'             => __('View Portfolio Item', 'unobtuse-portfolio'),
            'view_items'            => __('View Portfolio Items', 'unobtuse-portfolio'),
            'search_items'          => __('Search Portfolio Items', 'unobtuse-portfolio'),
            'not_found'             => __('Not found', 'unobtuse-portfolio'),
            'not_found_in_trash'    => __('Not found in Trash', 'unobtuse-portfolio'),
            'featured_image'        => __('Featured Image', 'unobtuse-portfolio'),
            'set_featured_image'    => __('Set featured image', 'unobtuse-portfolio'),
            'remove_featured_image' => __('Remove featured image', 'unobtuse-portfolio'),
            'use_featured_image'    => __('Use as featured image', 'unobtuse-portfolio'),
            'insert_into_item'      => __('Insert into portfolio item', 'unobtuse-portfolio'),
            'uploaded_to_this_item' => __('Uploaded to this portfolio item', 'unobtuse-portfolio'),
            'items_list'            => __('Portfolio Items list', 'unobtuse-portfolio'),
            'items_list_navigation' => __('Portfolio Items list navigation', 'unobtuse-portfolio'),
            'filter_items_list'     => __('Filter portfolio items list', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'label'                 => __('Portfolio Item', 'unobtuse-portfolio'),
            'description'           => __('Portfolio items and project showcases', 'unobtuse-portfolio'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
            'taxonomies'            => array('portfolio_category', 'portfolio_technology', 'portfolio_skill'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rest_base'             => 'portfolio',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql'       => true,
            'graphql_single_name'   => 'portfolioItem',
            'graphql_plural_name'   => 'portfolioItems',
            'rewrite'               => array(
                'slug'                  => $slug,
                'with_front'            => false,
                'pages'                 => true,
                'feeds'                 => true,
            ),
        );
        
        register_post_type('portfolio_item', $args);
    }
    
    /**
     * Register Testimonials post type
     */
    private function register_testimonials() {
        if (!Unobtuse_Portfolio::get_option('enable_testimonials', true)) {
            return;
        }
        
        $slug = Unobtuse_Portfolio::get_option('testimonials_slug', 'testimonials');
        
        $labels = array(
            'name'                  => _x('Testimonials', 'Post Type General Name', 'unobtuse-portfolio'),
            'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'unobtuse-portfolio'),
            'menu_name'             => __('Testimonials', 'unobtuse-portfolio'),
            'name_admin_bar'        => __('Testimonial', 'unobtuse-portfolio'),
            'archives'              => __('Testimonial Archives', 'unobtuse-portfolio'),
            'attributes'            => __('Testimonial Attributes', 'unobtuse-portfolio'),
            'parent_item_colon'     => __('Parent Testimonial:', 'unobtuse-portfolio'),
            'all_items'             => __('All Testimonials', 'unobtuse-portfolio'),
            'add_new_item'          => __('Add New Testimonial', 'unobtuse-portfolio'),
            'add_new'               => __('Add New', 'unobtuse-portfolio'),
            'new_item'              => __('New Testimonial', 'unobtuse-portfolio'),
            'edit_item'             => __('Edit Testimonial', 'unobtuse-portfolio'),
            'update_item'           => __('Update Testimonial', 'unobtuse-portfolio'),
            'view_item'             => __('View Testimonial', 'unobtuse-portfolio'),
            'view_items'            => __('View Testimonials', 'unobtuse-portfolio'),
            'search_items'          => __('Search Testimonials', 'unobtuse-portfolio'),
            'not_found'             => __('Not found', 'unobtuse-portfolio'),
            'not_found_in_trash'    => __('Not found in Trash', 'unobtuse-portfolio'),
            'featured_image'        => __('Client Photo', 'unobtuse-portfolio'),
            'set_featured_image'    => __('Set client photo', 'unobtuse-portfolio'),
            'remove_featured_image' => __('Remove client photo', 'unobtuse-portfolio'),
            'use_featured_image'    => __('Use as client photo', 'unobtuse-portfolio'),
            'insert_into_item'      => __('Insert into testimonial', 'unobtuse-portfolio'),
            'uploaded_to_this_item' => __('Uploaded to this testimonial', 'unobtuse-portfolio'),
            'items_list'            => __('Testimonials list', 'unobtuse-portfolio'),
            'items_list_navigation' => __('Testimonials list navigation', 'unobtuse-portfolio'),
            'filter_items_list'     => __('Filter testimonials list', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'label'                 => __('Testimonial', 'unobtuse-portfolio'),
            'description'           => __('Client testimonials and reviews', 'unobtuse-portfolio'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-testimonial',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rest_base'             => 'testimonials',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql'       => true,
            'graphql_single_name'   => 'testimonial',
            'graphql_plural_name'   => 'testimonials',
            'rewrite'               => array(
                'slug'                  => $slug,
                'with_front'            => false,
                'pages'                 => false,
                'feeds'                 => false,
            ),
        );
        
        register_post_type('testimonial', $args);
    }
} 