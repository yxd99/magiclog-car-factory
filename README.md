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

- Docker and Docker Compose
- PHP 8.2+
- Composer
- Node.js and NPM

## Development Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/yxd99/magiclog-car-factory.git
   cd magiclog-car-factory
   ```

2. Copy environment file:
   ```bash
   cp .env.example .env
   ```

3. Start Docker containers:
   ```bash
   docker-compose up -d
   ```

4. Install dependencies:
   ```bash
   docker-compose exec app composer install
   npm install
   ```

5. Generate application key:
   ```bash
   docker-compose exec app php artisan key:generate
   ```

6. Run migrations:
   ```bash
   docker-compose exec app php artisan migrate
   ```

7. Build assets:
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
