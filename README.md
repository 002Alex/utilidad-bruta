# Utilidad Bruta - Gestor de Ingresos y Gastos

## Requisitos Previos

-   PHP 8.0 o superior
-   Composer
-   MySQL/SQLite(ya incluido con PHP)
-   Node.js y npm (para Vite)

## Instalación

### 1. Clonar el repositorio

git clone git@github.com:002Alex/utilidad-bruta.git
cd utilidad-bruta si usa terminal o abrir su editor de código prefererido

### 2. Instalar dependencias

composer install
npm install && npm run build

### 3. Configurar variables de entorno

cp .env.example .env
php artisan key:generate

### 4. Configurar la base de datos

Por defecto, el proyecto usa SQLite. Solo necesitas asegurar que existe la carpeta 'database//database.sqlite' o
sino crearla desde bash 'touch database/database.sqlite'

-   Editar .env con tus credenciales de BD si desea usar otra BD

Ejemplo si es mysql:
En '.env':
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=usuario
DB_PASSWORD=contraseña

### 5. Ejecutar migraciones y seeders

php artisan migrate:fresh --seed

### 6. Iniciar el servidor

php artisan serve

Accede a: http://localhost:8000

## Funcionalidades Principales

### Utilidad Bruta (Dashboard)

-   Ver resumen total de ingresos,gastos y utilidad bruta
-   Análisis por proveedor con indicadores visuales
-   Detalle expandible de transacciones

### Proveedores

-   Crear, editar y eliminar completo de proveedores
-   Búsqueda por nombre

### Ingresos

-   Crear, editar y eliminar ingresos por proveedor
-   Filtrar por fecha y proveedor

### Gastos

-   Crear, editar y eliminar gastos por proveedor
-   Filtrar por fecha y proveedor

## Uso Básico

1. Accede a 'http://localhost:8000'
2. Navega por el menú para gestionar proveedores, ingresos y gastos
3. Usa el dashboard para ver reportes de utilidad
