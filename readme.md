# WebGainsTest

Hi! I'm Eduardo Álvarez and I made this little API Rest, working with PHP7, Laravel 5.4 and MySQL.

### Requirements
- All the Laravel [requirements](https://laravel.com/docs/5.4/installation#installing-laravel)
- The DataBase provided [here](http://www.mysqltutorial.org/mysql-sample-database.aspx)
- Git
- Any IDE

### Especifications
- The API routes are at routes/api.php
- The models are at app folder
- I use [Fractal](fractal.thephpleague.com), I think it's a convenient way to create the response objects, so I implemented. The transformers are at app/Http/Transformers folder
- The Controllers are at app/Http/Controllers

### How to run

- Clone this repository
```
    $ git clone https://github.com/walis85300/webGainsTest.git
    $ cd webGainsTest
```
- Install all the Laravel requirements
```
    $ composer install
```

- Once you've installed all dependencies you need to make some changes at .env file, in this case .env.example is configured with my enviroment variables, so if it is convenient for you just change the name to .env.example to .env


- If you use [Laravel Valet](https://laravel.com/docs/5.4/valet) (that's my case) you need to link the app folder 
```
    $ valet link .
```
Now your app will be served at http://webGainsTest.dev

If you don't use Valet, Artisan provides a command for serve the app on PHP development server, you can use it, just type
```
    $ php artisan serve
```
And the app will be served at http://localhost:8000

### Note 
You need to write the serve direction at .env file, right in the APP_URL variable, this variable is used in some models to generate the url to specific resources. Also, you need to write the information about your DB, in my case the DB that I just download and execute in my local MySQL is named `classicmodels` 
    
### Availables Endpoints 

- Offices CRUD:
    - GET /api/offices
    - GET /api/offices/{id}
    - POST /api/offices 
    - PUT /api/offices/{id}
    - DELETE /api/offices/{id}
- Product Line CRUD
    - GET /api/productline
    - GET /api/productline/{id}
    - POST /api/productline 
    - PUT /api/productline/{id}
    - DELETE /api/productline/{id}
- Create a sale: 
     - POST /api/sale
- Get the product-line performance by office
    - GET /api/report/product-line 

### Unit tests
I write some unit test, of course you can run it
```
    $ ./vendor/bin/phpunit
```
I made the test for Office Module (the CRUD operations)

# Enjoy :) 


You can contact me: walojose46@gmail.com, my user in GitHub is walis85300 (in twitter too, and facebook too)

