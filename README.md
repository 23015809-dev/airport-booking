# Airport Transfer Booking System

Laravel web application for airport and tourist transfer booking.

## Runtime Requirements
- PHP >= 8.2
- Composer
- MySQL >= 8.0

## Run Locally
```bash
composer install
cp .env.example .env
php artisan key:generate
# update DB settings in .env
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## Key Notes
- UI text is English-only.
- No npm/Node step is required to run this project.
- Frontend uses Blade + plain HTML/CSS/JS.

## Recent Changes (2026-05-22)
1. Removed npm/Vite dependency from project scripts and root config files.
2. Added stable global stylesheet at `public/css/site.css` and loaded it in all main layouts.
3. Polished per-screen UI for user and admin pages:
   - route listing hero, cards, empty states
   - route details page layout
   - booking create form layout and price summary
   - booking history toolbar/table readability
   - admin dashboard stat cards
   - admin list/form screens for routes, vehicles, drivers, bookings
4. Standardized and fixed English text across views, alerts, and seed data.
5. Added `dashboard` route alias and aligned auth redirect flow to keep auth tests compatible.