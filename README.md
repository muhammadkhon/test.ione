INSTALLATION
------------

### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql;dbname=test',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```

Edit the file `config/db-console.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=test',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.

### REST API

```
Для работы с API необходимо указать Bearer Token в header. 

Token: "test.ione"

http://localhost/products - показывает весь список автомобилей

http://localhost/products?fields=id,marka - показывает опреленные данные автомобилей
Название полей:
1. id,
2. marka,
3. model,
4. tipDvigatelya
5. privod,
6. kolichestvo,
7. price,
8. status.


http://localhost/products?filter[marka_id]=1 - показывает все автомобили идентификатор 
марки, которых 1. 
filter[marka_id] - фильтр по марке автомобилей;
filter[model_id] - фильтр по модели;
filter[privod_id] - фильтр по марке;
filter[tip_dvigatelya_id] - фильтр по типу двигателя;

http://localhost/products?per-page=25 -  показывает по 25 записей

http://localhost/products?per-page=5&page=2 -  вывод по 5 записей, 2 страница

```