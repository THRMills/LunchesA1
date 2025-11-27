# LunchesA1 Deployment Guide

This project contains a simple PHP lunch ordering demo with an installer that seeds initial food data. Use the steps below to add it to your own repository and get it running locally.

## Copying the project into your repository

1. **Create a new repo on GitHub** (empty, without a README/License). Note the SSH or HTTPS URL.
2. From your dev machine, clone this project (or your current working copy) and point the remote at your repo:
   ```bash
   git clone <this-project-url> lunches
   cd lunches
   git remote set-url origin <your-repo-url>
   git push -u origin work
   ```
   *If you already have local changes, just run the last two commands from your existing checkout instead of recloning.*
3. Open a pull request from the `work` branch on your repo so you can review/merge the changes.

## Running the app locally

1. Install PHP (with mysqli extension) and MySQL/MariaDB.
2. Create a database (e.g., `lunches`) and update the credentials in `connection.php` if needed.
3. Run the installer to create tables and seed starter food items:
   ```bash
   php install.php
   ```
4. Serve the app (e.g., `php -S localhost:8000`) and sign in with a user that exists in your `users` table.

## Troubleshooting tips

- If you rerun `install.php`, it recreates the tables—back up data first.
- Confirm your PHP runtime can connect to MySQL (check host, port, username/password in `connection.php`).
- If the login page does not accept credentials, ensure the submitted password field matches what is stored for the user.
