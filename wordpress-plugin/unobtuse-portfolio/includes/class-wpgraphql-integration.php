<?php
/**
 * WPGraphQL Integration Class
 * 
 * Handles WPGraphQL integration for custom post types and fields
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class UnobtusePo_WPGraphQL_Integration {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', [$this, 'registerGraphQLFields']);
        add_action('graphql_register_types', [$this, 'registerCustomQueries']);
    }
    
    /**
     * Register GraphQL fields for custom post types
     */
    public function registerGraphQLFields() {
        if (!function_exists('register_graphql_field')) {
            return;
        }
        
        $this->registerCaseStudyFields();
        $this->registerPortfolioItemFields();
        $this->registerTestimonialFields();
    }
    
    /**
     * Register Case Study GraphQL fields
     */
    private function registerCaseStudyFields() {
        // Client Name
        register_graphql_field('CaseStudy', 'clientName', [
            'type' => 'String',
            'description' => 'The name of the client for this case study',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'client_name', true);
            }
        ]);
        
        // Project URL
        register_graphql_field('CaseStudy', 'projectUrl', [
            'type' => 'String',
            'description' => 'The live URL of the project',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'project_url', true);
            }
        ]);
        
        // Project Duration
        register_graphql_field('CaseStudy', 'projectDuration', [
            'type' => 'String',
            'description' => 'How long the project took to complete',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'project_duration', true);
            }
        ]);
        
        // Challenge
        register_graphql_field('CaseStudy', 'challenge', [
            'type' => 'String',
            'description' => 'The main challenge of the project',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'challenge', true);
            }
        ]);
        
        // Solution
        register_graphql_field('CaseStudy', 'solution', [
            'type' => 'String',
            'description' => 'The solution provided for the challenge',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'solution', true);
            }
        ]);
        
        // Results
        register_graphql_field('CaseStudy', 'results', [
            'type' => 'String',
            'description' => 'The results achieved from the project',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'results', true);
            }
        ]);
    }
    
    /**
     * Register Portfolio Item GraphQL fields
     */
    private function registerPortfolioItemFields() {
        // Project URL
        register_graphql_field('PortfolioItem', 'projectUrl', [
            'type' => 'String',
            'description' => 'The live URL of the project',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'project_url', true);
            }
        ]);
        
        // GitHub URL
        register_graphql_field('PortfolioItem', 'githubUrl', [
            'type' => 'String',
            'description' => 'The GitHub repository URL',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'github_url', true);
            }
        ]);
        
        // Is Featured
        register_graphql_field('PortfolioItem', 'isFeatured', [
            'type' => 'Boolean',
            'description' => 'Whether this portfolio item is featured',
            'resolve' => function($post) {
                return (bool) get_post_meta($post->ID, 'is_featured', true);
            }
        ]);
        
        // Completion Date
        register_graphql_field('PortfolioItem', 'completionDate', [
            'type' => 'String',
            'description' => 'When the project was completed',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'completion_date', true);
            }
        ]);
    }
    
    /**
     * Register Testimonial GraphQL fields
     */
    private function registerTestimonialFields() {
        // Client Name
        register_graphql_field('Testimonial', 'clientName', [
            'type' => 'String',
            'description' => 'The name of the client who gave the testimonial',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'client_name', true);
            }
        ]);
        
        // Client Position
        register_graphql_field('Testimonial', 'clientPosition', [
            'type' => 'String',
            'description' => 'The position/title of the client',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'client_position', true);
            }
        ]);
        
        // Client Company
        register_graphql_field('Testimonial', 'clientCompany', [
            'type' => 'String',
            'description' => 'The company the client works for',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'client_company', true);
            }
        ]);
        
        // Rating
        register_graphql_field('Testimonial', 'rating', [
            'type' => 'Int',
            'description' => 'The rating given by the client (1-5)',
            'resolve' => function($post) {
                return (int) get_post_meta($post->ID, 'rating', true);
            }
        ]);
        
        // Project Type
        register_graphql_field('Testimonial', 'projectType', [
            'type' => 'String',
            'description' => 'The type of project the testimonial is about',
            'resolve' => function($post) {
                return get_post_meta($post->ID, 'project_type', true);
            }
        ]);
    }
    
    /**
     * Register custom GraphQL queries
     */
    public function registerCustomQueries() {
        if (!function_exists('register_graphql_field')) {
            return;
        }
        
        $this->registerFeaturedPortfolioQuery();
        $this->registerLatestCaseStudiesQuery();
        $this->registerRandomTestimonialsQuery();
        $this->registerPortfolioStatsQuery();
    }
    
    /**
     * Register featured portfolio items query
     */
    private function registerFeaturedPortfolioQuery() {
        register_graphql_field('RootQuery', 'featuredPortfolioItems', [
            'type' => ['list_of' => 'PortfolioItem'],
            'description' => 'Get featured portfolio items',
            'args' => [
                'limit' => [
                    'type' => 'Int',
                    'description' => 'Number of items to return',
                    'defaultValue' => 6
                ]
            ],
            'resolve' => function($source, $args) {
                $query_args = [
                    'post_type' => 'portfolio_item',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['limit'],
                    'meta_query' => [
                        [
                            'key' => 'is_featured',
                            'value' => '1',
                            'compare' => '='
                        ]
                    ]
                ];
                
                $query = new WP_Query($query_args);
                return $query->posts;
            }
        ]);
    }
    
    /**
     * Register latest case studies query
     */
    private function registerLatestCaseStudiesQuery() {
        register_graphql_field('RootQuery', 'latestCaseStudies', [
            'type' => ['list_of' => 'CaseStudy'],
            'description' => 'Get latest case studies',
            'args' => [
                'limit' => [
                    'type' => 'Int',
                    'description' => 'Number of items to return',
                    'defaultValue' => 3
                ]
            ],
            'resolve' => function($source, $args) {
                $query_args = [
                    'post_type' => 'case_study',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['limit'],
                    'orderby' => 'date',
                    'order' => 'DESC'
                ];
                
                $query = new WP_Query($query_args);
                return $query->posts;
            }
        ]);
    }
    
    /**
     * Register random testimonials query
     */
    private function registerRandomTestimonialsQuery() {
        register_graphql_field('RootQuery', 'randomTestimonials', [
            'type' => ['list_of' => 'Testimonial'],
            'description' => 'Get random testimonials',
            'args' => [
                'limit' => [
                    'type' => 'Int',
                    'description' => 'Number of items to return',
                    'defaultValue' => 3
                ]
            ],
            'resolve' => function($source, $args) {
                $query_args = [
                    'post_type' => 'testimonial',
                    'post_status' => 'publish',
                    'posts_per_page' => $args['limit'],
                    'orderby' => 'rand'
                ];
                
                $query = new WP_Query($query_args);
                return $query->posts;
            }
        ]);
    }
    
    /**
     * Register portfolio stats query
     */
    private function registerPortfolioStatsQuery() {
        register_graphql_field('RootQuery', 'portfolioStats', [
            'type' => 'PortfolioStats',
            'description' => 'Get portfolio statistics',
            'resolve' => function() {
                $case_studies_count = wp_count_posts('case_study')->publish;
                $portfolio_items_count = wp_count_posts('portfolio_item')->publish;
                $testimonials_count = wp_count_posts('testimonial')->publish;
                
                return [
                    'caseStudiesCount' => $case_studies_count,
                    'portfolioItemsCount' => $portfolio_items_count,
                    'testimonialsCount' => $testimonials_count,
                    'totalProjects' => $case_studies_count + $portfolio_items_count
                ];
            }
        ]);
        
        // Register the PortfolioStats type
        register_graphql_object_type('PortfolioStats', [
            'description' => 'Portfolio statistics',
            'fields' => [
                'caseStudiesCount' => [
                    'type' => 'Int',
                    'description' => 'Number of published case studies'
                ],
                'portfolioItemsCount' => [
                    'type' => 'Int',
                    'description' => 'Number of published portfolio items'
                ],
                'testimonialsCount' => [
                    'type' => 'Int',
                    'description' => 'Number of published testimonials'
                ],
                'totalProjects' => [
                    'type' => 'Int',
                    'description' => 'Total number of projects (case studies + portfolio items)'
                ]
            ]
        ]);
    }
} 