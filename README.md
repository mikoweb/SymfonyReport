# Symfony Report App

Web application written in Symfony 4 for the recruitment task. Exports report.

## env options (.env.local)

    APP_ENV
    DATABASE_URL

Sample config for PostgreSQL:

    DATABASE_URL="postgresql://symfony:ChangeMe@127.0.0.1:5432/symfony_report?serverVersion=14&charset=utf8"

## Creating PostgreSQL database and application installation

    php8.1 composer.phar install
    php8.1 bin/console doctrine:database:create
    php8.1 bin/console doctrine:schema:update --force
    php8.1 bin/console doctrine:fixtures:load --append --group=sample_history_exports

### Create Apache Virtual Host

Create file `/etc/apache2/sites-available/001-symfony-report.conf`:

```apacheconf
<VirtualHost symfony-report.home:80>
	DocumentRoot /home/[username]/Projects/SymfonyReport/public
	ServerName symfony-report.home

	Include /etc/apache2/conf-available/php8.1-fpm.conf

	<Directory /home/[username]/Projects/SymfonyReport/public/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride all
		Require all granted
		Order deny,allow
		deny from all
		allow from 127.0.0.1
	</Directory>
</VirtualHost>
```

Add this to `/etc/hosts`:

```
127.0.0.1 symfony-report.home
```

Enable virtual host:

    sudo a2ensite 001-symfony-report.conf

Restart apache:

    sudo systemctl restart apache2

## Routes

```
 -------------------------- ---------- -------- ------ ----------------------------------- 
  Name                       Method     Scheme   Host   Path                               
 -------------------------- ---------- -------- ------ -----------------------------------     
 TODO          
 -------------------------- ---------- -------- ------ ----------------------------------- 
 ```

## Copyrights

Copyright (c) Rafał Mikołajun 2022.
