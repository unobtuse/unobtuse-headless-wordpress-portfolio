<?php
/**
 * Plugin Name: Unobtuse Portfolio
 * Plugin URI: https://github.com/unobtuse/unobtuse-headless-wordpress-portfolio
 * Description: Custom post types, taxonomies, and fields for Unobtuse headless WordPress portfolio site. Integrates with WPGraphQL for headless frontend.
 * Version: 1.0.5
 * Author: Gabriel - Unobtuse
 * Author URI: https://unobtuse.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: unobtuse-portfolio
 * Domain Path: /languages
 * Requires at least: 6.0
 * Tested up to: 6.4
 * Requires PHP: 8.0
 * Network: false
 * 
 * @package UnobtusePo
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('UNOBTUSE_PORTFOLIO_VERSION', '1.0.5');
define('UNOBTUSE_PORTFOLIO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('UNOBTUSE_PORTFOLIO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('UNOBTUSE_PORTFOLIO_PLUGIN_FILE', __FILE__);

/**
 * Main Plugin Class
 */
class UnobtusePo {
    
    /**
     * Single instance of the class
     * @var UnobtusePo
     */
    private static $instance = null;
    
    /**
     * Get single instance
     * @return UnobtusePo
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->init();
    }
    
    /**
     * Initialize the plugin
     */
    private function init() {
        // Load plugin textdomain
        add_action('plugins_loaded', [$this, 'loadTextdomain']);
        
        // Register post types and taxonomies directly
        add_action('init', [$this, 'registerPostTypes'], 0);
        add_action('init', [$this, 'registerTaxonomies'], 0);
        
        // Initialize plugin components
        add_action('add_meta_boxes', [$this, 'addMetaBoxes']);
        add_action('save_post', [$this, 'saveMetaBoxes']);
        
        // Activation/deactivation hooks
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
        
        // Admin notices
        add_action('admin_notices', [$this, 'checkDependencies']);
    }
    
    /**
     * Load plugin text domain
     */
    public function loadTextdomain() {
        load_plugin_textdomain(
            'unobtuse-portfolio',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages/'
        );
    }
    
    /**
     * Add meta boxes for custom post types
     */
    public function addMetaBoxes() {
        // Case Study meta box
        add_meta_box(
            'case_study_details',
            'Case Study Details',
            [$this, 'caseStudyMetaBox'],
            'case_study',
            'normal',
            'high'
        );
        
        // Portfolio Item meta box
        add_meta_box(
            'portfolio_details',
            'Portfolio Details',
            [$this, 'portfolioMetaBox'],
            'portfolio_item',
            'normal',
            'high'
        );
        
        // Testimonial meta box
        add_meta_box(
            'testimonial_details',
            'Testimonial Details',
            [$this, 'testimonialMetaBox'],
            'testimonial',
            'normal',
            'high'
        );
    }
    
    /**
     * Case Study meta box callback
     */
    public function caseStudyMetaBox($post) {
        wp_nonce_field('case_study_meta_box', 'case_study_meta_box_nonce');
        
        $client_name = get_post_meta($post->ID, '_client_name', true);
        $project_url = get_post_meta($post->ID, '_project_url', true);
        $duration = get_post_meta($post->ID, '_duration', true);
        $challenge = get_post_meta($post->ID, '_challenge', true);
        $solution = get_post_meta($post->ID, '_solution', true);
        $results = get_post_meta($post->ID, '_results', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="client_name">Client Name</label></th><td><input type="text" id="client_name" name="client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="project_url">Project URL</label></th><td><input type="url" id="project_url" name="project_url" value="' . esc_attr($project_url) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="duration">Duration</label></th><td><input type="text" id="duration" name="duration" value="' . esc_attr($duration) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="challenge">Challenge</label></th><td><textarea id="challenge" name="challenge" rows="3" class="large-text">' . esc_textarea($challenge) . '</textarea></td></tr>';
        echo '<tr><th><label for="solution">Solution</label></th><td><textarea id="solution" name="solution" rows="3" class="large-text">' . esc_textarea($solution) . '</textarea></td></tr>';
        echo '<tr><th><label for="results">Results</label></th><td><textarea id="results" name="results" rows="3" class="large-text">' . esc_textarea($results) . '</textarea></td></tr>';
        echo '</table>';
    }
    
    /**
     * Portfolio meta box callback
     */
    public function portfolioMetaBox($post) {
        wp_nonce_field('portfolio_meta_box', 'portfolio_meta_box_nonce');
        
        $project_url = get_post_meta($post->ID, '_project_url', true);
        $github_url = get_post_meta($post->ID, '_github_url', true);
        $is_featured = get_post_meta($post->ID, '_is_featured', true);
        $completion_date = get_post_meta($post->ID, '_completion_date', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="project_url">Project URL</label></th><td><input type="url" id="project_url" name="project_url" value="' . esc_attr($project_url) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="github_url">GitHub URL</label></th><td><input type="url" id="github_url" name="github_url" value="' . esc_attr($github_url) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="is_featured">Featured Project</label></th><td><input type="checkbox" id="is_featured" name="is_featured" value="1" ' . checked($is_featured, 1, false) . ' /></td></tr>';
        echo '<tr><th><label for="completion_date">Completion Date</label></th><td><input type="date" id="completion_date" name="completion_date" value="' . esc_attr($completion_date) . '" /></td></tr>';
        echo '</table>';
    }
    
    /**
     * Testimonial meta box callback
     */
    public function testimonialMetaBox($post) {
        wp_nonce_field('testimonial_meta_box', 'testimonial_meta_box_nonce');
        
        $client_name = get_post_meta($post->ID, '_client_name', true);
        $client_position = get_post_meta($post->ID, '_client_position', true);
        $client_company = get_post_meta($post->ID, '_client_company', true);
        $rating = get_post_meta($post->ID, '_rating', true);
        $project_type = get_post_meta($post->ID, '_project_type', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="client_name">Client Name</label></th><td><input type="text" id="client_name" name="client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="client_position">Client Position</label></th><td><input type="text" id="client_position" name="client_position" value="' . esc_attr($client_position) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="client_company">Client Company</label></th><td><input type="text" id="client_company" name="client_company" value="' . esc_attr($client_company) . '" class="regular-text" /></td></tr>';
        echo '<tr><th><label for="rating">Rating (1-5)</label></th><td><input type="number" id="rating" name="rating" value="' . esc_attr($rating) . '" min="1" max="5" /></td></tr>';
        echo '<tr><th><label for="project_type">Project Type</label></th><td><input type="text" id="project_type" name="project_type" value="' . esc_attr($project_type) . '" class="regular-text" /></td></tr>';
        echo '</table>';
    }
    
    /**
     * Save meta box data
     */
    public function saveMetaBoxes($post_id) {
        // Check if user has permission to edit
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        // Save Case Study meta
        if (isset($_POST['case_study_meta_box_nonce']) && wp_verify_nonce($_POST['case_study_meta_box_nonce'], 'case_study_meta_box')) {
            $fields = ['client_name', 'project_url', 'duration', 'challenge', 'solution', 'results'];
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
        
        // Save Portfolio meta
        if (isset($_POST['portfolio_meta_box_nonce']) && wp_verify_nonce($_POST['portfolio_meta_box_nonce'], 'portfolio_meta_box')) {
            $fields = ['project_url', 'github_url', 'completion_date'];
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
                }
            }
            
            // Handle featured checkbox
            $is_featured = isset($_POST['is_featured']) ? 1 : 0;
            update_post_meta($post_id, '_is_featured', $is_featured);
        }
        
        // Save Testimonial meta
        if (isset($_POST['testimonial_meta_box_nonce']) && wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box')) {
            $fields = ['client_name', 'client_position', 'client_company', 'rating', 'project_type'];
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        // Register post types and taxonomies during activation
        $this->registerPostTypes();
        $this->registerTaxonomies();
        
        // Flush rewrite rules
        flush_rewrite_rules();
        
        // Set activation flag
        update_option('unobtuse_portfolio_activated', true);
        
        // Clear any existing notices
        delete_transient('unobtuse_portfolio_admin_notices');
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
        
        // Remove activation flag
        delete_option('unobtuse_portfolio_activated');
        
        // Clear notices
        delete_transient('unobtuse_portfolio_admin_notices');
    }
    
    /**
     * Check plugin dependencies
     */
    public function checkDependencies() {
        $notices = [];
        
        // Check if WPGraphQL is active (recommended)
        if (!class_exists('WPGraphQL')) {
            $notices[] = [
                'type' => 'notice-warning',
                'message' => __('Unobtuse Portfolio: WPGraphQL plugin is recommended for headless functionality. <a href="' . admin_url('plugin-install.php?s=wpgraphql&tab=search&type=term') . '">Install WPGraphQL</a>', 'unobtuse-portfolio')
            ];
        }
        
        // Check WordPress version
        if (version_compare(get_bloginfo('version'), '6.0', '<')) {
            $notices[] = [
                'type' => 'notice-error',
                'message' => __('Unobtuse Portfolio requires WordPress 6.0 or higher. Please update WordPress.', 'unobtuse-portfolio')
            ];
        }
        
        // Check PHP version
        if (version_compare(PHP_VERSION, '8.0', '<')) {
            $notices[] = [
                'type' => 'notice-error',
                'message' => __('Unobtuse Portfolio requires PHP 8.0 or higher. Your PHP version: ' . PHP_VERSION, 'unobtuse-portfolio')
            ];
        }
        
        // Display notices
        foreach ($notices as $notice) {
            printf(
                '<div class="notice %s is-dismissible"><p>%s</p></div>',
                esc_attr($notice['type']),
                wp_kses_post($notice['message'])
            );
        }
    }
    
    /**
     * Get plugin version
     */
    public function getVersion() {
        return UNOBTUSE_PORTFOLIO_VERSION;
    }
    
    /**
     * Register post types
     */
    public function registerPostTypes() {
        // Case Studies
        register_post_type('case_study', [
            'label' => 'Case Studies',
            'labels' => [
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
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
            'has_archive' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'caseStudy',
            'graphql_plural_name' => 'caseStudies',
        ]);
        
        // Portfolio Items
        register_post_type('portfolio_item', [
            'label' => 'Portfolio Items',
            'labels' => [
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
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-images-alt2',
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
            'has_archive' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'portfolioItem',
            'graphql_plural_name' => 'portfolioItems',
        ]);
        
        // Testimonials
        register_post_type('testimonial', [
            'label' => 'Testimonials',
            'labels' => [
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
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => ['title', 'editor', 'custom-fields'],
            'has_archive' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'testimonial',
            'graphql_plural_name' => 'testimonials',
        ]);
    }
    
    /**
     * Register taxonomies
     */
    public function registerTaxonomies() {
        // Case Study Categories
        register_taxonomy('case_study_category', ['case_study'], [
            'labels' => [
                'name' => 'Case Study Categories',
                'singular_name' => 'Case Study Category',
                'menu_name' => 'Categories',
            ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'caseStudyCategory',
            'graphql_plural_name' => 'caseStudyCategories',
        ]);
        
        // Portfolio Categories
        register_taxonomy('portfolio_category', ['portfolio_item'], [
            'labels' => [
                'name' => 'Portfolio Categories',
                'singular_name' => 'Portfolio Category',
                'menu_name' => 'Categories',
            ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'portfolioCategory',
            'graphql_plural_name' => 'portfolioCategories',
        ]);
        
        // Portfolio Technologies
        register_taxonomy('portfolio_technology', ['portfolio_item'], [
            'labels' => [
                'name' => 'Technologies',
                'singular_name' => 'Technology',
                'menu_name' => 'Technologies',
            ],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'portfolioTechnology',
            'graphql_plural_name' => 'portfolioTechnologies',
        ]);
    }
}

// Initialize the plugin
UnobtusePo::getInstance(); 