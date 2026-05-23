# AGENTS.md — Airport Transfer Booking System

## Overview
Laravel web application for booking airport and tourist transfer rides.
Frontend must use plain Blade + HTML + CSS + JavaScript (no CSS/JS frameworks).

## Environment
- PHP >= 8.2
- Composer
- MySQL >= 8.0

## Core Modules
- Authentication (register, login, logout)
- User booking flow (route list, search, route details, booking form, booking history)
- Admin management (dashboard, routes, vehicles, drivers, bookings)

## Technical Rules
- Use Laravel Form Request validation
- Use CSRF for all write operations
- Use soft deletes for routes, vehicles, drivers
- Validate upload images (mime + max 2MB)
- Use flash messages for success/error feedback
- Keep UI text in English
- Do not use npm/Node-based build steps

## Change Log (2026-05-22)
- Converted runtime UI text to English.
- Removed npm/Node runtime dependency from project workflow.
- Added global stylesheet public/css/site.css and loaded it in all main layouts.
- Polished user/admin screens with improved layout, spacing, forms, tables, and empty states.
- Updated seed demo data to English names/routes/descriptions.
