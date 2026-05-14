# Boarding House Management

<p align="center">
  <strong>Modern Boarding House Management Platform</strong>
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel" alt="Laravel"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php" alt="PHP"></a>
  <a href="#"><img src="https://img.shields.io/badge/Blade-Template-0EA5E9?style=flat" alt="Blade"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-3.x-38BDF8?style=flat&logo=tailwindcss" alt="Tailwind"></a>
  <a href="#"><img src="https://img.shields.io/badge/MySQL-8.x-4479A1?style=flat&logo=mysql" alt="MySQL"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

# Boarding House Management System

Boarding House Management is a modern open-source system built with Laravel 11.

The project focuses on modular architecture, clean UI design, scalability, and developer experience.

The system helps landlords manage rooms, tenants, contracts, utility bills, and payments in a centralized platform.

---

# Project Structure

```bash
boarding-house-management
├── app
│   ├── Http
│   │   ├── Controllers       # Request handlers
│   │   └── Middleware        # Authentication middleware
│   ├── Models                # Eloquent models
│   └── Services              # Business logic services
├── database
│   ├── migrations            # Database schema
│   └── seeders               # Sample data
├── resources
│   ├── views                 # Blade templates
│   └── css / js              # Frontend assets
├── routes
│   └── web.php               # Route definitions
└── public                    # Static assets
```

---

# Core Modules

## Room Management

* Room listing & details
* Room status tracking (available, occupied, maintenance)
* Room type management
* Room pricing configuration

## Tenant Management

* Tenant profiles
* ID card & contact information
* Tenant status tracking
* Tenant history

## Contract Management

* Create & manage rental contracts
* Contract start / end dates
* Deposit tracking
* Contract renewal & termination

## Utility Management

* Monthly electricity meter readings
* Monthly water meter readings
* Utility usage history
* Automatic calculation

## Invoice Management

* Auto-generate monthly invoices
* Room fee + electricity + water + services
* Invoice status tracking
* Payment history

## Payment Management

* Record payments
* Outstanding debt tracking
* Payment receipts
* Revenue overview

## Service Management

* Additional services (internet, parking, cleaning)
* Service pricing
* Service assignment per room

## Reports & Statistics

* Monthly revenue reports
* Vacant room reports
* Debt reports
* Occupancy statistics

---

# Technology Stack

## Backend

| Technology | Version | Description         |
| ---------- | ------- | ------------------- |
| Laravel    | 11.x    | PHP Framework       |
| PHP        | 8.2+    | Backend Language    |
| MySQL      | 8+      | Database            |
| Vite       | Latest  | Frontend Build Tool |

## Frontend

| Technology   | Description          | Version |
| ------------ | -------------------- | ------- |
| Blade        | Template Engine      | Latest  |
| Tailwind CSS | UI Framework         | 3.x     |
| Alpine.js    | Frontend Interaction | Latest  |
| JavaScript   | Frontend Logic       | ES6+    |

---

# Installation Guide

## Requirements

Recommended environment:

* PHP >= 8.2
* Composer >= 2.x
* MySQL >= 8.x
* Node.js >= 18
* NPM >= 9

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/scoppy9201/boarding-house-management.git
cd boarding-house-management
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update database configuration:

```env
DB_DATABASE=boarding_house
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migration & Seeder

```bash
php artisan migrate:fresh --seed
```

### 5. Start Development Server

```bash
php artisan serve
npm run dev
```

Visit:

```text
http://127.0.0.1:8000
```

---

# Authentication & Authorization

* Custom authentication pages
* Session-based authentication
* Role & permission system (Admin / Staff)
* Extendable RBAC architecture

---

# Architecture

The system follows a modern modular architecture:

* Service-based architecture
* Reusable Blade components
* Clean separation of concerns
* Scalable business logic

Main architecture layers:

* Controllers
* Services
* Models
* Blade Components
* Views

---

# Use Cases

This system is suitable for:

* Boarding house & dormitory management
* Apartment rental management
* Small-scale property management
* Academic & graduation projects

---

# Roadmap

Upcoming planned features:

* Tenant mobile app
* Online payment integration
* Maintenance request tracking
* SMS / Email notifications
* Advanced analytics dashboard
* Multi-property support

---

# Contributing

Contributions are welcome.

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to your branch
5. Open a Pull Request

---

# License

MIT License

---

# Links

* GitHub: [https://github.com/scoppy9201/boarding-house-management](https://github.com/scoppy9201/boarding-house-management)

---

<div align="center">
  Built with ❤️ using Laravel 11 & Blade
</div>