# Task Breakdown: Laravel 12 Proje Kurulumu ve Konfigürasyonu

**Görev:** Laravel 12 proje kurulumu ve konfigürasyonu  
**Tarih:** 19 Ağustos 2025  
**Proje:** QR Menu System

---

## Adım Adım Parçalama (Step-by-Step Breakdown)

### 1. Geliştirme Ortamı Hazırlığı
**Açıklama:** Proje için gerekli yazılım ve araçların kurulumu  
**Tahmini Süre:** 1-2 saat  
**Bağımlılıklar:** Yok

**Alt Görevler:**
- PHP 8.3 kurulumu ve konfigürasyonu
- Composer kurulumu/güncellenmesi
- Node.js ve NPM kurulumu
- Git konfigürasyonu
- IDE/Editor setup (VS Code, PHPStorm vb.)

**Gerekli Komutlar:**
```bash
# PHP versiyonu kontrolü
php --version

# Composer kurulumu kontrolü
composer --version

# Node.js versiyonu kontrolü
node --version
npm --version
```

**Güvenlik Notları:**
- PHP 8.3'ün güvenlik güncellemeleri aktif olmalı
- Composer'ın güvenli kaynaklardan kurulduğundan emin olun

---

### 2. Laravel 12 Projesi Oluşturma
**Açıklama:** Yeni Laravel projesi oluşturma ve temel konfigürasyon  
**Tahmini Süre:** 30 dakika  
**Bağımlılıklar:** Adım 1

**Gerekli Komutlar:**
```bash
# Laravel 12 projesi oluşturma
composer create-project laravel/laravel qr_menu "^12.0"

# Proje dizinine geçiş
cd qr_menu

# Laravel versiyonu kontrolü
php artisan --version
```

**Oluşturulan/Düzenlenen Dosyalar:**
- Tüm Laravel core dosyaları
- `composer.json` - proje bağımlılıkları
- `artisan` - Laravel command line interface
- `.env.example` - environment variables template

---

### 3. Database Konfigürasyonu
**Açıklama:** MySQL veritabanı bağlantısı ve temel ayarların yapılması  
**Tahmini Süre:** 45 dakika  
**Bağımlılıklar:** Adım 2

**Düzenlenen Dosyalar:**
- `.env` - veritabanı bağlantı bilgileri
- `config/database.php` - veritabanı konfigürasyonu

**Örnek .env Konfigürasyonu:**
```env
APP_NAME="QR Menu System"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qr_menu
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

**Gerekli Komutlar:**
```bash
# Uygulama anahtarı oluşturma
php artisan key:generate

# Veritabanı bağlantısını test etme
php artisan migrate:status

# Storage link oluşturma
php artisan storage:link
```

**Güvenlik Notları:**
- `.env` dosyası asla version control'e eklenmemeli
- Güçlü APP_KEY kullanılmalı
- Veritabanı şifreleri güvenli olmalı

---

### 4. Temel Laravel Konfigürasyonu
**Açıklama:** Laravel'in temel ayarlarının project gereksinimlerine göre yapılandırılması  
**Tahmini Süre:** 1 saat  
**Bağımlılıklar:** Adım 3

**Düzenlenen Dosyalar:**
- `config/app.php` - uygulama ayarları
- `config/session.php` - session ayarları
- `config/cache.php` - cache ayarları
- `config/queue.php` - queue ayarları
- `config/mail.php` - mail ayarları

**Örnek config/app.php Değişiklikleri:**
```php
<?php
return [
    'name' => env('APP_NAME', 'QR Menu System'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'Europe/Istanbul',
    'locale' => 'tr',
    'fallback_locale' => 'en',
    // ... diğer ayarlar
];
```

**Gerekli Komutlar:**
```bash
# Config cache oluşturma
php artisan config:cache

# Route cache oluşturma
php artisan route:cache

# View cache oluşturma
php artisan view:cache
```

---

### 5. Güvenlik Konfigürasyonu
**Açıklama:** Laravel güvenlik özelliklerinin konfigürasyonu  
**Tahmini Süre:** 45 dakika  
**Bağımlılıklar:** Adım 4

**Düzenlenen Dosyalar:**
- `config/auth.php` - authentication ayarları
- `app/Http/Middleware/` - middleware konfigürasyonu
- `config/cors.php` - CORS ayarları (gerekirse)

**Güvenlik Konfigürasyonu:**
```php
// config/session.php
'secure' => env('SESSION_SECURE_COOKIE', true), // HTTPS ortamında
'http_only' => true,
'same_site' => 'strict',

// .env dosyasına eklenecek
SESSION_SECURE_COOKIE=true
SANCTUM_STATEFUL_DOMAINS=yourdomain.com
```

**Gerekli Komutlar:**
```bash
# Auth scaffold (gerekirse)
php artisan make:auth

# Policy oluşturma (örnek)
php artisan make:policy UserPolicy --model=User
```

**Güvenlik Kontrol Listesi:**
- CSRF koruması aktif
- XSS koruması aktif
- SQL Injection koruması (Eloquent kullanımı)
- HTTPS zorunluluğu (production)
- Güvenli session ayarları

---

### 6. Development Dependencies Kurulumu
**Açıklama:** Geliştirme ortamı için gerekli paketlerin kurulumu  
**Tahmini Süre:** 30 dakika  
**Bağımlılıklar:** Adım 5

**Kurulacak Paketler:**
```bash
# Development dependencies
composer require --dev laravel/telescope
composer require --dev barryvdh/laravel-debugbar
composer require --dev nunomaduro/collision
composer require --dev pestphp/pest
composer require --dev pestphp/pest-plugin-laravel

# Frontend dependencies
npm install
npm install --save-dev tailwindcss @tailwindcss/forms @tailwindcss/typography
npm install --save-dev alpinejs
```

**Konfigürasyon Komutları:**
```bash
# Telescope kurulumu
php artisan telescope:install
php artisan migrate

# Pest konfigürasyonu
./vendor/bin/pest --init

# Tailwind CSS konfigürasyonu
npx tailwindcss init -p
```

**Oluşturulan Dosyalar:**
- `config/telescope.php`
- `tests/Pest.php`
- `tailwind.config.js`
- `postcss.config.js`

---

### 7. Filament Admin Panel Kurulumu
**Açıklama:** Proje için gerekli Filament admin panel kurulumu ve konfigürasyonu  
**Tahmini Süre:** 1 saat  
**Bağımlılıklar:** Adım 6

**Kurulum Komutları:**
```bash
# Filament kurulumu
composer require filament/filament

# Filament panel kurulumu
php artisan filament:install --panels

# Admin user oluşturma
php artisan make:filament-user
```

**Oluşturulan/Düzenlenen Dosyalar:**
- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Filament/` dizini
- Filament konfigürasyon dosyaları

**Örnek AdminPanelProvider Konfigürasyonu:**
```php
<?php
namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
```

---

### 8. Git Repository Konfigürasyonu
**Açıklama:** Git repository kurulumu ve initial commit  
**Tahmini Süre:** 20 dakika  
**Bağımlılıklar:** Adım 7

**Git Komutları:**
```bash
# Git repository başlatma
git init

# .gitignore dosyası kontrol (Laravel otomatik oluşturur)
# Gerekirse düzenlemeler

# İlk commit
git add .
git commit -m "feat: initial Laravel 12 project setup with Filament admin panel"

# Remote repository bağlama (GitHub)
git remote add origin https://github.com/username/qr_menu.git
git branch -M main
git push -u origin main
```

**Kontrol Edilecek .gitignore İçeriği:**
```gitignore
/node_modules
/public/build
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.env.production
.phpunit.result.cache
Homestead.json
Homestead.yaml
auth.json
npm-debug.log
yarn-error.log
/.fleet
/.idea
/.vscode
```

---

### 9. Frontend Build Pipeline Konfigürasyonu
**Açıklama:** Vite build sistem konfigürasyonu ve frontend asset pipeline  
**Tahmini Süre:** 45 dakika  
**Bağımlılıklar:** Adım 8

**Düzenlenen Dosyalar:**
- `vite.config.js`
- `resources/css/app.css`
- `resources/js/app.js`
- `tailwind.config.js`

**Örnek vite.config.js:**
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

**Örnek tailwind.config.js:**
```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Filament/**/*.php",
    "./vendor/filament/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
```

**Build Komutları:**
```bash
# Development build
npm run dev

# Production build
npm run build

# Watch mode (development)
npm run dev
```

---

### 10. Testing Environment Kurulumu
**Açıklama:** Test environment ve temel test structure kurulumu  
**Tahmini Süre:** 30 dakika  
**Bağımlılıklar:** Adım 9

**Test Konfigürasyonu:**
```bash
# Pest test framework konfigürasyonu (zaten kurulu)
./vendor/bin/pest --init

# Test database konfigürasyonu
cp .env .env.testing
```

**.env.testing Düzenlemeleri:**
```env
APP_ENV=testing
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
CACHE_DRIVER=array
SESSION_DRIVER=array
QUEUE_CONNECTION=sync
```

**Örnek Test Dosyası (tests/Feature/ExampleTest.php):**
```php
<?php

use function Pest\Laravel\get;

test('the application returns a successful response', function () {
    $response = get('/');
    $response->assertStatus(200);
});

test('admin panel is accessible', function () {
    $response = get('/admin');
    // Redirect to login expected
    $response->assertStatus(302);
});
```

**Test Çalıştırma:**
```bash
# Tüm testleri çalıştırma
./vendor/bin/pest

# Tek test dosyası
./vendor/bin/pest tests/Feature/ExampleTest.php

# Coverage report
./vendor/bin/pest --coverage
```

---

### 11. Production Hazırlık ve Optimizasyon
**Açıklama:** Production deployment için optimizasyonlar  
**Tahmini Süre:** 30 dakika  
**Bağımlılıklar:** Adım 10

**Production Optimizasyon Komutları:**
```bash
# Cache optimizasyonu
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Autoloader optimizasyonu
composer install --optimize-autoloader --no-dev

# Frontend production build
npm run build
```

**Production .env Kontrol Listesi:**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database production ayarları
DB_CONNECTION=mysql
DB_HOST=production_host
DB_DATABASE=production_db
DB_USERNAME=production_user
DB_PASSWORD=strong_production_password

# Cache ayarları
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Mail ayarları
MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=mail_password
MAIL_ENCRYPTION=tls
```

---

### 12. Deployment ve Final Kontrollar
**Açıklama:** Deployment işlemi ve final system kontrolleri  
**Tahmini Süre:** 1 saat  
**Bağımlılıklar:** Adım 11

**Deployment Checklist:**
```bash
# Server requirement kontrolü
php --version # >= 8.3
composer --version
npm --version

# Permissions ayarları (Linux/Unix)
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Database migration
php artisan migrate --force

# Storage link
php artisan storage:link

# Queue worker (background process)
php artisan queue:work --daemon

# Final test
php artisan serve # Development server test
curl -I https://yourdomain.com # Production test
```

**Post-Deployment Kontroller:**
- [ ] Ana sayfa erişilebilir mi?
- [ ] Admin panel (/admin) erişilebilir mi?
- [ ] Database bağlantısı çalışıyor mu?
- [ ] SSL sertifikası aktif mi?
- [ ] Static dosyalar (CSS/JS) yükleniyor mu?
- [ ] Error logları temiz mi?
- [ ] Email gönderimi test edildi mi?
- [ ] Backup sistemi çalışıyor mu?

**Performance Test Komutları:**
```bash
# Artisan komutları performans testi
php artisan optimize
php artisan view:cache
php artisan config:cache
php artisan route:cache

# Database query optimization
php artisan model:show User # Model ilişkilerini kontrol et
```

---

## Toplam Tahmini Süre
**Yaklaşık 8-10 saat** (deneyimli geliştirici için)

## Risk Faktörleri
- Server konfigürasyon sorunları (+2 saat)
- Database migration problemleri (+1 saat)
- SSL sertifika kurulum sorunları (+1 saat)
- Third-party service entegrasyonları (+2-4 saat)

## Notlar
- Bu breakdown Laravel 12 için hazırlanmıştır
- Her adım bir sonrakine bağımlıdır, sıralı takip edilmelidir
- Production deployment sırasında backup alınması kritiktir
- Security best practices'e uyulması zorunludur
- Test coverage minimum %70 olmalıdır

## Ek Kaynaklar
- Laravel 12 Documentation
- Filament Documentation
- PHP 8.3 Migration Guide
- Laravel Security Best Practices
- Performance Optimization Guide
