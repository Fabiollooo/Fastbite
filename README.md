# Fastbite 🍔

A role-based fast food ordering system built with Laravel and Bootstrap. The application is designed to simulate a real-world fast food restaurant environment where customers, cashiers, and kitchen staff interact with the system through role-specific dashboards.

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat-square&logo=bootstrap)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![HTML5](https://img.shields.io/badge/HTML5-E34C26?style=flat-square&logo=html5)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

> **Note**: This project is in active development. Core features are being built incrementally.

---

## ✨ Current Features

### ✅ Implemented
- **User Authentication** - Login and session management with Laravel Auth
- **Menu System** - Display available food items with pricing
- **Welcome Page** - Bootstrap-based responsive landing page
- **Dashboard** - Authenticated user dashboard
- **Responsive Design** - Bootstrap 5 for mobile-friendly UI
- **Simple Frontend** - Plain HTML, CSS, and Blade templates
- **Testing Framework** - Pest configured for unit and feature tests

### 🚧 In Development
- **Role-Based Access Control** - Customer, Cashier, Cook dashboards
- **Order Management System** - Create, view, and manage orders
- **Order Tracking** - Status updates (pending, cooking, ready, completed)
- **Order Details** - View order items and quantities per role

---

## 🎯 Planned User Roles

### Customer
- Browse available menu items
- Place orders
- Track order status

### Cashier
- Take customer orders
- Process orders
- Pass orders to kitchen
- View order queue

### Cook/Kitchen Staff
- View pending kitchen orders
- See order details and items
- Mark orders as complete
- Manage order queue

---

## 🛠️ Tech Stack

### Backend
- **Laravel 12** - PHP web framework
- **PHP 8.2+** - Server-side language
- **Laravel Blade** - Template engine for views
- **Laravel Migrations** - Database schema management
- **Pest** - Testing framework

### Frontend
- **Bootstrap 5.3** - CSS framework for responsive design
- **HTML5** - Semantic markup
- **CSS3** - Custom styling and animations
- **Blade Templates** - PHP template engine integrated with Laravel

### Database
- **MySQL** - Relational database (configured in .env)
- **Laravel Schema Builder** - Fluent database API

### Development Tools
- **PHP Artisan** - Laravel command-line interface
- **Composer** - PHP package manager
- **Git** - Version control

---

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** 8.2 or higher
- **Composer** (latest version)
- **Node.js** 18+ and npm/yarn
- **MySQL/PostgreSQL** or SQLite
- **Git**

---

## 🚀 Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/fastbite.git
cd fastbite
```

### 2. Navigate to Project Directory
```bash
cd fastbite
```

### 3. Install PHP Dependencies
```bash
composer install
```

### 4. Install Node Dependencies
```bash
npm install
```

### 5. Environment Configuration
```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 6. Configure Database
Edit the `.env` file and set your database connection:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fastbite
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Run Migrations
```bash
php artisan migrate
```

### 9. Build Frontend Assets
```bash
npm run build
```

### 10. Start Development Server
```bash
# Terminal 1: Start Laravel development server
php artisan serve

Visit `http://localhost:8000` in your browser to access the application.

---

**Run Tests**
```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/DashboardTest.php

# Run with coverage
php artisan test --coverage
```

---

## 📁 Project Structure

```
fastbite/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php          # Base controller
│   │   │   ├── DashboardController.php # Dashboard logic
│   │   │   ├── Auth/                   # Auth controllers
│   │   │   └── Settings/               # Settings controllers
│   │   ├── Middleware/                 # HTTP middleware
│   │   └── Requests/                   # Form requests
│   ├── Models/
│   │   ├── User.php                   # User model
│   │   └── Menu.php                   # Menu items model
│   └── Providers/                      # Service providers
├── bootstrap/                          # Application bootstrap files
├── config/                             # Configuration files
├── database/
│   ├── migrations/                     # Database migrations
│   │   ├── create_users_table.php
│   │   ├── create_cache_table.php
│   │   └── create_jobs_table.php
│   ├── factories/                      # Model factories
│   └── seeders/                        # Database seeders
├── public/
│   ├── index.php                       # Application entry point
│   └── build/                          # Compiled assets
├── resources/
│   ├── css/
│   │   └── app.css                    # Main stylesheet
│   ├── js/
│   │   ├── app.ts                     # Vue app entry
│   │   ├── pages/                     # Vue pages (components)
│   │   └── types/                     # TypeScript type definitions
│   └── views/
│       ├── app.blade.php              # Main layout
│       ├── welcome.blade.php          # Welcome page
│       ├── dashboard.blade.php        # Dashboard layout
│       ├── auth/                      # Auth views
│       ├── layouts/                   # Layout components
│       └── settings/                  # Settings views
├── routes/
│   ├── web.php                        # Web routes
│   ├── auth.php                       # Auth routes
│   └── settings.php                   # Settings routes
├── storage/                            # File storage
├── tests/                              # Test suites
├── vendor/                             # Composer dependencies
├── node_modules/                       # NPM dependencies
├── .env.example                        # Environment template
├── composer.json                       # PHP dependencies
├── package.json                        # Node.js dependencies
├── tailwind.config.js                 # Tailwind configuration
├── vite.config.ts                     # Vite configuration
└── tsconfig.json                      # TypeScript configuration
```

---

## 🗄️ Database Schema

### Current Tables

**users** - User accounts and authentication
```
- userId (Primary Key, INT)
- firstName (VARCHAR)
- lastName (VARCHAR)
- email (VARCHAR, UNIQUE)
- password (VARCHAR)
- userType (VARCHAR) - for role distinction
- email_verified_at (TIMESTAMP, nullable)
- remember_token (VARCHAR, nullable)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Planned Tables

**orders** - Food orders (to be created)
```
- id (Primary Key)
- userId (Foreign Key → users)
- status (enum: pending, cooking, ready, completed)
- total_amount (DECIMAL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

**menu_items** - Menu item catalog (model exists)
```
- itemId (Primary Key)
- itemName (VARCHAR)
- itemDescription (TEXT)
- itemPrice (DECIMAL)
- itemImage (VARCHAR, nullable)
```

**order_items** - Order line items (to be created)
```
- id (Primary Key)
- orderId (Foreign Key → orders)
- itemId (Foreign Key → menu_items)
- quantity (INT)
- price (DECIMAL)
```

**roles** - User role definitions (to be created)
```
- id (Primary Key)
- name (customer, cashier, cook)
- description (TEXT)
```

---

## 🔄 API Endpoints Overview

The application provides RESTful endpoints for:

- **Authentication** - Login, logout, password reset
- **Orders** - Create, view, update order status
- **Menu** - Browse menu items
- **Dashboard** - Role-specific dashboards
- **User Settings** - Profile management

Refer to routes in `routes/web.php` for complete endpoint documentation.

---

## 🎯 Planned Features

Beyond the core development roadmap:

- ⏱️ **Order Timing** - Track order completion times
- 📊 **Analytics Dashboard** - Revenue reports and insights
- 📦 **Inventory Management** - Menu item stock tracking
- ⭐ **Customer Reviews** - Ratings and feedback system
- 🔔 **Real-Time Notifications** - WebSocket-based order updates
- 💳 **Payment Integration** - Support for digital payments
- 📱 **Mobile App** - Companion mobile application
- 🚗 **Delivery Tracking** - For delivery orders

---

<div align="center">

**Made with ❤️ for fast food lovers everywhere**

⭐ If you find this project helpful, please give it a star!

</div>
