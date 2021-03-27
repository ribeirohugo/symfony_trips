# Trips Symfony

Trips Symfony is a platform developed using PHP and Symfony used to manage a specific domain about travels and activities, storing all the information related to the activity locations and places (as hotels, restaurants, clubs, monuments).

## 1. Requirements

This project requires ``Php 7.4`` and all Linux packages needed are available in Dockerfile.

This project is ready to set up a MySQL database by filling those environment variables.

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## 2. Initialize Database

Run the following command to load database struct from last migration:

```php bin/console doctrine:migrations:migrate 'DoctrineMigrations\Version20200910165818' ```

If you want to remove  use this:

```php bin/console doctrine:migrations:execute --down 'DoctrineMigrations\Version20200910165818' ```

Then load default data through Doctrine Fixtures using the following command:

```php bin/console doctrine:fixtures:load```
