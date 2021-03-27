# Restaurant-App

> This is a simple application where an admin can manage foods available in his restaurant and customers can view the details of the food such as price, description of the food, etc. Admin will able to create the categories for the food and manage the foods.

# Usage
```
# Install Dependencies
composer install
npm install
or
yarn

# Create a copy of your .env file
cp .env.example .env

# Generate an app encryption key
php artisan key:generate

# Create an empty database for our application. In the .env file, add database information to allow Laravel to connect to the database

# Migrate the database
php artisan migrate

# Seed the database for admin account
php artisan db:seed
```

# Website 

http://resta-lavel.herokuapp.com/
