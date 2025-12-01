# Guía de Instalación Local para Pruebas

Esta guía te ayudará a instalar y probar el código localmente para hacer capturas y videos para tu portfolio.

## 📋 Requisitos Previos

1. **PHP 7.4 o superior** instalado
2. **Composer** instalado
3. **Base de datos** (MySQL, PostgreSQL o SQLite)
4. **Servidor web** (Apache/Nginx) o usar `php artisan serve`

## 🚀 Opción 1: Integrar en un Proyecto Laravel Existente

Si ya tienes un proyecto Laravel:

1. **Copia los archivos del portfolio a tu proyecto:**
   ```bash
   # Copia los controladores
   cp -r servicios-module-portfolio/app/Http/Controllers/* tu-proyecto/app/Http/Controllers/
   
   # Copia los modelos
   cp -r servicios-module-portfolio/app/Models/* tu-proyecto/app/Models/
   
   # Copia las vistas
   cp -r servicios-module-portfolio/resources/views/* tu-proyecto/resources/views/
   
   # Copia las migraciones
   cp -r servicios-module-portfolio/database/migrations/* tu-proyecto/database/migrations/
   
   # Copia las rutas (agrega al final de tu routes/web.php)
   # O copia el contenido de servicios-module-portfolio/routes/web.php
   ```

2. **Ejecuta las migraciones:**
   ```bash
   php artisan migrate
   ```

3. **Inicia el servidor:**
   ```bash
   php artisan serve
   ```

4. **Accede a las rutas:**
   - `http://localhost:8000/services` (requiere autenticación)
   - `http://localhost:8000/libro-reclamaciones`
   - `http://localhost:8000/lineas-emergencia`
   - `http://localhost:8000/ejemplos-tooltips`
   - `http://localhost:8000/ejemplos-popups`
   - `http://localhost:8000/ejemplos-google-meet`

## 🚀 Opción 2: Crear un Proyecto Laravel Nuevo (Recomendado para Pruebas)

### Paso 1: Crear Proyecto Laravel

```bash
composer create-project laravel/laravel proyectos-cv-test
cd proyectos-cv-test
```

### Paso 2: Copiar Archivos del Portfolio

```bash
# Desde el directorio servicios-module-portfolio
# Copia todos los archivos a tu proyecto nuevo
```

### Paso 3: Instalar Dependencias

```bash
composer install
```

### Paso 4: Configurar Base de Datos

1. **Crea un archivo `.env`:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

2. **Configura la base de datos en `.env`:**
   ```env
   DB_CONNECTION=sqlite
   # O usa MySQL/PostgreSQL
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=proyectos_cv
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

3. **Si usas SQLite, crea el archivo:**
   ```bash
   touch database/database.sqlite
   ```

### Paso 5: Ejecutar Migraciones

```bash
php artisan migrate
```

### Paso 6: Crear Usuario de Prueba (Opcional)

Para probar las funcionalidades que requieren autenticación, necesitas crear un usuario. Puedes usar Tinker:

```bash
php artisan tinker
```

Luego ejecuta:
```php
$user = new App\Models\User();
$user->name = 'Admin Test';
$user->email = 'admin@test.com';
$user->password = bcrypt('password');
$user->roles_id = 1; // 1 = administrador
$user->save();
```

### Paso 7: Iniciar Servidor

```bash
php artisan serve
```

### Paso 8: Acceder a las Rutas

Abre tu navegador en: `http://localhost:8000`

## 📸 Rutas para Capturas y Videos

### Rutas Públicas (No requieren login)

1. **Formulario de Reclamaciones:**
   ```
   http://localhost:8000/libro-reclamaciones
   ```

2. **Líneas de Emergencia:**
   ```
   http://localhost:8000/lineas-emergencia
   ```

3. **Ejemplos de Tooltips:**
   ```
   http://localhost:8000/ejemplos-tooltips
   ```

4. **Ejemplos de Popups:**
   ```
   http://localhost:8000/ejemplos-popups
   ```

5. **Ejemplos de Google Meet:**
   ```
   http://localhost:8000/ejemplos-google-meet
   ```

6. **Páginas Estáticas de Servicios:**
   ```
   http://localhost:8000/servicios/terapia-psicologica
   http://localhost:8000/servicios/capsulas-salud-mental
   http://localhost:8000/servicios/espacios-grupales
   ```

### Rutas que Requieren Autenticación

1. **CRUD de Servicios:**
   ```
   http://localhost:8000/services
   http://localhost:8000/services/create
   http://localhost:8000/services/{id}/edit
   ```
   - Login: `admin@test.com` / `password`
   - Requiere: `roles_id = 1`

2. **Panel de Reclamaciones:**
   ```
   http://localhost:8000/admin/complaints
   http://localhost:8000/admin/complaints/{id}
   ```
   - Login: `admin@test.com` / `password`
   - Requiere: `roles_id = 1`

## 🎬 Sugerencias para Videos

### Video 1: Módulo de Servicios
1. Mostrar lista de servicios
2. Crear un nuevo servicio
3. Editar un servicio existente
4. Mostrar validaciones
5. Eliminar un servicio

### Video 2: Libro de Reclamaciones
1. Mostrar formulario público
2. Llenar y enviar un reclamo
3. Mostrar mensaje de éxito
4. Acceder al panel admin
5. Ver lista de reclamaciones
6. Cambiar estado de un reclamo
7. Agregar comentarios internos

### Video 3: Funcionalidades Adicionales
1. Tooltips en acción
2. Popups y modales
3. Páginas estáticas de servicios
4. Líneas de emergencia

## 🔧 Solución de Problemas

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "Route not found"
- Verifica que las rutas estén en `routes/web.php`
- Limpia la caché: `php artisan route:clear`

### Error: "View not found"
- Verifica que las vistas estén en `resources/views/`
- Limpia la caché: `php artisan view:clear`

### Error de Base de Datos
- Verifica la configuración en `.env`
- Asegúrate de que la base de datos existe
- Ejecuta: `php artisan migrate:fresh`

## 📝 Notas Importantes

- Los datos son ficticios y están anonimizados
- Algunas funcionalidades requieren configuración adicional (Google Meet)
- Las vistas usan layouts que debes tener en tu proyecto (`layouts.app`, `layouts.app_welcome`)
- Los estilos CSS están referenciados a `argon` - ajusta según tu proyecto

## 🎨 Personalización Rápida

Para hacer capturas más profesionales:

1. **Cambia "Tu Logo" por una imagen real** en las vistas
2. **Personaliza "Tu Nombre de Empresa"** en los textos
3. **Ajusta colores** si lo deseas (actualmente neutros)
4. **Agrega datos de ejemplo** en la base de datos para mostrar funcionalidad

