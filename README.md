<p align="center">
    <img src="https://github.com/Saket2701/Job-Portal/assets/101319476/aeddb427-ab20-412c-b8b5-fb6e1fca9686" alt="picjob">
</p>

## Introduction

Welcome to the Job Portal project! This web application is built using PHP, Laravel, MySQL, and Bootstrap to create a modern and efficient job portal. This document provides an overview of the project structure and includes relevant code snippets.

The project is organized into several main components:

1. **Frontend:**
   - Views designed using HTML, CSS (Bootstrap), and Blade templates in Laravel.
   - JavaScript for dynamic behavior, especially in the job search functionality.

2. **Backend:**
   - Backend logic implemented using PHP and the Laravel framework.
   - Laravel's Eloquent ORM used for interacting with the MySQL database.

3. **Database:**
   - MySQL employed to store user data, job listings, and application information.

4. **Authentication:**
   - Laravel's built-in authentication system used for user registration, login, and access control.

5. **Admin Panel:**
   - Admin panel implemented to manage categories, jobs, and users with custom views and functionalities.

## Project Setup

### XAMPP Configuration

This project is designed to work with XAMPP, a free and open-source cross-platform web server solution stack package. Before running the application, ensure that you have XAMPP installed and configured on your machine.

### XAMPP Installation

1. Download XAMPP from the official website: [XAMPP Download](https://www.apachefriends.org/index.html).
2. Install XAMPP following the installation instructions provided on the website.

### Starting Apache and MySQL Modules

Before running the Job Portal project, make sure that the Apache and MySQL modules are running in the XAMPP Control Panel:

1. Open the XAMPP Control Panel.
2. Start the Apache module.
3. Start the MySQL module.

Now that XAMPP is installed and the necessary modules are running, proceed with the installation steps mentioned in the next sections of this README to set up and run the Job Portal project.
## Quick Start Guide

### Prerequisites

- PHP installed
- Composer installed
- Laravel installed
- MySQL server installed

### Installation Steps

1. Clone the repository:

   ```bash
   git clone git@github.com:Saket2701/Job-Portal.git

2. Navigate to the project directory:
   ```bash
   cd /c/Xampp/htdocs/jobboard

3. Install dependencies:
   ```bash
   composer install

4. Install frontend dependencies and compile assets::
   ```bash
    npm install && npm run dev
   
5. Database Configuration

    a. Copy Environment File
      - Locate the `.env.example` file in your Laravel project.
      - Make a copy of this file and name the duplicate `.env`.
   
   b. Update Database Configuration
      - Open the newly created `.env` file in a text editor.
      - Look for the section related to database configuration (usually starts with `DB_`).
      - Update the values for `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match your local database setup.
   
    c. Accessing the Database via phpMyAdmin
      - If you are using a local development environment, you can manage your databases through phpMyAdmin.
      - Access phpMyAdmin by navigating to [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/) in your web browser.
   
    d. Additional Notes
      - Make sure the database specified in your `.env` file exists in your local MySQL or MariaDB server.
      - Double-check that the database credentials in the `.env` file match your local setup.

6. Run migrations to create the database tables:
   ```bash
   php artisan migrate

7. Start the development server:
   ```bash
   php artisan serve
   
8.Open your browser and visit http://localhost:8000 to access the Job Portal.

## Features

### 1. User Authentication:
- Registration and login functionality.
- User profiles with the ability to update details and upload CVs.

### 2. Job Listings:
- Display of jobs with details, including descriptions and social media sharing links.
- Multi-input based search functionality.

### 3. Admin Panel:
- Secure login for administrators.
- Admin dashboard displaying stats.
- Admin management of categories, jobs, and users.

### 4. Saved Jobs and Applications:
- Users can save jobs for later and view their applications.

# Conclusion
Congratulations! You've successfully set up and explored the Job Portal project. Feel free to explore the codebase further to understand the implementation details.
<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>
