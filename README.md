{\rtf1\ansi\deff0\nouicompat{\fonttbl{\f0\fnil\fcharset0 Calibri;}}
{\*\generator Riched20 10.0.16299}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang10 # Instalaci\'f3n\par
\par
\par
## Configuracion del archivo de homestead.yarl \par
(Tiene que estar el host de system32/drivers/etc/ totalmente modificado con la ruta base de nuestro proyecto y la ip)\par
Encontraremos este archivo en la carpeta de homestead,el cual tendremos que modificar a\'f1adiendo la ruta de nuestro proyecto\par
con su direccion y la database que deseamos crear para despues ser usada. \par
Es necesario poner este comando cuando vayamos a iniciar el servidor de vagrant para que se cree los archivos necesarios para el funcionamiento del mismo : \par
```\par
vagrant up --provision\par
```\par
## Configuracion del archivo .env\par
Configurar el archivo .env.example con tus datos de acceso a la base de datos.\par
```\par
DB_CONNECTION=mysql\par
DB_HOST= (Aqui pondremos la ruta de nuestro servidor )\par
DB_PORT= (El puerto al cual asignamos )\par
DB_DATABASE= (Aqui pondremos el nombre de la base de datos la cual guardaremos )\par
DB_USERNAME= (escribimos el usuario de logueo a nuestra base de datos )\par
DB_PASSWORD= (escribimos la contrase\'f1a de logueo a nuestra base de datos )\par
```\par
Cuando lo hayamos configurado correctamente ,tendremos que renombrar el **.env.example** a **.env**\par
\par
## Configuracion del proyecto para que sea funcional \par
Una vez ya configurado todo lo anterior,en la consola de comandos de nuestro proyecto pondremos :\par
```\par
composer install\par
```\par
Ya que lo necesitaremos para que nuestro proyecto este totalmente actualizado.\par
}
 