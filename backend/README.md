# Dubai Plaza — Laravel backend (V1 start)

Production-style backend for the Dubai Plaza laptop shop: **auth (owner/staff)** and **inventory** (serialized laptops + quantity accessories).

The interactive HTML wireframe lives in the separate GitHub repo / Vercel demo; this app is the real server-side system.

## Requirements

- PHP 8.3+ (Laragon: `C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe`)
- Composer (Laragon: `C:\laragon\bin\composer\composer.phar`)
- SQLite (default) or MySQL/PostgreSQL

## Quick start (Laragon)

```powershell
cd C:\laragon\www\dubaiplaza
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan migrate:fresh --seed
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan serve
```

Open http://127.0.0.1:8000/login

| User | Email | Password | Role |
|------|-------|----------|------|
| Owner | owner@dubaiplaza.test | password | owner |
| Staff | staff@dubaiplaza.test | password | staff |

## Implemented (this sprint)

- Laravel Breeze login / profile
- Roles: `owner`, `staff`
- Dashboard counts
- Laptop units CRUD + token search (`?q=dell i5 8gb`)
- Accessories CRUD + low-stock highlight
- Supplier lots (linked to laptops; import UI later)

## Next (from product report)

- Sales, Udhaar/customers, Excel import, reports, PostgreSQL on production

## Stack

- Laravel 13, Breeze (Blade), Bootstrap 5 (inventory UI via CDN)
- DB: SQLite locally; PostgreSQL recommended for production
