'use client'

import React, { useState } from 'react'
import { motion } from 'framer-motion'
import Link from 'next/link'
import { ExternalLink, Github, Eye } from 'lucide-react'

const PortfolioPage = () => {
  const [activeFilter, setActiveFilter] = useState('all')

  // Mock portfolio data - in real app, this would come from WordPress
  const portfolioItems = [
    {
      id: 1,
      title: 'Modern E-commerce Store',
      category: 'web-development',
      technologies: ['WordPress', 'WooCommerce', 'React', 'Stripe'],
      description: 'A fully responsive e-commerce platform with advanced filtering, wishlist functionality, and seamless checkout process.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: 'https://github.com/example',
      featured: true
    },
    {
      id: 2,
      title: 'Corporate Website Redesign',
      category: 'web-design',
      technologies: ['WordPress', 'Elementor', 'GSAP', 'CSS3'],
      description: 'Complete visual overhaul of a corporate website with focus on user experience and brand consistency.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: null,
      featured: true
    },
    {
      id: 3,
      title: 'Task Management Dashboard',
      category: 'web-app',
      technologies: ['React', 'Node.js', 'MongoDB', 'Socket.io'],
      description: 'Real-time collaborative task management application with team chat and project tracking.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: 'https://github.com/example',
      featured: false
    },
    {
      id: 4,
      title: 'Restaurant Website & Ordering',
      category: 'web-development',
      technologies: ['WordPress', 'WooCommerce', 'Maps API', 'PayPal'],
      description: 'Restaurant website with online ordering system, table reservations, and location finder.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: null,
      featured: false
    },
    {
      id: 5,
      title: 'Portfolio Website',
      category: 'web-design',
      technologies: ['Next.js', 'Tailwind CSS', 'Framer Motion', 'Contentful'],
      description: 'Clean and modern portfolio website for a photographer with gallery and contact features.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: 'https://github.com/example',
      featured: false
    },
    {
      id: 6,
      title: 'Learning Management System',
      category: 'web-app',
      technologies: ['WordPress', 'LearnDash', 'BuddyPress', 'Stripe'],
      description: 'Comprehensive LMS with course creation, progress tracking, and community features.',
      image: '/api/placeholder/800/600',
      projectUrl: 'https://example.com',
      githubUrl: null,
      featured: true
    }
  ]

  const categories = [
    { id: 'all', label: 'All Projects' },
    { id: 'web-development', label: 'Web Development' },
    { id: 'web-design', label: 'Web Design' },
    { id: 'web-app', label: 'Web Applications' }
  ]

  const filteredItems = activeFilter === 'all' 
    ? portfolioItems 
    : portfolioItems.filter(item => item.category === activeFilter)

  const featuredItems = portfolioItems.filter(item => item.featured)

  const fadeInUp = {
    initial: { opacity: 0, y: 60 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  }

  const handleFilterChange = (filterId: string) => {
    setActiveFilter(filterId)
  }

  const handleKeyDown = (event: React.KeyboardEvent, filterId: string) => {
    if (event.key === 'Enter' || event.key === ' ') {
      handleFilterChange(filterId)
    }
  }

  return (
    <div className="pt-16">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center text-white"
            variants={fadeInUp}
            initial="initial"
            animate="animate"
          >
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
              Portfolio
            </h1>
            <p className="text-xl sm:text-2xl mb-8 text-indigo-100 max-w-3xl mx-auto">
              A showcase of web development projects that combine creativity with functionality
            </p>
          </motion.div>
        </div>
      </section>

      {/* Featured Projects */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center mb-16"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Featured Projects
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Highlighted projects that showcase expertise and innovation
            </p>
          </motion.div>

          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            {featuredItems.slice(0, 2).map((item, index) => (
              <motion.div
                key={item.id}
                className="group bg-card border border-border rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.2 }}
              >
                <div className="aspect-video bg-muted relative overflow-hidden">
                  <div className="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 flex items-center justify-center">
                    <span className="text-muted-foreground text-sm">Project Preview</span>
                  </div>
                  <div className="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                    <div className="flex space-x-4">
                      {item.projectUrl && (
                        <a
                          href={item.projectUrl}
                          target="_blank"
                          rel="noopener noreferrer"
                          className="p-3 bg-white rounded-full hover:bg-gray-100 transition-colors"
                          aria-label={`View ${item.title} live site`}
                        >
                          <Eye className="h-5 w-5 text-gray-800" />
                        </a>
                      )}
                      {item.githubUrl && (
                        <a
                          href={item.githubUrl}
                          target="_blank"
                          rel="noopener noreferrer"
                          className="p-3 bg-white rounded-full hover:bg-gray-100 transition-colors"
                          aria-label={`View ${item.title} source code`}
                        >
                          <Github className="h-5 w-5 text-gray-800" />
                        </a>
                      )}
                    </div>
                  </div>
                </div>
                
                <div className="p-6">
                  <h3 className="text-xl font-semibold text-foreground mb-3">
                    {item.title}
                  </h3>
                  <p className="text-muted-foreground mb-4">
                    {item.description}
                  </p>
                  <div className="flex flex-wrap gap-2">
                    {item.technologies.map((tech, techIndex) => (
                      <span
                        key={techIndex}
                        className="px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full"
                      >
                        {tech}
                      </span>
                    ))}
                  </div>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Filter Section */}
      <section className="py-12 bg-muted border-y border-border">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="flex flex-wrap justify-center gap-4"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            {categories.map((category) => (
              <button
                key={category.id}
                onClick={() => handleFilterChange(category.id)}
                onKeyDown={(e) => handleKeyDown(e, category.id)}
                className={`px-6 py-3 rounded-lg font-medium transition-colors duration-200 ${
                  activeFilter === category.id
                    ? 'bg-primary text-primary-foreground'
                    : 'bg-background text-muted-foreground hover:bg-accent hover:text-accent-foreground'
                }`}
                aria-label={`Filter by ${category.label}`}
                tabIndex={0}
              >
                {category.label}
              </button>
            ))}
          </motion.div>
        </div>
      </section>

      {/* All Projects Grid */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center mb-16"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-4">
              All Projects
            </h2>
          </motion.div>

          <motion.div
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
            layout
          >
            {filteredItems.map((item, index) => (
              <motion.div
                key={item.id}
                className="group bg-card border border-border rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.1 }}
                layout
              >
                <div className="aspect-video bg-muted relative overflow-hidden">
                  <div className="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                    <span className="text-muted-foreground text-sm">Project Preview</span>
                  </div>
                  <div className="absolute top-4 right-4 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    {item.projectUrl && (
                      <a
                        href={item.projectUrl}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="p-2 bg-white/90 rounded-full hover:bg-white transition-colors"
                        aria-label={`View ${item.title} live site`}
                      >
                        <ExternalLink className="h-4 w-4 text-gray-800" />
                      </a>
                    )}
                    {item.githubUrl && (
                      <a
                        href={item.githubUrl}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="p-2 bg-white/90 rounded-full hover:bg-white transition-colors"
                        aria-label={`View ${item.title} source code`}
                      >
                        <Github className="h-4 w-4 text-gray-800" />
                      </a>
                    )}
                  </div>
                </div>
                
                <div className="p-6">
                  <h3 className="text-lg font-semibold text-foreground mb-2 group-hover:text-primary transition-colors">
                    {item.title}
                  </h3>
                  <p className="text-muted-foreground text-sm mb-4 line-clamp-2">
                    {item.description}
                  </p>
                  <div className="flex flex-wrap gap-1">
                    {item.technologies.slice(0, 3).map((tech, techIndex) => (
                      <span
                        key={techIndex}
                        className="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded"
                      >
                        {tech}
                      </span>
                    ))}
                    {item.technologies.length > 3 && (
                      <span className="px-2 py-1 bg-muted text-muted-foreground text-xs font-medium rounded">
                        +{item.technologies.length - 3}
                      </span>
                    )}
                  </div>
                </div>
              </motion.div>
            ))}
          </motion.div>

          {filteredItems.length === 0 && (
            <motion.div
              className="text-center py-12"
              variants={fadeInUp}
              initial="initial"
              animate="animate"
            >
              <p className="text-muted-foreground text-lg">
                No projects found for this category.
              </p>
            </motion.div>
          )}
        </div>
      </section>
    </div>
  )
}

export default PortfolioPage 