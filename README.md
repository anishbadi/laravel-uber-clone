## Project Setup

- Rename .env.example to .env file
- Replace database variable with your database credentials in env file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uber
DB_USERNAME=root
DB_PASSWORD=
```
- Set Smtp credentials in env file.
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=2e5b202d424859
MAIL_PASSWORD=8a3c609a03ad67
MAIL_ENCRYPTION=tls
```
- Open the root directory in terminal and run this command `composer update`
- If you want to add a location, then go to this file `\database\seeds\LocationSeeder.php` and append the code below to that file.
```
Location::updateOrCreate([
    "name" => "Hebbala",
],[
    "name" => "Hebbala",
    "latitude" => "36.629349",
    "longitude" => "6.379350",
]);
```

- If you want to add a customer, then go to this file `\database\seeds\CustomerSeeder.php` and append the format below in that file.
```
Customer::updateOrCreate([
    "email" => "john@example.com",
],[
    "name" => "John Due",
    "email" => "john@example.com",
]);
```

- After this, open the root directory in terminal and run the commands `php artisan migrate` && `php artisan db:seed`.

- After running the above command, run this command `php artisan serve`

- Open another root directory terminal and run `php artisan queue:listen` for the running queue on the background which is used for sending mail to users.

- Open this url in your browser `http://127.0.0.1:8000/`

- Click on login and login with admin credentials : Email : admin@example.com, Password : Admin@123

- For Show trip click on trip menu in the nav bar.
