# Unobtuse - Headless WordPress Portfolio

A modern, headless WordPress portfolio website built with Next.js 14, TypeScript, TailwindCSS, and Framer Motion. This project showcases professional web development and design services with a focus on performance, accessibility, and user experience.

## 🚀 Features

- **Modern Stack**: Next.js 14 with App Router, TypeScript, TailwindCSS
- **Animations**: Smooth animations with Framer Motion
- **Responsive Design**: Mobile-first approach with perfect responsiveness
- **Accessibility**: WCAG compliant with proper ARIA labels and keyboard navigation
- **Performance Optimized**: Fast loading times and optimized assets
- **Headless CMS**: WordPress integration via GraphQL
- **Component Library**: shadcn/ui components with consistent design system
- **SEO Optimized**: Meta tags, OpenGraph, and structured data

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- Node.js 18.17 or higher
- npm or yarn package manager
- Git

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/unobtuse/unobtuse-headless-wordpress-portfolio.git
   cd unobtuse-headless-wordpress-portfolio
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Set up environment variables**
   - Copy the example environment file:
     ```bash
     cp env.example .env.local
     ```
   - Update the variables in `.env.local`:
     ```
     WORDPRESS_API_URL=https://your-wordpress-site.com/graphql
     NEXT_PUBLIC_WORDPRESS_API_URL=https://your-wordpress-site.com/graphql
     ```

4. **Run the development server**
   ```bash
   npm run dev
   ```

5. **Open your browser**
   Navigate to [http://localhost:3000](http://localhost:3000) to see the application.
   
   **Note:** If port 3000 is in use, Next.js will automatically use the next available port (e.g., 3001).

## 🏗️ Project Structure

```
unobtuse-headless-wordpress-portfolio/
├── app/                    # Next.js 14 App Router
│   ├── about/             # About Gabriel page
│   ├── case-studies/      # Case studies page
│   ├── design-process/    # Design process page
│   ├── portfolio/         # Portfolio page
│   ├── wordpress-development/ # WordPress development page
│   ├── globals.css        # Global styles
│   ├── layout.tsx         # Root layout
│   └── page.tsx           # Home page
├── components/            # Reusable components
│   ├── ui/               # shadcn/ui components
│   ├── Navigation.tsx    # Main navigation
│   └── Footer.tsx        # Footer component
├── lib/                  # Utility functions
│   ├── apollo-client.ts  # GraphQL client setup
│   └── queries.ts        # GraphQL queries
├── types/                # TypeScript type definitions
│   └── wordpress.ts      # WordPress data types
├── public/               # Static assets
│   ├── logos/           # Brand logos
│   └── bg.mp4           # Background video
└── README.md            # Project documentation
```

## 🎨 Customization

### Styling
- The project uses TailwindCSS with a custom design system
- Color scheme and design tokens are defined in `tailwind.config.ts`
- Global styles are in `app/globals.css`

### Content
- Page content is currently static but structured for easy WordPress integration
- Update content in individual page components in the `app/` directory
- Replace placeholder data with actual WordPress content via GraphQL

### Components
- All components are built with accessibility in mind
- Reusable UI components are in `components/ui/`
- Page-specific components are in their respective page directories

## 🔌 WordPress Integration

This project is designed to work with a headless WordPress setup:

1. **Install Required WordPress Plugins**
   ```
   - WPGraphQL
   - WPGraphQL for Advanced Custom Fields (if using ACF)
   - WPGraphQL CORS
   ```

2. **Configure WordPress**
   - Enable WPGraphQL in your WordPress admin
   - Set up CORS settings for your domain
   - Create custom post types for case studies and portfolio items

3. **Update GraphQL Queries**
   - Modify queries in `lib/queries.ts` to match your WordPress schema
   - Update TypeScript types in `types/wordpress.ts`

## 🚀 Deployment

### Vercel (Recommended)
1. Push your code to GitHub
2. Connect your repository to Vercel
3. Set environment variables in Vercel dashboard
4. Deploy with automatic builds on push

### Netlify
1. Build the project: `npm run build`
2. Deploy the `out` folder to Netlify
3. Set environment variables in Netlify dashboard

### Custom Server
1. Build the project: `npm run build`
2. Start the production server: `npm start`
3. Configure reverse proxy (nginx/Apache) if needed

## 📦 Scripts

- `npm run dev` - Start development server
- `npm run build` - Build for production
- `npm run start` - Start production server
- `npm run lint` - Run ESLint
- `npm run type-check` - Run TypeScript type checking

## 🧪 Testing

- Run linting: `npm run lint`
- Type checking: `npm run type-check`
- Manual testing: Test all routes and interactive elements

## 📝 Environment Variables

| Variable | Description | Required |
|----------|-------------|----------|
| `WORDPRESS_API_URL` | WordPress GraphQL endpoint (server-side) | Yes |
| `NEXT_PUBLIC_WORDPRESS_API_URL` | WordPress GraphQL endpoint (client-side) | Yes |

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Commit your changes: `git commit -m 'Add amazing feature'`
4. Push to the branch: `git push origin feature/amazing-feature`
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📋 Changelog

### v1.1.1 - 2025-01-13

#### 📝 Documentation & Workflow Updates
- **Added changelog workflow** to .cursorrules for consistent commit documentation
- **Created comprehensive changelog** documenting all recent changes
- **Updated git workflow rules** to require README changelog updates with each commit
- **Established version tracking** with proper markdown formatting

### v1.1.0 - 2025-01-13

#### 🌙 Dark Mode Implementation (commit: 87c1810)
- **Added complete dark mode theme system** with toggle functionality
- **Theme Context Provider** with localStorage persistence and system preference detection
- **Dynamic logo switching** between black (light) and white (dark) variants
- **Theme toggle buttons** in desktop and mobile navigation with sun/moon icons
- **Hydration protection** to prevent flash of unstyled content

#### 🔧 Development Environment Updates (commit: 87c1810)
- **Added EC2 development environment** configuration to .cursorrules
- **WordPress CLI management** instructions and common commands
- **Site architecture clarification** (frontend vs backend URLs)
- **Development server management** rules for process handling
- **WordPress URL configuration** fixed for subdirectory installation

#### 🎨 UI/UX Improvements (commit: e14eabd)
- **Redesigned Design Process timeline** with proper vertical layout
- **Connected timeline nodes** with alternating left/right content
- **Fixed navigation alignment** issues (items-baseline → items-center)
- **Enhanced responsive behavior** with improved spacing
- **Visual consistency** improvements across all components

#### 📝 Documentation Updates
- **Updated .cursorrules** with comprehensive development guidelines
- **Added changelog workflow** to git commit process
- **Environment variable examples** for beta.unobtuse.com setup

## 🙏 Acknowledgments

- **shadcn/ui** for the component library
- **Framer Motion** for smooth animations
- **TailwindCSS** for utility-first styling
- **Lucide React** for beautiful icons
- **Next.js** team for the amazing framework

## 📞 Support

For support or questions:
- Email: hello@unobtuse.com
- GitHub Issues: [Create an issue](https://github.com/unobtuse/unobtuse-headless-wordpress-portfolio/issues)

---

Built with ❤️ by Gabriel at Unobtuse 