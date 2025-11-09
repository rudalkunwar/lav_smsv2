# Migration Guide: lav_sms to lav_smsv2

## Project Migration Summary

This document outlines the migration from the old Laravel 8 project (lav_sms) to the new Laravel 12 project (lav_smsv2).

## Migration Overview

### Framework Version Upgrade

-   **Old Version**: Laravel 8 (PHP 7.2/8.0)
-   **New Version**: Laravel 12 (PHP 8.2+)

## Completed Migration Steps

### ✅ 1. Dependencies Updated (composer.json)

Added the following packages to match the old project:

-   `barryvdh/laravel-dompdf`: ^3.0 (PDF generation)
-   `guzzlehttp/guzzle`: ^7.0 (HTTP client)
-   `hashids/hashids`: ^5.0 (ID hashing)
-   `laravel/ui`: ^4.0 (UI scaffolding)
-   `barryvdh/laravel-ide-helper`: ^3.0 (IDE support)

### ✅ 2. Models Migrated

All models from `app/Models/` have been copied:

-   BloodGroup, Book, BookRequest, ClassType, Dorm
-   Exam, ExamRecord, Grade, Lga, Mark, MyClass
-   Nationality, Payment, PaymentRecord, Pin, Promotion
-   Receipt, Section, Setting, Skill, StaffRecord
-   State, StudentRecord, Subject, TimeSlot, TimeTable
-   TimeTableRecord, UserType
-   User model (from app/User.php to app/Models/User.php)

### ✅ 3. Database Migrations Copied

All 29 migration files have been copied to the new project.

### ✅ 4. Controllers Migrated

Copied all controllers including:

-   AjaxController, HomeController, MyAccountController
-   TestController, Auth controllers
-   MyParent controllers
-   SuperAdmin controllers
-   SupportTeam controllers

### ✅ 5. Middleware Migrated

All middleware including custom middleware:

-   Admin, SuperAdmin, TeamSA, TeamSAT
-   TeamAccount, ExamIsLocked, MyParent

### ✅ 6. Form Requests Migrated

All form request validation classes have been copied.

### ✅ 7. Helpers & Repositories Migrated

-   Helper classes: Qs.php, Mk.php, Pay.php (registered in composer.json autoload)
-   Repository classes: DormRepo, ExamRepo, LocationRepo, MarkRepo, MyClassRepo, PaymentRepo, PinRepo, SettingRepo, StudentRepo, TimeTableRepo, UserRepo

### ✅ 8. Routes Migrated

All route files copied:

-   web.php, api.php, console.php, channels.php

### ✅ 9. Views & Assets Migrated

-   All Blade views from resources/views
-   Language files from resources/lang
-   Public assets from public/assets
-   Global assets from public/global_assets

### ✅ 10. Configuration Files

-   All config files from config/ directory
-   .env.example file
-   Http Kernel with middleware configuration
-   Console Kernel
-   Service Providers (AppServiceProvider, AuthServiceProvider, EventServiceProvider, RouteServiceProvider)

### ✅ 11. Database Seeders & Factories

All seeder and factory files have been migrated.

### ✅ 12. Laravel 12 Compatibility Updates

#### bootstrap/app.php

Updated to register routes and middleware using Laravel 12's new configuration approach:

-   Added API routes
-   Added channels routes
-   Registered custom middleware aliases

#### bootstrap/providers.php

Registered all service providers:

-   AppServiceProvider
-   AuthServiceProvider
-   EventServiceProvider
-   RouteServiceProvider

## Next Steps

### 1. Install Dependencies

```bash
cd lav_smsv2
composer install
npm install
```

### 2. Environment Configuration

```bash
# Copy .env.example to .env
copy .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
# Update DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

### 3. Run Migrations

```bash
php artisan migrate
```

### 4. Seed Database (if applicable)

```bash
php artisan db:seed
```

### 5. Generate IDE Helper Files

```bash
composer dump-autoload
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models
```

### 6. Compile Frontend Assets

```bash
npm run build
# For development:
npm run dev
```

### 7. Storage Link

```bash
php artisan storage:link
```

### 8. Testing

```bash
# Run tests
php artisan test

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## Important Laravel 12 Breaking Changes to Review

### 1. Middleware Registration

-   In Laravel 12, middleware is now registered in `bootstrap/app.php` instead of `Http/Kernel.php`
-   The old Kernel.php file has been kept for reference but middleware aliases are now in bootstrap/app.php

### 2. Service Providers

-   Service providers are now registered in `bootstrap/providers.php`
-   Make sure all custom service providers are listed there

### 3. Route Configuration

-   Routes are now configured in `bootstrap/app.php`
-   API and web routes are explicitly defined

### 4. Namespacing

-   Ensure all models have proper namespace declarations
-   Controllers should use proper namespacing

### 5. Deprecations to Address

Review the following for potential issues:

-   Date handling (Carbon)
-   Mail configuration (MAIL_DRIVER changed to MAIL_MAILER)
-   Queue configuration updates
-   Pagination changes
-   Blade component updates

## Code Review Checklist

### High Priority

-   [ ] Review all model relationships and ensure they work with Laravel 12
-   [ ] Test all custom middleware functionality
-   [ ] Verify authentication and authorization flows
-   [ ] Check database seeders for compatibility
-   [ ] Test PDF generation with updated dompdf package
-   [ ] Review and update any raw SQL queries

### Medium Priority

-   [ ] Update JavaScript/CSS build process if needed (Vite vs Mix)
-   [ ] Review Blade templates for deprecated syntax
-   [ ] Check third-party package compatibility
-   [ ] Update API routes and test API endpoints
-   [ ] Review file upload/storage functionality

### Low Priority

-   [ ] Update documentation
-   [ ] Review and update tests
-   [ ] Code style updates for PHP 8.2 features
-   [ ] Performance optimization

## Known Issues to Address

1. **Webpack Mix vs Vite**: The old project uses webpack.mix.js but Laravel 12 uses Vite. You may need to:

    - Migrate to Vite configuration
    - Update asset compilation commands
    - Update asset references in Blade templates

2. **Service Provider Updates**: Review all service providers for deprecated methods

3. **Deprecated Methods**: Search for and update:
    - `now()` vs `Carbon::now()`
    - Array and string helpers (use Str:: and Arr:: facades)
    - Request validation changes

## Resources

-   [Laravel 12 Upgrade Guide](https://laravel.com/docs/12.x/upgrade)
-   [Laravel 12 Documentation](https://laravel.com/docs/12.x)
-   [PHP 8.2 Release Notes](https://www.php.net/releases/8.2/en.php)

## Rollback Plan

If migration issues occur:

1. The original project remains in `lav_sms` directory
2. Database backups should be created before migration
3. All original files are preserved

## Support

For issues or questions during migration:

1. Check Laravel 12 documentation
2. Review the upgrade guide
3. Check package documentation for compatibility
4. Test incrementally and fix issues as they arise

---

**Migration Date**: November 9, 2025
**Migrated By**: AI Assistant
**Status**: Code Migration Complete - Testing Required
