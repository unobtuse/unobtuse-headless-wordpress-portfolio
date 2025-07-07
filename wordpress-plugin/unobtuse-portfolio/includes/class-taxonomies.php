<?php
/**
 * Custom Taxonomies Class
 * 
 * Handles registration of custom taxonomies for organizing portfolio content
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Unobtuse_Portfolio_Taxonomies {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', array($this, 'register_taxonomies'));
    }
    
    /**
     * Register all custom taxonomies
     */
    public function register_taxonomies() {
        $this->register_case_study_categories();
        $this->register_case_study_technologies();
        $this->register_portfolio_categories();
        $this->register_portfolio_technologies();
        $this->register_portfolio_skills();
    }
    
    /**
     * Register Case Study Categories taxonomy
     */
    private function register_case_study_categories() {
        $labels = array(
            'name'                       => _x('Case Study Categories', 'Taxonomy General Name', 'unobtuse-portfolio'),
            'singular_name'              => _x('Case Study Category', 'Taxonomy Singular Name', 'unobtuse-portfolio'),
            'menu_name'                  => __('Categories', 'unobtuse-portfolio'),
            'all_items'                  => __('All Categories', 'unobtuse-portfolio'),
            'parent_item'                => __('Parent Category', 'unobtuse-portfolio'),
            'parent_item_colon'          => __('Parent Category:', 'unobtuse-portfolio'),
            'new_item_name'              => __('New Category Name', 'unobtuse-portfolio'),
            'add_new_item'               => __('Add New Category', 'unobtuse-portfolio'),
            'edit_item'                  => __('Edit Category', 'unobtuse-portfolio'),
            'update_item'                => __('Update Category', 'unobtuse-portfolio'),
            'view_item'                  => __('View Category', 'unobtuse-portfolio'),
            'separate_items_with_commas' => __('Separate categories with commas', 'unobtuse-portfolio'),
            'add_or_remove_items'        => __('Add or remove categories', 'unobtuse-portfolio'),
            'choose_from_most_used'      => __('Choose from the most used', 'unobtuse-portfolio'),
            'popular_items'              => __('Popular Categories', 'unobtuse-portfolio'),
            'search_items'               => __('Search Categories', 'unobtuse-portfolio'),
            'not_found'                  => __('Not Found', 'unobtuse-portfolio'),
            'no_terms'                   => __('No categories', 'unobtuse-portfolio'),
            'items_list'                 => __('Categories list', 'unobtuse-portfolio'),
            'items_list_navigation'      => __('Categories list navigation', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rest_base'                  => 'case-study-categories',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
            'show_in_graphql'            => true,
            'graphql_single_name'        => 'caseStudyCategory',
            'graphql_plural_name'        => 'caseStudyCategories',
            'rewrite'                    => array(
                'slug'                   => 'case-study-category',
                'with_front'             => false,
                'hierarchical'           => true,
            ),
        );
        
        register_taxonomy('case_study_category', array('case_study'), $args);
    }
    
    /**
     * Register Case Study Technologies taxonomy
     */
    private function register_case_study_technologies() {
        $labels = array(
            'name'                       => _x('Case Study Technologies', 'Taxonomy General Name', 'unobtuse-portfolio'),
            'singular_name'              => _x('Technology', 'Taxonomy Singular Name', 'unobtuse-portfolio'),
            'menu_name'                  => __('Technologies', 'unobtuse-portfolio'),
            'all_items'                  => __('All Technologies', 'unobtuse-portfolio'),
            'parent_item'                => __('Parent Technology', 'unobtuse-portfolio'),
            'parent_item_colon'          => __('Parent Technology:', 'unobtuse-portfolio'),
            'new_item_name'              => __('New Technology Name', 'unobtuse-portfolio'),
            'add_new_item'               => __('Add New Technology', 'unobtuse-portfolio'),
            'edit_item'                  => __('Edit Technology', 'unobtuse-portfolio'),
            'update_item'                => __('Update Technology', 'unobtuse-portfolio'),
            'view_item'                  => __('View Technology', 'unobtuse-portfolio'),
            'separate_items_with_commas' => __('Separate technologies with commas', 'unobtuse-portfolio'),
            'add_or_remove_items'        => __('Add or remove technologies', 'unobtuse-portfolio'),
            'choose_from_most_used'      => __('Choose from the most used', 'unobtuse-portfolio'),
            'popular_items'              => __('Popular Technologies', 'unobtuse-portfolio'),
            'search_items'               => __('Search Technologies', 'unobtuse-portfolio'),
            'not_found'                  => __('Not Found', 'unobtuse-portfolio'),
            'no_terms'                   => __('No technologies', 'unobtuse-portfolio'),
            'items_list'                 => __('Technologies list', 'unobtuse-portfolio'),
            'items_list_navigation'      => __('Technologies list navigation', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rest_base'                  => 'case-study-technologies',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
            'show_in_graphql'            => true,
            'graphql_single_name'        => 'caseStudyTechnology',
            'graphql_plural_name'        => 'caseStudyTechnologies',
            'rewrite'                    => array(
                'slug'                   => 'case-study-technology',
                'with_front'             => false,
                'hierarchical'           => false,
            ),
        );
        
        register_taxonomy('case_study_technology', array('case_study'), $args);
    }
    
    /**
     * Register Portfolio Categories taxonomy
     */
    private function register_portfolio_categories() {
        $labels = array(
            'name'                       => _x('Portfolio Categories', 'Taxonomy General Name', 'unobtuse-portfolio'),
            'singular_name'              => _x('Portfolio Category', 'Taxonomy Singular Name', 'unobtuse-portfolio'),
            'menu_name'                  => __('Categories', 'unobtuse-portfolio'),
            'all_items'                  => __('All Categories', 'unobtuse-portfolio'),
            'parent_item'                => __('Parent Category', 'unobtuse-portfolio'),
            'parent_item_colon'          => __('Parent Category:', 'unobtuse-portfolio'),
            'new_item_name'              => __('New Category Name', 'unobtuse-portfolio'),
            'add_new_item'               => __('Add New Category', 'unobtuse-portfolio'),
            'edit_item'                  => __('Edit Category', 'unobtuse-portfolio'),
            'update_item'                => __('Update Category', 'unobtuse-portfolio'),
            'view_item'                  => __('View Category', 'unobtuse-portfolio'),
            'separate_items_with_commas' => __('Separate categories with commas', 'unobtuse-portfolio'),
            'add_or_remove_items'        => __('Add or remove categories', 'unobtuse-portfolio'),
            'choose_from_most_used'      => __('Choose from the most used', 'unobtuse-portfolio'),
            'popular_items'              => __('Popular Categories', 'unobtuse-portfolio'),
            'search_items'               => __('Search Categories', 'unobtuse-portfolio'),
            'not_found'                  => __('Not Found', 'unobtuse-portfolio'),
            'no_terms'                   => __('No categories', 'unobtuse-portfolio'),
            'items_list'                 => __('Categories list', 'unobtuse-portfolio'),
            'items_list_navigation'      => __('Categories list navigation', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rest_base'                  => 'portfolio-categories',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
            'show_in_graphql'            => true,
            'graphql_single_name'        => 'portfolioCategory',
            'graphql_plural_name'        => 'portfolioCategories',
            'rewrite'                    => array(
                'slug'                   => 'portfolio-category',
                'with_front'             => false,
                'hierarchical'           => true,
            ),
        );
        
        register_taxonomy('portfolio_category', array('portfolio_item'), $args);
    }
    
    /**
     * Register Portfolio Technologies taxonomy
     */
    private function register_portfolio_technologies() {
        $labels = array(
            'name'                       => _x('Portfolio Technologies', 'Taxonomy General Name', 'unobtuse-portfolio'),
            'singular_name'              => _x('Technology', 'Taxonomy Singular Name', 'unobtuse-portfolio'),
            'menu_name'                  => __('Technologies', 'unobtuse-portfolio'),
            'all_items'                  => __('All Technologies', 'unobtuse-portfolio'),
            'parent_item'                => __('Parent Technology', 'unobtuse-portfolio'),
            'parent_item_colon'          => __('Parent Technology:', 'unobtuse-portfolio'),
            'new_item_name'              => __('New Technology Name', 'unobtuse-portfolio'),
            'add_new_item'               => __('Add New Technology', 'unobtuse-portfolio'),
            'edit_item'                  => __('Edit Technology', 'unobtuse-portfolio'),
            'update_item'                => __('Update Technology', 'unobtuse-portfolio'),
            'view_item'                  => __('View Technology', 'unobtuse-portfolio'),
            'separate_items_with_commas' => __('Separate technologies with commas', 'unobtuse-portfolio'),
            'add_or_remove_items'        => __('Add or remove technologies', 'unobtuse-portfolio'),
            'choose_from_most_used'      => __('Choose from the most used', 'unobtuse-portfolio'),
            'popular_items'              => __('Popular Technologies', 'unobtuse-portfolio'),
            'search_items'               => __('Search Technologies', 'unobtuse-portfolio'),
            'not_found'                  => __('Not Found', 'unobtuse-portfolio'),
            'no_terms'                   => __('No technologies', 'unobtuse-portfolio'),
            'items_list'                 => __('Technologies list', 'unobtuse-portfolio'),
            'items_list_navigation'      => __('Technologies list navigation', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rest_base'                  => 'portfolio-technologies',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
            'show_in_graphql'            => true,
            'graphql_single_name'        => 'portfolioTechnology',
            'graphql_plural_name'        => 'portfolioTechnologies',
            'rewrite'                    => array(
                'slug'                   => 'portfolio-technology',
                'with_front'             => false,
                'hierarchical'           => false,
            ),
        );
        
        register_taxonomy('portfolio_technology', array('portfolio_item'), $args);
    }
    
    /**
     * Register Portfolio Skills taxonomy
     */
    private function register_portfolio_skills() {
        $labels = array(
            'name'                       => _x('Portfolio Skills', 'Taxonomy General Name', 'unobtuse-portfolio'),
            'singular_name'              => _x('Skill', 'Taxonomy Singular Name', 'unobtuse-portfolio'),
            'menu_name'                  => __('Skills', 'unobtuse-portfolio'),
            'all_items'                  => __('All Skills', 'unobtuse-portfolio'),
            'parent_item'                => __('Parent Skill', 'unobtuse-portfolio'),
            'parent_item_colon'          => __('Parent Skill:', 'unobtuse-portfolio'),
            'new_item_name'              => __('New Skill Name', 'unobtuse-portfolio'),
            'add_new_item'               => __('Add New Skill', 'unobtuse-portfolio'),
            'edit_item'                  => __('Edit Skill', 'unobtuse-portfolio'),
            'update_item'                => __('Update Skill', 'unobtuse-portfolio'),
            'view_item'                  => __('View Skill', 'unobtuse-portfolio'),
            'separate_items_with_commas' => __('Separate skills with commas', 'unobtuse-portfolio'),
            'add_or_remove_items'        => __('Add or remove skills', 'unobtuse-portfolio'),
            'choose_from_most_used'      => __('Choose from the most used', 'unobtuse-portfolio'),
            'popular_items'              => __('Popular Skills', 'unobtuse-portfolio'),
            'search_items'               => __('Search Skills', 'unobtuse-portfolio'),
            'not_found'                  => __('Not Found', 'unobtuse-portfolio'),
            'no_terms'                   => __('No skills', 'unobtuse-portfolio'),
            'items_list'                 => __('Skills list', 'unobtuse-portfolio'),
            'items_list_navigation'      => __('Skills list navigation', 'unobtuse-portfolio'),
        );
        
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rest_base'                  => 'portfolio-skills',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
            'show_in_graphql'            => true,
            'graphql_single_name'        => 'portfolioSkill',
            'graphql_plural_name'        => 'portfolioSkills',
            'rewrite'                    => array(
                'slug'                   => 'portfolio-skill',
                'with_front'             => false,
                'hierarchical'           => true,
            ),
        );
        
        register_taxonomy('portfolio_skill', array('portfolio_item'), $args);
    }
} 