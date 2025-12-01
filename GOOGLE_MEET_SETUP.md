# Configuración de Google Meet

Esta guía explica cómo configurar la integración de Google Meet en tu aplicación Laravel.

## 📋 Requisitos Previos

1. **Cuenta de Google Cloud Platform**
2. **Proyecto creado en Google Cloud Console**
3. **API de Google Calendar habilitada**
4. **Service Account creada y configurada**

## 🔧 Pasos de Configuración

### 1. Crear Service Account en Google Cloud Console

1. Ve a [Google Cloud Console](https://console.cloud.google.com/)
2. Selecciona tu proyecto (o crea uno nuevo)
3. Navega a **IAM & Admin** → **Service Accounts**
4. Haz clic en **Create Service Account**
5. Completa el formulario:
   - **Name:** Tu Nombre de Empresa - Meet Service
   - **Description:** Service account para crear reuniones de Google Meet
6. Haz clic en **Create and Continue**
7. En **Grant this service account access to project**, agrega el rol:
   - **Calendar API** → **Calendar Admin** (o permisos necesarios)
8. Haz clic en **Continue** y luego **Done**

### 2. Crear y Descargar Credenciales

1. En la lista de Service Accounts, haz clic en la que acabas de crear
2. Ve a la pestaña **Keys**
3. Haz clic en **Add Key** → **Create new key**
4. Selecciona **JSON** y haz clic en **Create**
5. El archivo JSON se descargará automáticamente

### 3. Configurar en tu Proyecto Laravel

1. **Coloca el archivo JSON:**
   ```
   storage/app/google/google-meet-credentials.json
   ```

2. **Agrega variables al archivo `.env`:**
   ```env
   # Google Meet/Calendar (Service Account)
   GOOGLE_SERVICE_ACCOUNT_SECRET_PATH=app/google/google-meet-credentials.json
   GOOGLE_MAIN_ACCOUNT=tu-email@ejemplo.com
   GOOGLE_REDIRECT_URI=https://tu-dominio.com/auth/google/callback
   GOOGLE_MEET_CALENDAR_ID=primary
   ```

3. **Instala el paquete de Google (si no está instalado):**
   ```bash
   composer require google/apiclient
   ```

4. **Ejecuta las migraciones:**
   ```bash
   php artisan migrate
   ```

### 4. Habilitar API de Google Calendar

1. En Google Cloud Console, ve a **APIs & Services** → **Library**
2. Busca "Google Calendar API"
3. Haz clic en **Enable**

### 5. Compartir Calendario con Service Account

1. Abre Google Calendar
2. Ve a **Settings** → **Settings for my calendars**
3. Selecciona el calendario que quieres usar
4. En **Share with specific people**, agrega el email de tu Service Account
5. Dale permisos de **Make changes to events**

## 💻 Uso del Controlador

### Ejemplo Básico

```php
use App\Http\Controllers\GoogleMeetController;

// Crear una reunión
$meetUrl = GoogleMeetController::createMeetLinkStatic(
    'Nombre Profesional',
    'profesional@ejemplo.com',
    'Nombre Cliente',
    'cliente@ejemplo.com',
    '2025-12-15 10:00:00' // Fecha y hora de inicio
);

if ($meetUrl) {
    // Guardar en tu modelo
    $appointment->google_meet_url = $meetUrl;
    $appointment->save();
} else {
    // Manejar error
    \Log::error('No se pudo crear Google Meet');
}
```

### En un Controlador

```php
public function createAppointment(Request $request)
{
    // ... validación y creación de appointment ...
    
    // Crear Google Meet
    $meetUrl = GoogleMeetController::createMeetLinkStatic(
        $professional->name,
        $professional->email,
        $client->name,
        $client->email,
        $appointment->start_time
    );
    
    if ($meetUrl) {
        $appointment->google_meet_url = $meetUrl;
        $appointment->save();
    }
    
    return redirect()->route('appointments.index')
        ->with('success', 'Cita creada exitosamente');
}
```

## 🔒 Seguridad

- **NUNCA** subas el archivo JSON de credenciales a Git
- Agrega `storage/app/google/*.json` a tu `.gitignore`
- Usa variables de entorno para todas las configuraciones sensibles
- Mantén el archivo JSON con permisos restrictivos en el servidor

## ⚠️ Solución de Problemas

### Error: "Google credentials not found"
- Verifica que el archivo JSON existe en la ruta especificada
- Verifica los permisos del archivo
- Revisa la variable `GOOGLE_SERVICE_ACCOUNT_SECRET_PATH` en `.env`

### Error: "Calendar API not enabled"
- Ve a Google Cloud Console y habilita la API de Calendar
- Espera unos minutos para que se propague el cambio

### Error: "Permission denied"
- Verifica que la Service Account tiene permisos en el calendario
- Comparte el calendario con el email de la Service Account

### La URL de Meet es null
- Revisa los logs: `storage/logs/laravel.log`
- Verifica que todos los parámetros están correctos
- Asegúrate de que la Service Account tiene los permisos necesarios

## 📚 Recursos Adicionales

- [Documentación de Google Calendar API](https://developers.google.com/calendar/api)
- [Guía de Service Accounts](https://cloud.google.com/iam/docs/service-accounts)
- [Documentación de Google Meet](https://developers.google.com/meet)

## 📝 Notas

- Las reuniones se crean con duración de 1 hora por defecto
- Los participantes reciben invitaciones por email automáticamente
- El enlace de Meet se genera inmediatamente al crear el evento
- Los eventos se crean en el calendario "primary" por defecto

