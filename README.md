# Módulos Laravel - Portfolio

Este repositorio contiene módulos y páginas completas desarrollados en Laravel:
1. **Módulo de Gestión de Servicios** - CRUD completo con validaciones, migraciones y vistas responsivas
2. **Módulo de Libro de Reclamaciones** - Sistema completo de gestión de reclamaciones con panel administrativo
3. **Página de Líneas de Emergencia** - Página informativa con recursos de ayuda en casos de crisis
4. **Integración Google Meet** - Sistema completo para crear reuniones de Google Meet automáticamente

## 📋 Características

### Módulo de Servicios
- ✅ CRUD completo de servicios (Crear, Leer, Actualizar, Eliminar)
- ✅ Validaciones de formularios en backend
- ✅ Migraciones de base de datos con soporte para rollback
- ✅ Vistas responsivas con Bootstrap
- ✅ Sistema de slugs automáticos para URLs amigables
- ✅ Control de estado activo/inactivo de servicios
- ✅ Páginas estáticas de servicios para el frontend público
- ✅ Control de acceso basado en roles (solo administradores)
- ✅ Confirmaciones de eliminación para mayor seguridad

### Módulo de Libro de Reclamaciones
- ✅ Formulario público completo de reclamaciones
- ✅ Validaciones exhaustivas en backend
- ✅ Panel administrativo para gestión de reclamaciones
- ✅ Sistema de estados (No leído, En proceso, Cerrado)
- ✅ Comentarios internos para administradores
- ✅ Notificaciones por email al registrar una reclamación
- ✅ Tabla DataTables con ordenamiento y búsqueda
- ✅ Vista detallada de cada reclamación
- ✅ Cumplimiento con normativa peruana (Ley Nº 29571)

### Página de Líneas de Emergencia
- ✅ Página informativa pública
- ✅ Diseño responsivo y accesible
- ✅ Información sobre líneas de ayuda en casos de crisis
- ✅ Enlaces a recursos internacionales
- ✅ Ejemplos de líneas de emergencia (personalizables)
- ✅ Diseño claro y fácil de usar

### Página de Ejemplos de Tooltips
- ✅ Ejemplos prácticos de implementación de tooltips
- ✅ Tooltips en formularios con iconos de información
- ✅ Tooltips en botones con diferentes acciones
- ✅ Tooltips en tablas para información adicional
- ✅ Tooltips con contenido HTML
- ✅ Diferentes posiciones (arriba, abajo, izquierda, derecha)
- ✅ Implementación con Bootstrap
- ✅ Código listo para usar y personalizar

### Componentes de Popups/Modales
- ✅ Modal de Reunión Gratuita (se abre automáticamente después de 20 segundos)
- ✅ Popup genérico de Login/Prompt (reutilizable)
- ✅ Botón flotante de consulta gratuita (con mensaje emergente)
- ✅ JavaScript para controlar la apertura automática
- ✅ Diseño responsive y adaptable
- ✅ Fácil personalización de textos y URLs

### Integración Google Meet
- ✅ Controlador completo para crear reuniones de Google Meet
- ✅ Integración con Google Calendar API
- ✅ Creación automática de eventos con enlace de Meet
- ✅ Envío de invitaciones por email a participantes
- ✅ Migraciones de base de datos para almacenar URLs de Meet
- ✅ Manejo de errores y logging
- ✅ Configuración mediante Service Account
- ✅ Ejemplos de uso y documentación

## 🛠️ Tecnologías Utilizadas

- **Laravel** (Framework PHP)
- **Bootstrap** (Framework CSS)
- **MySQL/PostgreSQL** (Base de datos)
- **Blade** (Motor de plantillas)
- **Google Calendar API** (Para integración con Google Meet)
- **Google Client Library** (google/apiclient)

## 📁 Estructura del Proyecto

```
servicios-module-portfolio/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ServiceController.php          # CRUD de servicios
│   │       ├── ServiceStaticController.php    # Páginas estáticas de servicios
│   │       ├── ComplaintController.php        # Formulario público de reclamaciones
│   │       └── AdminComplaintController.php   # Panel admin de reclamaciones
│   ├── Models/
│   │   ├── Service.php                        # Modelo de servicios
│   │   └── Complaint.php                      # Modelo de reclamaciones
│   └── Mail/
│       └── ComplaintMail.php                  # Email de notificación
├── database/
│   └── migrations/
│       ├── create_services_table.php
│       ├── add_slug_to_services_table.php
│       ├── add_is_active_to_services_table.php
│       ├── create_complaints_table.php
│       └── add_status_and_internal_comments_to_complaints_table.php
├── resources/
│   └── views/
│       ├── services/
│       │   ├── index.blade.php                # Lista de servicios
│       │   ├── create.blade.php               # Formulario de creación
│       │   ├── edit.blade.php                 # Formulario de edición
│       │   ├── delete.blade.php               # Confirmación de eliminación
│       │   └── static/
│       │       ├── terapia-psicologica.blade.php
│       │       ├── capsulas-salud-mental.blade.php
│       │       └── espacios-grupales.blade.php
│       ├── pages/
│       │   ├── complaint-form.blade.php       # Formulario público de reclamaciones
│       │   ├── emergency-lines.blade.php      # Página de líneas de emergencia
│       │   ├── tooltips-example.blade.php     # Ejemplos de tooltips
│       │   └── free-meeting-popup-example.blade.php # Ejemplos de popups
│       ├── components/
│       │   └── popup.blade.php                # Componente de popup genérico
│       ├── layouts/
│       │   ├── modals/
│       │   │   └── session_free.blade.php     # Modal de reunión gratuita
│       │   └── free_consultation_button.blade.php # Botón flotante de consulta
│       └── pages/
│           └── google-meet-example.blade.php  # Ejemplos de Google Meet
├── config/
│   └── services.php                            # Configuración de servicios (incluye google_meet)
│       ├── admin/
│       │   └── complaints/
│       │       ├── index.blade.php            # Lista de reclamaciones (admin)
│       │       └── show.blade.php             # Detalle de reclamación (admin)
│       └── mails/
│           └── complaint-notification.blade.php # Email de notificación
└── routes/
    └── web.php                                # Rutas de ambos módulos
```

## 🚀 Instalación

1. Copia los archivos en tu proyecto Laravel existente

2. Instala las dependencias necesarias:
```bash
composer require google/apiclient
```

3. Ejecuta las migraciones:
```bash
php artisan migrate
```

4. Para usar Google Meet, configura las credenciales (ver `GOOGLE_MEET_SETUP.md`)

5. Asegúrate de tener configurado el sistema de autenticación y roles en tu aplicación

## 📝 Uso

### Módulo de Servicios

#### Rutas del CRUD (requieren autenticación y rol de administrador)
- `GET /services` - Lista todos los servicios
- `GET /services/create` - Muestra formulario de creación
- `POST /services` - Guarda un nuevo servicio
- `GET /services/{id}/edit` - Muestra formulario de edición
- `PUT /services/{id}` - Actualiza un servicio
- `DELETE /services/{id}` - Elimina un servicio

#### Rutas de Páginas Estáticas (públicas)
- `GET /servicios/terapia-psicologica`
- `GET /servicios/capsulas-salud-mental`
- `GET /servicios/espacios-grupales`

### Módulo de Libro de Reclamaciones

#### Rutas Públicas
- `GET /libro-reclamaciones` - Muestra el formulario de reclamaciones
- `POST /libro-reclamaciones` - Procesa y guarda una nueva reclamación

#### Rutas Administrativas (requieren autenticación y rol de administrador)
- `GET /admin/complaints` - Lista todas las reclamaciones
- `GET /admin/complaints/{id}` - Muestra el detalle de una reclamación
- `PUT /admin/complaints/{id}` - Actualiza el estado y comentarios de una reclamación

### Página de Líneas de Emergencia

#### Rutas Públicas
- `GET /lineas-emergencia` - Muestra la página informativa con líneas de ayuda

### Página de Ejemplos de Tooltips

#### Rutas Públicas
- `GET /ejemplos-tooltips` - Muestra ejemplos prácticos de implementación de tooltips

### Página de Ejemplos de Popups

#### Rutas Públicas
- `GET /ejemplos-popups` - Muestra ejemplos de popups, modales y botones flotantes

### Integración Google Meet

#### Controlador
- `GoogleMeetController::createMeetLinkStatic()` - Método estático para crear reuniones de Google Meet

#### Rutas (comentadas, requieren configuración)
- `GET /google/meet/redirect` - Redirige a Google para autenticación
- `GET /google/meet/callback` - Maneja el callback de Google
- `GET /google/meet/create` - Crea una reunión

#### Rutas Públicas
- `GET /ejemplos-google-meet` - Muestra ejemplos y documentación de la integración

## 🔒 Seguridad

- Todas las rutas del CRUD requieren autenticación
- Solo usuarios con `roles_id = 1` (administradores) pueden gestionar servicios
- Validaciones en backend para prevenir datos inválidos
- Confirmaciones antes de eliminar servicios

## 📊 Estructura de la Base de Datos

### Tabla `services`
- `id` - Identificador único
- `name` - Nombre del servicio
- `slug` - URL amigable (generada automáticamente)
- `description` - Descripción detallada
- `price` - Precio (decimal con 2 decimales)
- `duration` - Duración en minutos
- `is_active` - Estado activo/inactivo (boolean)
- `created_at` - Fecha de creación
- `updated_at` - Fecha de actualización

### Tabla `appointments` (para Google Meet)
- `google_meet_url` - URL de la reunión de Google Meet
- `google_event_id` - ID del evento en Google Calendar
- `google_hangout_link` - Link alternativo de Hangouts
- `google_event_created_at` - Fecha de creación del evento

### Tabla `complaints`
- `id` - Identificador único
- `claim_date` - Fecha del reclamo
- `consumer_name` - Nombre completo del consumidor
- `consumer_address` - Domicilio completo
- `document_type` - Tipo de documento (DNI, Documento de Extranjería)
- `document_number` - Número de documento
- `phone` - Teléfono de contacto
- `email` - Correo electrónico
- `product_type` - Tipo de bien (Producto, Servicio)
- `claimed_amount` - Monto reclamado (decimal con 2 decimales)
- `product_description` - Descripción del producto/servicio
- `claim_detail` - Detalle del reclamo
- `conformity` - Aceptación de términos (boolean)
- `status` - Estado del reclamo (No leído, En proceso, Cerrado)
- `internal_comments` - Comentarios internos para administradores
- `created_at` - Fecha de creación
- `updated_at` - Fecha de actualización

## 🎨 Características del Frontend

- Diseño responsivo con Bootstrap
- Tablas con información clara y organizada
- Formularios con validación visual
- Modales de confirmación para acciones críticas
- Mensajes de éxito/error
- Iconos Font Awesome para mejor UX

## 📸 Capturas de Pantalla

*Nota: Las capturas de pantalla y videos de funcionamiento deben ser creados por separado, no están incluidos en este repositorio.*

## 👨‍💻 Autor

Desarrollado como parte de un proyecto profesional.

## 📄 Licencia

Este código es de uso personal para portfolio. Por favor, no utilizar sin permiso.

---

**Nota:** Este módulo fue extraído y anonimizado de un proyecto más grande. Los datos sensibles han sido removidos o reemplazados por datos de ejemplo.


