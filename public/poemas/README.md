# 💜 Poemas - Día 1

## 📋 Archivos Creados

1. **dia_1.php** - Página principal con el poema y modal de propuesta
2. **guardar_respuesta.php** - Script PHP para guardar las respuestas en la base de datos

## 🗄️ Configuración de Base de Datos

### Paso 1: Crear la tabla

Antes de usar la funcionalidad, debes ejecutar el script SQL para crear la tabla `respuestas_gatita`:

```sql
CREATE TABLE IF NOT EXISTS respuestas_gatita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    respuesta VARCHAR(50) NOT NULL,
    fecha_respuesta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_fecha (fecha_respuesta)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

El archivo completo está en: `docs/crear_tabla_respuestas.sql`

### Paso 2: Ejecutar el SQL

Puedes ejecutarlo desde:
- phpMyAdmin en Hostinger
- O usando cualquier cliente MySQL
- O desde un script PHP de prueba

## 🎨 Características del Diseño

- **Colores**: Rojo profundo, rosado y morado (color favorito)
- **Estilo**: Romántico, delicado y emocional
- **Responsive**: Se adapta a móviles y tablets
- **Animaciones**: Corazones flotantes y efectos suaves

## 🚀 Cómo Acceder

- **URL Local**: `http://localhost/public/poemas/dia_1.php`
- **URL Producción**: `http://tu-dominio.com/poemas/dia_1.php` (si public/ es el DocumentRoot)

## 📝 Funcionalidad

1. El usuario lee el poema romántico
2. Hace clic en "Quiero preguntarte algo…"
3. Se abre un modal con la pregunta "¿Quieres ser mi novia?"
4. El usuario selecciona una respuesta (Sí, No, Lo voy a pensar)
5. La respuesta se guarda automáticamente en la base de datos
6. Se muestra un mensaje de confirmación

## 🔒 Seguridad

- Validación de respuestas permitidas
- Protección contra inyección SQL (consultas preparadas)
- Validación de método POST
- Manejo de errores adecuado

## 📊 Ver Respuestas Guardadas

Para ver las respuestas guardadas, puedes ejecutar:

```sql
SELECT * FROM respuestas_gatita ORDER BY fecha_respuesta DESC;
```

