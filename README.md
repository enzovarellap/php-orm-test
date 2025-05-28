# PHP Contacts Management

A simple PHP project for managing people and contacts, using Composer and Doctrine ORM.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Docker (optional, for easier setup)

## Setup Instructions

1. **Clone the repository**
   ```sh
   git clone https://github.com/enzovarellap/php-orm-test.git
   cd php-orm-test
   ```


2. **Copy environment file**
   ```sh
   cp .env.example .env
   ```
   Edit `.env` to set your database credentials and other settings as needed.

### Using Docker Compose (Recommended)

If you have Docker and Docker Compose installed, you can start the app and database easily:

```sh
docker-compose up -d
```

This will build and start the PHP app and a MySQL database.
The app will be available at [http://localhost:8080](http://localhost:8080).

- To run Composer commands inside the container:
```sh
docker-compose exec app composer install
```
- To create the database schema with Doctrine:
```sh
docker-compose exec app php bin/doctrine orm:schema-tool:create
```


### Manual setup (without Docker)
If you prefer to run locally:

- Install dependencies:
  ```sh
  composer install
  ```
- Create the database schema:
  ```sh
  vendor/bin/doctrine orm:schema-tool:create
  ```
- Start the PHP server:
  ```sh
  php -S localhost:8000 -t public
  ```
