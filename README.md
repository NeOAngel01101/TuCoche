## Configuracion del archivo de homestead.yarl 

(Tiene que estar el host de system32/drivers/etc/ totalmente modificado con la ruta base de nuestro proyecto y la ip)
Encontraremos este archivo en la carpeta de homestead,el cual tendremos que modificar a\'f1adiendo la ruta de nuestro proyecto
con su direccion y la database que deseamos crear para despues ser usada. 
Es necesario poner este comando cuando vayamos a iniciar el servidor de vagrant para que se cree los archivos necesarios para el funcionamiento del mismo : 
```
vagrant up --provision
```
## Configuracion del archivo .env
Configurar el archivo .env.example con tus datos de acceso a la base de datos.
```
DB_CONNECTION=mysql
DB_HOST= (Aqui pondremos la ruta de nuestro servidor )
DB_PORT= (El puerto al cual asignamos )
DB_DATABASE= (Aqui pondremos el nombre de la base de datos la cual guardaremos )
DB_USERNAME= (escribimos el usuario de logueo a nuestra base de datos )
DB_PASSWORD= (escribimos la contrase\'f1a de logueo a nuestra base de datos )
```
Cuando lo hayamos configurado correctamente ,tendremos que renombrar el **.env.example** a **.env**

## Configuracion del proyecto para que sea funcional 
Una vez ya configurado todo lo anterior,en la consola de comandos de nuestro proyecto pondremos :
```
composer install
```
Ya que lo necesitaremos para que nuestro proyecto este totalmente actualizado.
