Sonars Multiple Authentication for Laravel 5.2 & 5.3

- `php artisan multiauth:install {guard} -f`

## What it does?
With one simple command you can setup multi auth for your Laravel 5.2 & 5.3 project. The package installs:
- Model
- Migration
- Controllers
- Notification
- Routes
  - routes/web.php
      - {guard}/login
          - {guard}/register
	      - {guard}/logout
	          - password reset routes
		    - routes/{guard}.php
		        - {guard}/home
			- Middleware
			- Views
			- Guard
			- Provider
			- Password Broker
			- Settings 

## Usage

### Step 1: Install Through Composer

```
composer require sonars/multiauth
```

### Step 2: Add the Service Provider

You'll only want to use these package for local development, so you don't want to update the production `providers` array in `config/app.php`. Instead, add the provider in `app/Providers/AppServiceProvider.php`, like so:

```php
public function register()
{
	if ($this->app->environment() == 'local') {
		$this->app->register('Sonars\MultiAuth\MultiAuthServiceProvider');
	}
}
```
 ( OR )

 ```php
 	config/app.php
 	return  [
 		....
 		....
 		'providers' => [
 	    	....
 	    	....
 			Sonars\MultiAuth\MultiAuthServiceProvider::class
 		],
 		....
 		....
 		....
 	]
 ```

### Step 3: Install Multi-Auth files in your project

```
php artisan multiauth:install {singular_lowercase_name_of_guard} -f

//examples
php artisan multiauth:install admin -f
php artisan multiauth:install employee -f
php artisan multiauth:install customer -f
```

Notice:
If you don't provide `-f` flag, it will not work. It is a protection against accidental activation.

### Step 4: Migrate new model table 

```
php artisan migrate
```

### Step 5: Try it

Go to: `http://url_to_your_proejct/guard/login`
Example: `http://project/admin/login`

## Options

If you don't want model and migration use `--model` flag.
```
php artisan multiauth:install admin -f --model
```

If you don't want views use `--views` flag.
```
php artisan multiauth:install admin -f --views
```

If you don't want routes in your `routes/web.php` file, use `--routes` flag.

```
php artisan multiauth:install admin -f --routes
```

## Files which are changed and added by this package
- config/auth.php
  - add guards, providers, passwords

  - app/Http/Providers/RouteServiceProvider.php
    - register routes

    - app/Http/Kernel.php
      - register middleware

      - app/Http/Middleware/
        - middleware for each guard

	- app/Http/Controllers/{Guard}Auth/
	  - new controllers

	  - app/Http/{Guard}.php
	    - new Model
	      
	      - app/Notifications/{Guard}ResetPassword.php
	        - reset password notification

		- database/migrations/
		  - migration for new model

		  - routes/web.php
		    - register routes

		    - routes/{guard}.php
		      - routes file for given guard

		      - resources/views/{guard}/
		        - views for given guard
			  

#### Note: Never install configurations with same guard again after installed new version of package. So if you already installed your `admin` guard, don't install it again after you update package to latest version. 

## Give original credits to: 

[Hesto](https://github.com/hesto/multiauth)
