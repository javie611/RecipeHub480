#!/bin/bash

# Update system packages
sudo yum update -y

# Install PHP and dependencies
sudo amazon-linux-extras enable php8.0
sudo yum clean metadata
sudo yum install -y php php-mbstring php-xml php-bcmath php-pdo php-mysqlnd php-cli php-json unzip git curl

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Navigate to web root
cd /var/www/html

# Clone the Laravel repository (replace with your repo URL)
sudo git clone https://github.com/javie611/RecipeHub480.git

# Set permissions
sudo chown -R ec2-user:ec2-user /var/www/html
sudo chmod -R 755 /var/www/html
sudo chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Laravel dependencies
composer install --no-dev --optimize-autoloader

# Copy and configure .env (could pull from AWS SSM Parameter Store if needed)
cp .env.example .env
php artisan key:generate

# Optionally set environment variables from Parameter Store
# export $(aws ssm get-parameters-by-path --path "/RecipeHub" --with-decryption --region us-east-2 --query "Parameters[*].[Name,Value]" --output text | sed 's/^/export /')

# Run database migrations
php artisan migrate --force

# Start Laravel with PHP’s built-in server (optional if using Apache/Nginx)
php artisan serve --host=0.0.0.0 --port=80
