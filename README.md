# Food Delivery Platform

This repository contains a PHP and MySQL food ordering application with separate interfaces for administrators, branch staff, and members.

## Project Structure

- `login.php` is the main entry point for authentication.
- `db.php` contains the shared MySQL connection helper.
- `Admin/` contains admin-side management pages.
- `Branch/` contains branch-side operations pages.
- `Member/` contains member-facing browsing and ordering pages.
- `images/` stores application images and other static assets.

## Roles

The login flow routes users by `rollid`:

- `1` -> `Admin/index.php`
- `2` -> `Branch/index.php`
- `3` -> `Member/index.php`

## Local Setup

### Requirements

- PHP 8.x
- MySQL or MariaDB
- XAMPP, WAMP, or another local PHP server stack

### Database Settings

The application currently expects:

- Host: `localhost`
- User: `root`
- Password: empty string
- Database: `project`

These values are defined in `db.php`, and `login.php` also connects with the same defaults.

### Run Locally

1. Place the project inside your local web server directory, such as `htdocs` if you are using XAMPP.
2. Create a MySQL database named `project`.
3. Import the required schema and seed data if you have a SQL export for this project.
4. Update `db.php` and `login.php` if your database credentials differ.
5. Start Apache and MySQL.
6. Open the app in your browser and start from `login.php`.

Example URL:

```text
http://localhost/anand_secured/login.php
```

## Notes

- `php.validate.executablePath` for this machine was set to `C:\xampp\php\php.exe` in VS Code.
- The app currently compares login passwords directly in `login.php`, so hashed-password support would be a good next improvement.
- A remote ZIP file is also present in the repository history from the existing GitHub branch.

## Git

The repository is connected to:

```text
https://github.com/jainamshah2028/food-delivery-platform-.git
```
