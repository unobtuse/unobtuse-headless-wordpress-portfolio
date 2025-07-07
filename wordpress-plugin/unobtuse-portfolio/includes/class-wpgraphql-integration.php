<?php
/**
 * WPGraphQL Integration Class
 * 
 * Handles integration with WPGraphQL plugin to expose custom content
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Unobtuse_Portfolio_WPGraphQL_Integration {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('graphql_register_types', array($this, 'register_custom_fields'));
        add_action('graphql_register_types', array($this, 'register_custom_queries'));
        add_filter('graphql_post_object_connection_query_args', array($this, 'modify_portfolio_query_args'), 10, 5);
    }
    
    /**
     * Register custom fields in GraphQL
     */
    public function register_custom_fields() {
        // Case Study custom fields
        register_graphql_field('CaseStudy', 'clientName', array(
            'type' => 'String',
            'description' => __('The client name for this case study', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_client_name', true);
            }
        ));
        
        register_graphql_field('CaseStudy', 'projectUrl', array(
            'type' => 'String',
            'description' => __('The URL of the completed project', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_project_url', true);
            }
        ));
        
        register_graphql_field('CaseStudy', 'duration', array(
            'type' => 'String',
            'description' => __('The project duration', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_duration', true);
            }
        ));
        
        register_graphql_field('CaseStudy', 'challenge', array(
            'type' => 'String',
            'description' => __('The main challenge or problem solved', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_challenge', true);
            }
        ));
        
        register_graphql_field('CaseStudy', 'solution', array(
            'type' => 'String',
            'description' => __('The solution implemented', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_solution', true);
            }
        ));
        
        register_graphql_field('CaseStudy', 'results', array(
            'type' => 'String',
            'description' => __('The results and outcomes', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'case_study_results', true);
            }
        ));
        
        // Portfolio Item custom fields
        register_graphql_field('PortfolioItem', 'projectUrl', array(
            'type' => 'String',
            'description' => __('The URL of the portfolio project', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'portfolio_project_url', true);
            }
        ));
        
        register_graphql_field('PortfolioItem', 'githubUrl', array(
            'type' => 'String',
            'description' => __('The GitHub repository URL', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'portfolio_github_url', true);
            }
        ));
        
        register_graphql_field('PortfolioItem', 'isFeatured', array(
            'type' => 'Boolean',
            'description' => __('Whether this portfolio item is featured', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return (bool) get_post_meta($post->ID, 'portfolio_is_featured', true);
            }
        ));
        
        register_graphql_field('PortfolioItem', 'completionDate', array(
            'type' => 'String',
            'description' => __('The project completion date', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'portfolio_completion_date', true);
            }
        ));
        
        // Testimonial custom fields
        register_graphql_field('Testimonial', 'clientName', array(
            'type' => 'String',
            'description' => __('The client name for this testimonial', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'testimonial_client_name', true);
            }
        ));
        
        register_graphql_field('Testimonial', 'clientPosition', array(
            'type' => 'String',
            'description' => __('The client position/title', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'testimonial_client_position', true);
            }
        ));
        
        register_graphql_field('Testimonial', 'clientCompany', array(
            'type' => 'String',
            'description' => __('The client company name', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'testimonial_client_company', true);
            }
        ));
        
        register_graphql_field('Testimonial', 'rating', array(
            'type' => 'Integer',
            'description' => __('The rating out of 5', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return (int) get_post_meta($post->ID, 'testimonial_rating', true);
            }
        ));
        
        register_graphql_field('Testimonial', 'projectType', array(
            'type' => 'String',
            'description' => __('The type of project the testimonial is for', 'unobtuse-portfolio'),
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'testimonial_project_type', true);
            }
        ));
    }
    
    /**
     * Register custom queries
     */
    public function register_custom_queries() {
        // Featured Portfolio Items Query
        register_graphql_field('RootQuery', 'featuredPortfolioItems', array(
            'type' => array('list_of' => 'PortfolioItem'),
            'description' => __('Get featured portfolio items', 'unobtuse-portfolio'),
            'args' => array(
                'first' => array(
                    'type' => 'Int',
                    'description' => __('Number of items to retrieve', 'unobtuse-portfolio'),
                    'defaultValue' => 6,
                ),
            ),
            'resolve' => function($root, $args) {
                $query_args = array(
                    'post_type' => 'portfolio_item',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['first'],
                    'meta_query' => array(
                        array(
                            'key' => 'portfolio_is_featured',
                            'value' => '1',
                            'compare' => '='
                        )
                    ),
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $posts = get_posts($query_args);
                return $posts;
            }
        ));
        
        // Latest Case Studies Query
        register_graphql_field('RootQuery', 'latestCaseStudies', array(
            'type' => array('list_of' => 'CaseStudy'),
            'description' => __('Get latest case studies', 'unobtuse-portfolio'),
            'args' => array(
                'first' => array(
                    'type' => 'Int',
                    'description' => __('Number of items to retrieve', 'unobtuse-portfolio'),
                    'defaultValue' => 6,
                ),
                'category' => array(
                    'type' => 'String',
                    'description' => __('Filter by category slug', 'unobtuse-portfolio'),
                ),
            ),
            'resolve' => function($root, $args) {
                $query_args = array(
                    'post_type' => 'case_study',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['first'],
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                if (!empty($args['category'])) {
                    $query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'case_study_category',
                            'field' => 'slug',
                            'terms' => $args['category']
                        )
                    );
                }
                
                $posts = get_posts($query_args);
                return $posts;
            }
        ));
        
        // Random Testimonials Query
        register_graphql_field('RootQuery', 'randomTestimonials', array(
            'type' => array('list_of' => 'Testimonial'),
            'description' => __('Get random testimonials', 'unobtuse-portfolio'),
            'args' => array(
                'first' => array(
                    'type' => 'Int',
                    'description' => __('Number of items to retrieve', 'unobtuse-portfolio'),
                    'defaultValue' => 3,
                ),
            ),
            'resolve' => function($root, $args) {
                $query_args = array(
                    'post_type' => 'testimonial',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['first'],
                    'orderby' => 'rand'
                );
                
                $posts = get_posts($query_args);
                return $posts;
            }
        ));
        
        // Portfolio Stats Query
        register_graphql_field('RootQuery', 'portfolioStats', array(
            'type' => 'PortfolioStats',
            'description' => __('Get portfolio statistics', 'unobtuse-portfolio'),
            'resolve' => function($root, $args) {
                $case_studies_count = wp_count_posts('case_study')->publish;
                $portfolio_count = wp_count_posts('portfolio_item')->publish;
                $testimonials_count = wp_count_posts('testimonial')->publish;
                
                // Get featured portfolio count
                $featured_count = get_posts(array(
                    'post_type' => 'portfolio_item',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => 'portfolio_is_featured',
                            'value' => '1',
                            'compare' => '='
                        )
                    ),
                    'fields' => 'ids',
                    'posts_per_page' => -1
                ));
                
                return array(
                    'caseStudiesCount' => (int) $case_studies_count,
                    'portfolioItemsCount' => (int) $portfolio_count,
                    'testimonialsCount' => (int) $testimonials_count,
                    'featuredItemsCount' => count($featured_count),
                );
            }
        ));
        
        // Register Portfolio Stats type
        register_graphql_object_type('PortfolioStats', array(
            'description' => __('Portfolio statistics', 'unobtuse-portfolio'),
            'fields' => array(
                'caseStudiesCount' => array(
                    'type' => 'Int',
                    'description' => __('Number of published case studies', 'unobtuse-portfolio'),
                ),
                'portfolioItemsCount' => array(
                    'type' => 'Int',
                    'description' => __('Number of published portfolio items', 'unobtuse-portfolio'),
                ),
                'testimonialsCount' => array(
                    'type' => 'Int',
                    'description' => __('Number of published testimonials', 'unobtuse-portfolio'),
                ),
                'featuredItemsCount' => array(
                    'type' => 'Int',
                    'description' => __('Number of featured portfolio items', 'unobtuse-portfolio'),
                ),
            ),
        ));
    }
    
    /**
     * Modify portfolio query args for filtering
     */
    public function modify_portfolio_query_args($query_args, $source, $args, $context, $info) {
        // Add custom filtering for portfolio items
        if (isset($args['where']['featured']) && $args['where']['featured'] === true) {
            $query_args['meta_query'][] = array(
                'key' => 'portfolio_is_featured',
                'value' => '1',
                'compare' => '='
            );
        }
        
        return $query_args;
    }
} 