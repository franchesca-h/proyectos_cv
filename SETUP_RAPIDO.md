# Setup Rápido para Pruebas

Guía rápida para probar el código y hacer capturas/videos.

## ⚡ Setup en 5 Minutos

### 1. Crear Proyecto Laravel

```bash
composer create-project laravel/laravel proyectos-cv-test
cd proyectos-cv-test
```

### 2. Copiar Archivos

Copia estos directorios del portfolio a tu proyecto:

- `app/Http/Controllers/` → `tu-proyecto/app/Http/Controllers/`
- `app/Models/` → `tu-proyecto/app/Models/`
- `app/Mail/` → `tu-proyecto/app/Mail/`
- `resources/views/` → `tu-proyecto/resources/views/`
- `database/migrations/` → `tu-proyecto/database/migrations/`
- `config/services.php` → Agrega la sección `google_meet` a tu `config/services.php`
- `routes/web.php` → Agrega las rutas al final de tu `routes/web.php`

### 3. Configurar Base de Datos (SQLite - Más Rápido)

```bash
touch database/database.sqlite
```

Edita `.env`:
```env
DB_CONNECTION=sqlite
# Comenta las otras líneas de DB
```

### 4. Instalar y Migrar

```bash
composer install
php artisan key:generate
php artisan migrate
```

### 5. Crear Usuario Admin

Crea un archivo `database/seeders/AdminUserSeeder.php`:

```php
<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'roles_id' => 1,
        ]);
    }
}
```

Luego ejecuta:
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 6. Iniciar Servidor

```bash
php artisan serve
```

### 7. Acceder

- **Login:** http://localhost:8000/login
  - Email: `admin@test.com`
  - Password: `password`

- **Rutas públicas:**
  - http://localhost:8000/libro-reclamaciones
  - http://localhost:8000/lineas-emergencia
  - http://localhost:8000/ejemplos-tooltips
  - http://localhost:8000/ejemplos-popups

## 🎬 Checklist para Videos

### Módulo de Servicios
- [ ] Lista de servicios vacía
- [ ] Crear nuevo servicio
- [ ] Validaciones de formulario
- [ ] Editar servicio
- [ ] Eliminar servicio
- [ ] Páginas estáticas de servicios

### Libro de Reclamaciones
- [ ] Formulario público
- [ ] Enviar reclamo
- [ ] Mensaje de éxito
- [ ] Panel admin - Lista
- [ ] Panel admin - Detalle
- [ ] Cambiar estado
- [ ] Comentarios internos

### Funcionalidades Adicionales
- [ ] Tooltips en acción
- [ ] Popups y modales
- [ ] Líneas de emergencia

## 💡 Tips para Capturas Profesionales

1. **Usa un navegador limpio** (sin extensiones visibles)
2. **Ajusta el zoom al 100%** para mejor calidad
3. **Usa modo oscuro/light según prefieras**
4. **Haz capturas en diferentes tamaños** (desktop, tablet, móvil)
5. **Muestra interacciones** (hover, clicks, validaciones)

## 🎥 Herramientas Recomendadas

- **Capturas:** Lightshot, ShareX, o la herramienta nativa de Windows
- **Videos:** OBS Studio (gratis), Loom, o la herramienta de Windows
- **Edición:** DaVinci Resolve (gratis) o cualquier editor simple

