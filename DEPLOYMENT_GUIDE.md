# 🚀 AMI Project - Deployment Guide

**Application:** Al Mohandes International - Diesel Generator Website  
**Version:** 1.0  
**Laravel Version:** 10.x  
**PHP Version:** 8.1+  
**Date:** 2025-12-30

---

## 📋 Table of Contents

1. [Server Requirements](#server-requirements)
2. [Pre-Deployment Checklist](#pre-deployment-checklist)
3. [Installation Steps](#installation-steps)
4. [Web Server Configuration](#web-server-configuration)
5. [SSL Certificate Setup](#ssl-certificate-setup)
6. [Performance Optimization](#performance-optimization)
7. [Security Configuration](#security-configuration)
8. [Backup Strategy](#backup-strategy)
9. [Troubleshooting](#troubleshooting)
10. [Maintenance](#maintenance)

---

## 🖥️ Server Requirements

### Minimum Requirements

- **Operating System:** Linux (Ubuntu 20.04+ or CentOS 8+)
- **PHP:** 8.1 or higher
- **Database:** MySQL 5.7+ / MariaDB 10.3+ / PostgreSQL 10+
- **Web Server:** Apache 2.4+ or Nginx 1.18+
- **Memory:** 1GB RAM minimum (2GB recommended)
- **Disk Space:** 10GB minimum
- **SSL Certificate:** Required for production

### Required PHP Extensions

```bash
php8.1-cli
php8.1-fpm
php8.1-mysql
php8.1-mbstring
php8.1-xml
php8.1-bcmath
php8.1-curl
php8.1-gd
php8.1-zip
php8.1-intl
php8.1-opcache
```

### Required System Packages

```bash
composer
nodejs (v16+)
npm
git
```

---

## ✅ Pre-Deployment Checklist

- [ ] Server meets all requirements
- [ ] Domain DNS configured
- [ ] Database created
- [ ] SSL certificate ready
- [ ] Backup system in place
- [ ] Email service configured (SMTP/SendGrid/etc.)
- [ ] All environment variables documented

---

## 📦 Installation Steps

### 1. Clone or Upload Project

```bash
# Option A: Clone from Git
cd /var/www
git clone [repository-url] ami
cd ami

# Option B: Upload via FTP/SFTP
# Upload files to /var/www/ami
```

### 2. Set Permissions

```bash
cd /var/www/ami
sudo chown -R www-data:www-data .
sudo find . -type f -exec chmod 644 {} \;
sudo find . -type d -exec chmod 755 {} \;
sudo chmod -R 775 storage bootstrap/cache
```

### 3. Install Dependencies

```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node dependencies
npm install

# Build frontend assets
npm run build
```

### 4. Configure Environment

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit environment file
nano .env
```

#### Required Environment Variables

```env
# Application
APP_NAME="Al Mohandes International"
APP_ENV=production
APP_KEY=base64:... # Generated automatically
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ami_database
DB_USERNAME=ami_user
DB_PASSWORD=secure_password_here

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Cache & Session
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=database

# Logging
LOG_CHANNEL=daily
LOG_LEVEL=error
```

### 5. Database Setup

```bash
# Run migrations
php artisan migrate --force

# Seed initial data (if needed)
php artisan db:seed --force

# Create storage link
php artisan storage:link
```

### 6. Optimize Application

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize autoloader
php artisan optimize
```

### 7. Run Optimization Script

```bash
# Make script executable
chmod +x optimize-production.sh

# Run optimization
./optimize-production.sh
```

---

## 🌐 Web Server Configuration

### Apache Configuration

Create `/etc/apache2/sites-available/ami.conf`:

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    ServerAdmin admin@yourdomain.com
    DocumentRoot /var/www/ami/public

    <Directory /var/www/ami/public>
        AllowOverride All
        Require all granted
        Options -Indexes +FollowSymLinks
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/ami_error.log
    CustomLog ${APACHE_LOG_DIR}/ami_access.log combined

    # Security Headers
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</VirtualHost>

<VirtualHost *:443>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    ServerAdmin admin@yourdomain.com
    DocumentRoot /var/www/ami/public

    <Directory /var/www/ami/public>
        AllowOverride All
        Require all granted
        Options -Indexes +FollowSymLinks
    </Directory>

    # SSL Configuration
    SSLEngine on
    SSLCertificateFile /path/to/certificate.crt
    SSLCertificateKeyFile /path/to/private.key
    SSLCertificateChainFile /path/to/ca-bundle.crt

    # Security Headers
    Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"

    ErrorLog ${APACHE_LOG_DIR}/ami_ssl_error.log
    CustomLog ${APACHE_LOG_DIR}/ami_ssl_access.log combined
</VirtualHost>
```

**Enable site and modules:**

```bash
sudo a2ensite ami.conf
sudo a2enmod rewrite ssl headers
sudo systemctl restart apache2
```

### Nginx Configuration

Create `/etc/nginx/sites-available/ami`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/ami/public;

    index index.php index.html index.htm;

    # SSL Configuration
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;

    # Security Headers
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;

    # Logging
    access_log /var/log/nginx/ami_access.log;
    error_log /var/log/nginx/ami_error.log;

    # Gzip Compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript application/x-javascript application/xml+rss application/json application/javascript;

    # Laravel routes
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP-FPM Configuration
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    # Deny access to hidden files
    location ~ /\. {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

**Enable site:**

```bash
sudo ln -s /etc/nginx/sites-available/ami /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

## 🔒 SSL Certificate Setup

### Using Let's Encrypt (Free)

```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache # For Apache
# OR
sudo apt install certbot python3-certbot-nginx  # For Nginx

# Generate certificate
sudo certbot --apache -d yourdomain.com -d www.yourdomain.com
# OR
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Auto-renewal is configured automatically
# Test renewal:
sudo certbot renew --dry-run
```

 ---

## ⚡ Performance Optimization

### PHP OPcache Configuration

Edit `/etc/php/8.1/fpm/php.ini`:

```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=60
opcache.fast_shutdown=1
opcache.enable_cli=0
```

### Database Optimization

```sql
-- Add indexes for better performance
ALTER TABLE `products` ADD INDEX `idx_slug` (`slug`);
ALTER TABLE `products` ADD INDEX `idx_subcategory` (`subcategory_id`);
ALTER TABLE `categories` ADD INDEX `idx_slug` (`slug`);
ALTER TABLE `subcategories` ADD INDEX `idx_category` (`category_id`);
```

### Image Optimization

```bash
# Run image optimization script
chmod +x convert-sliders.sh
./convert-sliders.sh
```

---

## 🛡️ Security Configuration

### Firewall Configuration

```bash
# UFW Firewall
sudo ufw allow 22    # SSH
sudo ufw allow 80    # HTTP
sudo ufw allow 443   # HTTPS
sudo ufw enable
```

### Secure File Permissions

```bash
# Set proper ownership
sudo chown -R www-data:www-data /var/www/ami

# Secure permissions
find /var/www/ami -type f -exec chmod 644 {} \;
find /var/www/ami -type d -exec chmod 755 {} \;
chmod -R 775 /var/www/ami/storage
chmod -R 775 /var/www/ami/bootstrap/cache

# Protect sensitive files
chmod 600 /var/www/ami/.env
```

---

## 💾 Backup Strategy

### Database Backup Script

Create `/usr/local/bin/ami-backup.sh`:

```bash
#!/bin/bash

# Configuration
DB_NAME="ami_database"
DB_USER="ami_user"
DB_PASS="your_password"
BACKUP_DIR="/var/backups/ami"
DATE=$(date +%Y%m%d_%H%M%S)

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME | gzip > $BACKUP_DIR/database_$DATE.sql.gz

# Backup files
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/ami/storage/app/public

# Delete backups older than 30 days
find $BACKUP_DIR -name "*.gz" -mtime +30 -delete

echo "Backup completed: $DATE"
```

### Cron Job for Automated Backups

```bash
# Edit crontab
sudo crontab -e

# Add daily backup at 2 AM
0 2 * * * /usr/local/bin/ami-backup.sh >> /var/log/ami-backup.log 2>&1
```

---

## 🔧 Troubleshooting

### Common Issues

**500 Internal Server Error**
```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Check web server logs
# Apache:
tail -f /var/log/apache2/ami_error.log

# Nginx:
tail -f /var/log/nginx/ami_error.log

# Check permissions
sudo chown -R www-data:www-data storage bootstrap/cache
```

**Database Connection Error**
```bash
# Verify credentials in .env
# Test database connection
php artisan tinker
>>> DB::connection()->getPdo();
```

**Missing CSS/JS Assets**
```bash
# Rebuild assets
npm run build

# Clear cache
php artisan cache:clear
php artisan config:clear
```

**Storage Link Broken**
```bash
# Recreate storage link
php artisan storage:link
```

---

## 🔄 Maintenance

### Regular Tasks

**Daily:**
- Check application logs for errors
- Verify automated backups completed

**Weekly:**
- Review server resources usage
- Check for security updates
- Test backup restoration

**Monthly:**
- Update dependencies (composer, npm)
- Review and optimize database
- Analyze performance metrics
- Update SSL certificate (if needed)

### Update Commands

```bash
# Update application (from Git)
cd /var/www/ami
git pull origin main
composer install --no-dev
npm install && npm run build
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---


**Last Updated:** 2025-12-30  
**Version:** 1.0
