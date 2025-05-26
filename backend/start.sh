#!/bin/bash
set -e

# Copy .env.example to .env if .env not exists
if [ ! -f /var/www/.env ]; then
    echo "Copying .env.example to .env"
    cp /var/www/.env.example /var/www/.env
fi

# Generate APP_KEY if empty or not set
if ! grep -q '^APP_KEY=' /var/www/.env || ! grep -qv '^APP_KEY=$' /var/www/.env; then
    echo "Generating APP_KEY..."
    php /var/www/artisan key:generate
fi

# Wait for MySQL
echo "Waiting for MySQL..."
until mysqladmin ping -h db --silent; do
    sleep 2
done

# Run composer install if vendor folder missing
if [ ! -d /var/www/vendor ]; then
    echo "Running composer install..."
    composer install --no-dev --optimize-autoloader
fi

# Import database if not exists
DB_NAME="sistem_sidangakhir"
RESULT=$(mysql -u root -h db -e "SHOW DATABASES LIKE '$DB_NAME';" | grep $DB_NAME || true)
if [ -z "$RESULT" ] && [ -f /var/www/db/init.sql ]; then
    echo "Importing database $DB_NAME"
    mysql -u root -h db < /var/www/db/init.sql
fi

echo "Starting PHP-FPM"
exec php-fpm
