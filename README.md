# Sistema de Matrículas - Laravel

## Requisitos de Instalación del Sistema

### Requisitos del Sistema
- **PHP:** >= 8.1
- **Composer:** >= 2.0
- **MySQL:** >= 8.0
- **Node.js:** >= 16.x
- **NPM:** >= 8.x

### Requisitos del Servidor
- Extensiones PHP requeridas:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath

### Instalación Paso a Paso

#### 1. Clonar el Repositorio
```bash
git clone <repository-url>
cd sistema-matriculas
```

#### 2. Instalar Dependencias PHP
```bash
composer install
```

#### 3. Configurar Variables de Entorno
```bash
cp .env.example .env o crea el archivo .env en la raiz del proyecto
php artisan key:generate
```

#### 4. Configurar Base de Datos
Editar el archivo `.env` con las credenciales de MySQL:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_matriculas
DB_USERNAME=root
DB_PASSWORD=
```

#### 5. Crear la Base de Datos
```bash
mysql -u root -p
CREATE DATABASE sistema_matriculas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

#### 6. Ejecutar Migraciones y Seeders
```bash
//va a dar error, continua
php artisan migrate --seed
```

#### 7. Importar Backup de la database
- En el phpmyadmin seleccionas la db ''Sistema_matriculas"
- En el menu parte de superior seleccionas "import"
- Busca el archivo "backup_database.sql"
- Seleccionalo e importa
- En el paso anterior se creo el usuario admin en la tabla usuarios de Sistema_matriculas, eliminalo (Si no se crea pasa al siguiente paso)

#### 8. Insertar datos
```bash
php artisan db:seed
```

#### 9. Instalar Dependencias Frontend
```bash
npm install
npm run dev
```

#### 10. Iniciar el Servidor de Desarrollo
```bash
php artisan serve
```

El sistema estará disponible en: `http://localhost:8000`

### Credenciales por Defecto
- **Usuario Administrador:**
  - Email: admin@matriculas.com
  - Password: admin123

### Estructura del Proyecto
```
sistema-matriculas/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── public/
```

### Configuraciones Adicionales

#### Permisos de Directorios
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

#### Optimización (Producción)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

### Solución de Problemas

#### Error de Permisos
```bash
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
```

#### Limpiar Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Tecnologías Utilizadas
- **Framework:** Laravel 10.x
- **Base de Datos:** MySQL 8.0
- **Patrón de Diseño:** MVC
- **Paradigma:** Programación Orientada a Objetos
- **Frontend:** Blade Templates, Bootstrap 5
- **Autenticación:** Laravel Breeze


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
