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


/////////////////////////////////////////////////////////////////


<IfModule mod_rewrite.c>
    RewriteEngine On

    # Remove the public/ directory from URL
    RewriteRule ^(.*)$ public/$1 [L]

    # Handle the public/ directory
    RewriteCond %{REQUEST_URI} !^public/
    RewriteRule ^(.*)$ public/index.php [L]
</IfModule>

# Protect your .env file
<Files .env>
    Order allow,deny
    Deny from all
</Files>

# Protect against unauthorized access to sensitive files
<FilesMatch "\.(env|json|config|lock|gitignore|htaccess)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Redirect to HTTPS (if not using a load balancer)
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>

