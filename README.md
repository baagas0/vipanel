## :rocket: MediaPanel By HiskiaDev

## WHAT IS MEDIAPANEL?
MEDIAPANEL is a SMM website that functions to make transactions to increase your social media stats.

## System Requirement
- PHP Version 7.2 or Above
- Composer
- Git
- NPM

## Installation
1. Open the terminal, navigate to your directory (htdocs or public_html).
```bash
git clone https://github.com/hiskiia/panel.git
cd panel
composer install
npm install
npm run dev
```

2. Setting the database configuration, open .env file at project root directory
```
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```

3. Migrate Database & Clear Config
```bash
php artisan migrate
php artisan db:seed
php artisan key:generate
php artisan config:cache
```
You will get the administrator credential and url access like example bellow:
```bash
::Administrator Credential::
URL Login: http://localhost/panel/admin/login
Email: hiskianggi@gmail.com
Password: 123456

```
