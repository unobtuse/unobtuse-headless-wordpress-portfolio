<?php
/**
 * Post Types Class
 * 
 * Handles registration of custom post types
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class UnobtusePo_Post_Types {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', [$this, 'registerPostTypes']);
    }
    
    /**
     * Register custom post types
     */
    public function registerPostTypes() {
        $this->registerCaseStudies();
        $this->registerPortfolioItems();
        $this->registerTestimonials();
    }
    
    /**
     * Register Case Studies post type
     */
    private function registerCaseStudies() {
        $args = [
            'label' => __('Case Studies', 'unobtuse-portfolio'),
            'labels' => [
                'name' => __('Case Studies', 'unobtuse-portfolio'),
                'singular_name' => __('Case Study', 'unobtuse-portfolio'),
                'menu_name' => __('Case Studies', 'unobtuse-portfolio'),
                'name_admin_bar' => __('Case Study', 'unobtuse-portfolio'),
                'add_new' => __('Add New', 'unobtuse-portfolio'),
                'add_new_item' => __('Add New Case Study', 'unobtuse-portfolio'),
                'new_item' => __('New Case Study', 'unobtuse-portfolio'),
                'edit_item' => __('Edit Case Study', 'unobtuse-portfolio'),
                'view_item' => __('View Case Study', 'unobtuse-portfolio'),
                'all_items' => __('All Case Studies', 'unobtuse-portfolio'),
                'search_items' => __('Search Case Studies', 'unobtuse-portfolio'),
                'parent_item_colon' => __('Parent Case Studies:', 'unobtuse-portfolio'),
                'not_found' => __('No case studies found.', 'unobtuse-portfolio'),
                'not_found_in_trash' => __('No case studies found in Trash.', 'unobtuse-portfolio'),
            ],
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'case-study'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
            'show_in_rest' => true,
            'rest_base' => 'case-studies',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql' => true,
            'graphql_single_name' => 'caseStudy',
            'graphql_plural_name' => 'caseStudies',
        ];
        
        register_post_type('case_study', $args);
    }
    
    /**
     * Register Portfolio Items post type
     */
    private function registerPortfolioItems() {
        $args = [
            'label' => __('Portfolio Items', 'unobtuse-portfolio'),
            'labels' => [
                'name' => __('Portfolio Items', 'unobtuse-portfolio'),
                'singular_name' => __('Portfolio Item', 'unobtuse-portfolio'),
                'menu_name' => __('Portfolio', 'unobtuse-portfolio'),
                'name_admin_bar' => __('Portfolio Item', 'unobtuse-portfolio'),
                'add_new' => __('Add New', 'unobtuse-portfolio'),
                'add_new_item' => __('Add New Portfolio Item', 'unobtuse-portfolio'),
                'new_item' => __('New Portfolio Item', 'unobtuse-portfolio'),
                'edit_item' => __('Edit Portfolio Item', 'unobtuse-portfolio'),
                'view_item' => __('View Portfolio Item', 'unobtuse-portfolio'),
                'all_items' => __('All Portfolio Items', 'unobtuse-portfolio'),
                'search_items' => __('Search Portfolio Items', 'unobtuse-portfolio'),
                'parent_item_colon' => __('Parent Portfolio Items:', 'unobtuse-portfolio'),
                'not_found' => __('No portfolio items found.', 'unobtuse-portfolio'),
                'not_found_in_trash' => __('No portfolio items found in Trash.', 'unobtuse-portfolio'),
            ],
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'portfolio-item'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-images-alt2',
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
            'show_in_rest' => true,
            'rest_base' => 'portfolio-items',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql' => true,
            'graphql_single_name' => 'portfolioItem',
            'graphql_plural_name' => 'portfolioItems',
        ];
        
        register_post_type('portfolio_item', $args);
    }
    
    /**
     * Register Testimonials post type
     */
    private function registerTestimonials() {
        $args = [
            'label' => __('Testimonials', 'unobtuse-portfolio'),
            'labels' => [
                'name' => __('Testimonials', 'unobtuse-portfolio'),
                'singular_name' => __('Testimonial', 'unobtuse-portfolio'),
                'menu_name' => __('Testimonials', 'unobtuse-portfolio'),
                'name_admin_bar' => __('Testimonial', 'unobtuse-portfolio'),
                'add_new' => __('Add New', 'unobtuse-portfolio'),
                'add_new_item' => __('Add New Testimonial', 'unobtuse-portfolio'),
                'new_item' => __('New Testimonial', 'unobtuse-portfolio'),
                'edit_item' => __('Edit Testimonial', 'unobtuse-portfolio'),
                'view_item' => __('View Testimonial', 'unobtuse-portfolio'),
                'all_items' => __('All Testimonials', 'unobtuse-portfolio'),
                'search_items' => __('Search Testimonials', 'unobtuse-portfolio'),
                'parent_item_colon' => __('Parent Testimonials:', 'unobtuse-portfolio'),
                'not_found' => __('No testimonials found.', 'unobtuse-portfolio'),
                'not_found_in_trash' => __('No testimonials found in Trash.', 'unobtuse-portfolio'),
            ],
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'testimonial'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => ['title', 'editor', 'custom-fields'],
            'show_in_rest' => true,
            'rest_base' => 'testimonials',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'show_in_graphql' => true,
            'graphql_single_name' => 'testimonial',
            'graphql_plural_name' => 'testimonials',
        ];
        
        register_post_type('testimonial', $args);
    }
} 