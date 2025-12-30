#!/bin/bash

###############################################################################
# AMI Project - Production Optimization Script
# This script optimizes the Laravel application for production deployment
###############################################################################

echo "🚀 Starting AMI Project Optimization for Production..."
echo ""

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Function to print success messages
success() {
    echo -e "${GREEN}✓ $1${NC}"
}

# Function to print warning messages
warning() {
    echo -e "${YELLOW}⚠ $1${NC}"
}

# Function to print error messages
error() {
    echo -e "${RED}✗ $1${NC}"
}

# Function to print section headers
section() {
    echo ""
    echo "============================================"
    echo "$1"
    echo "============================================"
}

###############################################################################
# 1. Clear All Caches
###############################################################################
section "1. Clearing All Caches"

php artisan cache:clear
success "Application cache cleared"

php artisan config:clear
success "Configuration cache cleared"

php artisan route:clear
success "Route cache cleared"

php artisan view:clear
success "View cache cleared"

php artisan event:clear
success "Event cache cleared"

###############################################################################
# 2. Install Dependencies (Production)
###############################################################################
section "2. Installing Production Dependencies"

composer install --optimize-autoloader --no-dev
success "Composer dependencies installed"

npm install
success "Node dependencies installed"

###############################################################################
# 3. Build Frontend Assets
###############################################################################
section "3. Building Frontend Assets"

npm run build
success "Frontend assets built and optimized"

###############################################################################
# 4. Optimize Laravel
###############################################################################
section "4. Optimizing Laravel Application"

php artisan config:cache
success "Configuration cached"

php artisan route:cache
success "Routes cached"

php artisan view:cache
success "Views cached"

php artisan event:cache
success "Events cached"

php artisan optimize
success "Application optimized (includes autoloader optimization)"

###############################################################################
# 5. Generate Application Key (if needed)
###############################################################################
section "5. Checking Application Key"

if grep -q "APP_KEY=$" .env 2>/dev/null; then
    warning "Generating application key..."
    php artisan key:generate
    success "Application key generated"
else
    success "Application key already exists"
fi

###############################################################################
# 6. Database Optimization
###############################################################################
section "6. Database Operations"

read -p "Run database migrations? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan migrate --force
    success "Database migrations completed"
fi

read -p "Seed initial data? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan db:seed --force
    success "Database seeded"
fi

###############################################################################
# 7. Storage Link
###############################################################################
section "7. Creating Storage Link"

if [ ! -L public/storage ]; then
    php artisan storage:link
    success "Storage link created"
else
    success "Storage link already exists"
fi

###############################################################################
# 8. Set Permissions
###############################################################################
section "8. Setting File Permissions"

chmod -R 755 storage bootstrap/cache
success "Storage and cache directories permissions set to 755"

chmod -R 644 storage/logs/*.log 2>/dev/null || true
success "Log files permissions set to 644"

###############################################################################
# 9. Image Optimization (if convert-sliders.sh exists)
###############################################################################
section "9. Image Optimization"

if [ -f "convert-sliders.sh" ]; then
    read -p "Run image optimization script? (y/n) " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        chmod +x convert-sliders.sh
        ./convert-sliders.sh
        success "Images optimized"
    fi
else
    warning "convert-sliders.sh not found, skipping image optimization"
fi

###############################################################################
# 10. Security Checks
###############################################################################
section "10. Security Checks"

# Check if APP_DEBUG is false
if grep -q "APP_DEBUG=true" .env 2>/dev/null; then
    error "WARNING: APP_DEBUG is set to true in .env file!"
    echo "   Please set APP_DEBUG=false for production"
else
    success "APP_DEBUG is correctly set to false"
fi

# Check if APP_ENV is production
if grep -q "APP_ENV=production" .env 2>/dev/null; then
    success "APP_ENV is correctly set to production"
else
    warning "APP_ENV is not set to production"
fi

###############################################################################
# 11. Final Cleanup
###############################################################################
section "11. Final Cleanup"

# Remove development files
rm -f README.md
rm -f phpunit.xml
rm -rf tests/

success "Development files removed"

###############################################################################
# 12. Summary
###############################################################################
section "OPTIMIZATION COMPLETE ✓"

echo ""
echo "Your AMI application is now optimized for production!"
echo ""
echo "Next Steps:"
echo "  1. Verify .env configuration"
echo "  2. Test the application thoroughly"
echo "  3. Set up SSL certificate"
echo "  4. Configure web server (Apache/Nginx)"
echo "  5. Set up automated backups"
echo "  6. Configure monitoring tools"
echo ""
echo "Important URLs to test:"
echo "  - Homepage: /"
echo "  - Products: /products"
echo "  - Genset: /genset"
echo "  - Contact: /contact"
echo "  - Admin Panel: /admin"
echo ""
warning "Remember to backup your database before deployment!"
echo ""
