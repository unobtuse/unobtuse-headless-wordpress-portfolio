'use client'

import React, { useState } from 'react'
import { motion } from 'framer-motion'
import Link from 'next/link'
import { ExternalLink, Calendar, Tag } from 'lucide-react'

const CaseStudiesPage = () => {
  const [activeFilter, setActiveFilter] = useState('all')

  // Mock case studies data - in real app, this would come from WordPress
  const caseStudies = [
    {
      id: 1,
      title: 'E-commerce Platform Redesign',
      excerpt: 'Complete redesign of a luxury fashion e-commerce platform resulting in 45% increase in conversions.',
      category: 'e-commerce',
      technologies: ['WordPress', 'WooCommerce', 'React', 'GraphQL'],
      date: '2024',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'ecommerce-platform-redesign'
    },
    {
      id: 2,
      title: 'Healthcare Portal Development',
      excerpt: 'Modern patient portal with appointment booking, medical records, and telemedicine integration.',
      category: 'healthcare',
      technologies: ['WordPress', 'Custom PHP', 'Vue.js', 'MySQL'],
      date: '2024',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'healthcare-portal-development'
    },
    {
      id: 3,
      title: 'Non-Profit Organization Website',
      excerpt: 'Donation platform and volunteer management system for a global non-profit organization.',
      category: 'non-profit',
      technologies: ['WordPress', 'Elementor', 'Stripe', 'MailChimp'],
      date: '2023',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'non-profit-organization-website'
    },
    {
      id: 4,
      title: 'Restaurant Chain Management System',
      excerpt: 'Multi-location restaurant management system with online ordering and inventory tracking.',
      category: 'restaurant',
      technologies: ['WordPress', 'WooCommerce', 'React Native', 'Node.js'],
      date: '2023',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'restaurant-chain-management-system'
    },
    {
      id: 5,
      title: 'Corporate Learning Platform',
      excerpt: 'Enterprise learning management system with course creation and progress tracking.',
      category: 'education',
      technologies: ['WordPress', 'LearnDash', 'React', 'Firebase'],
      date: '2023',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'corporate-learning-platform'
    },
    {
      id: 6,
      title: 'Real Estate Marketplace',
      excerpt: 'Property listing platform with advanced search, virtual tours, and agent management.',
      category: 'real-estate',
      technologies: ['WordPress', 'Custom Post Types', 'Google Maps', 'Zillow API'],
      date: '2022',
      image: '/api/placeholder/600/400',
      projectUrl: '#',
      slug: 'real-estate-marketplace'
    }
  ]

  const categories = [
    { id: 'all', label: 'All Projects' },
    { id: 'e-commerce', label: 'E-commerce' },
    { id: 'healthcare', label: 'Healthcare' },
    { id: 'non-profit', label: 'Non-Profit' },
    { id: 'restaurant', label: 'Restaurant' },
    { id: 'education', label: 'Education' },
    { id: 'real-estate', label: 'Real Estate' }
  ]

  const filteredCaseStudies = activeFilter === 'all' 
    ? caseStudies 
    : caseStudies.filter(study => study.category === activeFilter)

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
      <section className="py-20 bg-gradient-to-r from-green-600 to-teal-600">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center text-white"
            variants={fadeInUp}
            initial="initial"
            animate="animate"
          >
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
              Case Studies
            </h1>
            <p className="text-xl sm:text-2xl mb-8 text-green-100 max-w-3xl mx-auto">
              Real-world projects showcasing innovative solutions and measurable results
            </p>
          </motion.div>
        </div>
      </section>

      {/* Filter Section */}
      <section className="py-12 bg-background border-b border-border">
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
                    : 'bg-muted text-muted-foreground hover:bg-accent hover:text-accent-foreground'
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

      {/* Case Studies Grid */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
            layout
          >
            {filteredCaseStudies.map((study, index) => (
              <motion.div
                key={study.id}
                className="group bg-card border border-border rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.1 }}
                layout
              >
                <Link href={`/case-studies/${study.slug}`} className="block">
                  <div className="aspect-video bg-muted relative overflow-hidden">
                    <div className="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                      <span className="text-muted-foreground text-sm">Project Image</span>
                    </div>
                  </div>
                  
                  <div className="p-6">
                    <div className="flex items-center justify-between mb-3">
                      <div className="flex items-center text-sm text-muted-foreground">
                        <Calendar className="h-4 w-4 mr-1" />
                        {study.date}
                      </div>
                      <ExternalLink className="h-4 w-4 text-muted-foreground group-hover:text-primary transition-colors" />
                    </div>
                    
                    <h3 className="text-xl font-semibold text-foreground mb-3 group-hover:text-primary transition-colors">
                      {study.title}
                    </h3>
                    
                    <p className="text-muted-foreground mb-4 line-clamp-3">
                      {study.excerpt}
                    </p>
                    
                    <div className="flex flex-wrap gap-2">
                      {study.technologies.slice(0, 3).map((tech, techIndex) => (
                        <span
                          key={techIndex}
                          className="inline-flex items-center px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded"
                        >
                          <Tag className="h-3 w-3 mr-1" />
                          {tech}
                        </span>
                      ))}
                      {study.technologies.length > 3 && (
                        <span className="inline-flex items-center px-2 py-1 bg-muted text-muted-foreground text-xs font-medium rounded">
                          +{study.technologies.length - 3} more
                        </span>
                      )}
                    </div>
                  </div>
                </Link>
              </motion.div>
            ))}
          </motion.div>

          {filteredCaseStudies.length === 0 && (
            <motion.div
              className="text-center py-12"
              variants={fadeInUp}
              initial="initial"
              animate="animate"
            >
              <p className="text-muted-foreground text-lg">
                No case studies found for this category.
              </p>
            </motion.div>
          )}
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-muted">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Ready to Start Your Project?
            </h2>
            <p className="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
              Let's discuss how we can create a solution that drives results for your business.
            </p>
            <Link
              href="/about"
              className="inline-flex items-center px-8 py-4 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition-colors duration-200"
              aria-label="Get in touch to start your project"
            >
              Get In Touch
            </Link>
          </motion.div>
        </div>
      </section>
    </div>
  )
}

export default CaseStudiesPage 