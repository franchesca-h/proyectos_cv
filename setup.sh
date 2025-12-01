#!/bin/bash

# Script de instalación automática para módulos Laravel
# Uso: ./setup.sh

echo "🚀 Iniciando setup de módulos Laravel..."

# Verificar si estamos en un proyecto Laravel
if [ ! -f "artisan" ]; then
    echo "❌ Error: No se encontró el archivo artisan. Asegúrate de estar en un proyecto Laravel."
    exit 1
fi

# Crear base de datos SQLite si no existe
if [ ! -f "database/database.sqlite" ]; then
    echo "📦 Creando base de datos SQLite..."
    touch database/database.sqlite
    echo "✅ Base de datos creada"
fi

# Verificar si .env existe
if [ ! -f ".env" ]; then
    echo "📝 Creando archivo .env..."
    cp .env.example .env
    php artisan key:generate
    echo "✅ Archivo .env creado"
fi

# Actualizar .env para usar SQLite
echo "⚙️  Configurando base de datos SQLite..."
sed -i.bak 's/DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env
sed -i.bak '/DB_HOST/d' .env
sed -i.bak '/DB_PORT/d' .env
sed -i.bak '/DB_DATABASE/d' .env
sed -i.bak '/DB_USERNAME/d' .env
sed -i.bak '/DB_PASSWORD/d' .env

# Instalar dependencias
echo "📦 Instalando dependencias..."
composer install

# Ejecutar migraciones
echo "🗄️  Ejecutando migraciones..."
php artisan migrate

# Crear usuario admin
echo "👤 Creando usuario administrador..."
php artisan tinker <<EOF
\$user = new App\Models\User();
\$user->name = 'Admin Test';
\$user->email = 'admin@test.com';
\$user->password = bcrypt('password');
\$user->roles_id = 1;
\$user->save();
echo "Usuario creado: admin@test.com / password\n";
exit
EOF

echo ""
echo "✅ Setup completado!"
echo ""
echo "📋 Credenciales de acceso:"
echo "   Email: admin@test.com"
echo "   Password: password"
echo ""
echo "🚀 Para iniciar el servidor:"
echo "   php artisan serve"
echo ""
echo "🌐 Rutas disponibles:"
echo "   - http://localhost:8000/services (requiere login)"
echo "   - http://localhost:8000/libro-reclamaciones"
echo "   - http://localhost:8000/lineas-emergencia"
echo "   - http://localhost:8000/ejemplos-tooltips"
echo "   - http://localhost:8000/ejemplos-popups"
echo ""

