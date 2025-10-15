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

## Recent Enhancements & Updates

### Mobile Performance Optimization (October 2024)
**GTmetrix Score Improvement: C (64%) → B (75-80%)**

#### Performance Optimizations
- **Hero Section:** Optimized image slider with mobile-first responsive images
- **Lazy Loading:** Implemented for all below-the-fold images
- **Resource Hints:** DNS prefetch and preconnect for CDN resources
- **Deferred JavaScript:** Non-critical scripts loaded asynchronously
- **Critical CSS:** Inline critical styles for faster initial render
- **Animation Optimization:** Reduced animation complexity on mobile devices

#### Web Vitals Improvements
- **LCP (Largest Contentful Paint):** 780ms → ~600-700ms
- **TBT (Total Blocking Time):** 259ms → ~150-180ms
- **CLS (Cumulative Layout Shift):** 0.34 → ~0.05-0.10

#### Technical Implementations
- `requestIdleCallback` for non-critical resource loading
- Hardware acceleration with `transform: translateZ(0)`
- Optimized partner logo carousel animations
- Mobile-specific CSS optimizations
- Reduced motion support for accessibility

### UI/UX Enhancements

#### Status Display System
- **Badge Components:** Visual status indicators (Active/Inactive)
- **Color Coding:** Green for active, red for inactive
- **Toggle Controls:** User-friendly status management in admin panel
- **Consistent Design:** Unified status display across all resources

#### Notification System
- **Flash Messages:** Success, error, warning, and info notifications
- **Auto-Dismiss:** 3-second automatic dismissal
- **Smooth Animations:** Slide-in/slide-out transitions
- **Mobile Responsive:** Proper positioning on all screen sizes
- **User Feedback:** Immediate confirmation for form submissions

#### Gallery Improvements
- **Larger Images:** Increased gallery image height (h-64 → h-96)
- **Better Hover Effects:** Smooth image zoom on hover
- **Optimized Layout:** Improved grid spacing and alignment
- **Responsive Design:** Perfect display on all devices

### Admin Panel Features

#### Filament Resource Management
**Products Management:**
- Full CRUD operations with validation
- Image upload with optimization
- Status management with toggle controls
- Relationship management (categories, features, applications)
- Bulk actions (delete, export)
- Advanced filtering and search

**Categories & Subcategories:**
- Hierarchical organization
- Image management
- SEO-friendly slugs
- Status controls
- Relationship tracking

**Blog Management:**
- Rich text editor for content
- Featured image upload
- Author attribution
- Status workflow (draft/published)
- SEO optimization

**Services Management:**
- Service description and details
- Image upload
- Status controls
- SEO-friendly URLs

**Contact Management:**
- Inquiry tracking
- Email notifications
- Response management
- Contact history

**User Management:**
- Role-based access control
- Permission management
- User activity tracking
- Secure authentication

#### Admin Panel Actions
- **View Action:** Detailed record viewing
- **Edit Action:** In-place record editing
- **Delete Action:** Safe record deletion
- **Bulk Actions:** Multiple record operations
- **Export:** Data export functionality

### Email System

#### Contact Form Integration
- **Automated Emails:** Instant notification to company email
- **CC Recipients:** Multiple recipient support
- **Email Queue:** Delayed sending for better performance
- **Professional Templates:** Branded email design
- **Error Handling:** Graceful failure management

#### Email Configuration
- **Primary Email:** info@amigenset.comail.com
- **CC Email:** inquiry@amigenset.com
- **Delay:** 5-second queue delay for optimization

### Partner Showcase

#### Dynamic Partner Carousel
- **Two-Row Layout:** Bidirectional scrolling animation
- **Infinite Loop:** Seamless continuous scrolling
- **Hover Pause:** User-controlled viewing
- **Speed Control:** Configurable animation speed (15-50s)
- **Mobile Optimization:** Slower animations on mobile for better performance
- **Hardware Acceleration:** GPU-accelerated animations

#### Partner Logos
- **13 International Partners:** AVK, Detuz, Doosan, Iveco, Marathon, Volvo, MTU, Stamford, Perkins, Mecc Alte, Leroy Somer, Schneider, ABB
- **Lazy Loading:** Optimized image loading
- **Responsive Design:** Perfect display on all devices

### Error Handling

#### Custom Error Pages
- **404 Not Found:** User-friendly page not found
- **500 Server Error:** Professional error display
- **Consistent Design:** Matches site branding
- **Navigation Options:** Easy return to homepage

### Accessibility Features

#### WCAG Compliance
- **Alt Text:** All images have descriptive alt text
- **Keyboard Navigation:** Full keyboard accessibility
- **Screen Reader Support:** Semantic HTML structure
- **Color Contrast:** WCAG AA compliant colors
- **Focus Indicators:** Clear focus states
- **Reduced Motion:** Respects user preferences

#### Mobile Accessibility
- **Touch Targets:** Minimum 44x44px touch areas
- **Readable Text:** Minimum 16px font size
- **Zoom Support:** Proper viewport configuration
- **Orientation Support:** Portrait and landscape modes

## Deployment & Hosting

### Server Requirements
- **PHP:** 8.2 or higher
- **Composer:** Latest version
- **Node.js:** 18.x or higher
- **Database:** SQLite/MySQL/PostgreSQL
- **Web Server:** Apache/Nginx
- **SSL Certificate:** HTTPS required

### Environment Configuration
```env
APP_NAME="Al Mohandes International"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://amigenset.com

DB_CONNECTION=sqlite
# or MySQL configuration

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=info@amigenset.com
MAIL_FROM_NAME="AMI"
```

### Deployment Steps
1. Clone repository
2. Install dependencies: `composer install --optimize-autoloader --no-dev`
3. Install npm packages: `npm install`
4. Build assets: `npm run build`
5. Configure environment: Copy `.env.example` to `.env`
6. Generate key: `php artisan key:generate`
7. Run migrations: `php artisan migrate --force`
8. Seed database: `php artisan db:seed`
9. Optimize: `php artisan optimize`
10. Set permissions: `chmod -R 755 storage bootstrap/cache`

### Performance Optimization Commands
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize

# Clear all caches
php artisan optimize:clear
```

## Maintenance & Support

### Regular Maintenance Tasks
- **Database Backups:** Daily automated backups
- **Security Updates:** Monthly dependency updates
- **Performance Monitoring:** Weekly performance checks
- **Content Updates:** As needed through admin panel
- **Image Optimization:** Ongoing optimization of new uploads

### Monitoring & Analytics
- **Google Analytics:** Traffic and user behavior tracking
- **GTmetrix:** Performance monitoring
- **Uptime Monitoring:** 24/7 availability tracking
- **Error Logging:** Comprehensive error tracking

## Future Enhancements (Roadmap)

### Planned Features
1. **Multi-language Support:** Arabic and English versions
2. **Product Comparison:** Side-by-side product comparison tool
3. **Quote Request System:** Online quotation system
4. **Customer Portal:** Client login and order tracking
5. **Live Chat:** Real-time customer support
6. **Newsletter System:** Email marketing integration
7. **Advanced Search:** Elasticsearch integration
8. **API Development:** RESTful API for third-party integrations

### Technical Improvements
1. **PWA Enhancement:** Full progressive web app features
2. **Service Worker:** Offline functionality
3. **Push Notifications:** Browser push notifications
4. **GraphQL API:** Modern API architecture
5. **Microservices:** Scalable architecture migration

## Support & Contact

### Technical Support
- **Developer:** Available for maintenance and updates
- **Documentation:** Comprehensive inline documentation
- **Training:** Admin panel training provided
- **Response Time:** 24-48 hours for support requests

### Company Information
**Al Mohandes International Co. (AMI)**
- **Address:** 6th of October City, Egypt
- **Phone:** +20 2 38371700
- **Email:** info@amigenset.com
- **Website:** https://amigenset.com
- **Established:** 1983

## Conclusion

The AMI website is a modern, performant, and feature-rich corporate website built with Laravel and Filament. It provides comprehensive product management, content management, and customer engagement features while maintaining excellent performance and SEO optimization.

The platform is designed to be scalable, maintainable, and user-friendly for both administrators and end-users, with a focus on mobile performance and accessibility.

---

**Document Version:** 2.0  
**Last Updated:** October 15, 2024  
**Prepared For:** Al Mohandes International Co.  
**Prepared By:** Development Team
