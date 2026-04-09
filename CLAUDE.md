# CLAUDE.md — KeyDex Project Context

## What is this project?
KeyDex (`codearachnid/keydex`) is a standalone Laravel package for cataloging and managing software license keys. Think of it as a rolodex for license keys — the single source of truth for every key your company owns or distributes across WordPress plugins, Laravel packages, Mac applications, and other software.

## Package Identity
- **Packagist:** `codearachnid/keydex`
- **Namespace:** `CodeArachnid\KeyDex`
- **Author:** Timothy Wood (@codearachnid / codearachnid@gmail.com)
- **License:** MIT
- **Skeleton:** Based on `spatie/package-skeleton-laravel`

## Tech Stack & Constraints
- **PHP:** 8.2+ minimum (target/advertise 8.3+)
- **Laravel:** 12+
- **Database:** DB-agnostic. Use Laravel migrations and Eloquent only. No raw SQL. Must work with SQLite, MySQL, and PostgreSQL.
- **Testing:** Pest (not PHPUnit)
- **Static Analysis:** PHPStan
- **UI:** FluxUI for the bundled admin panel. Optional Filament integration as a stretch goal.
- **Auth:** The package does NOT handle authentication or authorization. That is the consuming application's responsibility.

## Architecture Principles
1. **Standalone package** — not a full Laravel app. Installed via `composer require codearachnid/keydex`.
2. **Zero opinions on auth** — no gates, policies, or middleware shipped. The consuming app owns this.
3. **DB-agnostic** — migrations use Laravel's schema builder. No database-specific syntax.
4. **Convention over configuration** — ship sensible defaults, allow overrides via config publishing.
5. **Service provider auto-discovery** — register via Laravel's package auto-discovery in composer.json.

## MVP Features (Current Sprint)
- CRUD operations for license keys (Eloquent models, migrations, relationships)
- Key metadata: expiration date, renewal date, key value, status (active/expired/revoked/suspended)
- Product/software model: associate keys with named software products and their type (WordPress plugin, Laravel package, Mac app, etc.)
- Site/project assignment: track which domains, projects, or installations use each key
- FluxUI admin panel: standalone routes and views for managing everything above

## Database Schema (Planned)
- `keydex_products` — software products (name, type, vendor, url, notes)
- `keydex_licenses` — license keys (key value, product_id, status, issued_at, expires_at, renews_at, max_activations, notes)
- `keydex_activations` — where keys are used (license_id, domain/identifier, activated_at, deactivated_at, notes)

All tables prefixed with `keydex_` to avoid collisions with the consuming app.

## Key Commands
```bash
# Run tests
composer test

# Run static analysis
composer analyse

# Format code
composer format
```

## Stretch Goals (Do NOT build unless explicitly asked)
- Filament admin panel plugin
- Multi-tenancy support
- License key generation with configurable formats
- Activation limit enforcement
- Expiration notifications
- REST API for external key validation
- Import/export (CSV, JSON)

## Code Style
- Follow PSR-12
- Use strict types (`declare(strict_types=1)`)
- Type-hint everything (parameters, return types, properties)
- Use PHP 8.2+ features (enums, readonly properties, named arguments) where appropriate
- Eloquent models should use the `keydex_` table prefix
- Config file should be named `keydex.php`
- All routes should be prefixed with `keydex`
- All views should be namespaced under `keydex::`