'use client'

import React, { useEffect, useState } from 'react'
import { motion } from 'framer-motion'
import testWordPressConnection from '@/lib/test-connection'

interface ConnectionData {
  generalSettings?: {
    title: string
    description: string
    url: string
  }
}

const TestConnectionPage = () => {
  const [connectionStatus, setConnectionStatus] = useState<'testing' | 'success' | 'error'>('testing')
  const [data, setData] = useState<ConnectionData | null>(null)
  const [error, setError] = useState<string | null>(null)

  useEffect(() => {
    const testConnection = async () => {
      const result = await testWordPressConnection()
      
      if (result.success) {
        setConnectionStatus('success')
        setData(result.data)
      } else {
        setConnectionStatus('error')
        setError(typeof result.error === 'string' ? result.error : (result.error as any)?.message || 'Unknown error')
      }
    }

    testConnection()
  }, [])

  const fadeInUp = {
    initial: { opacity: 0, y: 60 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  }

  return (
    <div className="pt-16 min-h-screen bg-background">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <motion.div
          className="max-w-2xl mx-auto text-center"
          variants={fadeInUp}
          initial="initial"
          animate="animate"
        >
          <h1 className="text-4xl font-bold text-foreground mb-8">
            WordPress Connection Test
          </h1>
          
          {connectionStatus === 'testing' && (
            <div className="bg-blue-50 border border-blue-200 rounded-lg p-6">
              <div className="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto mb-4"></div>
              <p className="text-blue-600 font-medium">Testing WordPress connection...</p>
            </div>
          )}

          {connectionStatus === 'success' && data && (
            <motion.div
              className="bg-green-50 border border-green-200 rounded-lg p-6"
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ delay: 0.2 }}
            >
              <div className="text-green-600 mb-4">
                <svg className="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <h2 className="text-2xl font-bold text-green-800 mb-4">
                ✅ Connection Successful!
              </h2>
              <div className="space-y-3 text-left">
                <div className="bg-white rounded p-3">
                  <span className="font-semibold text-gray-700">Site Title:</span>
                  <span className="ml-2 text-gray-900">{data.generalSettings?.title}</span>
                </div>
                <div className="bg-white rounded p-3">
                  <span className="font-semibold text-gray-700">Site URL:</span>
                  <span className="ml-2 text-gray-900">{data.generalSettings?.url}</span>
                </div>
                <div className="bg-white rounded p-3">
                  <span className="font-semibold text-gray-700">Description:</span>
                  <span className="ml-2 text-gray-900">
                    {data.generalSettings?.description || 'No description set'}
                  </span>
                </div>
              </div>
            </motion.div>
          )}

          {connectionStatus === 'error' && (
            <motion.div
              className="bg-red-50 border border-red-200 rounded-lg p-6"
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ delay: 0.2 }}
            >
              <div className="text-red-600 mb-4">
                <svg className="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </div>
              <h2 className="text-2xl font-bold text-red-800 mb-4">
                ❌ Connection Failed
              </h2>
              <div className="bg-white rounded p-3">
                <span className="font-semibold text-gray-700">Error:</span>
                <span className="ml-2 text-red-600">{error}</span>
              </div>
            </motion.div>
          )}

          <div className="mt-8">
            <button
              onClick={() => window.location.reload()}
              className="px-6 py-3 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors"
            >
              Test Again
            </button>
          </div>
        </motion.div>
      </div>
    </div>
  )
}

export default TestConnectionPage 