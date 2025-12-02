# Estructura del Proyecto ModuStackGatita

## 📁 Organización de Carpetas

```
ModuStackGatita/
│
├── config/                 # Configuración del proyecto
│   ├── config.php         # Credenciales y constantes de base de datos
│   └── .htaccess          # Protección de archivos de configuración
│
├── includes/              # Archivos PHP reutilizables
│   └── database.php       # Funciones de conexión y manejo de BD
│
├── public/                # Archivos públicos (accesibles desde el navegador)
│   ├── index.html         # Página principal
│   ├── passion.html       # Sección de pasión (cargada dinámicamente)
│   ├── css/
│   │   └── styles.css     # Estilos del sitio
│   ├── js/
│   │   └── app.js         # JavaScript principal
│   └── .htaccess          # Configuración de la carpeta pública
│
├── tests/                 # Scripts de prueba y diagnóstico
│   ├── test_connection.php
│   ├── test_connection_alternativo.php
│   ├── diagnostico_completo.php
│   ├── verificar_credenciales.php
│   └── ejemplo_uso.php
│
├── docs/                  # Documentación
│   ├── README.md
│   ├── LISTA_IMAGENES.md
│   └── MENSAJE_WHATSAPP.txt
│
├── .htaccess              # Configuración principal (opcional)
└── ESTRUCTURA.md          # Este archivo

```

## 🔗 Rutas y Referencias

### Archivos PHP

Para usar la configuración y funciones de base de datos en cualquier archivo PHP:

```php
// Desde cualquier archivo en la raíz o subcarpetas
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/database.php';

// O desde tests/
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/database.php';
```

### Archivos HTML/JavaScript

- **CSS**: `css/styles.css`
- **JavaScript**: `js/app.js`
- **HTML dinámico**: `passion.html` (misma carpeta que index.html)

## 🚀 Configuración del Servidor

### Desarrollo Local

1. Configura tu servidor web (Apache/Nginx) para que apunte a la carpeta `public/`
2. O accede directamente a `public/index.html`

### Producción (Hostinger)

1. Configura el DocumentRoot de Apache para que apunte a `public/`
2. O sube todos los archivos y configura las rutas según tu estructura

## 📝 Notas Importantes

- La carpeta `config/` está protegida con `.htaccess` para evitar acceso directo
- Los archivos de prueba están en `tests/` y no deberían estar accesibles públicamente
- La documentación está en `docs/` para referencia del proyecto

## 🔒 Seguridad

- Las credenciales de base de datos están en `config/config.php`
- Este archivo está protegido y no debería ser accesible desde el navegador
- Nunca subas `config/config.php` a repositorios públicos sin ocultar las credenciales

