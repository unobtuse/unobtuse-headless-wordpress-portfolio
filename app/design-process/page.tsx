'use client'

import React from 'react'
import { motion } from 'framer-motion'
import { Search, FileText, Code, Rocket, HeartHandshake, DollarSign, Users, Zap } from 'lucide-react'

const DesignProcessPage = () => {
  const processSteps = [
    {
      icon: Search,
      title: 'Discovery & Consultation',
      description: 'Our journey begins with a comprehensive consultation, where we take the time to truly understand your project and define your specific goals.',
      activities: [
        'Purpose & Goals Discussion',
        'Timeline Planning',
        'Inspiration & Competition Analysis',
        'Current State Analysis',
        'Assets & Content Assessment',
        'Monetization & Marketing Strategy',
        'Branding Evaluation',
        'Technical Integrations Planning'
      ]
    },
    {
      icon: FileText,
      title: 'Strategy & Proposal',
      description: 'Following our consultation, we move into detailed planning and research to develop a comprehensive strategy tailored to your needs.',
      activities: [
        'In-depth Market Research',
        'Custom SEO Strategy',
        'Technical Evaluation',
        'Milestone Planning',
        'Value Assessment',
        'Detailed Proposal Creation'
      ]
    },
    {
      icon: Code,
      title: 'Design & Development',
      description: 'With the strategy locked in, our team gets to work building your WordPress website with attention to every detail.',
      activities: [
        'Hosting & Infrastructure Setup',
        'Third-Party Integrations',
        'Analytics & Tracking Configuration',
        'WordPress Installation & Security',
        'Logo & Branding Implementation',
        'Custom Development & Testing'
      ]
    },
    {
      icon: Rocket,
      title: 'Launch & Delivery',
      description: 'As we approach launch, we ensure everything is perfect and provide you with the knowledge to manage your new site.',
      activities: [
        'Final Review & Testing',
        'Training & Handover',
        'Go Live Process',
        'Performance Monitoring',
        'Quality Assurance'
      ]
    },
    {
      icon: HeartHandshake,
      title: 'Ongoing Support & Growth',
      description: 'Our partnership doesn\'t end at launch! We offer ongoing services to help your website thrive and grow over time.',
      activities: [
        'Content Creation Services',
        'Maintenance & Updates',
        'Technical Support',
        'Marketing Campaign Management',
        'Continuous Optimization'
      ]
    }
  ]

  const benefits = [
    {
      icon: Users,
      title: 'Collaborative Approach',
      description: 'Open communication throughout the build - your feedback and new ideas are always welcome.'
    },
    {
      icon: Zap,
      title: 'Performance Focused',
      description: 'Advanced caching, security layers, and optimization ensure your site runs fast and secure.'
    },
    {
      icon: DollarSign,
      title: '100% Satisfaction Guaranteed',
      description: 'Your satisfaction is always guaranteed. We work until you\'re completely happy with the results.'
    },
    {
      title: 'Transparent Process',
      description: 'Clear milestones, deliverables, and transparent quotes so you know exactly what to expect.'
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
              Our Proven WordPress Development Process
            </h1>
            <p className="text-xl sm:text-2xl mb-8 text-purple-100 max-w-4xl mx-auto">
              At Unobtuse, we believe that every successful website starts with a clear, collaborative process tailored to your unique needs. Here's what you can expect when partnering with us to bring your vision to life.
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
              The Development Journey
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Five comprehensive phases that ensure every project delivers exceptional results
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

      {/* Benefits & Values */}
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
              Why Choose Our Process
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              Our proven methodology ensures exceptional results and a smooth experience from start to finish
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {benefits.map((benefit, index) => (
              <motion.div
                key={index}
                className="bg-background border border-border rounded-lg p-6 hover:shadow-lg transition-shadow duration-200"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.1 }}
              >
                <div className="flex items-center mb-4">
                  {benefit.icon && (
                    <div className="flex items-center justify-center w-10 h-10 bg-primary/10 rounded-lg mr-3">
                      <benefit.icon className="h-5 w-5 text-primary" />
                    </div>
                  )}
                  <h3 className="text-xl font-semibold text-foreground">
                    {benefit.title}
                  </h3>
                </div>
                <p className="text-muted-foreground">
                  {benefit.description}
                </p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Call to Action */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <div className="bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-12 text-white">
              <h2 className="text-3xl sm:text-4xl font-bold mb-6">
                Ready to Get Started?
              </h2>
              <p className="text-xl mb-8 text-purple-100 max-w-2xl mx-auto">
                Let's create something exceptional together. Contact us today to begin your WordPress development journey.
              </p>
              <motion.button
                className="bg-white text-purple-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-purple-50 transition-colors"
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
              >
                Start Your Project
              </motion.button>
            </div>
          </motion.div>
        </div>
      </section>
    </div>
  )
}

export default DesignProcessPage 