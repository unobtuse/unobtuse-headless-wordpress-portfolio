import type { Metadata } from 'next'
import { Inter } from 'next/font/google'
import React from 'react'
import './globals.css'
import Navigation from '@/components/Navigation'
import Footer from '@/components/Footer'

const inter = Inter({ subsets: ['latin'], variable: '--font-sans' })

export const metadata: Metadata = {
  title: 'Unobtuse - WordPress Development & Design',
  description: 'Professional WordPress development and design services by Gabriel. Creating modern, responsive websites with a focus on user experience and performance.',
  keywords: ['WordPress', 'web development', 'design', 'responsive', 'modern websites'],
  authors: [{ name: 'Gabriel' }],
  openGraph: {
    title: 'Unobtuse - WordPress Development & Design',
    description: 'Professional WordPress development and design services',
    type: 'website',
  },
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en" className={inter.variable}>
      <body className="min-h-screen bg-background font-sans antialiased">
        <Navigation />
        <main className="min-h-screen">
          {children}
        </main>
        <Footer />
      </body>
    </html>
  )
} 