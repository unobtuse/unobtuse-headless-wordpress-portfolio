'use client'

import React from 'react'
import { motion } from 'framer-motion'
import { Code, Database, Smartphone, Zap, Shield, Wrench } from 'lucide-react'

const WordPressDevelopmentPage = () => {
  const services = [
    {
      icon: Code,
      title: 'Custom Theme Development',
      description: 'Bespoke WordPress themes built from scratch to match your unique brand and design requirements.'
    },
    {
      icon: Wrench,
      title: 'Plugin Development',
      description: 'Custom functionality and features tailored to your specific business needs and workflows.'
    },
    {
      icon: Database,
      title: 'Headless WordPress',
      description: 'Modern headless CMS solutions using WordPress as a backend with React/Next.js frontends.'
    },
    {
      icon: Zap,
      title: 'Performance Optimization',
      description: 'Lightning-fast loading times through caching, image optimization, and code optimization.'
    },
    {
      icon: Shield,
      title: 'Security Implementation',
      description: 'Robust security measures to protect your website from threats and vulnerabilities.'
    },
    {
      icon: Smartphone,
      title: 'Responsive Design',
      description: 'Mobile-first approach ensuring perfect user experience across all devices and screen sizes.'
    }
  ]

  const technologies = [
    'WordPress/WooCommerce',
    'PHP 8+',
    'MySQL/MariaDB',
    'JavaScript/TypeScript',
    'React/Next.js',
    'GraphQL',
    'REST API',
    'SCSS/Tailwind CSS',
    'Webpack/Vite',
    'Docker',
    'Git/GitHub',
    'Cloudflare'
  ]

  const fadeInUp = {
    initial: { opacity: 0, y: 60 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  }

  return (
    <div className="pt-16">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-r from-primary to-blue-600">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center text-white"
            variants={fadeInUp}
            initial="initial"
            animate="animate"
          >
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
              WordPress Development
            </h1>
            <p className="text-xl sm:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
              Custom WordPress solutions that combine powerful functionality with exceptional user experience
            </p>
          </motion.div>
        </div>
      </section>

      {/* Services Section */}
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
              Development Services
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Comprehensive WordPress development services from concept to deployment
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((service, index) => {
              const IconComponent = service.icon
              return (
                <motion.div
                  key={index}
                  className="bg-card border border-border rounded-lg p-6 hover:shadow-lg transition-shadow duration-200"
                  variants={fadeInUp}
                  initial="initial"
                  whileInView="animate"
                  viewport={{ once: true }}
                  transition={{ delay: index * 0.1 }}
                >
                  <div className="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mb-4">
                    <IconComponent className="h-6 w-6 text-primary" />
                  </div>
                  <h3 className="text-xl font-semibold text-foreground mb-3">
                    {service.title}
                  </h3>
                  <p className="text-muted-foreground">
                    {service.description}
                  </p>
                </motion.div>
              )
            })}
          </div>
        </div>
      </section>

      {/* Technologies Section */}
      <section className="py-20 bg-muted">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center mb-16"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Technologies & Tools
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Modern development stack for building robust and scalable WordPress solutions
            </p>
          </motion.div>

          <motion.div
            className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            {technologies.map((tech, index) => (
              <motion.div
                key={index}
                className="bg-background border border-border rounded-lg p-4 text-center hover:border-primary/50 transition-colors"
                transition={{ delay: index * 0.05 }}
              >
                <span className="text-foreground font-medium">{tech}</span>
              </motion.div>
            ))}
          </motion.div>
        </div>
      </section>

      {/* Process Section */}
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
              Development Process
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              A structured approach that ensures quality, performance, and client satisfaction
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {[
              { step: '01', title: 'Discovery', description: 'Understanding your requirements, goals, and target audience' },
              { step: '02', title: 'Planning', description: 'Creating wireframes, technical specifications, and project timeline' },
              { step: '03', title: 'Development', description: 'Building custom themes, plugins, and implementing functionality' },
              { step: '04', title: 'Launch', description: 'Testing, optimization, deployment, and ongoing support' }
            ].map((phase, index) => (
              <motion.div
                key={index}
                className="text-center"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.2 }}
              >
                <div className="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-primary-foreground font-bold text-xl mx-auto mb-4">
                  {phase.step}
                </div>
                <h3 className="text-xl font-semibold text-foreground mb-2">
                  {phase.title}
                </h3>
                <p className="text-muted-foreground">
                  {phase.description}
                </p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
    </div>
  )
}

export default WordPressDevelopmentPage 