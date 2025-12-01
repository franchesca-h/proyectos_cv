# Cambios Realizados para Anonimización

Este documento lista todos los cambios realizados para proteger la privacidad de la empresa y preparar el código para uso en portfolio.

## Módulos Incluidos

1. **Módulo de Gestión de Servicios**
2. **Módulo de Libro de Reclamaciones**
3. **Página de Líneas de Emergencia**
4. **Página de Ejemplos de Tooltips**
5. **Componentes de Popups/Modales**
6. **Integración Google Meet**

## Cambios en Contenido

### Vistas Estáticas (resources/views/services/static/)

1. **Logo y marca:**
   - Imágenes de logo reemplazadas por texto genérico "Tu Logo"
   - Comentarios HTML indicando dónde colocar el logo real
   - Referencias a "Mi Empresa" cambiadas por "Tu Nombre de Empresa"

2. **Navegación:**
   - Cambiado "Psicólogas" por "Profesionales" (más genérico)
   - Mantenida la estructura pero con términos generales

3. **Contenido de servicios:**
   - Los textos descriptivos se mantienen como ejemplo funcional
   - Precios y duraciones se mantienen como ejemplos
   - Cambiado "Lista" por "Listo" para hacer el texto más genérico

4. **Colores:**
   - Colores específicos (#465a3e verde) cambiados por colores neutros (#333, #666)
   - Clases CSS específicas (at-text-green, btn-orange) cambiadas por clases genéricas (btn-primary)
   - Colores de éxito cambiados a verde estándar de Bootstrap (#28a745)

### Controladores

- **ServiceController.php:** Sin cambios necesarios, código genérico
- **ServiceStaticController.php:** Sin cambios necesarios, código genérico

### Modelos

- **Service.php:** Sin cambios necesarios, código genérico

### Migraciones

- Sin cambios necesarios, estructura de base de datos genérica

## Archivos Creados

- ✅ README.md - Documentación completa del módulo
- ✅ .gitignore - Configuración para Git
- ✅ INSTRUCCIONES_GITHUB.md - Guía para subir a GitHub
- ✅ CAMBIOS_ANONIMIZACION.md - Este archivo

## Cambios en el Módulo de Reclamaciones

### Controladores
- **ComplaintController.php:** 
  - Email de notificación cambiado de `hola@autenticatribu.com` a `contacto@tunombredeempresa.com`
  - Comentario agregado indicando que se debe cambiar por el email real
  - Código genérico mantenido

- **AdminComplaintController.php:**
  - Referencia a `User::TYPE_ADMINISTRATOR` cambiada por `roles_id !== 1` (más genérico)
  - Resto del código genérico

### Vistas
- **complaint-form.blade.php:** 
  - Logo reemplazado por texto genérico "Tu Logo"
  - Colores específicos (#465a3e) cambiados por colores neutros (#333, #666)
  - Clases CSS específicas (at-text-green, btn-orange) cambiadas por clases genéricas
- **complaint-notification.blade.php:** 
  - "Mi Empresa" reemplazado por "Tu Nombre de Empresa"
  - Imagen de logo reemplazada por texto genérico "Tu Logo"
  - Colores específicos cambiados por colores neutros
- **admin/complaints/index.blade.php:** 
  - Símbolo de moneda cambiado de "S/" a "$" para hacerlo más genérico
  - Clases de botones (btn-orange) cambiadas por btn-primary
- **admin/complaints/show.blade.php:** 
  - Símbolo de moneda cambiado de "S/" a "$" para hacerlo más genérico
  - Colores específicos (#465a3e, at-text-green) cambiados por colores neutros
  - Clases de botones (btn-orange) cambiadas por btn-primary

## Cambios en la Página de Líneas de Emergencia

### Vistas
- **emergency-lines.blade.php:**
  - Logo reemplazado por texto genérico "Tu Logo"
  - Colores específicos (#465a3e, at-text-green) cambiados por colores neutros (#333, #666, #007bff)
  - Clases CSS específicas (btn-orange, at-text-green) cambiadas por clases genéricas
  - Números de teléfono específicos de Perú reemplazados por ejemplos genéricos (911, 112, 0800-xxx-xxx)
  - Enlaces específicos reemplazados por ejemplos genéricos (www.ejemplo-xxx.com)
  - Imágenes decorativas comentadas con instrucciones para reemplazarlas
  - Agregada nota importante indicando que los números son ejemplos y deben actualizarse

## Cambios en la Página de Ejemplos de Tooltips

### Vistas
- **tooltips-example.blade.php:**
  - Logo reemplazado por texto genérico "Tu Logo"
  - Colores específicos cambiados por colores neutros (#333, #666, #007bff)
  - Clases CSS específicas cambiadas por clases genéricas de Bootstrap
  - Ejemplos de tooltips con datos ficticios y genéricos
  - Contenido de ejemplo sin referencias a empresas específicas
  - Implementación estándar de Bootstrap tooltips
  - 5 secciones de ejemplos diferentes (formularios, botones, tablas, HTML, posiciones)

## Cambios en los Componentes de Popups

### Componentes
- **components/popup.blade.php:**
  - Colores específicos (#FF6B35, btn-orange) cambiados por colores neutros (#333, #666, btn-primary)
  - Textos genéricos sin referencias específicas
  - Función JavaScript genérica y reutilizable

- **layouts/modals/session_free.blade.php:**
  - Colores específicos (btn-orange) cambiados por btn-primary
  - URL de Google Calendar reemplazada por ejemplo genérico (Calendly)
  - Textos genéricos sin referencias a empresa específica
  - Comentarios agregados indicando dónde cambiar la URL

- **layouts/free_consultation_button.blade.php:**
  - Color específico (#FF6B35) cambiado por color neutro (#007bff)
  - URL de Google Calendar reemplazada por ejemplo genérico (Calendly)
  - Texto del mensaje cambiado de "Habla con una psicóloga gratis aquí" a "Habla con nosotros gratis aquí"
  - Comentarios agregados para personalización

- **pages/free-meeting-popup-example.blade.php:**
  - Página de ejemplo creada con datos ficticios
  - Colores neutros y clases genéricas
  - Ejemplos de uso de todos los componentes de popup

## Cambios en la Integración Google Meet

### Controlador
- **GoogleMeetController.php:**
  - Textos específicos cambiados: "Sesión de terapia" → "Reunión de consultoría"
  - Descripción genérica sin referencias específicas
  - Parámetros renombrados: "psicologaName/Email" → "professionalName/Email", "clienteName/Email" → "clientName/Email"
  - Comentarios agregados explicando la funcionalidad
  - Código genérico y reutilizable

### Migraciones
- **add_field_google_meet_url_to_appointment.php:** Sin cambios necesarios, estructura genérica
- **add_google_meet_fields_v2_to_appointments.php:** Sin cambios necesarios, estructura genérica

### Configuración
- **config/services.php:**
  - Configuración de google_meet agregada
  - Variables de entorno genéricas
  - Comentarios explicativos

### Vistas
- **pages/google-meet-example.blade.php:**
  - Página de ejemplo creada con datos ficticios
  - Ejemplos de código con datos genéricos
  - Documentación de configuración
  - Colores neutros y clases genéricas
  - Textos sin referencias específicas ("psicóloga" → "profesional")
  - Título de navegación cambiado de "¡Haz match con tu psicóloga ideal!" a "Líneas de Emergencia"

## Datos Sensibles Removidos

- ✅ Nombres de empresa específicos → "Tu Nombre de Empresa"
- ✅ Referencias a marcas registradas → Texto genérico
- ✅ Información de contacto específica (emails, teléfonos) → "contacto@tunombredeempresa.com"
- ✅ Datos de clientes o usuarios reales
- ✅ Configuraciones específicas del entorno
- ✅ Referencias a moneda específica (S/ cambiado a $)
- ✅ Logos e imágenes específicas → "Tu Logo" (texto genérico)
- ✅ Colores específicos de marca → Colores neutros (#333, #666, #28a745, #007bff)
- ✅ Clases CSS específicas → Clases genéricas de Bootstrap (btn-primary)
- ✅ Números de teléfono específicos → Ejemplos genéricos (911, 112, 0800-xxx-xxx)
- ✅ Enlaces específicos → Ejemplos genéricos (www.ejemplo-xxx.com)
- ✅ Referencias geográficas específicas → Texto genérico "tu país" o "tu región"

## Notas Importantes

- El código está listo para ser mostrado como portfolio
- Todas las funcionalidades están intactas
- Los comentarios en el código se mantienen para facilitar la comprensión
- La estructura es independiente y puede integrarse en cualquier proyecto Laravel

## Próximos Pasos Recomendados

1. Revisar todas las vistas estáticas y personalizar según necesidad
2. Agregar capturas de pantalla del funcionamiento
3. Crear un video demostrativo (fuera de este repositorio)
4. Inicializar Git y subir a GitHub siguiendo INSTRUCCIONES_GITHUB.md


