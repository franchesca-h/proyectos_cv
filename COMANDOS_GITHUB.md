# Comandos para Subir a GitHub

## Pasos para conectar con tu repositorio

### 1. Agregar el repositorio remoto

Reemplaza `TU_USUARIO` con tu nombre de usuario de GitHub:

```bash
git remote add origin https://github.com/TU_USUARIO/proyectos_cv.git
```

### 2. Verificar que el remote está configurado

```bash
git remote -v
```

### 3. Subir el código a GitHub

```bash
git push -u origin main
```

## Si el repositorio ya existe en GitHub

Si ya creaste el repositorio en GitHub, simplemente ejecuta los comandos anteriores.

## Si el repositorio NO existe en GitHub

1. Ve a [GitHub](https://github.com) y crea un nuevo repositorio llamado `proyectos_cv`
2. **NO** inicialices con README, .gitignore o licencia (ya los tenemos)
3. Luego ejecuta los comandos anteriores

## Verificación

Después de hacer push, verifica en GitHub que todos los archivos se subieron correctamente.

## Notas

- El repositorio está configurado con la rama `main`
- Todos los archivos sensibles están en `.gitignore`
- El commit inicial incluye todos los módulos y documentación

