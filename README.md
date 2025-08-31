# QR Menu

A modern, digital menu system for cafes and restaurants, powered by QR codes. Customers can scan QR codes at tables to access a mobile-friendly menu, while administrators manage products and categories through an intuitive admin panel.

## Features

- **QR Code Integration**: Seamless access to digital menus via QR codes
- **Product Management**: Full CRUD operations for products with categories
- **Mobile-First Design**: Responsive, touch-friendly interface optimized for mobile devices
- **Admin Panel**: Powerful Filament-based admin interface for easy content management
- **Media Library**: Integrated media management with Spatie Laravel Media Library
- **Multi-Language Support**: Built-in language switching capabilities
- **Performance Optimized**: Redis caching, query optimization, and eager loading
- **Security First**: HTTPS enforcement, CSRF protection, and role-based access control

## Technology Stack

- **Backend**: Laravel 12 (PHP 8.3)
- **Frontend**: Blade Templates, TailwindCSS 4.0, Vite
- **Database**: MySQL
- **Admin Panel**: Filament 3.3
- **Caching**: Redis
- **Monitoring**: Laravel Telescope
- **Testing**: Pest PHP
- **Code Quality**: Laravel Pint

## Prerequisites

- PHP 8.3 or higher
- Composer
- Filament 3.3
- MySQL 8.0+
- Redis (optional, for caching)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/qr-menu.git
   cd qr-menu
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - Create a MySQL database
   - Update `.env` file with database credentials
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start the application**
   ```bash
   php artisan serve
   ```

## Usage

### For Customers
1. Scan QR code at the table
2. Browse menu categories and products
3. View product details and options
4. Enjoy a contactless ordering experience

### For Administrators
1. Access admin panel at `/admin`
2. Login with admin credentials
3. Manage products, categories, and site settings
4. Upload media and configure menu options

## Development

### Running Tests
```bash
php artisan test
```

### Code Quality
```bash
./vendor/bin/pint
```

### Debugging
- Laravel Debugbar is included for development
- Laravel Telescope for monitoring and logging

## Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Configure web server (Nginx/Apache)
3. Set up SSL certificate
4. Enable caching and optimization
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Environment Variables
Key environment variables to configure:
- `APP_NAME` - Application name
- `APP_URL` - Base URL
- `DB_*` - Database configuration
- `CACHE_DRIVER` - Caching driver (redis/file)
- `QUEUE_CONNECTION` - Queue driver

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Security

This application implements several security measures:
- CSRF protection
- XSS prevention
- SQL injection protection
- Role-based access control
- HTTPS enforcement

For security issues, please email security@example.com instead of opening public issues.


## Support

For support, email yusuferdem.dev@gmail.com .


