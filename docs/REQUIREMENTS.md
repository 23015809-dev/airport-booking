# REQUIREMENTS.md — Airport Transfer Booking System

## Users
- User: books transfer rides
- Admin: manages routes, vehicles, drivers, and bookings

## Required Features
### User
- Register/login
- View active routes
- Search routes by pickup/dropoff/time
- View route details
- Create bookings
- View booking history

### Admin
- Dashboard stats (total bookings, pending bookings, revenue, active routes)
- CRUD routes
- CRUD vehicles
- CRUD drivers
- View/filter bookings
- Confirm/cancel pending bookings

## Required Data
- users (with role: user/admin)
- transfer_routes
- vehicles
- drivers
- bookings

## Required Validation
- Route, vehicle, driver, booking fields must be validated with Form Requests
- Image fields: image + mimes + max 2048KB
- Booking status transitions: only pending can become confirmed/cancelled

## Non-Functional Requirements
- CSRF protection
- Flash success/error messages
- Soft delete for routes/vehicles/drivers
- English-only interface text
- No npm/Node dependency for running the app

## Change Log (2026-05-22)
- Enforced English-only text in runtime UI.
- Removed npm/Vite dependency from execution workflow.
- Added global style layer and polished each required screen (user + dmin).
- Updated demo seed content to English.
