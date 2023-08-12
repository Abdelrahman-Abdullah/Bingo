<h1 align="center" style="font-size: 40px">Bingo</h1>

# Home
<img src="public/github/home.png">

# Panel
<img src="public/github/pannel.png">

<hr>

## Config
- Goto `.env` File Put Your DB Configuration
```
DB_DATABASE='Your-DB-NAME'
DB_USERNAME='DB-Username'
DB_PASSWORD='DB-Password'
```
- Sign up in `Mailtrip`
- Put Your Mailtrip Configuration

```
MAIL_MAILER='Here'
MAIL_HOST='Here'
MAIL_PORT='Here'
MAIL_USERNAME='Here'
MAIL_PASSWORD='Here'
```
Run Migration With Seeding
```
php artisan migrate --seed
```

Now Launch

```
php artisan serve 
```

## Future Feature
- Improve More components
- Cash Clear From Admin Panel Using Events or Filament
- Dashboard Logout Redirect To Home
