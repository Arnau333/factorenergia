El proyecto es un laravel y usa MVC.

usa docker.

para arrancar hacemos un

cd example-app/

y para arrancar los contenedores docker hacemos un

./vendor/bin/sail up

una vez aquí para que funcione bootstrap

docker exec -it fed775549592693ebdfebd9f16833599b7d4aa2883a2300090eae11eca706983 bash 

*si la id es diferente puedes usar el nombre "name example-app-laravel.test-1"
dentro del contenedor

npm run dev

para que la base de datos funcione hay que crear la tabla, para eso haremos una migración de laravel:

nos metemos en el contenedor de antes :

"docker exec -it fed775549592693ebdfebd9f16833599b7d4aa2883a2300090eae11eca706983 bash"

y hacemos un:

"php artisan migrate"

archivos interesantes:
example-app/resources/views/home.blade.php

example-app/routes/api.php

example-app/app/Http/Controllers/QuestionApiController.php

example-app/routes/web.php

example-app/app/Models/Question.php

example-app/database/migrations/2024_03_08_180605_create_questions_table.php    
