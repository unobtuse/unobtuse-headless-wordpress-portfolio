import { gql } from '@apollo/client'

export const GET_POSTS = gql`
  query GetPosts($first: Int = 10, $after: String) {
    posts(first: $first, after: $after) {
      edges {
        node {
          id
          title
          content
          excerpt
          slug
          date
          featuredImage {
            node {
              sourceUrl
              altText
            }
          }
          categories {
            nodes {
              id
              name
              slug
            }
          }
          tags {
            nodes {
              id
              name
              slug
            }
          }
        }
      }
      pageInfo {
        hasNextPage
        endCursor
      }
    }
  }
`

export const GET_POST_BY_SLUG = gql`
  query GetPostBySlug($slug: String!) {
    postBy(slug: $slug) {
      id
      title
      content
      excerpt
      slug
      date
      featuredImage {
        node {
          sourceUrl
          altText
        }
      }
      categories {
        nodes {
          id
          name
          slug
        }
      }
      tags {
        nodes {
          id
          name
          slug
        }
      }
    }
  }
`

export const GET_PAGES = gql`
  query GetPages($first: Int = 10) {
    pages(first: $first) {
      edges {
        node {
          id
          title
          content
          slug
          featuredImage {
            node {
              sourceUrl
              altText
            }
          }
        }
      }
    }
  }
`

export const GET_PAGE_BY_SLUG = gql`
  query GetPageBySlug($slug: String!) {
    pageBy(slug: $slug) {
      id
      title
      content
      slug
      featuredImage {
        node {
          sourceUrl
          altText
        }
      }
    }
  }
`

export const GET_CASE_STUDIES = gql`
  query GetCaseStudies($first: Int = 10) {
    posts(first: $first, where: { categoryName: "case-study" }) {
      edges {
        node {
          id
          title
          content
          excerpt
          slug
          date
          featuredImage {
            node {
              sourceUrl
              altText
            }
          }
          customFields {
            projectUrl
            clientName
            technologies
            projectType
          }
        }
      }
    }
  }
`

export const GET_PORTFOLIO_ITEMS = gql`
  query GetPortfolioItems($first: Int = 10) {
    posts(first: $first, where: { categoryName: "portfolio" }) {
      edges {
        node {
          id
          title
          content
          excerpt
          slug
          date
          featuredImage {
            node {
              sourceUrl
              altText
            }
          }
          customFields {
            projectUrl
            githubUrl
            technologies
          }
          galleryImages {
            nodes {
              sourceUrl
              altText
            }
          }
        }
      }
    }
  }
` 