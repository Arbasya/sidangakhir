#!/bin/bash
set -e

# 1. Copy .env jika belum ada
if [ ! -f /var/www/.env ]; then
    echo "Copying .env file..."
    if [ -f /var/www/.env.enc ]; then
        cp /var/www/.env.enc /var/www/.env
    else
        echo "Warning: .env.enc not found!"
    fi
else
    echo ".env already exists"
fi

# 2. Import database jika belum ada
DB_NAME="sistem_sidangakhir"
DB_USER="root"
DB_PASS=""
DB_HOST="db"
SQL_FILE="/var/www/db/init.sql"

echo "Checking if database '$DB_NAME' exists..."
RESULT=$(mysql -u"$DB_USER" -p"$DB_PASS" -h"$DB_HOST" -e "SHOW DATABASES LIKE '$DB_NAME';" | grep "$DB_NAME" || true)

if [ -z "$RESULT" ]; then
    echo "Database '$DB_NAME' not found. Importing from $SQL_FILE ..."
    if [ -f "$SQL_FILE" ]; then
        mysql -u"$DB_USER" -p"$DB_PASS" -h"$DB_HOST" < "$SQL_FILE"
        echo "Database imported successfully."
    else
        echo "SQL file $SQL_FILE not found."
    fi
else
    echo "Database '$DB_NAME' already exists. Skipping import."
fi

# 3. Jalankan php artisan serve (jika Laravel)
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
