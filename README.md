
## About CalcTek
Simple math expression evaluator with history of all requests.

Note: No auth module is included.

## Installtion

```sh
git clone <repo>
cd <repo>

composer install
php artisan migrate
```

### Server
```sh
# Start server
php artisan serve
```

### TroubleShooting
If having issue `math_eval function not found` then run following command and restart server again.
```sh
composer dump-autoload
```

