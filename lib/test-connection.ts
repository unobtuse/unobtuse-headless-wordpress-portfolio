import { gql } from '@apollo/client'
import client from './apollo-client'

// Simple query to test GraphQL connection
const TEST_QUERY = gql`
  query TestConnection {
    generalSettings {
      title
      description
      url
    }
  }
`

export const testWordPressConnection = async () => {
  try {
    console.log('Testing WordPress GraphQL connection...')
    const result = await client.query({
      query: TEST_QUERY,
      errorPolicy: 'all'
    })
    
    if (result.data?.generalSettings) {
      console.log('✅ WordPress connection successful!')
      console.log('Site Title:', result.data.generalSettings.title)
      console.log('Site Description:', result.data.generalSettings.description)
      console.log('Site URL:', result.data.generalSettings.url)
      return { success: true, data: result.data }
    } else {
      console.log('❌ WordPress connection failed - no data returned')
      return { success: false, error: 'No data returned' }
    }
  } catch (error) {
    console.log('❌ WordPress connection failed:', error)
    return { success: false, error }
  }
}

export default testWordPressConnection 