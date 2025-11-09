# Laravel School Management System (LAVSMS)

<div align="center">

**A comprehensive, modern school management system built with Laravel 12**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://www.php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

[Features](#-features) • [Installation](#-installation) • [Configuration](#-configuration) • [User Guide](#-user-guide) • [Deployment](#-deployment)

</div>

---

## 📋 Table of Contents

-   [About](#-about)
-   [Features](#-features)
-   [System Requirements](#-system-requirements)
-   [Installation](#-installation)
    -   [Step 1: Clone Repository](#step-1-clone-the-repository)
    -   [Step 2: Install Dependencies](#step-2-install-dependencies)
    -   [Step 3: Environment Configuration](#step-3-environment-configuration)
    -   [Step 4: Database Setup](#step-4-database-setup)
    -   [Step 5: Asset Compilation](#step-5-compile-frontend-assets)
    -   [Step 6: Launch Application](#step-6-launch-application)
-   [Configuration](#-configuration)
-   [User Roles & Permissions](#-user-roles--permissions)
-   [User Guide](#-user-guide)
-   [Default Credentials](#-default-credentials)
-   [Development Workflow](#-development-workflow)
-   [Troubleshooting](#-troubleshooting)
-   [Deployment](#-deployment)
-   [Project Structure](#-project-structure)
-   [API Documentation](#-api-documentation)
-   [Contributing](#-contributing)
-   [Testing](#-testing)
-   [Security](#-security)
-   [License](#-license)
-   [Support & Contact](#-support--contact)

---

## 🎯 About

**LAVSMS (Laravel School Management System)** is a comprehensive, feature-rich school management platform designed for educational institutions including schools, colleges, and training centers. Built on Laravel 12 with modern PHP 8.2+ features, it provides a robust solution for managing students, staff, academics, finances, and institutional operations.

### Why LAVSMS?

-   **Role-Based Access Control**: 7 distinct user types with granular permissions
-   **Academic Management**: Complete exam, grading, and marksheet system
-   **Financial Tracking**: Payment management with receipt generation
-   **Modern Architecture**: Clean code structure with Repository pattern
-   **Responsive Design**: Mobile-friendly interface with Tailwind CSS
-   **Extensible**: Easy to customize and extend functionality

---

## ✨ Features

### 🎓 Academic Management

-   **Student Records**: Complete student profile management with photo upload
-   **Class & Section Management**: Organize students by classes and sections
-   **Subject Management**: Define subjects per class with teacher assignments
-   **Exam System**: Create exams, record marks, generate marksheets
-   **Grading System**: Configurable grade scales and evaluation criteria
-   **Promotion System**: Automated student promotion to next academic year
-   **Timetable Management**: Class schedules and period management

### 👥 User Management

-   **Multi-Role System**: Super Admin, Admin, Teacher, Accountant, Librarian, Parent, Student
-   **Profile Management**: Individual profile editing with avatar support
-   **Password Management**: Secure password change and reset functionality
-   **User Activity Tracking**: Monitor user actions and system usage

### 💰 Financial Management

-   **Payment Records**: Track all fee payments per student
-   **Receipt Generation**: Print/PDF receipts for payments
-   **Fee Configuration**: Set up various fee types and amounts
-   **Payment History**: Complete transaction history and reports
-   **Accountant Dashboard**: Dedicated interface for financial operations

### 📚 Library Management

-   **Book Catalog**: Complete library inventory management
-   **Book Requests**: Students can request books
-   **Issue/Return Tracking**: Monitor borrowed books and due dates
-   **Librarian Dashboard**: Dedicated interface for library operations

### 📊 Reporting & Analytics

-   **Student Marksheets**: Individual and bulk marksheet generation
-   **Tabulation Sheets**: Class-wise performance reports
-   **Attendance Reports**: Track student attendance (if enabled)
-   **Payment Reports**: Financial summaries and statements
-   **Performance Analytics**: Grade distribution and class analytics

### 🔧 System Features

-   **Settings Management**: Configure system-wide settings
-   **Notice Board**: Post announcements visible to all users
-   **Calendar Integration**: Events and notices in dashboard calendar
-   **Dormitory Management**: Manage student hostels/dorms
-   **Blood Group & Nationality**: Student health and demographic data
-   **State & LGA Management**: Location hierarchy for Nigerian institutions

---

## 💻 System Requirements

### Minimum Requirements

| Component      | Requirement                                 |
| -------------- | ------------------------------------------- |
| **PHP**        | 8.2 or higher                               |
| **Composer**   | 2.5+                                        |
| **Database**   | MySQL 8.0+ / MariaDB 10.3+ / PostgreSQL 12+ |
| **Node.js**    | 18.x or higher                              |
| **npm**        | 9.x or higher                               |
| **Web Server** | Apache 2.4+ / Nginx 1.20+                   |
| **Memory**     | Minimum 512MB RAM (2GB recommended)         |
| **Storage**    | Minimum 1GB free space                      |

### PHP Extensions (Required)

Ensure the following PHP extensions are enabled:

```
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON
- BCMath
- Fileinfo
- GD (for image processing)
- ZIP (for backup/export features)
```

### Check Your PHP Configuration

```powershell
# Check PHP version
php -v

# Check installed extensions
php -m

# Check Composer version
composer --version

# Check Node.js and npm versions
node -v
npm -v
```

---

## 🚀 Installation

Follow these steps carefully to set up LAVSMS on your local development environment.

### Step 1: Clone the Repository

```powershell
# Navigate to your desired directory
cd C:\your\desired\path

# Clone the repository
git clone https://github.com/rudalkunwar/lav_smsv2.git

# Navigate into the project directory
cd lav_smsv2
```

### Step 2: Install Dependencies

#### Install PHP Dependencies

```powershell
# Install all Composer packages
composer install
```

**Note**: This may take a few minutes depending on your internet connection.

#### Install Node.js Dependencies

```powershell
# Install npm packages
npm install
```

### Step 3: Environment Configuration

#### Create Environment File

```powershell
# Copy the example environment file
copy .env.example .env
```

#### Configure Environment Variables

Open `.env` file in your text editor and configure the following:

##### Application Settings

```env
APP_NAME="LAVSMS - School Management"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000
APP_TIMEZONE=UTC
APP_LOCALE=en
```

##### Database Configuration

For **MySQL** (recommended):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lavsms
DB_USERNAME=root
DB_PASSWORD=your_password
```

For **PostgreSQL**:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=lavsms
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

##### Mail Configuration (Optional for Email Features)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourschool.com
MAIL_FROM_NAME="${APP_NAME}"
```

##### Session & Cache Configuration

```env
SESSION_DRIVER=database
SESSION_LIFETIME=120

CACHE_STORE=database
QUEUE_CONNECTION=database
```

#### Generate Application Key

```powershell
# Generate unique application encryption key
php artisan key:generate
```

### Step 4: Database Setup

#### Create Database

First, create a new database using your preferred method:

**Using MySQL Command Line:**

```powershell
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE lavsms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**Using phpMyAdmin:**

-   Open phpMyAdmin
-   Click "New" to create a database
-   Name it `lavsms`
-   Select `utf8mb4_unicode_ci` collation
-   Click "Create"

#### Run Migrations

```powershell
# Run all database migrations
php artisan migrate
```

This will create all necessary tables including:

-   Users and authentication tables
-   Student records and academic data
-   Exam and grading tables
-   Payment and financial records
-   Library management tables
-   System settings and configurations

#### Seed Database with Sample Data

```powershell
# Seed the database with initial data
php artisan db:seed
```

This will populate:

-   User types (Super Admin, Admin, Teacher, etc.)
-   Sample user accounts for testing
-   Blood groups, nationalities, states
-   Sample classes, sections, and subjects
-   Default system settings

### Step 5: Compile Frontend Assets

#### Development Build (with hot reload)

```powershell
# Build assets for development
npm run dev
```

Keep this terminal open while developing for hot module replacement.

#### Production Build

```powershell
# Build optimized assets for production
npm run build
```

### Step 6: Launch Application

#### Start Development Server

```powershell
# Start Laravel development server
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

#### Alternative: Use Composer Script

```powershell
# Run the automated development script (starts server, queue, logs, and vite)
composer dev
```

This script runs:

-   PHP development server
-   Queue worker
-   Laravel Pail (log viewer)
-   Vite development server

**Access the application**: Open your browser and navigate to `http://localhost:8000`

---

## ⚙️ Configuration

### System Settings

After installation, login as Super Admin and configure:

1. **School Information**

    - Navigate to **Settings** → **System Settings**
    - Update school name, address, phone, email
    - Upload school logo and letterhead

2. **Academic Year**

    - Set current academic session
    - Define term/semester structure

3. **Payment Types**

    - Configure fee categories (Tuition, Library, Sports, etc.)
    - Set default amounts per class

4. **Exam Configuration**
    - Set up exam types (Mid-term, Final, etc.)
    - Configure grading scales

### File Storage Configuration

```powershell
# Create symbolic link for public storage
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public` for file uploads.

### Queue Configuration (Optional)

For background job processing:

```powershell
# Run queue worker
php artisan queue:work

# Or run in background (Windows)
php artisan queue:work --daemon
```

### Cache Configuration

```powershell
# Clear all caches
php artisan optimize:clear

# Cache config and routes for better performance
php artisan optimize
```

---

## 👥 User Roles & Permissions

### 1. Super Admin 🔐

**Full System Access** - Complete control over all system features

**Capabilities:**

-   ✅ Create, edit, and delete any user account
-   ✅ Delete any record (students, exams, payments, etc.)
-   ✅ Access all administrative features
-   ✅ Configure system-wide settings
-   ✅ Manage all modules without restrictions
-   ✅ View system logs and analytics

### 2. Admin 👨‍💼

**High-Level Administrative Access** - Most administrative features except deletions

**Capabilities:**

-   ✅ Manage student admissions and records
-   ✅ Create and manage classes, sections, subjects
-   ✅ Create user accounts (except Super Admin)
-   ✅ Manage exams and grades
-   ✅ Configure payments and fees
-   ✅ View all reports and analytics
-   ✅ Manage notice board
-   ✅ Edit system settings
-   ❌ Cannot delete critical records (reserved for Super Admin)

### 3. Teacher 👨‍🏫

**Academic & Class Management** - Focused on teaching and assessment

**Capabilities:**

-   ✅ View assigned classes and subjects
-   ✅ Manage marks for assigned subjects
-   ✅ Record exam results for own classes
-   ✅ Upload study materials for students
-   ✅ View student profiles in assigned classes
-   ✅ Manage class timetable (if class teacher)
-   ✅ Update own profile and password
-   ✅ View notice board and calendar
-   ❌ Cannot access financial or administrative modules

### 4. Accountant 💰

**Financial Management** - Complete control over payments and fees

**Capabilities:**

-   ✅ Record student payments
-   ✅ Generate and print receipts
-   ✅ View payment history and reports
-   ✅ Manage fee types and amounts
-   ✅ Export financial statements
-   ✅ View student financial records
-   ✅ Update own profile
-   ❌ Cannot access academic or administrative modules

### 5. Librarian 📚

**Library Operations** - Manage books and library resources

**Capabilities:**

-   ✅ Add and manage book catalog
-   ✅ Process book issue requests
-   ✅ Track book returns and due dates
-   ✅ Manage book inventory
-   ✅ View student library history
-   ✅ Generate library reports
-   ✅ Update own profile
-   ❌ Cannot access other modules

### 6. Student 🎓

**Personal Academic Access** - View own information and performance

**Capabilities:**

-   ✅ View own profile and class information
-   ✅ View assigned subjects and teachers
-   ✅ Check exam results and marksheets
-   ✅ Download/print marksheets (PDF)
-   ✅ View class timetable
-   ✅ View payment records
-   ✅ Request library books
-   ✅ View notice board and school events
-   ✅ Update profile picture and password
-   ❌ Cannot view other students' data

### 7. Parent 👪

**Child Monitoring** - Access child's academic and financial information

**Capabilities:**

-   ✅ View child's profile and class details
-   ✅ View child's exam results and marksheets
-   ✅ Download/print child's marksheets (PDF)
-   ✅ View child's timetable
-   ✅ View child's payment history
-   ✅ View teacher contact information
-   ✅ View notice board and school calendar
-   ✅ Update own profile
-   ❌ Cannot make changes to child's records

---

## 📖 User Guide

### For Super Admin / Admin

#### Adding a New Student

1. Navigate to **Students** → **Admit Student**
2. Fill in student details:
    - Personal information (name, DOB, gender)
    - Contact details (address, phone, email)
    - Parent/Guardian information
    - Class and section assignment
    - Upload student photo (optional)
3. Click **Submit** to create student record
4. System auto-generates student admission number

#### Creating Exam and Recording Marks

1. **Create Exam:**

    - Go to **Exams** → **Create Exam**
    - Set exam name, type, year, and term
    - Click **Save**

2. **Record Marks:**

    - Go to **Exams** → **Manage Exam Records**
    - Select exam, class, section, and subject
    - Enter marks for each student
    - Click **Submit Marks**

3. **Generate Marksheets:**
    - Go to **Exams** → **Marksheets**
    - Select exam, class, and student
    - Click **Print** or **Download PDF**

#### Managing Payments

1. Navigate to **Payments** → **Create Payment Record**
2. Select student and academic year
3. Choose payment type (Tuition, Library, etc.)
4. Enter amount and payment details
5. Generate receipt

#### Promoting Students

1. Go to **Students** → **Promotion**
2. Select current academic year, class, and section
3. Select students to promote
4. Choose destination class for next year
5. Click **Promote Selected Students**

### For Teachers

#### Recording Exam Marks

1. Login to teacher account
2. Navigate to **Exams** → **Marks**
3. Select your subject and class
4. Enter marks for each student
5. Submit marks

#### Uploading Study Materials

1. Go to **Resources** → **Study Materials**
2. Select class and subject
3. Upload files (PDFs, documents, etc.)
4. Add description and click **Upload**

### For Students

#### Viewing Marksheet

1. Login to student account
2. Go to **My Exams** → **Marksheets**
3. Select exam to view results
4. Click **Print** to download PDF

#### Checking Payments

1. Navigate to **My Payments**
2. View all payment records
3. Click on payment to view/print receipt

### For Parents

#### Viewing Child's Progress

1. Login to parent account
2. Dashboard shows child's overview
3. Navigate to **Results** to view marksheets
4. Go to **Payments** to see fee records

---

## 🔑 Default Credentials

After running database seeders, use these credentials to login for testing:

| Role            | Email                     | Password | Access Level                |
| --------------- | ------------------------- | -------- | --------------------------- |
| **Super Admin** | cj@cj.com                 | cj       | Full system access          |
| **Admin**       | admin@admin.com           | cj       | Administrative access       |
| **Teacher**     | teacher@teacher.com       | cj       | Teaching & class management |
| **Accountant**  | accountant@accountant.com | cj       | Financial management        |
| **Librarian**   | librarian@librarian.com   | cj       | Library operations          |
| **Student**     | student@student.com       | cj       | Student portal access       |
| **Parent**      | parent@parent.com         | cj       | Parent portal access        |

### ⚠️ Security Notice

**IMPORTANT:** These are development/testing credentials only!

**Before deploying to production:**

1. Change all default passwords immediately
2. Delete or disable test accounts
3. Create strong, unique passwords for all admin accounts
4. Enable two-factor authentication (if implemented)
5. Regularly rotate passwords

**Change Password Steps:**

1. Login with default credentials
2. Go to **My Account** → **Change Password**
3. Enter current password and new password
4. Click **Update Password**

---

## 🛠️ Development Workflow

### Running in Development Mode

```powershell
# Terminal 1: Start development server with hot reload
npm run dev

# Terminal 2: Start Laravel server
php artisan serve

# Terminal 3 (Optional): Run queue worker
php artisan queue:work

# OR use the all-in-one command:
composer dev
```

### Code Style & Linting

```powershell
# Format code with Laravel Pint
./vendor/bin/pint

# Check code style without fixing
./vendor/bin/pint --test
```

### IDE Helper Generation

```powershell
# Generate helper files for better IDE autocomplete
php artisan ide-helper:generate
php artisan ide-helper:models
php artisan ide-helper:meta
```

### Database Management

```powershell
# Refresh database (WARNING: Deletes all data)
php artisan migrate:fresh

# Refresh and seed
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_tablename_table

# Create new seeder
php artisan make:seeder TableNameSeeder
```

### Clearing Caches

```powershell
# Clear application cache
php artisan cache:clear

# Clear route cache
php artisan route:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Clear everything
php artisan optimize:clear
```

---

## 🔧 Troubleshooting

### Common Issues and Solutions

#### Issue: "500 Internal Server Error"

**Solution:**

```powershell
# Check Laravel logs
cat storage/logs/laravel.log

# Clear all caches
php artisan optimize:clear

# Check file permissions (on Linux/Mac)
chmod -R 775 storage bootstrap/cache
```

#### Issue: "Access Denied for User"

**Solution:**

-   Check database credentials in `.env`
-   Ensure database user has proper permissions
-   Verify database name exists

```powershell
# Test database connection
php artisan tinker
DB::connection()->getPdo();
```

#### Issue: "Class Not Found"

**Solution:**

```powershell
# Regenerate autoload files
composer dump-autoload

# Clear config cache
php artisan config:clear
```

#### Issue: "CSRF Token Mismatch"

**Solution:**

```powershell
# Clear sessions
php artisan session:flush

# Clear cache
php artisan cache:clear
```

#### Issue: "Storage Link Not Working"

**Solution:**

```powershell
# Remove existing link
rm public/storage

# Recreate storage link
php artisan storage:link
```

#### Issue: "npm install fails"

**Solution:**

```powershell
# Clear npm cache
npm cache clean --force

# Delete node_modules and package-lock
rm -rf node_modules package-lock.json

# Reinstall
npm install
```

#### Issue: "Migration Failed"

**Solution:**

```powershell
# Check migration status
php artisan migrate:status

# Rollback last migration
php artisan migrate:rollback

# Run specific migration
php artisan migrate --path=/database/migrations/filename.php
```

### Performance Issues

```powershell
# Enable caching for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize Composer autoloader
composer install --optimize-autoloader --no-dev
```

### Getting Help

If you encounter issues not covered here:

1. Check `storage/logs/laravel.log` for error details
2. Search existing GitHub issues
3. Create a new issue with:
    - Error message
    - Steps to reproduce
    - Environment details (PHP version, OS, etc.)

---

## 🚢 Deployment

### Production Deployment Checklist

Before deploying to production, complete these steps:

#### 1. Environment Configuration

```env
# Update .env for production
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourschool.com

# Use strong random key
APP_KEY=base64:your_generated_key_here
```

#### 2. Optimize Application

```powershell
# Install production dependencies only
composer install --optimize-autoloader --no-dev

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build production assets
npm run build
```

#### 3. Database Migration

```powershell
# Run migrations on production (without seeding)
php artisan migrate --force
```

#### 4. File Permissions

Ensure these directories are writable:

```
storage/
bootstrap/cache/
```

On Linux/Mac:

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### 5. Security Measures

-   [ ] Change all default passwords
-   [ ] Remove test/demo accounts
-   [ ] Set `APP_DEBUG=false`
-   [ ] Enable HTTPS/SSL
-   [ ] Configure firewall rules
-   [ ] Set up regular backups
-   [ ] Configure proper file upload limits
-   [ ] Enable CSRF protection (enabled by default)

### Deployment Methods

#### Option 1: Shared Hosting (cPanel)

1. Upload files via FTP/SFTP
2. Set document root to `public` folder
3. Import database via phpMyAdmin
4. Update `.env` with production settings
5. Run migrations via SSH or terminal

#### Option 2: VPS/Cloud (Ubuntu/Debian)

```bash
# Install required packages
sudo apt update
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip nginx mysql-server

# Configure Nginx
sudo nano /etc/nginx/sites-available/lavsms

# Setup SSL with Let's Encrypt
sudo certbot --nginx -d yourschool.com

# Set up supervisor for queue workers
sudo apt install supervisor
```

#### Option 3: Docker Deployment

Use Laravel Sail for containerized deployment:

```powershell
# Build containers
./vendor/bin/sail build

# Start services
./vendor/bin/sail up -d
```

### Post-Deployment

1. Test all critical functions
2. Monitor error logs
3. Set up automated backups
4. Configure monitoring (uptime, performance)
5. Train staff on system usage

### Backup Strategy

```powershell
# Backup database
php artisan backup:run

# Or manually backup database
mysqldump -u username -p lavsms > backup.sql

# Backup files
# Create archive of entire application directory
```

Schedule regular backups using cron jobs or Task Scheduler.

---

## 📁 Project Structure

```
lav_smsv2/
├── app/
│   ├── Console/              # Artisan commands
│   ├── Exceptions/           # Exception handlers
│   ├── Helpers/              # Helper functions (Qs, Mk, Pay)
│   ├── Http/
│   │   ├── Controllers/      # Application controllers
│   │   ├── Middleware/       # HTTP middleware
│   │   └── Requests/         # Form validation requests
│   ├── Models/               # Eloquent models
│   ├── Providers/            # Service providers
│   ├── Repositories/         # Repository pattern implementations
│   └── Services/             # Business logic services
│
├── bootstrap/                # Application bootstrap
│   ├── app.php
│   ├── providers.php
│   └── cache/                # Framework cache files
│
├── config/                   # Configuration files
│   ├── app.php               # Application config
│   ├── database.php          # Database config
│   ├── mail.php              # Mail config
│   └── ...
│
├── database/
│   ├── factories/            # Model factories
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
│
├── public/                   # Web server document root
│   ├── index.php             # Application entry point
│   ├── assets/               # Application assets
│   └── global_assets/        # Global shared assets
│
├── resources/
│   ├── css/                  # CSS source files
│   ├── js/                   # JavaScript source files
│   ├── views/                # Blade templates
│   │   ├── layouts/          # Layout templates
│   │   ├── pages/            # Page templates
│   │   └── partials/         # Partial views
│   └── lang/                 # Language files
│
├── routes/
│   ├── web.php               # Web routes
│   ├── api.php               # API routes
│   ├── console.php           # Console routes
│   └── channels.php          # Broadcast channels
│
├── storage/
│   ├── app/                  # Application storage
│   ├── framework/            # Framework cache/sessions
│   └── logs/                 # Application logs
│
├── tests/                    # Automated tests
│   ├── Feature/              # Feature tests
│   └── Unit/                 # Unit tests
│
├── vendor/                   # Composer dependencies
│
├── .env.example              # Example environment file
├── artisan                   # Artisan CLI
├── composer.json             # PHP dependencies
├── package.json              # Node.js dependencies
├── vite.config.js            # Vite configuration
└── README.md                 # This file
```

### Key Directories Explained

-   **`app/Helpers/`**: Contains utility helper files (Qs.php, Mk.php, Pay.php) with common functions
-   **`app/Repositories/`**: Implements repository pattern for data access abstraction
-   **`app/Http/Controllers/`**: Handles HTTP requests and returns responses
-   **`resources/views/`**: Blade template files for frontend
-   **`public/assets/`**: Compiled CSS, JS, and image files
-   **`storage/app/public/`**: User-uploaded files (accessible via storage link)

---

## 📡 API Documentation

LAVSMS provides RESTful API endpoints for integration.

### Authentication

All API requests require authentication token:

```http
Authorization: Bearer {your_api_token}
```

### Example Endpoints

**Get All Students**

```http
GET /api/students
```

**Get Student by ID**

```http
GET /api/students/{id}
```

**Create Student**

```http
POST /api/students
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "class_id": 1
}
```

For full API documentation, visit: `/api/documentation` (when implemented)

---

## 🤝 Contributing

We welcome contributions from the community! Here's how you can help:

### How to Contribute

1. **Fork the Repository**

    ```powershell
    # Fork via GitHub UI, then clone your fork
    git clone https://github.com/your-username/lav_smsv2.git
    ```

2. **Create a Feature Branch**

    ```powershell
    git checkout -b feature/your-feature-name
    ```

3. **Make Your Changes**

    - Write clean, documented code
    - Follow PSR-12 coding standards
    - Add tests for new features
    - Update documentation

4. **Commit Your Changes**

    ```powershell
    git add .
    git commit -m "Add feature: description of your changes"
    ```

5. **Push to Your Fork**

    ```powershell
    git push origin feature/your-feature-name
    ```

6. **Open a Pull Request**
    - Go to the original repository
    - Click "New Pull Request"
    - Describe your changes in detail
    - Reference any related issues

### Contribution Guidelines

-   **Code Style**: Follow PSR-12 standards (use `./vendor/bin/pint`)
-   **Commit Messages**: Use clear, descriptive commit messages
-   **Documentation**: Update README and inline documentation
-   **Testing**: Add tests for new features
-   **One Feature Per PR**: Keep pull requests focused

### Areas Where We Need Help

-   🐛 Bug fixes
-   ✨ New features
-   📝 Documentation improvements
-   🌍 Translations (internationalization)
-   ♿ Accessibility improvements
-   🎨 UI/UX enhancements
-   ✅ Test coverage

---

## ✅ Testing

### Running Tests

```powershell
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ExamTest.php

# Run tests with coverage
php artisan test --coverage
```

### Writing Tests

Tests are located in the `tests/` directory:

-   **Feature Tests**: Test complete features and workflows
-   **Unit Tests**: Test individual methods and classes

Example test:

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class StudentTest extends TestCase
{
    public function test_can_create_student()
    {
        $response = $this->post('/students', [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $response->assertStatus(201);
    }
}
```

---

## 🔒 Security

### Security Best Practices

-   ✅ All passwords are hashed using bcrypt
-   ✅ CSRF protection enabled on all forms
-   ✅ XSS protection via Blade templating
-   ✅ SQL injection prevention via Eloquent ORM
-   ✅ Input validation on all forms
-   ✅ Secure session management

### Reporting Security Vulnerabilities

If you discover a security vulnerability:

**DO NOT** create a public GitHub issue.

Instead, please email: **cjay.pub@gmail.com**

Include:

-   Description of the vulnerability
-   Steps to reproduce
-   Potential impact
-   Suggested fix (if any)

We take security seriously and will respond promptly to all reports.

### Security Updates

-   Keep Laravel and dependencies updated
-   Monitor Laravel security advisories
-   Regularly update PHP to latest stable version
-   Review and update `.env` security settings

---

## 📄 License

This project is licensed under the **MIT License**.

```
MIT License

Copyright (c) 2025 CJ Inspired

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 📞 Support & Contact

### Get Help

-   📧 **Email**: cjay.pub@gmail.com
-   📱 **Phone**: +234 706 814 9559
-   💬 **GitHub Issues**: [Create an issue](https://github.com/rudalkunwar/lav_smsv2/issues)
-   📖 **Documentation**: This README

### Project Information

-   **Author**: CJ Inspired
-   **Repository**: [github.com/rudalkunwar/lav_smsv2](https://github.com/rudalkunwar/lav_smsv2)
-   **Version**: 2.0
-   **Laravel Version**: 12.x
-   **PHP Version**: 8.2+

### Acknowledgments

Built with:

-   [Laravel](https://laravel.com) - The PHP Framework
-   [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
-   [Vite](https://vitejs.dev) - Frontend build tool
-   [dompdf](https://github.com/dompdf/dompdf) - PDF generation

---

<div align="center">

**Made with ❤️ for Educational Institutions**

If this project helps your institution, please consider giving it a ⭐ on GitHub!

[⬆ Back to Top](#laravel-school-management-system-lavsms)

</div>
