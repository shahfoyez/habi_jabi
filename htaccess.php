<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
RewriteCond %{HTTPS} off
RewriteCond %{HTTP:X-Forwarded-SSL} !on
RewriteCond %{HTTP_HOST} ^anwars\-restaurants\.com$ [OR]
RewriteCond %{HTTP_HOST} ^www\.anwars\-restaurants\.com$
RewriteRule ^(.*)$ "https\:\/\/anwars\-restaurants\.com\/$1" [R=301,L]

# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php74” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php74___lsphp .php .php7 .phtml
</IfModule>
# php -- END cPanel-generated handler, do not edit
