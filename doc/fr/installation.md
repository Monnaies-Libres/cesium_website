Installer le site sur son ordinateur
===

## Installer le serveur web

Pour faire tourner ce site sur votre ordinateur, vous aurez besoin d'installer un serveur web ainsi que PHP, qui transforme le code source contenu dans les fichiers *.php en HTML que le navigateur du visiteur peut comprendre.

Sous Linux, il vous faudra installer les paquets : 
- apache2
- php

Par exemple, sous une Debian-like (Ubuntu, Linux Mint, etc.) : 

```
sudo apt install apache2 php
```

Les utilisateurs de Windows peuvent utiliser [WAMP Serveur](https://www.wampserver.com/).

## .htaccess

Le fichier `.htaccess` est celui qui gère la réécriture d'URL, qui permet d'afficher au visiteur une structure compréhensible par un être humain dans sa barre d'adresse.

Votre fichier .htaccess doit contenir les infos suivantes :

```txt
<IfModule mod_rewrite.c>
RewriteEngine On

# Adaptez la ligne suivante à votre configuration (avec un slash à la fin)
RewriteBase /cesium-website-project/cesium_website/

RewriteOptions InheritDown

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule .*\.php - [L]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([^/]+)/(.*)$ index.php?lang=$1&page=/$2 [L]
</IfModule>
```

Modifiez l'instruction RewriteBase du .htaccess pour qu'elle s'accorde à votre propre configuration 
(tapez l'endroit où CesiumWebsite est installé, typiquement /)

Si lorsque vous essayez d'accéder au site, vous avez une erreur "404 Not Found", c'est que votre fichier `.htaccess` n'est pas pris en considération par Apache.

Il vous faudra alors éditer votre fichier `/etc/apache2/apache2.conf` (anciennement `/etc/apache2/httpd.conf`) pour y remplacer :

```txt
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
```
par :
```txt
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```

Activez le mod_rewrite d'Apache :
```
sudo a2enmod rewrite
```

Redémarrez Apache :
```
systemctl restart apache2
```

## config.php

Modifiez la variable $rootURL de la même façon.

## Configurer le multilangue

```
# En root, sur Debian
echo -e "ca_ES.UTF-8 UTF-8\nde_DE.UTF-8 UTF-8\nen_GB.UTF-8 UTF-8\neo UTF-8\nes_ES.UTF-8 UTF-8\nit_IT.UTF-8 UTF-8\nfr_FR.UTF-8 UTF-8" >> /etc/locale.gen
locale-gen
update-locale
service php*-fpm restart
```


