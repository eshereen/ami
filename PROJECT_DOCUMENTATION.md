# Al Mohandes International (AMI) - Project Documentation

## Project Overview

**Project Name:** Al Mohandes International (AMI) Website  
**Company:** Al Mohandes International  
**Industry:** Diesel Generator Manufacturing  
**Founded:** 1983  
**Location:** 6th of October City, Egypt  
**Website Type:** Corporate Website with Product Catalog  

## Executive Summary

Al Mohandes International (AMI) is a leading diesel generator manufacturer in Egypt, providing integrated power solutions to global markets since 1983. This Laravel-based website serves as the company's digital presence, showcasing their comprehensive range of power generation equipment, services, and manufacturing capabilities.

## Technical Architecture

### Framework & Technology Stack
- **Backend Framework:** Laravel 12.x (PHP 8.2+)
- **Admin Panel:** Filament 4.x with Shield (Role-Based Access Control)
- **Frontend:** Blade Templates with Tailwind CSS
- **JavaScript:** Alpine.js for interactive components
- **Database:** SQLite (configurable to MySQL/PostgreSQL)
- **Image Processing:** Intervention Image
- **Testing:** Pest PHP
- **Build Tools:** Vite with Laravel Mix

### Key Dependencies
```json
{
  "php": "^8.2",
  "laravel/framework": "^12.0",
  "filament/filament": "^4.0",
  "bezhansalleh/filament-shield": "^4.0",
  "intervention/image": "^3.11",
  "tailwindcss": "^3.4.17",
  "alpinejs": "^3.13.3"
}
```

## Core Features & Functionality

### 1. Product Management System
**Purpose:** Comprehensive product catalog management

**Features:**
- **Product Categories:** Hierarchical organization (Categories → Subcategories → Products)
- **Product Details:** Name, model, description, specifications, images
- **Technical Specifications:** Fuel type, frequency, power ratings
- **Product Relationships:** Features, applications, power types, galleries
- **SEO Optimization:** Slug-based URLs, meta descriptions
- **Image Management:** Multiple product images with optimization

**Database Structure:**
- `categories` - Main product categories
- `subcategories` - Product subcategories with category relationships
- `products` - Individual products with full specifications
- `features` - Product features and descriptions
- `applications` - Product applications and use cases
- `powertypes` - Technical power specifications
- `gallaries` - Product image galleries

### 2. Content Management System (CMS)
**Purpose:** Dynamic content management through Filament admin panel

**Admin Panel Features:**
- **User Management:** Role-based access control with Shield
- **Product Management:** Full CRUD operations for products, categories, subcategories
- **Blog System:** News and case studies management
- **Service Management:** Company services and offerings
- **Contact Management:** Inquiry handling and response tracking
- **Media Management:** Image upload and optimization

**User Roles & Permissions:**
- **Super Admin:** Full system access
- **Panel User:** Basic admin access
- **Custom Roles:** Granular permission control

### 3. Frontend Website Features

#### Homepage
- **Hero Section:** Dynamic image slider with company messaging
- **About Section:** Company history and timeline (1983-present)
- **Product Showcase:** Featured products with filtering
- **Services Overview:** Core service offerings
- **Manufacturing Capabilities:** In-house production details
- **Global Reach:** Worldwide presence and partnerships
- **Contact Form:** Lead generation and inquiry handling

#### Product Pages
- **Product Index:** Comprehensive product listing with search/filter
- **Product Details:** Detailed specifications, features, applications
- **Category Pages:** Organized product browsing by category
- **Subcategory Pages:** Refined product filtering
- **Related Products:** Cross-selling and recommendations

#### Additional Pages
- **About Us:** Company history, mission, and capabilities
- **Services:** Detailed service offerings
- **Blog:** News, case studies, and industry insights
- **Contact:** Multiple contact methods and inquiry form
- **Terms & Privacy:** Legal compliance pages

### 4. SEO & Performance Optimization

#### Technical SEO
- **Dynamic Sitemap:** Auto-generated XML sitemap (`/sitemap.xml`)
- **Meta Tags:** Dynamic SEO meta tags for all pages
- **Open Graph:** Social media optimization
- **Twitter Cards:** Enhanced social sharing
- **Structured Data:** JSON-LD schema markup
- **Canonical URLs:** Duplicate content prevention
- **Robots.txt:** Search engine crawling directives

#### Performance Features
- **Image Optimization:** WebP format with fallbacks
- **Lazy Loading:** Deferred image loading
- **Caching:** Redis-based caching system
- **CDN Ready:** Optimized asset delivery
- **Mobile Optimization:** Responsive design with mobile-first approach
- **Critical CSS:** Inline critical styles for faster rendering

#### Favicon & PWA Support
- **Multiple Favicon Formats:** ICO, PNG, SVG support
- **Apple Touch Icons:** iOS device optimization
- **Web App Manifest:** PWA capabilities
- **Theme Colors:** Brand color integration

### 5. Contact & Communication System

#### Contact Form Features
- **Multi-field Form:** Name, email, phone, message
- **Email Integration:** Automated email notifications
- **Validation:** Server-side form validation
- **Success Handling:** User feedback and confirmation
- **Email Templates:** Professional email formatting

#### Contact Information
- **Multiple Contact Methods:** Phone, email, fax
- **Address Display:** Full company address
- **Interactive Map:** Google Maps integration
- **Business Hours:** Service availability information

### 6. Blog & Content Management

#### Blog System
- **Article Management:** Full CRUD operations
- **Author Attribution:** User-based content creation
- **Status Control:** Draft/published content management
- **SEO Integration:** Optimized URLs and meta data
- **Related Content:** Cross-referencing system

#### Content Types
- **Case Studies:** Project showcases and success stories
- **Industry News:** Company and industry updates
- **Technical Articles:** Educational content
- **Environment Showcases:** Application examples

## Database Schema

### Core Tables
```sql
-- Categories (Main product categories)
categories: id, name, slug, created_at, updated_at

-- Subcategories (Product subcategories)
subcategories: id, name, slug, description, image, overview, category_id, status, created_at, updated_at

-- Products (Individual products)
products: id, name, model_name, slug, subcategory_id, image, description, fuel_type, frequency, status, created_at, updated_at

-- Product Features
features: id, product_id, name, description, created_at, updated_at

-- Product Applications
applications: id, product_id, name, description, created_at, updated_at

-- Power Specifications
powertypes: id, product_id, name, value, note, created_at, updated_at

-- Product Galleries
gallaries: id, product_id, name, description, image, status, created_at, updated_at

-- Blog Articles
blogs: id, user_id, title, slug, content, image, status, created_at, updated_at

-- Services
services: id, name, slug, description, status, image, created_at, updated_at

-- Contact Inquiries
contacts: id, name, email, phone, message, created_at, updated_at

-- Users (Admin users)
users: id, name, email, email_verified_at, password, remember_token, created_at, updated_at
```

## File Structure

```
ami/
├── app/
│   ├── Console/Commands/          # Artisan commands
│   ├── Filament/                 # Admin panel resources
│   │   ├── Resources/            # CRUD resources
│   │   ├── Forms/                # Form schemas
│   │   └── Widgets/              # Dashboard widgets
│   ├── Http/Controllers/         # Web controllers
│   ├── Mail/                     # Email templates
│   ├── Models/                    # Eloquent models
│   ├── Policies/                  # Authorization policies
│   ├── Services/                  # Business logic
│   └── Traits/                    # Reusable traits
├── config/                       # Configuration files
├── database/
│   ├── factories/                # Model factories
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Database seeders
├── public/
│   ├── imgs/                     # Product and company images
│   ├── css/                      # Stylesheets
│   ├── js/                       # JavaScript files
│   ├── favicon.ico               # Favicon
│   ├── sitemap.xml               # SEO sitemap
│   ├── robots.txt                # Search engine directives
│   └── site.webmanifest          # PWA manifest
├── resources/
│   ├── views/                    # Blade templates
│   ├── css/                      # Source CSS
│   └── js/                       # Source JavaScript
└── routes/
    └── web.php                   # Web routes
```

## Routes & URL Structure

### Public Routes
```
/                           # Homepage
/about                      # About page
/products                   # Product listing
/product/{slug}             # Individual product
/categories                 # Category listing
/category/{slug}            # Category page
/subcategories              # Subcategory listing
/subcategory/{slug}         # Subcategory page
/services                   # Services page
/service/{slug}             # Individual service
/blog                       # Blog listing
/blog/{slug}                # Individual blog post
/contact                    # Contact page
/terms                      # Terms of service
/privacy                    # Privacy policy
/sitemap.xml                # Dynamic sitemap
```

### Admin Routes (Filament)
```
/admin                      # Admin dashboard
/admin/products             # Product management
/admin/categories           # Category management
/admin/subcategories        # Subcategory management
/admin/blogs                # Blog management
/admin/services             # Service management
/admin/contacts             # Contact management
/admin/users                # User management
/admin/roles                # Role management (Shield)
```

## Security Features

### Authentication & Authorization
- **Laravel Authentication:** Built-in user authentication
- **Role-Based Access Control:** Filament Shield integration
- **Policy-Based Authorization:** Granular permission control
- **CSRF Protection:** Cross-site request forgery protection
- **SQL Injection Prevention:** Eloquent ORM protection

### Data Protection
- **Input Validation:** Server-side validation for all forms
- **XSS Protection:** Cross-site scripting prevention
- **Secure Headers:** Security headers implementation
- **File Upload Security:** Secure image upload handling

## Performance & Optimization

### Caching Strategy
- **Redis Caching:** Database query caching
- **Page Caching:** Static page caching
- **Image Caching:** Optimized image delivery
- **Asset Caching:** CSS/JS asset optimization

### Image Optimization
- **WebP Format:** Modern image format support
- **Responsive Images:** Multiple size variants
- **Lazy Loading:** Deferred image loading
- **Compression:** Automatic image compression

### Frontend Optimization
- **Critical CSS:** Inline critical styles
- **Asset Bundling:** Optimized asset delivery
- **Mobile-First:** Responsive design approach
- **Progressive Enhancement:** Graceful degradation

## SEO Implementation

### Technical SEO
- **Dynamic Sitemap:** Auto-updating XML sitemap
- **Meta Tags:** Dynamic SEO meta information
- **Structured Data:** JSON-LD schema markup
- **Canonical URLs:** Duplicate content prevention
- **Robots.txt:** Search engine directives

### Content SEO
- **Slug-Based URLs:** SEO-friendly URLs
- **Meta Descriptions:** Dynamic meta descriptions
- **Heading Structure:** Proper H1-H6 hierarchy
- **Alt Text:** Image accessibility and SEO
- **Internal Linking:** Strategic content linking

### Social Media Integration
- **Open Graph:** Facebook/LinkedIn optimization
- **Twitter Cards:** Twitter sharing optimization
- **Social Sharing:** Easy content sharing

## Browser & Device Support

### Supported Browsers
- **Chrome:** Latest 2 versions
- **Firefox:** Latest 2 versions
- **Safari:** Latest 2 versions
- **Edge:** Latest 2 versions
- **Mobile Browsers:** iOS Safari, Chrome Mobile

### Device Support
- **Desktop:** 1920px and above
- **Laptop:** 1024px - 1919px
- **Tablet:** 768px - 1023px
- **Mobile:** 320px - 767px

#
