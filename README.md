# Job Portal Project
![888888](https://github.com/Saket2701/Job-Portal/assets/101319476/a1ec3138-ec59-4a31-a3e9-1e63a60dfccb)
## Introduction

Welcome to the Job Portal project! This web application is built using PHP, Laravel, MySQL, and Bootstrap to create a modern and efficient job portal. This document provides an overview of the project structure and includes relevant code snippets.

## Project Structure
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
   cd job-portal

3. Install dependencies:
   ```bash
   composer install

4. Create a copy of the .env.example file and rename it to .env. Update the database configuration.
   #### Create a copy:
   1. Locate the `.env.example` file in your Laravel project.
   2. Make a copy of this file and name the duplicate `.env`.

   #### Update the database configuration:
   1. Open the newly created `.env` file in a text editor.
   2. Look for the section related to database configuration (usually starts with `DB_`).
   3. Update the values for `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match your local database setup.

5. Generate the application key:
   ```bash
   php artisan key:generate

6. Run migrations to create the database tables:
   ```bash
   php artisan migrate

7. Start the development server:
   ```bash
   php artisan serve
   
8.Open your browser and visit http://localhost:8000 to access the Job Portal.

# Features

## User Authentication:

- Registration and login functionality.
- User profiles with the ability to update details and upload CVs.

## Job Listings:

- Display of jobs with details, including descriptions and social media sharing links.
- Multi-input based search functionality.

## Admin Panel:

- Secure login for administrators.
- Admin dashboard displaying stats.
- Admin management of categories, jobs, and users.

## Saved Jobs and Applications:

- Users can save jobs for later and view their applications.

# Conclusion

Congratulations! You've successfully set up and explored the Job Portal project. Feel free to explore the codebase further to understand the implementation details.







