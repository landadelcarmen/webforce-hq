#WebForce HQ Test

####Prueba de conocimientos de Laravel.

La prueba es un blog con autenticación de usuarios. El Blog
está desarrollado con Larvel, VueJS y Vuetify.

---

####Características

Se agregaron roles y permisos a los usuarios. De esta
manera los administradores (rol 1) pueden editar y eliminar cualquier post así como editar y eliminar usuarios, mientras
que los colaboradores (rol 2) sólo los que ellos crearon, y sólo pueden editarse a ellos mismos o eliminarse. 

En la página principal `/` se pueden filtrar los posts por etiqueta o por
autor, dando click en cualquiera de éstos. 

Las rutas del administrador están especificadas en su propio
archivo `routes/admin.php` el cual está mapeado desde `RouteServiceProvider.php`,
es en éste archivo donde se especifica el middleware que utilizará, así como
el prefijo y el namespace de los controladores.

En los controladores se delega el registro y actualización de los posts y
y usuarios a los Form Request.

Se creó un database seeder para iniciar las pruebas de manera sencilla. Se
puede llamar al momento de migrar la base de datos con el comando
`php artisan migrate --seed` o una vez migrada la base de datos
con el comando `php artisan db:seed`, la información del seeder se puede
encontrar en `database/seeds/BlogSeeder.php`


