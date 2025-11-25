<div align="center">
  <img width="400" height="400" alt="image" src="https://github.com/user-attachments/assets/749512cd-402c-44ac-93ef-b14a5813ca46" />

  # Te Acerco Salud (TAS)
</div>

## Overview

**Te Acerco Salud** is a web and mobile platform that connects patients with a collaborative pharmacy network to streamline prescription fulfillment. Users can upload prescriptions, select their preferred pharmacy, and ensure complete medication availability without visiting multiple locations.

## Problem Statement

Patients often cannot fill complete prescriptions at a single pharmacy, leading to:
- Multiple pharmacy visits and increased transportation costs
- Treatment delays
- Health risks for critical patients
- Poor user experience due to fragmented inventory

## Solution

A collaborative system between pharmacy chains that enables:
- Digital prescription submission
- Automatic medication availability verification
- Cross-pharmacy cooperation for complete fulfillment
- Optimized delivery and pickup times

## Tech Stack

- **Backend**: Laravel (PHP) - MVC Architecture
- **Frontend**: Laravel Blade
- **Mobile**: Android Studio (Kotlin/Java), Dart (Flutter)
- **Database**: MySQL/PostgreSQL
- **API**: RESTful Web Services
- **Methodology**: Unified Process (UP) & SCRUM
- **Modeling**: UML & UWE notation
- **CASE Tool**: Enterprise Architect

## Key Features

### Patients
- User registration and profile management
- Enter prescriptions manually (text input)
- Pharmacy and branch selection
- Medication availability verification
- Order tracking and notifications

### Pharmacies
- Branch registration in collaborative network
- Real-time inventory management
- Order processing
- Cross-branch cooperation system

## Installation

```bash
# Clone repository
git clone https://github.com/your-org/te-acerco-salud.git
cd te-acerco-salud

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database in .env
DB_CONNECTION=mysql
DB_DATABASE=tas_db
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Compile assets
npm run dev

# Start server
php artisan serve
```

## Security

- Authentication: Laravel Sanctum/Passport
- Password encryption: bcrypt
- CSRF protection
- API rate limiting
- Input validation and sanitization

## User Roles

1. **Patient** - Upload prescriptions and place orders
2. **Pharmacy Employee** - Process orders
   
## Development Methodology

**SCRUM**
- 2-week sprints
- Daily standups
- Sprint planning, review, and retrospectives

**Unified Process**
- Inception, Elaboration, Construction, Transition phases

## Project Structure

```
te-acerco-salud/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Services/
├── database/migrations/
├── resources/views/
├── routes/
│   ├── web.php
│   └── api.php
├── tests/
└── docs/models/
```

## Team

This project was developed as a team effort by Computer Systems Engineering students.
