# MagicLog Car Factory

A Laravel-based car management system implementing Clean Architecture principles.

## Architecture Overview

This project follows Clean Architecture principles with a clear separation of concerns:

### Domain Layer
- `app/Domain/Entities`: Core business entities
- `app/Domain/Repositories`: Repository interfaces

### Application Layer
- `app/Application/UseCases`: Application business rules and use cases

### Infrastructure Layer
- `app/Infrastructure/Persistence`: Repository implementations
- `app/Models`: Eloquent models

### Interface Layer
- `app/Http/Controllers`: Web and API controllers
- `app/Http/Requests`: Form requests and validation
- `app/Http/Resources`: API resources

## Requirements

- PHP 8.2+
- Composer
- Node.js and NPM
- MySQL 8.0+

## Local Development Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/yxd99/magiclog-car-factory.git
   cd magiclog-car-factory
   ```

2. Copy environment file:
   ```bash
   cp .env.example .env
   ```

3. Configure your .env file with your local database settings:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=magiclog_car_factory
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. Install PHP dependencies:
   ```bash
   composer install
   ```

5. Install Node.js dependencies:
   ```bash
   npm install
   ```

6. Generate application key:
   ```bash
   php artisan key:generate
   ```

7. Run database migrations:
   ```bash
   php artisan migrate
   ```

8. Build assets:
   ```bash
   npm run dev
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```

The application will be available at http://localhost:8000

## Docker Development Setup

1. Make sure you have Docker and Docker Compose installed

2. Clone the repository and navigate to the project directory:
   ```bash
   git clone https://github.com/yxd99/magiclog-car-factory.git
   cd magiclog-car-factory
   ```

3. Copy environment file:
   ```bash
   cp .env.example .env
   ```

4. Start Docker containers:
   ```bash
   docker-compose up -d
   ```

5. Install dependencies:
   ```bash
   docker-compose exec app composer install
   npm install
   ```

6. Generate application key:
   ```bash
   docker-compose exec app php artisan key:generate
   ```

7. Run migrations:
   ```bash
   docker-compose exec app php artisan migrate
   ```

8. Build assets:
   ```bash
   npm run dev
   ```

The application will be available at http://localhost:8000

## Features

- Car management (CRUD operations)
- DataTables integration for car listing
- RESTful API endpoints
- Clean Architecture implementation
- Docker containerization

## API Endpoints

- `GET /api/cars`: List all cars
- `POST /api/cars`: Create a new car
- `GET /api/cars/{id}`: Get car details
- `PUT /api/cars/{id}`: Update car
- `DELETE /api/cars/{id}`: Delete car
