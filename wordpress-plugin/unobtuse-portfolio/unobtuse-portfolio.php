<?php
/**
 * Plugin Name: Unobtuse Portfolio
 * Plugin URI: https://github.com/unobtuse/unobtuse-headless-wordpress-portfolio
 * Description: Custom post types, taxonomies, and fields for Unobtuse headless WordPress portfolio site. Integrates with WPGraphQL for headless frontend.
 * Version: 1.0.0
 * Author: Gabriel - Unobtuse
 * Author URI: https://unobtuse.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: unobtuse-portfolio
 * Domain Path: /languages
 * Requires at least: 5.8
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Network: false
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('UNOBTUSE_PORTFOLIO_VERSION', '1.0.0');
define('UNOBTUSE_PORTFOLIO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('UNOBTUSE_PORTFOLIO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('UNOBTUSE_PORTFOLIO_PLUGIN_BASENAME', plugin_basename(__FILE__));

/**
 * Main Unobtuse Portfolio Plugin Class
 */
class Unobtuse_Portfolio {
    
    /**
     * Single instance of the class
     */
    private static $instance = null;
    
    /**
     * Get single instance of the class
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->init_hooks();
        $this->load_dependencies();
    }
    
    /**
     * Initialize hooks
     */
    private function init_hooks() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        
        add_action('init', array($this, 'init'));
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }
    
    /**
     * Load plugin dependencies
     */
    private function load_dependencies() {
        require_once UNOBTUSE_PORTFOLIO_PLUGIN_DIR . 'includes/class-post-types.php';
        require_once UNOBTUSE_PORTFOLIO_PLUGIN_DIR . 'includes/class-taxonomies.php';
        require_once UNOBTUSE_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-fields.php';
        require_once UNOBTUSE_PORTFOLIO_PLUGIN_DIR . 'includes/class-wpgraphql-integration.php';
    }
    
    /**
     * Initialize plugin
     */
    public function init() {
        // Initialize components
        new Unobtuse_Portfolio_Post_Types();
        new Unobtuse_Portfolio_Taxonomies();
        new Unobtuse_Portfolio_Custom_Fields();
        
        // Initialize WPGraphQL integration if WPGraphQL is active
        if (class_exists('WPGraphQL')) {
            new Unobtuse_Portfolio_WPGraphQL_Integration();
        }
    }
    
    /**
     * Load plugin text domain
     */
    public function load_textdomain() {
        load_plugin_textdomain(
            'unobtuse-portfolio',
            false,
            dirname(UNOBTUSE_PORTFOLIO_PLUGIN_BASENAME) . '/languages/'
        );
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        // Initialize components for activation
        new Unobtuse_Portfolio_Post_Types();
        new Unobtuse_Portfolio_Taxonomies();
        
        // Flush rewrite rules
        flush_rewrite_rules();
        
        // Set default options
        $this->set_default_options();
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
    
    /**
     * Set default plugin options
     */
    private function set_default_options() {
        $defaults = array(
            'enable_case_studies' => true,
            'enable_portfolio_items' => true,
            'enable_testimonials' => true,
            'portfolio_slug' => 'portfolio',
            'case_studies_slug' => 'case-studies',
            'testimonials_slug' => 'testimonials'
        );
        
        foreach ($defaults as $key => $value) {
            if (false === get_option('unobtuse_portfolio_' . $key)) {
                add_option('unobtuse_portfolio_' . $key, $value);
            }
        }
    }
    
    /**
     * Get plugin option
     */
    public static function get_option($key, $default = false) {
        return get_option('unobtuse_portfolio_' . $key, $default);
    }
}

// Initialize the plugin
function unobtuse_portfolio_init() {
    return Unobtuse_Portfolio::get_instance();
}

// Start the plugin
unobtuse_portfolio_init(); 