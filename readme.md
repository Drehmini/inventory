## Inventory System

Current Laravel Version : 5.2  
Required PHP Extension : php_ldap

Install the laravel application using the following command:
~~~
composer install
~~~

Then generate a key using the following command:
~~~
php artisan key:generate
~~~

Using https://github.com/Adldap2/Adldap2-Laravel  
To get default adldap config files run the following:
```
php artisan vendor:publish --tag="adldap"
```

Email settings must be set in the .env file.  
The scheduler must be setup using the cronjob
~~~
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
~~~

## License  
This software is licensed under the [MIT license](http://opensource.org/licenses/MIT "MIT License"). 