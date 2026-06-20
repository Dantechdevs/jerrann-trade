# Jerann Traders – E-Commerce Platform

> Developed by **Dantechdevs** for Jerann Traders | Laravel 11 · MySQL · M-Pesa

A full-featured e-commerce system for selling printers, laptops, tablets, inks, accessories, and managing device repair services.

---

## Quick Start (XAMPP / Windows)

```bash
# 1. Place project in htdocs or any folder
cd jerann-traders

# 2. Install dependencies
composer install

# 3. Copy and configure .env
copy .env.example .env
php artisan key:generate

# 4. Create DB: jerann_traders in phpMyAdmin, then:
php artisan migrate --seed

# 5. Link storage
php artisan storage:link

# 6. Serve
php artisan serve
```

Visit **http://localhost:8000**

---

## Default Credentials

| Role     | Email                          | Password  |
|----------|-------------------------------|-----------|
| Admin    | admin@jeranntraders.com       | admin123  |
| Customer | customer@jeranntraders.com    | password  |

> ⚠️ Change these immediately in production.

---

## Key URLs

| URL                    | Description               |
|------------------------|---------------------------|
| `/`                    | Homepage                  |
| `/products`            | Product catalog           |
| `/cart`                | Shopping cart             |
| `/checkout`            | Checkout                  |
| `/orders`              | My orders                 |
| `/repairs/create`      | Book a repair             |
| `/admin`               | Admin dashboard           |
| `/admin/products`      | Manage products           |
| `/admin/orders`        | Manage orders             |
| `/admin/repairs`       | Manage repairs            |

---

## M-Pesa Setup

1. Register at [developer.safaricom.co.ke](https://developer.safaricom.co.ke)
2. Create an app → get Consumer Key & Secret
3. Set `.env`:
   ```
   MPESA_CONSUMER_KEY=...
   MPESA_CONSUMER_SECRET=...
   MPESA_SHORTCODE=174379
   MPESA_PASSKEY=...
   MPESA_CALLBACK_URL=https://yourdomain.com/api/mpesa/callback
   MPESA_ENV=sandbox
   ```
4. Use [ngrok](https://ngrok.com) for local callback testing

---

## Tech Stack

- **Laravel 11** (PHP 8.1+)
- **MySQL 8**
- **Blade** templates with inline CSS (no framework dependency)
- **M-Pesa Daraja 2.0** STK Push
- **GuzzleHTTP** for API calls

---

## Project Structure

```
app/
├── Http/Controllers/
│   ├── Admin/          # DashboardController, ProductController, OrderController, RepairController
│   ├── Auth/           # RegisteredUserController, AuthenticatedSessionController
│   ├── CartController.php
│   ├── CheckoutController.php
│   ├── OrderController.php
│   ├── PaymentController.php   # M-Pesa callback
│   ├── ProductController.php
│   └── RepairController.php
├── Http/Middleware/
│   └── AdminMiddleware.php
├── Models/             # User, Product, Category, Order, OrderItem, CartItem, Repair, Payment
└── Services/
    └── MpesaService.php

resources/views/
├── layouts/            # app.blade.php, admin.blade.php
├── home/               # index.blade.php
├── products/           # index.blade.php, show.blade.php
├── cart/               # index.blade.php
├── checkout/           # index.blade.php
├── orders/             # index.blade.php, show.blade.php
├── repairs/            # create.blade.php
├── admin/              # dashboard, products, orders, repairs, customers
└── auth/               # login.blade.php, register.blade.php

database/
├── migrations/         # users, categories, products, orders, cart_items, repairs, payments
└── seeders/            # DatabaseSeeder (admin + sample data)

config/
└── mpesa.php
```

---

## Repair Workflow

```
submitted → diagnosed → quoted → approved → in_progress → completed → notified
```

Admin updates status + adds technician notes + estimated/actual costs from `/admin/repairs/{id}`.

---

## Security

- CSRF protection on all forms
- Role-based middleware (`AdminMiddleware`)
- Eloquent ORM (SQL injection prevention)
- Password hashing via `bcrypt`
- Input validation via Form Requests / inline `validate()`

---

## License

Proprietary — © 2026 Jerann Traders. All rights reserved.
Developed by [Dantechdevs](mailto:dev@dantechdevs.com)
