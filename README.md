# Task Manager API

A simple REST API built with Laravel to manage tasks.

## Getting Started

### Requirements

- PHP >= 8.1
- Composer
- MySQL or SQLite (optional)
- Laravel CLI (optional)

---

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/task-manager.git

cd task-manager

# Install dependencies
composer install

# Copy .env file
cp .env.example .env

# Generate application key
php artisan key:generate

# (Optional) Configure your database in the `.env` file

# Run migrations
php artisan migrate

# Start the server
php artisan serve
