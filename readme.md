## Quickstart

Datos importantes para utilizar la App:
1. Realizar las siguientes comanas en el orden correspondiente:
	- cp .env.example .env
	- nano .env
		- Modificar los parametros de la bases de datos:
			- Nombre DB: task
			- Usuario: admin
			- Clave: admin
	- php artisan key:generate
	- php artisan migrate
	- php artisan serve

