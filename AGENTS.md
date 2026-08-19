# AGENTS.md

## Project Shape
- Laravel app requiring PHP `^8.3` and Laravel `^13.0`; frontend tooling is Vite `^8` with Tailwind via `@tailwindcss/vite`.
- The app is Spanish-first (`.env.example` sets `APP_LOCALE=es`, `APP_FAKER_LOCALE=es_MX`); keep UI text and domain names in Spanish unless changing an English-only framework surface.
- Real domain entrypoints are `routes/web.php`, controllers under `app/Http/Controllers`, and models `User`, `Asignatura`, and `Grupo`; the README is only naming context.
- Auth uses Spatie permissions with roles seeded as `Admin` and `Maestro`; permissions currently include `user.index` and `user.edit.roles`.

## Setup And Run
- Install deps with `composer install` and `npm install`; there is `composer.lock` but no committed JS lockfile.
- For a local SQLite setup, create `.env` from `.env.example`, run `php artisan key:generate`, then create `database/database.sqlite` before migrations if it is missing.
- `composer run setup` runs `composer install`, copies `.env`, generates the key, runs `php artisan migrate --force`, then `npm install` and `npm run build`; it does not seed data or create the SQLite file.
- Use `php artisan migrate:fresh --seed` when you need the seeded roles, admin user, and local sample data. Seeded admin credentials are `admin` / `administrador`, with forced password change enabled.
- `composer run dev` starts four processes via `concurrently`: `php artisan serve`, `php artisan queue:listen --tries=1 --timeout=0`, `php artisan pail --timeout=0`, and `npm run dev`.

## Verification
- Full PHP test command is `composer run test`; it clears config first and then runs `php artisan test`.
- Focused tests: `php artisan test tests/Feature/ExampleTest.php` or `php artisan test --filter test_name`.
- PHPUnit is configured to use in-memory SQLite, array cache/session, sync queue, and `APP_ENV=testing`, so tests should not need the local `.env` database.
- Format PHP with `vendor/bin/pint`; pre-commit runs Pint plus YAML checks, secret scanning, merge-conflict checks, and gitlint.
- `phpstan/phpstan` is installed, but there is no repo script or config for it; do not assume a named `composer` command exists.

## Implementation Notes
- `ForcePasswordChange` is appended globally in `bootstrap/app.php` and also aliased as `force.password`; protected routes in `routes/web.php` use the alias while `/update-password` and `/logout` must remain reachable to avoid redirect loops.
- `User` hashes passwords via the Eloquent `password` cast and normalizes `username`, `name`, and `last_name` through accessors; controllers intentionally assign raw password strings.
- Blade layout currently links static assets directly from `/css` and `/js`; it does not use `@vite`, even though Vite inputs are `resources/css/app.css` and `resources/js/app.js`.
- Public CSS/JS vendor assets are tracked/managed by scripts in `scripts/` using `scripts/dependencias-css-js.csv`; avoid replacing them with CDN links without checking the offline/static-asset workflow.
- Main route names for asignaturas/grupos intentionally use the `grupos.*` namespace even when the URL is `/asignatura`.
