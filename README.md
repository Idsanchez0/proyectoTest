# proyectoTest
Para poder correr el proyecto se debe realizar los siguientes pasos:
1) Descargar el repositorio y abrir la terminal en la carpeta del mismo.
2) Ejecutar el comando "docker-compose build"
3) Ejecutar el comando "docker-compose up -d"
4) En caso de tener como sistema operativo principal windows se debe ejecutar el siguiente comando "winpty docker exec -it test-api-php sh"
5) En caso de poseer otro sistema operativo como MacOs o Linux utilizar el siguiente comando "docker exec -it test-api-php sh"
6) Ejecutar el comando "php artisan migrate"
7) Ejecutar el comando "php artisan db:seed --class=UserSeeder"
8) Ejecutar el comando "php artisan db:seed --class=TicketAereoSeeder"
9) Una vez terminada la configuracion se podra correr el comando "php artisan cache:clear"
10) Verificar en docker que la imagen se encuentre montada y verificar en el navegador web mediante la siguiente url http://127.0.0.1:8585

*Nota: la base de datos ya se encuentra creada dentro del docker
