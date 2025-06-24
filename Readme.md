## Recomendaciones

Tener presente para correr el proyecto en sus locales

- composer install
- cp .env.example .env
- php artisan key:generate
- Configurar las variables de conexión a la db en el .env
    - APP_NAME=Eleven
    - DB_DATABASE=catalogo_virtual_db
- php artisan migrate
- php artisan db:seed
- npm install
- npm run build
- php artisan storage:link


## Comando de PHP Utiles

- php artisan view:clear
- php artisan config:clear
- php artisan route:clear
- php artisan serve
