# Unobtuse Portfolio WordPress Plugin

A comprehensive WordPress plugin that registers custom post types, taxonomies, and fields for a headless portfolio website. Designed to work seamlessly with WPGraphQL for modern headless WordPress implementations.

## Features

### Custom Post Types
- **Case Studies** - Showcase client projects with detailed challenge/solution/results sections
- **Portfolio Items** - Display personal projects with GitHub links and featured status
- **Testimonials** - Client reviews and feedback with ratings

### Custom Taxonomies
- **Case Study Categories** - Organize case studies by project type
- **Case Study Technologies** - Tag technologies used in case studies
- **Portfolio Categories** - Categorize portfolio items
- **Portfolio Technologies** - Tag technologies used in portfolio
- **Portfolio Skills** - Organize by skill sets demonstrated

### Custom Fields
- **Case Studies**: Client name, project URL, duration, challenge, solution, results
- **Portfolio Items**: Project URL, GitHub URL, featured status, completion date
- **Testimonials**: Client name, position, company, rating, project type

### WPGraphQL Integration
- All custom post types and fields exposed to GraphQL API
- Custom queries for featured items, latest content, and statistics
- Advanced filtering and sorting capabilities
- Optimized for headless frontend consumption

## Requirements

- WordPress 5.8 or higher
- PHP 7.4 or higher
- WPGraphQL plugin (for headless functionality)
- Advanced Custom Fields (optional, for enhanced admin experience)

## Installation

### Via WordPress Admin
1. Download the plugin zip file
2. Go to WordPress Admin → Plugins → Add New
3. Click "Upload Plugin" and select the zip file
4. Activate the plugin

### Manual Installation
1. Upload the `unobtuse-portfolio` folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin

### Via Composer
```bash
composer require unobtuse/unobtuse-portfolio-plugin
```

## Configuration

### Basic Setup
1. Activate the plugin
2. Install and activate WPGraphQL plugin
3. Navigate to the new post types in your WordPress admin:
   - Case Studies
   - Portfolio
   - Testimonials

### WPGraphQL Setup
The plugin automatically registers all content types with WPGraphQL when the plugin is active. No additional configuration needed.

### Custom Field Groups
If Advanced Custom Fields is installed, the plugin will automatically create user-friendly field groups. Otherwise, it falls back to native WordPress meta boxes.

## Usage

### Creating Content

#### Case Studies
1. Go to Case Studies → Add New
2. Fill in the title, content, and featured image
3. Complete the Case Study Details meta box:
   - Client Name
   - Project URL
   - Duration
   - Challenge
   - Solution
   - Results
4. Assign categories and technologies
5. Publish

#### Portfolio Items
1. Go to Portfolio → Add New
2. Add title, description, and featured image
3. Complete Portfolio Details:
   - Project URL
   - GitHub URL (optional)
   - Mark as featured (optional)
   - Completion Date
4. Assign categories, technologies, and skills
5. Publish

#### Testimonials
1. Go to Testimonials → Add New
2. Add the testimonial content as the post content
3. Complete Testimonial Details:
   - Client Name
   - Client Position
   - Company
   - Rating (1-5 stars)
   - Project Type
4. Add client photo as featured image
5. Publish

### GraphQL Queries

#### Get Featured Portfolio Items
```graphql
query GetFeaturedPortfolio {
  featuredPortfolioItems(first: 6) {
    id
    title
    excerpt
    featuredImage {
      node {
        sourceUrl
        altText
      }
    }
    projectUrl
    githubUrl
    isFeatured
    completionDate
    portfolioCategories {
      nodes {
        name
        slug
      }
    }
    portfolioTechnologies {
      nodes {
        name
        slug
      }
    }
  }
}
```

#### Get Latest Case Studies
```graphql
query GetCaseStudies {
  latestCaseStudies(first: 6, category: "web-development") {
    id
    title
    excerpt
    featuredImage {
      node {
        sourceUrl
        altText
      }
    }
    clientName
    projectUrl
    duration
    challenge
    solution
    results
    caseStudyCategories {
      nodes {
        name
        slug
      }
    }
  }
}
```

#### Get Portfolio Statistics
```graphql
query GetPortfolioStats {
  portfolioStats {
    caseStudiesCount
    portfolioItemsCount
    testimonialsCount
    featuredItemsCount
  }
}
```

#### Get Random Testimonials
```graphql
query GetTestimonials {
  randomTestimonials(first: 3) {
    id
    title
    content
    featuredImage {
      node {
        sourceUrl
        altText
      }
    }
    clientName
    clientPosition
    clientCompany
    rating
    projectType
  }
}
```

## Customization

### Changing Post Type Slugs
You can customize the URL slugs by adding these options to your `wp_options` table or using the WordPress Customizer:

```php
// Change case studies slug from /case-studies/ to /projects/
update_option('unobtuse_portfolio_case_studies_slug', 'projects');

// Change portfolio slug from /portfolio/ to /work/
update_option('unobtuse_portfolio_portfolio_slug', 'work');
```

### Disabling Post Types
```php
// Disable testimonials if not needed
update_option('unobtuse_portfolio_enable_testimonials', false);
```

### Custom Hooks
The plugin provides several hooks for customization:

```php
// Modify case study meta fields
add_filter('unobtuse_portfolio_case_study_fields', 'my_custom_fields');

// Add custom GraphQL fields
add_action('unobtuse_portfolio_graphql_fields', 'my_custom_graphql_fields');
```

## Development

### File Structure
```
unobtuse-portfolio/
├── unobtuse-portfolio.php          # Main plugin file
├── includes/
│   ├── class-post-types.php        # Custom post types registration
│   ├── class-taxonomies.php        # Custom taxonomies registration
│   ├── class-custom-fields.php     # Meta fields and ACF integration
│   └── class-wpgraphql-integration.php # GraphQL API integration
├── languages/                      # Translation files
└── README.md                       # This file
```

### Contributing
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## Support

For support, please create an issue on the GitHub repository or contact [hello@unobtuse.com](mailto:hello@unobtuse.com).

## License

This plugin is licensed under the GPL v2 or later.

## Changelog

### 1.0.0
- Initial release
- Custom post types for Case Studies, Portfolio Items, and Testimonials
- Custom taxonomies for categorization and tagging
- Complete WPGraphQL integration
- Advanced Custom Fields support
- Native WordPress meta boxes fallback
- Custom GraphQL queries and statistics

---

**Built with ❤️ by [Unobtuse](https://unobtuse.com)** 