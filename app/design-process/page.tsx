'use client'

import React from 'react'
import { motion } from 'framer-motion'
import { Search, Lightbulb, Palette, Code, TestTube, Rocket } from 'lucide-react'

const DesignProcessPage = () => {
  const processSteps = [
    {
      icon: Search,
      title: 'Research & Discovery',
      description: 'Understanding user needs, business goals, and market landscape through comprehensive research and stakeholder interviews.',
      activities: ['User interviews', 'Competitive analysis', 'Market research', 'Stakeholder workshops']
    },
    {
      icon: Lightbulb,
      title: 'Ideation & Strategy',
      description: 'Generating creative solutions and defining the strategic direction based on research insights.',
      activities: ['Brainstorming sessions', 'User personas', 'Journey mapping', 'Information architecture']
    },
    {
      icon: Palette,
      title: 'Design & Prototyping',
      description: 'Creating visual designs, interactive prototypes, and design systems that bring ideas to life.',
      activities: ['Wireframing', 'Visual design', 'Prototyping', 'Design systems']
    },
    {
      icon: TestTube,
      title: 'Testing & Validation',
      description: 'Validating design decisions through user testing and iterative improvements.',
      activities: ['Usability testing', 'A/B testing', 'Accessibility audit', 'Performance testing']
    },
    {
      icon: Code,
      title: 'Development & Implementation',
      description: 'Translating designs into functional, responsive, and optimized web experiences.',
      activities: ['Frontend development', 'CMS integration', 'Performance optimization', 'Quality assurance']
    },
    {
      icon: Rocket,
      title: 'Launch & Optimization',
      description: 'Deploying the final product and continuously optimizing based on real-world usage data.',
      activities: ['Deployment', 'Analytics setup', 'Performance monitoring', 'Ongoing optimization']
    }
  ]

  const principles = [
    {
      title: 'User-Centered Design',
      description: 'Every design decision is made with the end user in mind, ensuring intuitive and meaningful experiences.'
    },
    {
      title: 'Accessibility First',
      description: 'Designing inclusive experiences that work for everyone, regardless of abilities or circumstances.'
    },
    {
      title: 'Performance Focused',
      description: 'Optimizing for speed and efficiency without compromising on visual appeal or functionality.'
    },
    {
      title: 'Mobile-First Approach',
      description: 'Starting with mobile constraints to ensure exceptional experiences across all devices.'
    }
  ]

  const fadeInUp = {
    initial: { opacity: 0, y: 60 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  }

  return (
    <div className="pt-16">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-r from-purple-600 to-pink-600">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center text-white"
            variants={fadeInUp}
            initial="initial"
            animate="animate"
          >
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
              Design Process
            </h1>
            <p className="text-xl sm:text-2xl mb-8 text-purple-100 max-w-3xl mx-auto">
              A systematic approach to creating user-centered digital experiences that drive results
            </p>
          </motion.div>
        </div>
      </section>

      {/* Process Steps */}
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
              The Design Journey
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Six key phases that ensure every project delivers exceptional results
            </p>
          </motion.div>

          <div className="space-y-16">
            {processSteps.map((step, index) => {
              const IconComponent = step.icon
              const isEven = index % 2 === 0
              
              return (
                <motion.div
                  key={index}
                  className={`flex flex-col lg:flex-row items-center gap-8 ${isEven ? 'lg:flex-row' : 'lg:flex-row-reverse'}`}
                  variants={fadeInUp}
                  initial="initial"
                  whileInView="animate"
                  viewport={{ once: true }}
                  transition={{ delay: index * 0.2 }}
                >
                  <div className="lg:w-1/2">
                    <div className="bg-card border border-border rounded-lg p-8 hover:shadow-lg transition-shadow duration-200">
                      <div className="flex items-center mb-4">
                        <div className="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mr-4">
                          <IconComponent className="h-6 w-6 text-primary" />
                        </div>
                        <div className="text-sm font-semibold text-primary">
                          Step {index + 1}
                        </div>
                      </div>
                      <h3 className="text-2xl font-bold text-foreground mb-4">
                        {step.title}
                      </h3>
                      <p className="text-muted-foreground mb-6">
                        {step.description}
                      </p>
                      <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        {step.activities.map((activity, actIndex) => (
                          <div key={actIndex} className="flex items-center text-sm text-muted-foreground">
                            <div className="w-2 h-2 bg-primary rounded-full mr-2 flex-shrink-0" />
                            {activity}
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>
                  
                  <div className="lg:w-1/2">
                    <div className="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-primary-foreground font-bold text-2xl mx-auto lg:mx-0">
                      {index + 1}
                    </div>
                  </div>
                </motion.div>
              )
            })}
          </div>
        </div>
      </section>

      {/* Design Principles */}
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
              Design Principles
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Core principles that guide every design decision and ensure consistent quality
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {principles.map((principle, index) => (
              <motion.div
                key={index}
                className="bg-background border border-border rounded-lg p-6 hover:shadow-lg transition-shadow duration-200"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.1 }}
              >
                <h3 className="text-xl font-semibold text-foreground mb-3">
                  {principle.title}
                </h3>
                <p className="text-muted-foreground">
                  {principle.description}
                </p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Tools & Methods */}
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
              Tools & Methodologies
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Industry-leading tools and proven methodologies for exceptional results
            </p>
          </motion.div>

          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {[
              'Figma', 'Adobe Creative Suite', 'Sketch', 'InVision',
              'Miro', 'Hotjar', 'Google Analytics', 'Optimal Workshop',
              'UsabilityHub', 'Maze', 'Axure RP', 'Principle'
            ].map((tool, index) => (
              <motion.div
                key={index}
                className="bg-card border border-border rounded-lg p-4 text-center hover:border-primary/50 transition-colors"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.05 }}
              >
                <span className="text-foreground font-medium">{tool}</span>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
    </div>
  )
}

export default DesignProcessPage 