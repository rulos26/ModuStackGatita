# 💕 Página Web Romántica - Para Ti, Mi Amor

Una página web romántica espectacular diseñada para expresar sentimientos profundos y crear una experiencia emocional inolvidable.

## 🌟 Características

- **Diseño Romántico Premium**: Paleta de colores cálidos (rosas suaves, rojo borgoña, dorado y marfil)
- **Tipografías Elegantes**: Playfair Display (serif) para títulos y Lato (sans-serif) para cuerpo
- **Microinteracciones Sensibles**: Animaciones suaves, efectos hover, partículas flotantes
- **Secciones Emocionales**:
  - Hero principal con imagen de fondo romántica
  - Galería de momentos especiales con notas personales
  - Carta personal con animación de apertura
  - CTA principal: "¿Quieres ser mi novia?" con confirmación visual
- **Efectos Especiales**:
  - Confetti animado al confirmar "Sí"
  - Partículas flotantes y corazones
  - Sonidos opcionales suaves (con control de silencio)
  - Animaciones cinematográficas
- **Totalmente Responsive**: Optimizado para móviles, tablets y desktop
- **Accesible**: Contraste adecuado, navegación por teclado, textos ALT en imágenes

## 📁 Estructura del Proyecto

```
ModuStackGatita/
│
├── index.html          # Estructura principal de la página
├── styles.css          # Estilos y diseño visual
├── app.js             # Funcionalidades interactivas y animaciones
└── README.md          # Este archivo
```

## 🚀 Cómo Ejecutar

### Opción 1: Abrir directamente
1. Descarga o clona este repositorio
2. Abre el archivo `index.html` en tu navegador preferido
3. ¡Listo! La página debería cargarse automáticamente

### Opción 2: Servidor local (recomendado)
1. Abre una terminal en la carpeta del proyecto
2. Ejecuta uno de los siguientes comandos:

**Con Python:**
```bash
# Python 3
python -m http.server 8000

# Python 2
python -m SimpleHTTPServer 8000
```

**Con Node.js (http-server):**
```bash
npx http-server -p 8000
```

**Con PHP:**
```bash
php -S localhost:8000
```

3. Abre tu navegador y visita: `http://localhost:8000`

## 🎨 Decisiones de Diseño

### Paleta de Colores
- **Rosa Suave** (#f8e8e8): Fondo principal, crea calidez
- **Rosa Medio** (#f4c2c2): Gradientes y acentos
- **Rojo Borgoña** (#8b1538): Color principal de texto y elementos destacados
- **Rojo Oscuro** (#6b0f2a): Variación para profundidad
- **Dorado** (#d4af37): Acentos de lujo y elementos especiales
- **Dorado Claro** (#f4e4bc): Gradientes suaves
- **Marfil** (#fffef7): Fondo limpio y elegante
- **Blanco** (#ffffff): Contraste y limpieza

### Tipografías
- **Playfair Display**: Títulos y elementos destacados (serif elegante)
- **Lato**: Texto del cuerpo (sans-serif limpia y legible)

### Animaciones
- Transiciones suaves con `cubic-bezier(0.4, 0, 0.2, 1)`
- Efectos parallax sutiles
- Animaciones de entrada al hacer scroll
- Microinteracciones en todos los elementos interactivos

## 📸 Lista de Imágenes Utilizadas

Todas las imágenes provienen de **Unsplash**, una plataforma de imágenes libres de derechos.

### 1. Imagen Hero (Fondo Principal)
- **URL**: `https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=1920&q=80`
- **Texto ALT**: "Pareja abrazándose al atardecer"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: romantic sunset couple hugging"

### 2. Momento 1 - El Primer Encuentro
- **URL**: `https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=800&q=80`
- **Texto ALT**: "Pareja abrazándose al atardecer"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: couple hugging sunset"

### 3. Momento 2 - Caminando Juntos
- **URL**: `https://images.unsplash.com/photo-1518568814500-bf0f8d125f46?w=800&q=80`
- **Texto ALT**: "Pareja caminando de la mano en la playa"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: couple walking hand in hand beach"

### 4. Momento 3 - Conversaciones Sin Fin
- **URL**: `https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&q=80`
- **Texto ALT**: "Cena romántica a la luz de las velas"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: romantic candlelight dinner"

### 5. Momento 4 - Atardeceres Compartidos
- **URL**: `https://images.unsplash.com/photo-1518568814500-bf0f8d125f46?w=800&q=80`
- **Texto ALT**: "Pareja contemplando el atardecer"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: couple watching sunset"

### 6. Imagen CTA (Fondo de sección de propuesta)
- **URL**: `https://images.unsplash.com/photo-1511895426328-dc8714191300?w=1920&q=80`
- **Texto ALT**: "Fondo romántico para sección de propuesta"
- **Crédito**: Fotografía de Unsplash
- **Búsqueda sugerida**: "Unsplash: romantic candlelight atmosphere"

### Nota sobre las Imágenes
Las URLs de Unsplash incluyen parámetros de tamaño (`w=800` o `w=1920`) y calidad (`q=80`) para optimizar la carga. Puedes cambiar estos parámetros según tus necesidades:
- `w=`: Ancho en píxeles
- `q=`: Calidad (0-100)

**Alternativas de búsqueda en Unsplash:**
- "romantic couple sunset"
- "couple holding hands"
- "romantic dinner candles"
- "couple beach walk"
- "romantic proposal"
- "love story"

## ✏️ Personalización

### Cambiar el Contenido del Texto

#### Hero Section
Edita en `index.html`:
```html
<h1 class="hero-title">Eres Mi Todo</h1>
<p class="hero-subtitle">Tu texto personalizado aquí...</p>
```

#### Momentos
Cada momento tiene su propio contenido en `index.html`:
```html
<h3>El Primer Encuentro</h3>
<p>Tu descripción personal del momento...</p>
```

#### Carta Personal
La carta completa está en `index.html`, sección `.letter-body`. Puedes modificar cada párrafo según tus sentimientos.

#### CTA Principal
```html
<h2 class="cta-title">Hay algo que quiero preguntarte...</h2>
<p class="cta-subtitle">Tu mensaje personalizado...</p>
<button class="cta-button">
    <span class="cta-button-text">¿Quieres ser mi novia?</span>
</button>
```

### Cambiar Colores
Edita las variables CSS en `styles.css`:
```css
:root {
    --rosa-suave: #f8e8e8;
    --rojo-borgoña: #8b1538;
    --dorado: #d4af37;
    /* ... más colores */
}
```

### Cambiar Imágenes
Reemplaza las URLs en `index.html` con tus propias imágenes. Asegúrate de:
1. Usar imágenes de alta calidad
2. Optimizar el tamaño para web
3. Actualizar los textos ALT descriptivos
4. Incluir créditos si es necesario

### Ajustar Animaciones
Las animaciones están definidas en `styles.css` (keyframes) y controladas en `app.js`. Puedes modificar:
- Velocidad de transiciones
- Efectos de confetti
- Sonidos y partículas

## 📱 Compartir en Redes Sociales

### WhatsApp
Usa este enlace para compartir con un mensaje predefinido:

```
https://wa.me/?text=He%20creado%20algo%20especial%20para%20ti.%20Espero%20que%20te%20guste%20tanto%20como%20a%20mí.%20💕%20[TU_URL_AQUI]
```

**Mensaje de presentación sugerido:**
```
He creado algo especial para ti, una página que refleja todo lo que siento. Espero que te guste tanto como a mí. 💕

[Enlace a tu página]
```

### Personalizar el Enlace de WhatsApp
Reemplaza `[TU_URL_AQUI]` con la URL donde hayas alojado la página. Ejemplo:
```
https://wa.me/?text=He%20creado%20algo%20especial%20para%20ti.%20Espero%20que%20te%20guste%20tanto%20como%20a%20mí.%20💕%20https://tupagina.com
```

## 🌐 Despliegue

### Opciones de Hosting Gratuito

1. **GitHub Pages**
   - Sube el proyecto a un repositorio de GitHub
   - Activa GitHub Pages en la configuración del repositorio
   - Tu página estará disponible en `https://tuusuario.github.io/ModuStackGatita`

2. **Netlify**
   - Arrastra la carpeta del proyecto a [Netlify Drop](https://app.netlify.com/drop)
   - Obtendrás una URL instantánea

3. **Vercel**
   - Conecta tu repositorio de GitHub
   - Despliega automáticamente

4. **Firebase Hosting**
   - Usa Firebase CLI para desplegar
   - Hosting gratuito y rápido

## 🎵 Sonidos

La página incluye sonidos opcionales generados con Web Audio API:
- Sonido suave al abrir la carta
- Sonido de celebración al confirmar "Sí"
- Control de silencio en la esquina superior derecha

Los sonidos son generados programáticamente y no requieren archivos externos.

## ♿ Accesibilidad

- Contraste de colores adecuado (WCAG AA)
- Textos ALT descriptivos en todas las imágenes
- Navegación por teclado funcional
- Texto legible con tamaños apropiados
- Control de sonido visible y accesible

## 🐛 Solución de Problemas

### Las imágenes no cargan
- Verifica tu conexión a internet (las imágenes están en Unsplash)
- Comprueba que las URLs estén correctas
- Considera descargar las imágenes y alojarlas localmente

### Los sonidos no funcionan
- Algunos navegadores requieren interacción del usuario antes de reproducir audio
- Haz clic en el botón de sonido después de interactuar con la página
- Verifica que tu navegador soporte Web Audio API

### Las animaciones son lentas
- Cierra otras pestañas del navegador
- Verifica que tu dispositivo tenga recursos suficientes
- Considera reducir el número de partículas en `app.js`

## 📝 Notas Finales

- Esta página está diseñada para ser una expresión auténtica y respetuosa de sentimientos
- Prioriza experiencias que emocionen sin ser invasivas
- Todos los sonidos son opcionales y pueden silenciarse
- Las imágenes son de uso libre (Unsplash)
- El código es completamente personalizable

## 💝 Créditos

- **Diseño y Desarrollo**: Creado con amor y atención al detalle
- **Imágenes**: Unsplash (libres de derechos)
- **Fuentes**: Google Fonts (Playfair Display, Lato)
- **Inspiración**: El amor verdadero

---

**¡Que esta página te ayude a expresar tus sentimientos de la manera más especial posible!** 💕


