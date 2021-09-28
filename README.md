
## About Project

This project is a hotel reservation project, which you can reserve a hotel in Iran.

# project structure

- ## Tools used
<ul> 
    <li><a href="https://laravel.com">Laravel</a> for server-side implementation.</li>
    <li><a href="https://redis.io/">Redis</a> for caching and queuing.</li>
</ul>


- ## User types
    - Customer
    - Hotel Admin
    
- ## Database structure 

  ![database_struct](https://user-images.githubusercontent.com/30191548/135037522-5f964bf3-8669-4a71-adee-919cc11661cb.png)




## Requirements :

**1.** Install composer packages with below command:

```shell script
  composer install
```

**2.** Create `.env` file(copy data of `.env.example` )

**3.** Setup configs in `.env` file

**4.** Migrate dataBase with below command:

```shell script
  php artisan migrate
```

## Requirements(development) :

**1.** fill dataBase with fake data:
 
```shell script
  php artisan db:seed
```

## Run Server(development) :

**1.** Start redis server

**2.** Start Queue listening with below command:

```shell script
  php artisan queue:listen
```

**3.** Run server with below command :
```shell script
  php artisan serve
```


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to Omid Reza Heidari via [omid77.orh@gmail.com](mailto:omid77.orh@gmail.com). All security vulnerabilities will be promptly addressed.
