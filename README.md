# [vb2007.hu](https://vb2007.hu)'s source code

## General info

The site is hosted with nginx, php8.2-fpm and mariadb.
Visitors are under the www-data:www-data user group & name.

## Setting up

The site is currently running on a Debian Linux server.

### Installing packages

Install the required packages with (php version can change over time. Ffmpeg is optional, because the compressing page currently isn't functional (my current server couldn't even handle compression lol)):

```shell
sudo apt install nginx php php-fpm php8.2-mysqli mariadb
```

### Modifying the config files

Copy the necessary config files from [here](https://github.com/vb2007/raspberry-configurations). The repo is currently private.
But I've only changed the max upload & post request size and enabled the mysql extension in the php.ini file. But I can't publicate the nginx.conf file for obvious reasons.

- **php.ini** is (usually) located at: ```/etc/php/fpm/8.2/php.ini```
- **nginx.conf** is located at: ```/etc/nginx/nginx.conf```

### Setting relevant permissions

The cdn's folder should get cloned automatically from the repo.
If not:

```shell
ln -s /media/vb2007/2TB-HDD/extended-cdn /var/www/html/extended-cdn
```

if ***session_start()*** fails with permission issues:

```shell
sudo chmod -R 777 /var/www
sudo chmod -R 777 /var/lib/php/
sudo chown www-data:www-data -R /var/lib/php/
```

If users cannot upload:

```shell
sudo chown www-data:www-data -R /media/vb2007/2TB-HDD/extended-cdn/uploads
```

#### !OTDATED! Modifying permissions for the sqlite3 databse

This section is not useful anymore. Back in the day, the site used sqlite3 for storing data. These commands gave php-fpm's user & group read & write access for the database.

```shell
sudo chown www-data:www-data /var/www/html/data
sudo chown www-data:www-data /var/www/html/data/data.db
sudo chmod 755 /var/www/html/data/data.db
```

## Configuring

There are a few config files, but only ```html/page/_script/_config.php``` is necessary for proper functionality. Then the **$mysqli** value should be used in queries (after importing the script).
It should look like this:

```php
<?php
//Configuration values
$databaseHost = '<Host IP (and port, if it isnt 3306 for MariaDB)>';
$databaseUsername = '<username>';
$databasePassword = '<relevant password for that username>';
$databaseName = '<database name ("nginxdata" for me)>';

//Connects to the database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//"Handle" errors
if($mysqli->connect_errno != 0) {
    echo "An error happened while trying to connect to the database: " . $mysqli->connect_error;
    exit();
}
?>
```

The ```html/robots.txt``` can be edited if necessary, but I don't use it.

The ```html/sitemap.xml``` is only for search engine's indexing bots.

## Setting up MariaDB

### Set up the database, tables, and privileges

Run the installation script with:

```shell
sudo mysql_secure_installation
```

Use the following command to open MariaDB as root:

```shell
sudo mysql -u root -p
```

Create the **nginxdata** database with:

```sql
CREATE DATABASE nginxdata;
```

Then make a new user with the following command:

```sql
CREATE USER '<username>'@'localhost' IDENTIFIED BY '<password>';
```

Then grant access to the user on the **nginxdata** databse (includes remote hosts, more about that later):

```sql
GRANT ALL ON nginxdata.* to '<username>'@'%' IDENTIFIED BY '<password>' WITH GRANT OPTION;
```

Flush privileges:

```sql
FLUSH PRIVILEGES;
```

Then exit with:

```sql
quit;
```

### Set up remote access

Open the following config file:

```shell
sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf
```

Then enable remote access with modifying the ```bind-address = 127.0.0.1``` value to ```bind-address = 0.0.0.0```.

---

### Importing data

Import data with:

```shell
mysql -u root -p nginxdata < sql_dump.sql
```

*If you have nothing to import, the scripts will create the tables automatically on the first user data insert/call.*
