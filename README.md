## Setting Up Local Environment

- Clone this repository, then, in your terminal, `cd` into the cloned directory.
- Copy `.env.example` to `.env` and change DB connection details as needed
- Run `composer install`
- Run `php artisan key:generate`
- Configure database - `php artisan migrate`
- Seed with test data - `php artisan db:seed`

### Run the tests

- Run command `php artisan test`

### Accessing the application

Try loading http://127.0.0.1:8000 in your web browser.