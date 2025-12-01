# Script de instalación automática para módulos Laravel (PowerShell)
# Uso: .\setup.ps1

Write-Host "🚀 Iniciando setup de módulos Laravel..." -ForegroundColor Cyan

# Verificar si estamos en un proyecto Laravel
if (-not (Test-Path "artisan")) {
    Write-Host "❌ Error: No se encontró el archivo artisan. Asegúrate de estar en un proyecto Laravel." -ForegroundColor Red
    exit 1
}

# Crear base de datos SQLite si no existe
if (-not (Test-Path "database\database.sqlite")) {
    Write-Host "📦 Creando base de datos SQLite..." -ForegroundColor Yellow
    New-Item -Path "database\database.sqlite" -ItemType File -Force | Out-Null
    Write-Host "✅ Base de datos creada" -ForegroundColor Green
}

# Verificar si .env existe
if (-not (Test-Path ".env")) {
    Write-Host "📝 Creando archivo .env..." -ForegroundColor Yellow
    Copy-Item ".env.example" ".env"
    php artisan key:generate
    Write-Host "✅ Archivo .env creado" -ForegroundColor Green
}

# Actualizar .env para usar SQLite
Write-Host "⚙️  Configurando base de datos SQLite..." -ForegroundColor Yellow
$envContent = Get-Content ".env" -Raw
$envContent = $envContent -replace "DB_CONNECTION=.*", "DB_CONNECTION=sqlite"
$envContent = $envContent -replace "(?m)^DB_HOST=.*\r?\n", ""
$envContent = $envContent -replace "(?m)^DB_PORT=.*\r?\n", ""
$envContent = $envContent -replace "(?m)^DB_DATABASE=.*\r?\n", ""
$envContent = $envContent -replace "(?m)^DB_USERNAME=.*\r?\n", ""
$envContent = $envContent -replace "(?m)^DB_PASSWORD=.*\r?\n", ""
Set-Content ".env" -Value $envContent

# Instalar dependencias
Write-Host "📦 Instalando dependencias..." -ForegroundColor Yellow
composer install

# Ejecutar migraciones
Write-Host "🗄️  Ejecutando migraciones..." -ForegroundColor Yellow
php artisan migrate

# Crear usuario admin
Write-Host "👤 Creando usuario administrador..." -ForegroundColor Yellow
$tinkerScript = @"
`$user = new App\Models\User();
`$user->name = 'Admin Test';
`$user->email = 'admin@test.com';
`$user->password = bcrypt('password');
`$user->roles_id = 1;
`$user->save();
echo 'Usuario creado: admin@test.com / password';
exit
"@
$tinkerScript | php artisan tinker

Write-Host ""
Write-Host "✅ Setup completado!" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Credenciales de acceso:" -ForegroundColor Cyan
Write-Host "   Email: admin@test.com"
Write-Host "   Password: password"
Write-Host ""
Write-Host "🚀 Para iniciar el servidor:" -ForegroundColor Cyan
Write-Host "   php artisan serve"
Write-Host ""
Write-Host "🌐 Rutas disponibles:" -ForegroundColor Cyan
Write-Host "   - http://localhost:8000/services (requiere login)"
Write-Host "   - http://localhost:8000/libro-reclamaciones"
Write-Host "   - http://localhost:8000/lineas-emergencia"
Write-Host "   - http://localhost:8000/ejemplos-tooltips"
Write-Host "   - http://localhost:8000/ejemplos-popups"
Write-Host ""

