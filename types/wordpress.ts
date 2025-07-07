export interface WordPressPost {
  id: string
  title: string
  content: string
  excerpt: string
  slug: string
  date: string
  featuredImage?: {
    node: {
      sourceUrl: string
      altText: string
    }
  }
  categories: {
    nodes: Category[]
  }
  tags: {
    nodes: Tag[]
  }
}

export interface Category {
  id: string
  name: string
  slug: string
}

export interface Tag {
  id: string
  name: string
  slug: string
}

export interface WordPressPage {
  id: string
  title: string
  content: string
  slug: string
  featuredImage?: {
    node: {
      sourceUrl: string
      altText: string
    }
  }
}

export interface CaseStudy extends WordPressPost {
  projectUrl?: string
  clientName?: string
  technologies?: string[]
  projectType?: string
}

export interface Portfolio extends WordPressPost {
  projectImages?: {
    nodes: {
      sourceUrl: string
      altText: string
    }[]
  }
  projectUrl?: string
  githubUrl?: string
} 