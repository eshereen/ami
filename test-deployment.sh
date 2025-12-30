#!/bin/bash

###############################################################################
# AMI Project - Pre-Deployment Testing Script
# This script runs automated tests to ensure the application is ready for deployment
###############################################################################

echo "🧪 Starting AMI Project Pre-Deployment Testing..."
echo ""

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Counters
PASSED=0
FAILED=0
WARNINGS=0

# Function to print success messages
success() {
    echo -e "${GREEN}✓ $1${NC}"
    ((PASSED++))
}

# Function to print warning messages
warning() {
    echo -e "${YELLOW}⚠ $1${NC}"
    ((WARNINGS++))
}

# Function to print error messages
error() {
    echo -e "${RED}✗ $1${NC}"
    ((FAILED++))
}

# Function to print info messages
info() {
    echo -e "${BLUE}ℹ $1${NC}"
}

# Function to print section headers
section() {
    echo ""
    echo "============================================"
    echo "$1"
    echo "============================================"
}

###############################################################################
# 1. Environment Checks
###############################################################################
section "1. Environment Configuration"

# Check if .env exists
if [ -f ".env" ]; then
    success ".env file exists"
    
    # Check APP_DEBUG
    if grep -q "APP_DEBUG=false" .env; then
        success "APP_DEBUG is set to false (production mode)"
    else
        error "APP_DEBUG should be false for production"
    fi
    
    # Check APP_ENV
    if grep -q "APP_ENV=production" .env; then
        success "APP_ENV is set to production"
    else
        warning "APP_ENV is not set to production"
    fi
    
    # Check APP_KEY
    if grep -q "APP_KEY=base64:" .env; then
        success "APP_KEY is generated"
    else
        error "APP_KEY is not generated. Run: php artisan key:generate"
    fi
    
    # Check database configuration
    if grep -q "DB_DATABASE=" .env && ! grep -q "DB_DATABASE=$" .env; then
        success "Database configuration exists"
    else
        error "Database configuration is missing"
    fi
else
    error ".env file not found. Copy from .env.example"
fi

###############################################################################
# 2. File Permissions
###############################################################################
section "2. File Permissions"

# Check storage permissions
if [ -w "storage" ]; then
    success "Storage directory is writable"
else
    error "Storage directory is not writable"
fi

# Check bootstrap/cache permissions
if [ -w "bootstrap/cache" ]; then
    success "Bootstrap/cache directory is writable"
else
    error "Bootstrap/cache directory is not writable"
fi

# Check if storage link exists
if [ -L "public/storage" ]; then
    success "Storage link exists"
else
    warning "Storage link does not exist. Run: php artisan storage:link"
fi

###############################################################################
# 3. Dependencies
###############################################################################
section "3. Dependencies Check"

# Check if vendor directory exists
if [ -d "vendor" ]; then
    success "Composer dependencies installed"
else
    error "Composer dependencies not installed. Run: composer install"
fi

# Check if node_modules exists
if [ -d "node_modules" ]; then
    success "Node dependencies installed"
else
    warning "Node dependencies not installed. Run: npm install"
fi

# Check if compiled assets exist
if [ -d "public/build" ] || [ -f "public/mix-manifest.json" ]; then
    success "Frontend assets are compiled"
else
    warning "Frontend assets not compiled. Run: npm run build"
fi

###############################################################################
# 4. Database Connection
###############################################################################
section "4. Database Connection"

info "Testing database connection..."
if php artisan db:show > /dev/null 2>&1; then
    success "Database connection successful"
else
    if php -r "try { DB::connection()->getPdo(); echo 'OK'; } catch(Exception \$e) { exit(1); }" > /dev/null 2>&1; then
        success "Database connection successful"
    else
        error "Cannot connect to database. Check DB credentials in .env"
    fi
fi

###############################################################################
# 5. Routes & Configuration
###############################################################################
section "5. Routes & Configuration"

# Test routes list
info "Checking routes..."
if php artisan route:list > /dev/null 2>&1; then
    success "Routes are properly configured"
else
    error "Routes configuration has errors"
fi

# Check config cache
if [ -f "bootstrap/cache/config.php" ]; then
    success "Configuration is cached"
else
    warning "Configuration is not cached. Run: php artisan config:cache"
fi

###############################################################################
# 6. Critical Files
###############################################################################
section "6. Critical Files Check"

critical_files=(
    "app/Http/Controllers/FrontendController.php"
    "app/Http/Controllers/ProductController.php"
    "app/Models/Product.php"
    "app/Models/Category.php"
    "resources/views/pages/home.blade.php"
    "resources/views/pages/genset.blade.php"
    "routes/web.php"
)

for file in "${critical_files[@]}"; do
    if [ -f "$file" ]; then
        success "$file exists"
    else
        error "$file is missing!"
    fi
done

###############################################################################
# 7. Security Checks
###############################################################################
section "7. Security Checks"

# Check if .git is accessible from public
if [ -d "public/.git" ]; then
    error ".git directory is in public folder - SECURITY RISK!"
else
    success ".git directory is not publicly accessible"
fi

# Check if .env is accessible from public
if [ -f "public/.env" ]; then
    error ".env file is in public folder - SECURITY RISK!"
else
    success ".env file is not publicly accessible"
fi

# Check for dangerous files in public
dangerous_files=("public/composer.json" "public/package.json" "public/.env")
for file in "${dangerous_files[@]}"; do
    if [ -f "$file" ]; then
        error "$file should not be in public folder - SECURITY RISK!"
    fi
done

###############################################################################
# 8. Performance Checks
###############################################################################
section "8. Performance Optimization"

# Check if OPcache is enabled (PHP)
if php -r "echo extension_loaded('Zend OPcache') ? 'yes' : 'no';" | grep -q "yes"; then
    success "PHP OPcache is enabled"
else
    warning "PHP OPcache is not enabled - this will impact performance"
fi

# Check cache status
cache_files=("bootstrap/cache/config.php" "bootstrap/cache/routes-v7.php")
for file in "${cache_files[@]}"; do
    if [ -f "$file" ]; then
        success "$(basename $file) is cached"
    else
        warning "$(basename $file) is not cached"
    fi
done

###############################################################################
# 9. SEO Files
###############################################################################
section "9. SEO Configuration"

# Check robots.txt
if [ -f "public/robots.txt" ]; then
    success "robots.txt exists"
else
    warning "robots.txt not found"
fi

# Check sitemap
if [ -f "public/sitemap.xml" ]; then
    success "sitemap.xml exists"
else
    warning "sitemap.xml not found. Run: php artisan sitemap:generate"
fi

###############################################################################
# 10. Image Optimization
###############################################################################
section "10. Image Optimization"

# Check for WebP images
if find public/imgs -name "*.webp" | grep -q .; then
    success "WebP images found (optimized)"
else
    warning "No WebP images found. Run: ./convert-sliders.sh"
fi

###############################################################################
# 11. Generate Reports
###############################################################################
section "11. Optional: Generate Reports"

read -p "Generate sitemap now? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan sitemap:generate
    success "Sitemap generated"
fi

read -p "Run database migrations? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan migrate --force
    success "Migrations completed"
fi

###############################################################################
# Summary
###############################################################################
section "TEST SUMMARY"

echo ""
echo "Results:"
echo -e "${GREEN}✓ Passed: $PASSED${NC}"
echo -e "${YELLOW}⚠ Warnings: $WARNINGS${NC}"
echo -e "${RED}✗ Failed: $FAILED${NC}"
echo ""

if [ $FAILED -gt 0 ]; then
    echo -e "${RED}⚠ DEPLOYMENT NOT RECOMMENDED${NC}"
    echo "Please fix the failed checks before deploying to production."
    exit 1
elif [ $WARNINGS -gt 0 ]; then
    echo -e "${YELLOW}⚠ REVIEW WARNINGS${NC}"
    echo "Some optimizations are recommended but deployment can proceed."
    exit 0
else
    echo -e "${GREEN}✓ ALL CHECKS PASSED${NC}"
    echo "Application is ready for production deployment!"
    exit 0
fi
