

# Book Manager
## About Book Manager

Book Manager is a web application designed for managing a collection of books. Built with Laravel, Inertia.js, and Vue.js, it provides an elegant interface for performing CRUD operations on book records. This application aims to simplify book management tasks by offering features like:

- Dynamic book listing with Vue.js.
- Responsive and intuitive form validation.
- Confirmation modals for secure actions.
- Extensible backend powered by Laravel.
- Real-time frontend interaction using Inertia.js.

Book Manager combines the power of Laravel and Vue.js to deliver a seamless experience.
##

## Learning the Stack

This project leverages modern web development tools and frameworks. To learn more about the tools used, check out their official documentation:
- Laravel Documentation: Comprehensive guide to Laravel features and usage.
- Vue.js Documentation: Learn about building modern frontend applications.
- Inertia.js Documentation: Understand how to bridge the gap between server-side and client-side frameworks.

#Installation

Installation
Clone the repository:

bash
Copy
Edit
git clone https://github.com/izzylogo/book-manager.git
cd book-manager
Install backend dependencies:

bash
Copy
Edit
composer install
Install frontend dependencies:

bash
Copy
Edit
npm install
Set up the environment file: Copy the .env.example file to .env and configure your database and other settings:

bash
Copy
Edit
cp .env.example .env
Generate the application key:

bash
Copy
Edit
php artisan key:generate
Run migrations: Create the database and run migrations to set up the tables:

bash
Copy
Edit
php artisan migrate
Run the development servers: Start the Laravel backend and the Vite frontend development servers:

bash
Copy
Edit
php artisan serve
npm run dev
