<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# LMS with Stripe Payment & Quiz System

## Overview
This is a web-based **Learning Management System (LMS)** built with **Laravel** and **Livewire**, featuring **Stripe payment integration** for course enrollment and a **quiz system** for student assessments. It provides a seamless experience for managing courses, students, and instructors while ensuring secure transactions and interactive learning.

## Features
- 🧑‍🏫 **User Authentication** (Students, Instructors, Admins)
- 📚 **Course Management** (Add, Edit, Delete, Enroll)
- 💳 **Stripe Payment Integration** (Secure course purchases)
- 🎯 **Quiz System** (Assessments with scoring & tracking)
- 📈 **Student Progress Tracking**
- 📩 **Email Notifications** for transactions & course updates

## Technologies Used
- **Laravel** (Backend framework)
- **Livewire** (Dynamic UI updates)
- **MySQL** (Database)
- **Stripe API** (Payment processing)
- **Tailwind CSS** (UI styling)

## Installation
### 1️⃣ Clone the Repository
```bash
 git clone https://github.com/mannanshihab/LMS.git
 cd LMS
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install
```

### 3️⃣ Configure Environment
Rename `.env.example` to `.env` and update database & Stripe credentials:
```env
APP_NAME=LMS
DB_DATABASE=lms_db
DB_USERNAME=root
DB_PASSWORD=

STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret
```

### 4️⃣ Run Migrations & Seed Data
```bash
php artisan migrate --seed
```

### 5️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 6️⃣ Start Development Server
```bash
php artisan serve
```

## Usage
1. Register/Login as a student or instructor.
2. Enroll in courses using Stripe payment.
3. Take quizzes and track progress.
4. Admin manages users, courses, and transactions.

## Contribution
Feel free to contribute! Fork the repo, make changes, and submit a pull request. 
