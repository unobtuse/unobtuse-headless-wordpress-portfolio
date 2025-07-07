<?php
/**
 * Plugin Name: Unobtuse Portfolio
 * Description: Custom post types for Unobtuse headless WordPress portfolio.
 * Version: 1.0.6
 * Author: Gabriel - Unobtuse
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register post types on init
add_action('init', 'unobtuse_register_post_types');

function unobtuse_register_post_types() {
    // Case Studies
    register_post_type('case_study', array(
        'labels' => array(
            'name' => 'Case Studies',
            'singular_name' => 'Case Study',
            'menu_name' => 'Case Studies',
            'add_new_item' => 'Add New Case Study',
            'edit_item' => 'Edit Case Study',
            'new_item' => 'New Case Study',
            'view_item' => 'View Case Study',
            'all_items' => 'All Case Studies',
            'search_items' => 'Search Case Studies',
            'not_found' => 'No case studies found.',
            'not_found_in_trash' => 'No case studies found in Trash.',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'has_archive' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'caseStudy',
        'graphql_plural_name' => 'caseStudies',
    ));
    
    // Portfolio Items
    register_post_type('portfolio_item', array(
        'labels' => array(
            'name' => 'Portfolio Items',
            'singular_name' => 'Portfolio Item',
            'menu_name' => 'Portfolio',
            'add_new_item' => 'Add New Portfolio Item',
            'edit_item' => 'Edit Portfolio Item',
            'new_item' => 'New Portfolio Item',
            'view_item' => 'View Portfolio Item',
            'all_items' => 'All Portfolio Items',
            'search_items' => 'Search Portfolio Items',
            'not_found' => 'No portfolio items found.',
            'not_found_in_trash' => 'No portfolio items found in Trash.',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'has_archive' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'portfolioItem',
        'graphql_plural_name' => 'portfolioItems',
    ));
    
    // Testimonials
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'menu_name' => 'Testimonials',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'all_items' => 'All Testimonials',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found.',
            'not_found_in_trash' => 'No testimonials found in Trash.',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'custom-fields'),
        'has_archive' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'testimonial',
        'graphql_plural_name' => 'testimonials',
    ));
}

// Register taxonomies
add_action('init', 'unobtuse_register_taxonomies');

function unobtuse_register_taxonomies() {
    // Case Study Categories
    register_taxonomy('case_study_category', array('case_study'), array(
        'labels' => array(
            'name' => 'Case Study Categories',
            'singular_name' => 'Case Study Category',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'caseStudyCategory',
        'graphql_plural_name' => 'caseStudyCategories',
    ));
    
    // Portfolio Categories
    register_taxonomy('portfolio_category', array('portfolio_item'), array(
        'labels' => array(
            'name' => 'Portfolio Categories',
            'singular_name' => 'Portfolio Category',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'portfolioCategory',
        'graphql_plural_name' => 'portfolioCategories',
    ));
    
    // Portfolio Technologies
    register_taxonomy('portfolio_technology', array('portfolio_item'), array(
        'labels' => array(
            'name' => 'Technologies',
            'singular_name' => 'Technology',
            'menu_name' => 'Technologies',
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'portfolioTechnology',
        'graphql_plural_name' => 'portfolioTechnologies',
    ));
}

// Flush rewrite rules on activation
register_activation_hook(__FILE__, 'unobtuse_plugin_activate');

function unobtuse_plugin_activate() {
    unobtuse_register_post_types();
    unobtuse_register_taxonomies();
    flush_rewrite_rules();
}

// Flush rewrite rules on deactivation
register_deactivation_hook(__FILE__, 'unobtuse_plugin_deactivate');

function unobtuse_plugin_deactivate() {
    flush_rewrite_rules();
} 