'use client'

import React from 'react'
import { motion } from 'framer-motion'
import { Download, Mail, MapPin, Calendar, Award, Code, Palette, Zap } from 'lucide-react'

const AboutPage = () => {
  const skills = [
    {
      category: 'Frontend Development',
      technologies: ['React', 'Next.js', 'TypeScript', 'JavaScript', 'HTML5', 'CSS3', 'Tailwind CSS', 'SCSS', 'Framer Motion']
    },
    {
      category: 'Backend Development',
      technologies: ['PHP', 'Node.js', 'Python', 'MySQL', 'MongoDB', 'GraphQL', 'REST APIs', 'WordPress']
    },
    {
      category: 'Design & UX',
      technologies: ['Figma', 'Adobe Creative Suite', 'Sketch', 'InVision', 'Wireframing', 'Prototyping', 'UI/UX Design']
    },
    {
      category: 'Tools & Platforms',
      technologies: ['Git', 'Docker', 'AWS', 'Vercel', 'Netlify', 'Webpack', 'Vite', 'Elementor', 'WooCommerce']
    }
  ]

  const experience = [
    {
      title: 'Senior WordPress Developer',
      company: 'Freelance',
      period: '2020 - Present',
      description: 'Specialized in creating custom WordPress solutions, headless CMS implementations, and performance optimization for diverse clients across various industries.',
      achievements: [
        'Delivered 50+ WordPress projects with 99% client satisfaction',
        'Improved site performance by average of 60% through optimization',
        'Developed custom themes and plugins for specific business needs'
      ]
    },
    {
      title: 'Full Stack Developer',
      company: 'Digital Agency',
      period: '2018 - 2020',
      description: 'Led development of web applications and e-commerce platforms, collaborating with design and marketing teams to deliver comprehensive digital solutions.',
      achievements: [
        'Built and maintained 20+ e-commerce platforms',
        'Implemented headless architecture for improved performance',
        'Mentored junior developers and established coding standards'
      ]
    },
    {
      title: 'Web Developer',
      company: 'Tech Startup',
      period: '2016 - 2018',
      description: 'Developed responsive websites and web applications using modern frameworks and technologies, focusing on user experience and performance.',
      achievements: [
        'Created scalable web applications using React and Node.js',
        'Reduced page load times by 40% through optimization techniques',
        'Collaborated with UX designers to implement pixel-perfect designs'
      ]
    }
  ]

  const achievements = [
    {
      icon: Award,
      title: 'WordPress Expert Certification',
      description: 'Advanced certification in WordPress development and architecture'
    },
    {
      icon: Code,
      title: '100+ Projects Completed',
      description: 'Successfully delivered diverse web development projects'
    },
    {
      icon: Palette,
      title: 'UX Design Certificate',
      description: 'Certified in user experience design and research methodologies'
    },
    {
      icon: Zap,
      title: 'Performance Optimization Specialist',
      description: 'Expert in web performance and Core Web Vitals optimization'
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
      <section className="py-20 bg-gradient-to-r from-gray-900 to-gray-700">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <motion.div
              className="text-white"
              variants={fadeInUp}
              initial="initial"
              animate="animate"
            >
              <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">
                About Gabriel
              </h1>
              <p className="text-xl sm:text-2xl mb-8 text-gray-300">
                WordPress Developer & Digital Experience Designer
              </p>
              <div className="flex flex-col sm:flex-row gap-4">
                <a
                  href="mailto:hello@unobtuse.com"
                  className="inline-flex items-center px-8 py-4 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition-colors duration-200"
                  aria-label="Send email to Gabriel"
                >
                  <Mail className="mr-2 h-5 w-5" />
                  Get In Touch
                </a>
                <button
                  className="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-semibold rounded-lg transition-colors duration-200"
                  aria-label="Download Gabriel's resume"
                >
                  <Download className="mr-2 h-5 w-5" />
                  Download Resume
                </button>
              </div>
            </motion.div>
            
            <motion.div
              className="lg:text-right"
              variants={fadeInUp}
              initial="initial"
              animate="animate"
              transition={{ delay: 0.2 }}
            >
              <div className="bg-white/10 backdrop-blur-sm rounded-lg p-8 text-white">
                <div className="space-y-4">
                  <div className="flex items-center lg:justify-end">
                    <MapPin className="h-5 w-5 mr-2 text-gray-300" />
                    <span>Remote & On-site Available</span>
                  </div>
                  <div className="flex items-center lg:justify-end">
                    <Calendar className="h-5 w-5 mr-2 text-gray-300" />
                    <span>8+ Years Experience</span>
                  </div>
                  <div className="flex items-center lg:justify-end">
                    <Award className="h-5 w-5 mr-2 text-gray-300" />
                    <span>WordPress Certified Expert</span>
                  </div>
                </div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto">
            <motion.div
              className="text-center mb-16"
              variants={fadeInUp}
              initial="initial"
              whileInView="animate"
              viewport={{ once: true }}
            >
              <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-6">
                Passionate About Creating Digital Experiences
              </h2>
              <div className="space-y-6 text-lg text-muted-foreground">
                <p>
                  With over 8 years of experience in web development and design, I specialize in creating 
                  custom WordPress solutions that combine technical excellence with outstanding user experience. 
                  My journey began with a passion for both code and design, leading me to become a full-stack 
                  developer who understands the complete digital product lifecycle.
                </p>
                <p>
                  I believe in the power of technology to transform businesses and create meaningful connections 
                  between brands and their audiences. Every project I work on is an opportunity to push boundaries, 
                  solve complex problems, and deliver solutions that not only meet but exceed expectations.
                </p>
                <p>
                  When I'm not coding or designing, you'll find me exploring the latest web technologies, 
                  contributing to open-source projects, or sharing knowledge with the developer community. 
                  I'm committed to continuous learning and staying at the forefront of web development trends.
                </p>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Skills Section */}
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
              Skills & Expertise
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              A comprehensive skill set covering the full spectrum of modern web development
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {skills.map((skillGroup, index) => (
              <motion.div
                key={index}
                className="bg-background border border-border rounded-lg p-6"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.1 }}
              >
                <h3 className="text-xl font-semibold text-foreground mb-4">
                  {skillGroup.category}
                </h3>
                <div className="flex flex-wrap gap-2">
                  {skillGroup.technologies.map((tech, techIndex) => (
                    <span
                      key={techIndex}
                      className="px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-full"
                    >
                      {tech}
                    </span>
                  ))}
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Experience Section */}
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
              Professional Experience
            </h2>
            <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
              A track record of delivering exceptional results across diverse projects and industries
            </p>
          </motion.div>

          <div className="max-w-4xl mx-auto space-y-8">
            {experience.map((job, index) => (
              <motion.div
                key={index}
                className="bg-card border border-border rounded-lg p-8"
                variants={fadeInUp}
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                transition={{ delay: index * 0.2 }}
              >
                <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                  <div>
                    <h3 className="text-xl font-semibold text-foreground">
                      {job.title}
                    </h3>
                    <p className="text-primary font-medium">
                      {job.company}
                    </p>
                  </div>
                  <span className="text-muted-foreground font-medium mt-2 sm:mt-0">
                    {job.period}
                  </span>
                </div>
                <p className="text-muted-foreground mb-4">
                  {job.description}
                </p>
                <ul className="space-y-2">
                  {job.achievements.map((achievement, achievementIndex) => (
                    <li key={achievementIndex} className="flex items-start">
                      <div className="w-2 h-2 bg-primary rounded-full mt-2 mr-3 flex-shrink-0" />
                      <span className="text-muted-foreground">{achievement}</span>
                    </li>
                  ))}
                </ul>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Achievements Section */}
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
              Achievements & Certifications
            </h2>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {achievements.map((achievement, index) => {
              const IconComponent = achievement.icon
              return (
                <motion.div
                  key={index}
                  className="bg-background border border-border rounded-lg p-6 text-center"
                  variants={fadeInUp}
                  initial="initial"
                  whileInView="animate"
                  viewport={{ once: true }}
                  transition={{ delay: index * 0.1 }}
                >
                  <div className="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-lg mx-auto mb-4">
                    <IconComponent className="h-6 w-6 text-primary" />
                  </div>
                  <h3 className="text-lg font-semibold text-foreground mb-2">
                    {achievement.title}
                  </h3>
                  <p className="text-muted-foreground text-sm">
                    {achievement.description}
                  </p>
                </motion.div>
              )
            })}
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div
            className="text-center max-w-3xl mx-auto"
            variants={fadeInUp}
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
          >
            <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-6">
              Let's Work Together
            </h2>
            <p className="text-xl text-muted-foreground mb-8">
              Ready to bring your vision to life? I'd love to discuss your project and explore 
              how we can create something amazing together.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <a
                href="mailto:hello@unobtuse.com"
                className="inline-flex items-center px-8 py-4 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition-colors duration-200"
                aria-label="Send email to Gabriel"
              >
                <Mail className="mr-2 h-5 w-5" />
                hello@unobtuse.com
              </a>
              <a
                href="tel:+1234567890"
                className="inline-flex items-center px-8 py-4 bg-muted hover:bg-accent text-foreground font-semibold rounded-lg transition-colors duration-200"
                aria-label="Call Gabriel"
              >
                Schedule a Call
              </a>
            </div>
          </motion.div>
        </div>
      </section>
    </div>
  )
}

export default AboutPage 