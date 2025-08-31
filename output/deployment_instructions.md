# QR Menü Projesi - Deployment Talimatları

## 1. Pre-Deployment Checklist

### 1.1 Development Environment Kontrolü
```bash
# Laravel version kontrolü
php artisan --version

# PHP version kontrolü (minimum 8.2)
php --version

# Composer dependencies kontrolü
composer install --no-dev --optimize-autoloader

# NPM dependencies kontrolü
npm ci
npm run build
```

### 1.2 Database Hazırlığı
```bash
# Migration kontrolü
php artisan migrate:status

# Migration rollback testi (staging ortamında)
php artisan migrate:rollback --step=1
php artisan migrate
```

### 1.3 Environment Konfigürasyon Kontrolü
```env
# Zorunlu .env değişkenleri kontrol listesi
APP_NAME=QR_Menu
APP_ENV=production
APP_KEY=base64:GENERATED_KEY  # php artisan key:generate ile oluştur
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qr_menu_prod
DB_USERNAME=db_username
DB_PASSWORD=secure_password

# Cache ayarları
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis ayarları
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=redis_password
REDIS_PORT=6379

# Mail ayarları
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
```

### 1.4 Güvenlik Kontrolü
- [ ] HTTPS certificate yüklü ve aktif
- [ ] Firewall kuralları ayarlanmış
- [ ] Database kullanıcı yetkileri minimum seviyede
- [ ] .env dosyası web erişimi dışında
- [ ] Log dosyaları write permissionları ayarlanmış

## 2. Server Hazırlık Aşamaları

### 2.1 Sunucu Gereksinimleri
```bash
# PHP Extensions kontrolü
php -m | grep -E "(mbstring|openssl|PDO|Tokenizer|XML|ctype|json|bcmath|fileinfo|gd)"

# Gerekli PHP extensions
sudo apt-get install php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath
```

### 2.2 Web Server Konfigürasyonu (Nginx)
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    
    server_name yourdomain.com;
    root /var/www/qr_menu/public;
    
    index index.php;
    
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
    
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
    
    # Güvenlik headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;
}
```

### 2.3 Directory Permissions
```bash
# Laravel directory permissions
sudo chown -R www-data:www-data /var/www/qr_menu
sudo chmod -R 755 /var/www/qr_menu
sudo chmod -R 775 /var/www/qr_menu/storage
sudo chmod -R 775 /var/www/qr_menu/bootstrap/cache
```

## 3. Step-by-Step Deployment Instructions

### 3.1 Pre-Deployment Backup
```bash
# Database backup
mysqldump -u username -p database_name > backup_$(date +%Y%m%d_%H%M%S).sql

# Files backup
tar -czf qr_menu_backup_$(date +%Y%m%d_%H%M%S).tar.gz /var/www/qr_menu/

# .env file backup
cp /var/www/qr_menu/.env /var/www/qr_menu/.env.backup.$(date +%Y%m%d_%H%M%S)
```

### 3.2 Code Deployment
```bash
# 1. Maintenance mode açma
cd /var/www/qr_menu
php artisan down --message="Site güncelleniyor, lütfen birkaç dakika sonra tekrar deneyin."

# 2. Git pull (eğer git kullanılıyorsa)
git fetch origin
git reset --hard origin/main

# 3. Composer dependencies güncelleme
composer install --no-dev --optimize-autoloader --no-interaction

# 4. NPM build
npm ci --production
npm run build

# 5. Environment konfigürasyonu
cp .env.example .env
# .env dosyasını production değerleri ile düzenle
php artisan key:generate --force

# 6. Storage link oluşturma
php artisan storage:link

# 7. Database migrations
php artisan migrate --force

# 8. Database seeding (sadece ilk deployment)
php artisan db:seed --force

# 9. Cache temizleme ve optimizasyon
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 10. Production cache oluşturma
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 11. Maintenance mode kapatma
php artisan up
```

### 3.3 Queue Workers (Production)
```bash
# Supervisor konfigürasyonu
sudo nano /etc/supervisor/conf.d/qr_menu_worker.conf

[program:qr_menu_worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/qr_menu/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/qr_menu/storage/logs/worker.log
stopwaitsecs=3600

# Supervisor restart
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start qr_menu_worker:*
```

### 3.4 Cron Jobs Kurulumu
```bash
# Crontab düzenleme
sudo crontab -e

# Laravel scheduler
* * * * * cd /var/www/qr_menu && php artisan schedule:run >> /dev/null 2>&1

# Database backup (günlük 2:00)
0 2 * * * mysqldump -u username -p'password' database_name > /var/backups/qr_menu_$(date +\%Y\%m\%d).sql

# Log rotation (haftalık)
0 0 * * 0 find /var/www/qr_menu/storage/logs -name "*.log" -mtime +7 -delete
```

## 4. Post-Deployment Verification

### 4.1 Application Health Check
```bash
# Basic connectivity test
curl -I https://yourdomain.com

# Application status check
php artisan inspire

# Database connectivity
php artisan tinker
# Test: User::count()

# Queue status
php artisan queue:work --once

# Cache test
php artisan cache:clear
php artisan config:cache
```

### 4.2 Critical Function Tests
```bash
# Admin panel erişim testi
curl -I https://yourdomain.com/admin

# API endpoints test (eğer var ise)
curl -X GET https://yourdomain.com/api/health

# Database migration status
php artisan migrate:status
```

### 4.3 Performance Tests
```bash
# Response time test
curl -w "@curl-format.txt" -o /dev/null -s "https://yourdomain.com"

# Database query performance
php artisan db:show --counts

# Log file kontrolü
tail -f storage/logs/laravel.log
```

## 5. Monitoring ve Logging

### 5.1 Log Management
```bash
# Log dosyaları lokasyonu
/var/www/qr_menu/storage/logs/

# Log rotation setup
sudo nano /etc/logrotate.d/qr_menu

/var/www/qr_menu/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    notifempty
    create 644 www-data www-data
    sharedscripts
}
```

### 5.2 Monitoring Script
```bash
#!/bin/bash
# monitoring.sh - Basic health check script

DOMAIN="https://yourdomain.com"
LOG_FILE="/var/log/qr_menu_monitor.log"

# HTTP status check
HTTP_STATUS=$(curl -o /dev/null -s -w "%{http_code}\n" $DOMAIN)
if [ $HTTP_STATUS != "200" ]; then
    echo "$(date): ERROR - Site is down. HTTP Status: $HTTP_STATUS" >> $LOG_FILE
    # Send alert email
    echo "QR Menu site is down!" | mail -s "Site Alert" admin@yourdomain.com
fi

# Database check
cd /var/www/qr_menu
if ! php artisan tinker --execute="DB::connection()->getPdo(); echo 'DB OK';" > /dev/null 2>&1; then
    echo "$(date): ERROR - Database connection failed" >> $LOG_FILE
fi
```

## 6. Rollback Procedure

### 6.1 Emergency Rollback
```bash
# 1. Maintenance mode
php artisan down

# 2. Git rollback (eğer git kullanılıyorsa)
git reset --hard PREVIOUS_COMMIT_HASH

# 3. Database rollback
mysql -u username -p database_name < backup_YYYYMMDD_HHMMSS.sql

# 4. Composer rollback
composer install --no-dev --optimize-autoloader

# 5. Cache clear
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 6. Site açma
php artisan up
```

### 6.2 Incremental Rollback
```bash
# Belirli migration'ları geri alma
php artisan migrate:rollback --step=1

# Specific cache clear
php artisan config:clear
php artisan route:cache
```

## 7. Security Checklist (Deployment Sonrası)

### 7.1 Zorunlu Güvenlik Kontrolleri
- [ ] APP_DEBUG=false olduğunu doğrula
- [ ] .env dosyası web erişimi dışında
- [ ] Database kullanıcıları minimum yetkilere sahip
- [ ] HTTPS zorunlu ve çalışır durumda
- [ ] Firewall kuralları aktif
- [ ] Log dosyaları web erişimi dışında
- [ ] Admin panel güçlü parola ile korumalı
- [ ] File upload restrictions aktif

### 7.2 Performance Validation
```bash
# Page speed test
curl -w "Total time: %{time_total}\n" -o /dev/null -s https://yourdomain.com

# Database performance
php artisan db:show --counts

# Cache effectiveness check
php artisan route:list | wc -l
```

## 8. Cleanup Tasks (Deployment Sonrası Temizlik)

### 8.1 Silinmesi Gereken Dosyalar
```bash
# Development dosyalarını sil
rm -rf node_modules/
rm -rf .git/ # (Eğer production sunucuda git gerekli değilse)
rm -rf tests/ # (Eğer production'da test gerekli değilse)
rm package-lock.json
rm webpack.mix.js # (Eğer kullanılmıyorsa)

# Geçici dosyalar temizliği
rm -rf storage/debugbar/
find storage/logs/ -name "*.log" -mtime +30 -delete
```

### 8.2 Permission Final Check
```bash
# Final permission check
find /var/www/qr_menu -type f -exec chmod 644 {} \;
find /var/www/qr_menu -type d -exec chmod 755 {} \;
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

## 9. Post-Deployment Support

### 9.1 İlk 24 Saat İzleme
- HTTP status monitoring her 5 dakikada bir
- Database connection check saatlik
- Error log monitoring sürekli
- Performance metrics günlük rapor

### 9.2 Support Contact Information
```
Technical Lead: [Name] - [Email] - [Phone]
System Admin: [Name] - [Email] - [Phone]
Emergency Contact: [Name] - [Email] - [Phone]
```

### 9.3 Backup Verification
```bash
# Backup integrity check
mysqldump -u username -p database_name | gzip > test_backup.sql.gz
gunzip -t test_backup.sql.gz && echo "Backup OK" || echo "Backup CORRUPTED"
```

## 10. Success Criteria

Deployment başarılı sayılması için:
- [ ] Site HTTPS üzerinden erişilebilir
- [ ] Admin panel login çalışıyor
- [ ] Database bağlantısı aktif
- [ ] QR kod üretimi fonksiyonel (geliştirildikten sonra)
- [ ] Mobil uyumlu menü görüntüleniyor (geliştirildikten sonra)
- [ ] Log dosyalarında kritik hata yok
- [ ] Performance hedefleri karşılanıyor (<200ms response time)
- [ ] Backup sistemleri çalışıyor
- [ ] Monitoring sistemleri aktif

---

**Not:** Bu deployment talimatları QR Menü projesine özel olarak hazırlanmıştır. Her ortam için .env değişkenleri ve server konfigürasyonları uygun şekilde düzenlenmelidir.

**Deployment Süresi:** Yaklaşık 30-60 dakika (sunucu hazırlığı hariç)
**Gerekli Downtime:** 5-10 dakika
**Risk Seviyesi:** Düşük (backup prosedürleri ile)
