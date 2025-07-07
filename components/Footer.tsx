import React from 'react'
import Link from 'next/link'
import Image from 'next/image'

const Footer = () => {
  const currentYear = new Date().getFullYear()

  return (
    <footer className="bg-muted border-t border-border">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {/* Logo and Description */}
          <div className="md:col-span-2">
            <Link 
              href="/" 
              className="flex items-center space-x-2 mb-4"
              aria-label="Unobtuse home"
            >
              <Image
                src="/logos/Black_Unobtuse_icon_wide.svg"
                alt="Unobtuse Logo"
                width={150}
                height={40}
                className="h-10 w-auto"
              />
            </Link>
            <p className="text-muted-foreground max-w-md">
              Professional WordPress development and design services. Creating modern, 
              responsive websites with a focus on user experience and performance.
            </p>
          </div>

          {/* Navigation Links */}
          <div>
            <h3 className="font-semibold text-foreground mb-4">Navigation</h3>
            <ul className="space-y-2">
              <li>
                <Link 
                  href="/wordpress-development" 
                  className="text-muted-foreground hover:text-primary transition-colors"
                >
                  WordPress Development
                </Link>
              </li>
              <li>
                <Link 
                  href="/design-process" 
                  className="text-muted-foreground hover:text-primary transition-colors"
                >
                  Design Process
                </Link>
              </li>
              <li>
                <Link 
                  href="/case-studies" 
                  className="text-muted-foreground hover:text-primary transition-colors"
                >
                  Case Studies
                </Link>
              </li>
              <li>
                <Link 
                  href="/portfolio" 
                  className="text-muted-foreground hover:text-primary transition-colors"
                >
                  Portfolio
                </Link>
              </li>
              <li>
                <Link 
                  href="/about" 
                  className="text-muted-foreground hover:text-primary transition-colors"
                >
                  About Gabriel
                </Link>
              </li>
            </ul>
          </div>

          {/* Contact Info */}
          <div>
            <h3 className="font-semibold text-foreground mb-4">Contact</h3>
            <div className="space-y-2 text-muted-foreground">
              <p>Ready to start your project?</p>
              <p>
                <a 
                  href="mailto:hello@unobtuse.com" 
                  className="hover:text-primary transition-colors"
                  aria-label="Send email to hello@unobtuse.com"
                >
                  hello@unobtuse.com
                </a>
              </p>
            </div>
          </div>
        </div>

        {/* Bottom Border */}
        <div className="border-t border-border mt-8 pt-8">
          <div className="flex flex-col md:flex-row justify-between items-center">
            <p className="text-muted-foreground text-sm">
              © {currentYear} Unobtuse. All rights reserved.
            </p>
            <p className="text-muted-foreground text-sm mt-2 md:mt-0">
              Built with Next.js and WordPress
            </p>
          </div>
        </div>
      </div>
    </footer>
  )
}

export default Footer 