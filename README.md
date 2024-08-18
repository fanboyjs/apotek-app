# cara install project
#  clone repository 
   ketik command "git clone https://github.com/fanboyjs/apotek-app.git"
#  install composer dependecy yang ada di dalam project
   ketik command "composer install"
#  buat file .env di project yang telah anda clone, lalu copy semua isi file .env.example ke file .env yang telah anda buat
#  uncomment code setup database di file .env, untuk configurasi file database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=apotek
   DB_USERNAME=root
   DB_PASSWORD=
#  generate token
   ketik command "php artisan key:generate"
#  migrasi database yang telah di setup
   ketik command "php artisan migrate"
#  jalankan local dev server
   ketik command "php artisan serve"
    

