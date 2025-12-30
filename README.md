# 🏭 Al Mohandes International (AMI) - Diesel Generator Website

**Official Website for Al Mohandes International - Leading Diesel Generator Manufacturer in Egypt Since 1983**

![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)
![Status](https://img.shields.io/badge/Status-Production%20Ready-green.svg)

---

## 📋 Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Deployment](#deployment)
- [Documentation](#documentation)
- [Project Structure](#project-structure)
- [Performance](#performance)
- [Security](#security)
- [Support](#support)

---

## 🔍 About the Project

Al Mohandes International (AMI) is a comprehensive web platform showcasing AMI's diesel generator products, services, and global presence. The platform provides detailed product catalogs, technical specifications, and customer engagement tools.

### Key Highlights

- **35+ Years of Excellence** - Showcasing AMI's legacy since 1983
- **Comprehensive Product Catalog** - Diesel generators from 0 to 3000+ kVA
- **Dynamic Product Filtering** - Advanced brand and specification filtering
- **Responsive Design** - Optimized for all devices
- **SEO Optimized** - High search engine visibility
- **Performance Optimized** - Sub-3-second page loads

---

## ✨ Features

### Core Features

- ✅ **Product Management**
  - Dynamic product catalog with pagination
  - Advanced filtering by brand, power, and specifications
  - Detailed product pages with technical specs
  - Related products suggestions
  - Image optimization with WebP support

- ✅ **Content Management**
  - Filament admin panel for easy content management
  - Category and subcategory management
  - Product applications and features
  - Contact form management

- ✅ **User Experience**
  - Responsive mobile-first design
  - Interactive hero slider with smooth transitions
  - Dynamic navigation with category dropdowns
  - Brand partner showcases with scrolling animations
  - Empty states with helpful messaging

- ✅ **Performance**
  - Laravel caching for optimal performance
  - Eager loading to prevent N+1 queries
  - Optimized database indexes
  - Image lazy loading
  - Asset minification and bundling

- ✅ **SEO & Marketing**
  - Dynamic meta tags for all pages
  - Structured data (JSON-LD)
  - Sitemap generation
  - Social media integration
  - Google Analytics ready

---

## 🛠️ Technology Stack

### Backend
- **Framework:** Laravel 10.x
- **PHP:** 8.1+
- **Database:** MySQL 8.0 / MariaDB 10.3+
- **Admin Panel:** Filament 3.x

### Frontend
- **CSS Framework:** Tailwind CSS 3.x
- **JavaScript:** Alpine.js
- **Build Tool:** Vite
- **Icons:** Font Awesome 6.x

### DevOps & Performance
- **Caching:** Laravel Cache (File/Redis)
- **Image Optimization:** WebP conversion
- **Asset Bundling:** Vite
- **Version Control:** Git

---

## 📦 Installation

### Prerequisites

```bash
- PHP >= 8.1
- Composer
- Node.js >= 16.x
- MySQL >= 8.0 or MariaDB >= 10.3
- Git
```

### Step-by-Step Installation

```bash
# 1. Clone the repository
git clone <repository-url> ami
cd ami

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure database in .env file
nano .env

# 7. Run migrations
php artisan migrate

# 8. Seed initial data (optional)
php artisan db:seed

# 9. Create storage link
php artisan storage:link

# 10. Build frontend assets
npm run dev    # For development
npm run build  # For production

# 11. Start development server
php artisan serve
```

Visit: `http://localhost:8000`

---

## 🚀 Deployment

### Quick Deployment

```bash
# Make optimization script executable
chmod +x optimize-production.sh

# Run optimization script
./optimize-production.sh
```

### Manual Deployment Steps

```bash
# 1. Install production dependencies
composer install --optimize-autoloader --no-dev
npm install && npm run build

# 2. Set up environment
cp .env.example .env
php artisan key:generate
# Configure .env for production

# 3. Run migrations
php artisan migrate --force

# 4. Optimize application
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 5. Run performance migration
php artisan migrate --path=database/migrations/2025_12_30_082712_add_performance_indexes_to_tables.php

# 6. Set permissions
chmod -R 755 storage bootstrap/cache
```

### Server Requirements

- **Web Server:** Apache 2.4+ or Nginx 1.18+
- **PHP:** 8.1+ with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, GD
- **Database:** MySQL 5.7+ / MariaDB 10.3+
- **Memory:** 1GB RAM minimum, 2GB recommended
- **SSL:** Required for production

**📖 For detailed deployment instructions, see [DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)**

---

## 📚 Documentation

- **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)** - Complete deployment and server setup guide
- **[CLIENT_DELIVERY_CHECKLIST.md](CLIENT_DELIVERY_CHECKLIST.md)** - Client handover checklist
- **[PROJECT_DOCUMENTATION.md](PROJECT_DOCUMENTATION.md)** - Technical documentation and architecture
- **[USER_GUIDE.md](USER_GUIDE.md)** - Admin panel user guide
- **[FEATURES_SUMMARY.md](FEATURES_SUMMARY.md)** - Detailed features list
- **[SEO_OPTIMIZATION_GUIDE.md](SEO_OPTIMIZATION_GUIDE.md)** - SEO best practices

---

## 📁 Project Structure

```
ami/
├── app/
│   ├── Filament/          # Filament admin resources
│   ├── Http/
│   │   ├── Controllers/   # Application controllers
│   │   └── Middleware/    # Custom middleware
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/
│   ├── imgs/              # Static images
│   └── storage/           # Public storage link
├── resources/
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
│       ├── layouts/       # Layout templates
│       ├── pages/         # Page templates
│       └── partials/      # Reusable components
├── routes/
│   └── web.php            # Web routes
├── storage/
│   ├── app/               # Application storage
│   └── logs/              # Application logs
├── optimize-production.sh # Production optimization script
├── convert-sliders.sh     # Image optimization script
└── .env.example           # Environment configuration template
```

---

## ⚡ Performance

### Optimization Features

- **Caching Strategy**
  - Configuration caching
  - Route caching
  - View caching
  - Query result caching (5-minute TTL)

- **Database Optimization**
  - Eager loading relationships
  - Strategic indexes on frequently queried columns
  - Select only required columns
  - Pagination for large datasets

- **Frontend Optimization**
  - Asset bundling with Vite
  - Image lazy loading with WebP support
  - Efficient Alpine.js for interactions
  - Tailwind CSS purging for minimal CSS

### Performance Targets

- **Page Load Time:** < 3 seconds
- **Time to First Byte:** < 600ms
- **Google PageSpeed Score:** > 90
- **Largest Contentful Paint:** < 2.5s

---

## 🔒 Security

### Security Measures

- ✅ CSRF protection (Laravel default)
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ XSS protection (Blade templating)
- ✅ Secure password hashing (bcrypt)
- ✅ Environment variable protection
- ✅ Rate limiting on contact forms
- ✅ Secure session management
- ✅ HTTPS enforcement (production)

### Security Best Practices

```bash
# Ensure .env is never committed
echo ".env" >> .gitignore

# Set proper file permissions
chmod 644 .env
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Keep dependencies updated
composer update
npm update
```

---

## 🎨 Admin Panel

Access the admin panel at `/admin`

### Default Credentials
*Contact the development team for admin credentials*

### Admin Features

- **Product Management:** Create, edit, and manage products
- **Category Management:** Organize products into categories
- **Subcategory/Brand Management:** Manage product brands
- **Contact Management:** View and respond to inquiries
- **Power Type Management:** Manage product power specifications
- **Application & Features:** Add product details

---

## 🧪 Testing

```bash
# Run PHP tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ProductTest.php

# Check code style
./vendor/bin/pint
```

---

## 🔄 Maintenance

### Regular Tasks

**Daily:**
- Monitor application logs: `tail -f storage/logs/laravel.log`
- Verify automated backups

**Weekly:**
- Clear old cache: `php artisan cache:clear`
- Review server resources

**Monthly:**
- Update dependencies
- Database optimization
- Security updates

### Cache Management

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📊 Database

### Key Tables

- **products** - Product catalog
- **categories** - Product categories
- **subcategories** - Product brands/subcategories
- **powertypes** - Power type specifications
- **powertype_values** - Product power values
- **applications** - Product applications
- **features** - Product features
- **contacts** - Customer inquiries

### Backup Strategy

```bash
# Manual database backup
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql

# Automated backups (see DEPLOYMENT_GUIDE.md)
```

---

## 🌐 Browser Support

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Android)

---

## 📞 Support

### Getting Help

- **Documentation:** See `/docs` directory
- **Issues:** Report bugs via issue tracker
- **Email:** [support@ami.com]
- **Website:** [https://ami.com](https://ami.com)

### Development Team

- **Developer:** [Your Name/Team]
- **Email:** [your-email@example.com]
- **Version:** 1.0
- **Last Updated:** 2025-12-30

---

## 📝 License

This project is proprietary software developed for Al Mohandes International.  
All rights reserved © 2025 Al Mohandes International

---

## 🙏 Acknowledgments

- Laravel Framework
- Filament Admin Panel
- Tailwind CSS
- Alpine.js
- Font Awesome

---

## 📋 Changelog

### Version 1.0.0 (2025-12-30)
- ✅ Initial production release
- ✅ Complete product catalog
- ✅ Filament admin panel
- ✅ Performance optimizations
- ✅ SEO implementation
- ✅ Responsive design
- ✅ Contact form functionality

---

**Built with ❤️ for Al Mohandes International**
