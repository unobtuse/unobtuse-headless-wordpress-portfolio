# WordPress Plugin Setup Guide

## Quick Installation

1. **Upload Plugin to WordPress**
   - Copy the entire `wordpress-plugin/unobtuse-portfolio/` folder
   - Upload to your WordPress installation at `/wp-content/plugins/`
   - Or zip the folder and upload via WordPress Admin → Plugins → Add New

2. **Install Required Dependencies**
   ```bash
   # Install WPGraphQL (required for headless functionality)
   wp plugin install wp-graphql --activate
   
   # Install Advanced Custom Fields (optional, for better admin experience)
   wp plugin install advanced-custom-fields --activate
   ```

3. **Activate the Plugin**
   - Go to WordPress Admin → Plugins
   - Find "Unobtuse Portfolio" and click Activate

## Configuration

### Custom Post Types Created
- **Case Studies** (`/case-studies/`) - Client project showcases
- **Portfolio** (`/portfolio/`) - Personal projects and work
- **Testimonials** (`/testimonials/`) - Client reviews

### GraphQL Endpoint
Your GraphQL endpoint will be available at:
```
https://your-wordpress-site.com/graphql
```

### Sample Content Creation

1. **Create a Case Study**
   - Go to Case Studies → Add New
   - Fill in client name, project URL, challenge, solution, results
   - Assign categories like "E-commerce", "Healthcare", etc.
   - Add technologies used: "WordPress", "React", "PHP"

2. **Create Portfolio Items**
   - Go to Portfolio → Add New
   - Add project URL and GitHub URL
   - Mark as "Featured" for homepage display
   - Assign categories: "Web Development", "Design", "Web App"

3. **Add Testimonials**
   - Go to Testimonials → Add New
   - Add client details and rating
   - Set featured image as client photo

### Frontend Integration

Update your `.env.local` file:
```
WORDPRESS_API_URL=https://your-wordpress-site.com/graphql
NEXT_PUBLIC_WORDPRESS_API_URL=https://your-wordpress-site.com/graphql
```

Test the connection by visiting `/test-connection` on your Next.js site.

## Next Steps

1. **Populate Content**: Add real case studies, portfolio items, and testimonials
2. **Update Frontend**: Replace mock data in Next.js pages with real GraphQL queries
3. **Customize**: Modify post type slugs and settings as needed
4. **Deploy**: Push changes and deploy both WordPress and Next.js sites

---

**The plugin is now ready to power your headless portfolio site!** 🚀 