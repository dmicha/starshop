# Starshop

**Starshop** is a web application built in PHP using the Symfony framework. The goal of the project is to allow users to browse, search, and purchase products in a simple and user-friendly way.

## Features

- [x] Product Browsing** – users can browse the list of available products in the store.
- [ ] Search Functionality** – a search bar allows users to quickly find products by name, category, or other criteria.
- [ ] Shopping Cart** – users can add products to the cart, manage quantities, and finalize purchases.
- [ ] User System** – registration and login, enabling access to account details, order history, and personal data management.
- [ ] Admin Panel** – administrators can manage products, categories, and orders.
- [ ] Payment Integration** – online payments supported (e.g., via PayPal or other payment gateways).
- [x] Responsive Design** – the application is optimized for both mobile and desktop devices.

## Requirements

- PHP 8.0 or higher
- Composer
- Docker (optional, if you plan to use Docker)
- Database server (Posgresql)

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/dmicha/starshop.git
   cd starshop
   ```

2. **Install dependencies using Composer:**

   ```bash
   composer install
   ```

3. **Configure the `.env` file:**

   Copy the `.env` file to `.env.local` and adjust the settings to match your environment, especially database settings.

4. **Create the database and run migrations:**

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Optional: Load sample data:**

   If you want to load sample data into the database, run:

   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Start the development server:**

   ```bash
   symfony server:start
   ```

   The application will be available at `http://localhost:8000`.

## Tests

To run tests, use the following command:

```bash
php bin/phpunit
```

## Docker

If you prefer to use Docker, the repository includes a `docker-compose.yml` file. To run the application in Docker containers:

1. **Start Docker Compose:**

   ```bash
   docker-compose up -d
   ```

2. **Access the application container:**

   ```bash
   docker-compose exec app bash
   ```

3. **Run migrations and load data (inside the container):**

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

The application will be available at `http://localhost:8000`.

## Directory Structure

- `src/` – application source code
- `config/` – configuration files
- `templates/` – Twig templates
- `public/` – publicly accessible files (e.g., `index.php`, static assets)
- `migrations/` – database migrations
- `tests/` – unit and functional tests



## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

---

**Starshop** – a simple way to create an online store using Symfony!

