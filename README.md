# Warung Nasi Kuning

**Warung Nasi Kuning** is a web-based ordering system designed to simplify online ordering for a local food business.

The application allows customers to browse available menus, manage their cart, and place orders online, while providing administrators with tools to manage menus, inventory, and orders.

---

## Features

### Customer

* **Menu Browsing** — View available food and prices
* **Shopping Cart** — Add, remove, and adjust menu quantities
* **Stock Validation** — Prevent orders from exceeding available stock
* **Checkout** — Submit customer and order information
* **Delivery Options** — Delivery or self-pickup
* **Order Notes** — Add additional instructions to orders
* **Order Confirmation** — View submitted order information

### Admin

* **Dashboard** — Overview of the application
* **Menu Management** — Create, update, and remove menus
* **Inventory Management** — Monitor and manage menu stock
* **Order Management** — Process and update customer orders
* **Customer History** — Keep track of previous customers and orders

---

## Tech Stack

| Technology   | Purpose                  |
| ------------ | ------------------------ |
| Laravel      | Backend framework        |
| PHP          | Server-side programming  |
| MySQL        | Database                 |
| Blade        | Templating engine        |
| Tailwind CSS | UI styling               |
| JavaScript   | Client-side interactions |

---

## Project Structure

```text
warnaskun-v2/
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   └── assets/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── storage/
└── README.md
```

---

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd warnaskun-v2
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database credentials in `.env`.

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Start the development server

```bash
php artisan serve
```

For frontend development:

```bash
npm run dev
```

---

## Environment Configuration

Example database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## Project Status

**Active Development**

The application is currently being developed and improved, with ongoing work on the ordering system, inventory management, and administrative features.

---

## Author

**Fahmi**

Developed as a web application project for Warung Nasi Kuning.

---

## License

This project is intended for educational and development purposes.
