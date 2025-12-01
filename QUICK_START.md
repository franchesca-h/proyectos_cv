# 🚀 Quick Start - Setup en 3 Pasos

## Paso 1: Crear Proyecto Laravel

```bash
composer create-project laravel/laravel proyectos-cv-test
cd proyectos-cv-test
```

## Paso 2: Copiar Archivos del Portfolio

Copia estos archivos desde `servicios-module-portfolio` a tu proyecto nuevo:

### Estructura de Archivos a Copiar:

```
servicios-module-portfolio/
├── app/
│   ├── Http/Controllers/     → tu-proyecto/app/Http/Controllers/
│   ├── Models/               → tu-proyecto/app/Models/
│   └── Mail/                 → tu-proyecto/app/Mail/
├── resources/views/          → tu-proyecto/resources/views/
├── database/migrations/       → tu-proyecto/database/migrations/
└── routes/web.php            → Agrega al final de tu-proyecto/routes/web.php
```

### Comandos PowerShell (Windows):

```powershell
# Desde el directorio servicios-module-portfolio
Copy-Item -Path "app\Http\Controllers\*" -Destination "..\proyectos-cv-test\app\Http\Controllers\" -Recurse
Copy-Item -Path "app\Models\*" -Destination "..\proyectos-cv-test\app\Models\" -Recurse
Copy-Item -Path "app\Mail\*" -Destination "..\proyectos-cv-test\app\Mail\" -Recurse
Copy-Item -Path "resources\views\*" -Destination "..\proyectos-cv-test\resources\views\" -Recurse
Copy-Item -Path "database\migrations\*" -Destination "..\proyectos-cv-test\database\migrations\" -Recurse
```

### Comandos Bash (Linux/Mac):

```bash
# Desde el directorio servicios-module-portfolio
cp -r app/Http/Controllers/* ../proyectos-cv-test/app/Http/Controllers/
cp -r app/Models/* ../proyectos-cv-test/app/Models/
cp -r app/Mail/* ../proyectos-cv-test/app/Mail/
cp -r resources/views/* ../proyectos-cv-test/resources/views/
cp -r database/migrations/* ../proyectos-cv-test/database/migrations/
```

## Paso 3: Configurar y Ejecutar

```bash
cd proyectos-cv-test

# Configurar base de datos SQLite (más rápido)
touch database/database.sqlite

# Editar .env y cambiar:
# DB_CONNECTION=sqlite

# Instalar dependencias
composer install

# Generar clave
php artisan key:generate

# Migrar base de datos
php artisan migrate

# Crear usuario admin (ver abajo)
php artisan tinker
```

### Crear Usuario Admin en Tinker:

```php
$user = new App\Models\User();
$user->name = 'Admin Test';
$user->email = 'admin@test.com';
$user->password = bcrypt('password');
$user->roles_id = 1;
$user->save();
exit
```

### Iniciar Servidor:

```bash
php artisan serve
```

## 🎯 Rutas para Probar

### Públicas (No requieren login):
- http://localhost:8000/libro-reclamaciones
- http://localhost:8000/lineas-emergencia
- http://localhost:8000/ejemplos-tooltips
- http://localhost:8000/ejemplos-popups
- http://localhost:8000/ejemplos-google-meet

### Con Login (admin@test.com / password):
- http://localhost:8000/services
- http://localhost:8000/admin/complaints

## ⚠️ Notas Importantes

1. **Layouts requeridos:** Asegúrate de tener estos layouts en tu proyecto:
   - `resources/views/layouts/app.blade.php`
   - `resources/views/layouts/app_welcome.blade.php`

2. **Autenticación:** Si tu proyecto no tiene sistema de autenticación, instala Laravel Breeze o Jetstream:
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install
   ```

3. **Roles:** El código asume que existe una tabla `roles` y un campo `roles_id` en la tabla `users`. Si no existe, puedes:
   - Crear la migración para roles
   - O modificar los controladores para no verificar roles

## 🎬 Lista de Verificación para Videos

- [ ] Módulo de Servicios (CRUD completo)
- [ ] Libro de Reclamaciones (formulario + admin)
- [ ] Tooltips en acción
- [ ] Popups y modales
- [ ] Líneas de emergencia
- [ ] Páginas estáticas de servicios

