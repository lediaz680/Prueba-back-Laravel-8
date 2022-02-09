# Prueba-back-Laravel-8
prueba back end

INSTALACIONES CORRESPONDIENTES
1.-- composer install

2.-- npm install

3.-- php artisan key:generate

ESTO PARA CREAR EL STORAGE LINK DE UPLOADS EN PUBLIC
--php artisan storage:link
CAMBIAR EL ARCHIVO, (QUITAR EL .example) .env.example PARA QUEDAR .env
EN .env CAMBIAR EL NOMBRE DE LA BASE DE DATOS A LA QUE CORRESPONDA
-- DB_DATABASE=companies_employes

CONFIGURAR MAILTRAP EN .env, DEBE QUEDAR ASI:
--MAIL_MAILER=smtp --MAIL_HOST=smtp.mailtrap.io --MAIL_PORT=2525 --MAIL_USERNAME=2b8fe580053467 --MAIL_PASSWORD=b506347fbb1dba --MAIL_ENCRYPTION=null --MAIL_FROM_ADDRESS=correoEnviaPrueba@gmai.com --MAIL_FROM_NAME="${APP_NAME}"

CREAR LA BASE DE DATOS EN MYSQL
--companies_employes

MIGRACIONES CON SEEDERS (SE CREARÁ UN USUARIO admin@admin.com CON CONTRASEÑA password) POR DEFECTO PARA PRUEBAS
-- php artisan migrate --seed

EN CASO DE HABER MIGRADO SIN LOS SEEDERS
-- php artisan migrate:fresh --seed
