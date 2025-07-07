<?php
/**
 * Custom Fields Class
 * 
 * Handles registration of custom fields for portfolio content types
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Unobtuse_Portfolio_Custom_Fields {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', array($this, 'register_meta_fields'));
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_meta_fields'));
        
        // ACF integration if available
        if (function_exists('acf_add_local_field_group')) {
            add_action('acf/init', array($this, 'register_acf_fields'));
        }
    }
    
    /**
     * Register meta fields
     */
    public function register_meta_fields() {
        // Case Study meta fields
        register_meta('post', 'case_study_client_name', array(
            'type'              => 'string',
            'description'       => 'Client name for the case study',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'case_study_project_url', array(
            'type'              => 'string',
            'description'       => 'URL of the completed project',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'case_study_duration', array(
            'type'              => 'string',
            'description'       => 'Project duration',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'case_study_challenge', array(
            'type'              => 'string',
            'description'       => 'Main challenge or problem solved',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'case_study_solution', array(
            'type'              => 'string',
            'description'       => 'Solution implemented',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'case_study_results', array(
            'type'              => 'string',
            'description'       => 'Results and outcomes',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        // Portfolio Item meta fields
        register_meta('post', 'portfolio_project_url', array(
            'type'              => 'string',
            'description'       => 'URL of the portfolio project',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'portfolio_github_url', array(
            'type'              => 'string',
            'description'       => 'GitHub repository URL',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'portfolio_is_featured', array(
            'type'              => 'boolean',
            'description'       => 'Whether this portfolio item is featured',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'portfolio_completion_date', array(
            'type'              => 'string',
            'description'       => 'Project completion date',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        // Testimonial meta fields
        register_meta('post', 'testimonial_client_name', array(
            'type'              => 'string',
            'description'       => 'Client name for the testimonial',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'testimonial_client_position', array(
            'type'              => 'string',
            'description'       => 'Client position/title',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'testimonial_client_company', array(
            'type'              => 'string',
            'description'       => 'Client company name',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'testimonial_rating', array(
            'type'              => 'number',
            'description'       => 'Rating out of 5',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
        
        register_meta('post', 'testimonial_project_type', array(
            'type'              => 'string',
            'description'       => 'Type of project the testimonial is for',
            'single'            => true,
            'show_in_rest'      => true,
            'auth_callback'     => '__return_true',
        ));
    }
    
    /**
     * Add meta boxes
     */
    public function add_meta_boxes() {
        add_meta_box(
            'case_study_details',
            __('Case Study Details', 'unobtuse-portfolio'),
            array($this, 'case_study_meta_box'),
            'case_study',
            'normal',
            'high'
        );
        
        add_meta_box(
            'portfolio_details',
            __('Portfolio Details', 'unobtuse-portfolio'),
            array($this, 'portfolio_meta_box'),
            'portfolio_item',
            'normal',
            'high'
        );
        
        add_meta_box(
            'testimonial_details',
            __('Testimonial Details', 'unobtuse-portfolio'),
            array($this, 'testimonial_meta_box'),
            'testimonial',
            'normal',
            'high'
        );
    }
    
    /**
     * Case Study meta box
     */
    public function case_study_meta_box($post) {
        wp_nonce_field('case_study_meta_box', 'case_study_meta_box_nonce');
        
        $client_name = get_post_meta($post->ID, 'case_study_client_name', true);
        $project_url = get_post_meta($post->ID, 'case_study_project_url', true);
        $duration = get_post_meta($post->ID, 'case_study_duration', true);
        $challenge = get_post_meta($post->ID, 'case_study_challenge', true);
        $solution = get_post_meta($post->ID, 'case_study_solution', true);
        $results = get_post_meta($post->ID, 'case_study_results', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="case_study_client_name">' . __('Client Name', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="case_study_client_name" name="case_study_client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="case_study_project_url">' . __('Project URL', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="url" id="case_study_project_url" name="case_study_project_url" value="' . esc_attr($project_url) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="case_study_duration">' . __('Duration', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="case_study_duration" name="case_study_duration" value="' . esc_attr($duration) . '" class="regular-text" placeholder="e.g., 3 months" /></td></tr>';
        
        echo '<tr><th><label for="case_study_challenge">' . __('Challenge', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><textarea id="case_study_challenge" name="case_study_challenge" rows="4" class="large-text">' . esc_textarea($challenge) . '</textarea></td></tr>';
        
        echo '<tr><th><label for="case_study_solution">' . __('Solution', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><textarea id="case_study_solution" name="case_study_solution" rows="4" class="large-text">' . esc_textarea($solution) . '</textarea></td></tr>';
        
        echo '<tr><th><label for="case_study_results">' . __('Results', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><textarea id="case_study_results" name="case_study_results" rows="4" class="large-text">' . esc_textarea($results) . '</textarea></td></tr>';
        echo '</table>';
    }
    
    /**
     * Portfolio meta box
     */
    public function portfolio_meta_box($post) {
        wp_nonce_field('portfolio_meta_box', 'portfolio_meta_box_nonce');
        
        $project_url = get_post_meta($post->ID, 'portfolio_project_url', true);
        $github_url = get_post_meta($post->ID, 'portfolio_github_url', true);
        $is_featured = get_post_meta($post->ID, 'portfolio_is_featured', true);
        $completion_date = get_post_meta($post->ID, 'portfolio_completion_date', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="portfolio_project_url">' . __('Project URL', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="url" id="portfolio_project_url" name="portfolio_project_url" value="' . esc_attr($project_url) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="portfolio_github_url">' . __('GitHub URL', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="url" id="portfolio_github_url" name="portfolio_github_url" value="' . esc_attr($github_url) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="portfolio_is_featured">' . __('Featured Project', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="checkbox" id="portfolio_is_featured" name="portfolio_is_featured" value="1" ' . checked(1, $is_featured, false) . ' /> ' . __('Mark as featured project', 'unobtuse-portfolio') . '</td></tr>';
        
        echo '<tr><th><label for="portfolio_completion_date">' . __('Completion Date', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="date" id="portfolio_completion_date" name="portfolio_completion_date" value="' . esc_attr($completion_date) . '" class="regular-text" /></td></tr>';
        echo '</table>';
    }
    
    /**
     * Testimonial meta box
     */
    public function testimonial_meta_box($post) {
        wp_nonce_field('testimonial_meta_box', 'testimonial_meta_box_nonce');
        
        $client_name = get_post_meta($post->ID, 'testimonial_client_name', true);
        $client_position = get_post_meta($post->ID, 'testimonial_client_position', true);
        $client_company = get_post_meta($post->ID, 'testimonial_client_company', true);
        $rating = get_post_meta($post->ID, 'testimonial_rating', true);
        $project_type = get_post_meta($post->ID, 'testimonial_project_type', true);
        
        echo '<table class="form-table">';
        echo '<tr><th><label for="testimonial_client_name">' . __('Client Name', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="testimonial_client_name" name="testimonial_client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="testimonial_client_position">' . __('Client Position', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="testimonial_client_position" name="testimonial_client_position" value="' . esc_attr($client_position) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="testimonial_client_company">' . __('Company', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="testimonial_client_company" name="testimonial_client_company" value="' . esc_attr($client_company) . '" class="regular-text" /></td></tr>';
        
        echo '<tr><th><label for="testimonial_rating">' . __('Rating', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><select id="testimonial_rating" name="testimonial_rating">';
        for ($i = 1; $i <= 5; $i++) {
            echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
        }
        echo '</select></td></tr>';
        
        echo '<tr><th><label for="testimonial_project_type">' . __('Project Type', 'unobtuse-portfolio') . '</label></th>';
        echo '<td><input type="text" id="testimonial_project_type" name="testimonial_project_type" value="' . esc_attr($project_type) . '" class="regular-text" placeholder="e.g., WordPress Website, E-commerce Store" /></td></tr>';
        echo '</table>';
    }
    
    /**
     * Save meta fields
     */
    public function save_meta_fields($post_id) {
        // Check if user has permission to edit
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        // Case Study fields
        if (isset($_POST['case_study_meta_box_nonce']) && wp_verify_nonce($_POST['case_study_meta_box_nonce'], 'case_study_meta_box')) {
            $fields = array('case_study_client_name', 'case_study_project_url', 'case_study_duration', 'case_study_challenge', 'case_study_solution', 'case_study_results');
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
        
        // Portfolio fields
        if (isset($_POST['portfolio_meta_box_nonce']) && wp_verify_nonce($_POST['portfolio_meta_box_nonce'], 'portfolio_meta_box')) {
            $fields = array('portfolio_project_url', 'portfolio_github_url', 'portfolio_completion_date');
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
            
            // Handle featured checkbox
            $is_featured = isset($_POST['portfolio_is_featured']) ? 1 : 0;
            update_post_meta($post_id, 'portfolio_is_featured', $is_featured);
        }
        
        // Testimonial fields
        if (isset($_POST['testimonial_meta_box_nonce']) && wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box')) {
            $fields = array('testimonial_client_name', 'testimonial_client_position', 'testimonial_client_company', 'testimonial_rating', 'testimonial_project_type');
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
    }
    
    /**
     * Register ACF fields (if ACF is available)
     */
    public function register_acf_fields() {
        // Case Study ACF Fields
        acf_add_local_field_group(array(
            'key' => 'group_case_study',
            'title' => 'Case Study Details',
            'fields' => array(
                array(
                    'key' => 'field_case_study_client_name',
                    'label' => 'Client Name',
                    'name' => 'case_study_client_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_case_study_project_url',
                    'label' => 'Project URL',
                    'name' => 'case_study_project_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_case_study_duration',
                    'label' => 'Project Duration',
                    'name' => 'case_study_duration',
                    'type' => 'text',
                    'placeholder' => 'e.g., 3 months',
                ),
                array(
                    'key' => 'field_case_study_challenge',
                    'label' => 'Challenge',
                    'name' => 'case_study_challenge',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_case_study_solution',
                    'label' => 'Solution',
                    'name' => 'case_study_solution',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_case_study_results',
                    'label' => 'Results',
                    'name' => 'case_study_results',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'case_study',
                    ),
                ),
            ),
            'show_in_graphql' => 1,
            'graphql_field_name' => 'caseStudyDetails',
        ));
        
        // Portfolio ACF Fields
        acf_add_local_field_group(array(
            'key' => 'group_portfolio',
            'title' => 'Portfolio Details',
            'fields' => array(
                array(
                    'key' => 'field_portfolio_project_url',
                    'label' => 'Project URL',
                    'name' => 'portfolio_project_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_portfolio_github_url',
                    'label' => 'GitHub URL',
                    'name' => 'portfolio_github_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_portfolio_is_featured',
                    'label' => 'Featured Project',
                    'name' => 'portfolio_is_featured',
                    'type' => 'true_false',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_portfolio_completion_date',
                    'label' => 'Completion Date',
                    'name' => 'portfolio_completion_date',
                    'type' => 'date_picker',
                    'display_format' => 'M j, Y',
                    'return_format' => 'Y-m-d',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'portfolio_item',
                    ),
                ),
            ),
            'show_in_graphql' => 1,
            'graphql_field_name' => 'portfolioDetails',
        ));
        
        // Testimonial ACF Fields
        acf_add_local_field_group(array(
            'key' => 'group_testimonial',
            'title' => 'Testimonial Details',
            'fields' => array(
                array(
                    'key' => 'field_testimonial_client_name',
                    'label' => 'Client Name',
                    'name' => 'testimonial_client_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_testimonial_client_position',
                    'label' => 'Client Position',
                    'name' => 'testimonial_client_position',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_client_company',
                    'label' => 'Company',
                    'name' => 'testimonial_client_company',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_rating',
                    'label' => 'Rating',
                    'name' => 'testimonial_rating',
                    'type' => 'select',
                    'choices' => array(
                        '5' => '5 Stars',
                        '4' => '4 Stars',
                        '3' => '3 Stars',
                        '2' => '2 Stars',
                        '1' => '1 Star',
                    ),
                    'default_value' => '5',
                ),
                array(
                    'key' => 'field_testimonial_project_type',
                    'label' => 'Project Type',
                    'name' => 'testimonial_project_type',
                    'type' => 'text',
                    'placeholder' => 'e.g., WordPress Website, E-commerce Store',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'testimonial',
                    ),
                ),
            ),
            'show_in_graphql' => 1,
            'graphql_field_name' => 'testimonialDetails',
        ));
    }
} 