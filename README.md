<div class="filament-hidden">

![EditorialTheme](https://raw.githubusercontent.com/jeffersongoncalves/editorialthemev3/main/art/jeffersongoncalves-editorialthemev3.png)

</div>

# EditorialTheme Start Kit Filament 3.x and Laravel 13.x

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

## About EditorialTheme

EditorialTheme is a robust starter kit built on Laravel 13.x and Filament 3.x, designed to accelerate the development of modern
web applications with a ready-to-use multi-panel structure, styled with the
[Editorial Terminal theme](https://github.com/jeffersongoncalves/filament-editorial-theme): paper + terminal
aesthetic, Fraunces / DM Sans / JetBrains Mono typography, amber palette, light and dark schemes and a terminal-style login.

## Features

- **Laravel 13.x** - The latest version of the most elegant PHP framework
- **Filament 3.x** - Powerful and flexible admin framework
- **Multi-Panel Structure** - Includes three pre-configured panels:
    - Admin Panel (`/admin`) - For system administrators
    - App Panel (`/app`) - For authenticated application users
    - Public Panel (frontend interface) - For visitors
- **Editorial Terminal Theme** - [`jeffersongoncalves/filament-editorial-theme`](https://github.com/jeffersongoncalves/filament-editorial-theme) on every panel, with the terminal login (and its light/dark toggle) on the Admin and App panels
- **Environment Configuration** - Centralized configuration through the `config/editorialtheme.php` file

## System Requirements

- PHP 8.2 or higher
- Composer
- Node.js and PNPM

## Installation

Clone the repository
``` bash
laravel new my-app --using=jeffersongoncalves/editorialthemev3 --database=mysql
```

### Using FilaKit CLI

Or use [FilaKit CLI](https://github.com/jeffersongoncalves/filakit-cli) for a simplified setup:

```bash
filakit new my-app --kit=jeffersongoncalves/editorialthemev3
```

> Install FilaKit CLI: `composer global require jeffersongoncalves/filakit-cli`

###  Easy Installation

EditorialTheme can be easily installed using the following command:

```bash
php install.php
```

This command automates the installation process by:
- Installing Composer dependencies
- Setting up the environment file
- Generating application key
- Setting up the database
- Running migrations
- Installing Node.js dependencies
- Building assets
- Configuring Herd (if used)

### Manual Installation

Install JavaScript dependencies
``` bash
pnpm install
```
Install Composer dependencies
``` bash
composer install
```
Set up environment
``` bash
cp .env.example .env
php artisan key:generate
```

Configure your database in the .env file

Run migrations
``` bash
php artisan migrate
```
Build frontend assets
``` bash
pnpm run build
```
Run the server
``` bash
php artisan serve
```

## Installation with Docker

Clone the repository
```bash
laravel new my-app --using=jeffersongoncalves/editorialthemev3 --database=mysql
```

Move into the project directory
```bash
cd my-app
```

Install Composer dependencies
```bash
composer install
```

Set up environment
```bash
cp .env.example .env
```

Configuring custom ports may be necessary if you have other services running on the same ports.

```bash
# Application Port (ex: 8080)
APP_PORT=8080

# MySQL Port (ex: 3306)
FORWARD_DB_PORT=3306

# Redis Port (ex: 6379)
FORWARD_REDIS_PORT=6379

# Mailpit Port (ex: 1025)
FORWARD_MAILPIT_PORT=1025
```

Start the Sail containers
```bash
./vendor/bin/sail up -d
```
You won’t need to run `php artisan serve`, as Laravel Sail automatically handles the development server within the container.

Attach to the application container
```bash
./vendor/bin/sail shell
```

Generate the application key
```bash
php artisan key:generate
```

Install JavaScript dependencies
```bash
pnpm install
```

## Editorial Terminal Theme — jeffersongoncalves/filament-editorial-theme

All three panels use [`jeffersongoncalves/filament-editorial-theme`](https://github.com/jeffersongoncalves/filament-editorial-theme):

- `EditorialThemePlugin::make()` is registered in each panel provider (the App panel keeps its green accent via `->primaryColor(Color::Green)`).
- Each panel's `resources/css/filament/{panel}/theme.css` imports Filament's theme, then the editorial theme, and its `tailwind.config.js` includes the theme's views in `content` so Tailwind keeps the utilities its partials use.
- The Admin and App logins (`app/Filament/{Admin,App}/Pages/Auth/Login.php`) extend the `filament-admin` / `filament-user` logins — so
  inactive accounts are still rejected — and only swap in the theme's terminal view, with a light/dark toggle next to the clock.

Customize it from the plugin (footer, sidebar status, fonts, paper grain…) or by overriding the theme's CSS tokens below the
`@import` in each panel's `theme.css` — see the [theme's README](https://github.com/jeffersongoncalves/filament-editorial-theme#usage).

## Authentication Structure

EditorialTheme comes pre-configured with a custom authentication system that supports different types of users:

- `Admin` - For administrative panel access
- `User` - For application panel access

## Development

``` bash
# Run the development server with logs, queues and asset compilation
composer dev

# Or run each component separately
php artisan serve
php artisan queue:listen --tries=1
pnpm run dev
```

## Customization

### Panel Configuration

Panels can be customized through their respective providers:

- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Providers/Filament/AppPanelProvider.php`
- `app/Providers/Filament/PublicPanelProvider.php`

Alternatively, these settings are also consolidated in the `config/editorialtheme.php` file for easier management.

### Themes and Colors

Each panel can have its own color scheme, which can be easily modified in the corresponding Provider files or in the
`editorialtheme.php` configuration file.

### Configuration File

The `config/editorialtheme.php` file centralizes the configuration of the starter kit, including:

- Panel routes
- Middleware for each panel
- Branding options (logo, colors)
- Authentication guards

## Resources

EditorialTheme includes support for:

- User and admin management
- Multi-guard authentication system
- Tailwind CSS integration
- Database queue configuration
- Customizable panel routing and branding

## License

This project is licensed under the [MIT License](LICENSE).

## Credits

Developed by [Jefferson Gonçalves](https://github.com/jeffersongoncalves).
