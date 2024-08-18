# cara install project
1. clone repository 
   ketik command "git clone https://github.com/fanboyjs/apotek-app.git"
2. install composer dependecy yang ada di dalam project
   ketik command "composer install"
3. buat file .env di project yang telah anda clone, lalu copy semua isi file .env.example ke file .env yang telah anda buat
4. uncomment code setup database di file .env, untuk configurasi file database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=apotek
   DB_USERNAME=root
   DB_PASSWORD=
5. generate token
   ketik command "php artisan key:generate"
6. migrasi database yang telah di setup
   ketik command "php artisan migrate"
7. jalankan local dev server
   ketik command "php artisan serve"
    

