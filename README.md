## Dependencies
- PHP(with curl) >= 5.6.4
- libcurl >= 7.10.5
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## API DOC
The located documentation for IPA:
```angular2html
/doc/index.html
```
## Settings
Edit in file .env:
- API URL:
```$xslt
APP_URL=http://interval.app
```
- Database parameters:
```$xslt
DB_CONNECTION=mysql
DB1_HOST=127.0.0.1
DB1_PORT=3306
DB1_DATABASE=portal
DB1_USERNAME=laravel
DB1_PASSWORD=laravel
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interval
DB_USERNAME=homestead
DB_PASSWORD=secret
```
- Mail parameters:
```$xslt
MAIL_ADDRESS_FROM=report@example.com
MAIL_ADDRESS_TO=report@example.com
MAIL_FROM_NAME=Example
MAIL_TO_NAME=Example
MAIL_DRIVER=mail_driver
MAIL_HOST=mail_host
MAIL_PORT=2525
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=null
```
## Deploying the project
```$xslt
composer install
```
```$xslt
cp .env.example .env
```
```$xslt
php artisan key:generate
```
```$xslt
composer require guzzlehttp/guzzle
```