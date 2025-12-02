-- ============================================
-- Script SQL para crear la tabla de respuestas_gatita
-- Base de datos: u494150416_LilLT
-- ============================================

-- Crear la tabla respuestas_gatita si no existe
CREATE TABLE IF NOT EXISTS respuestas_gatita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    respuesta VARCHAR(50) NOT NULL,
    fecha_respuesta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_fecha (fecha_respuesta)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Verificar que la tabla se creó correctamente
-- SELECT * FROM respuestas_gatita;

-- ============================================
-- NOTAS:
-- ============================================
-- 1. La tabla almacena las respuestas de la propuesta
-- 2. El campo 'respuesta' puede contener: 'Sí', 'No', o 'Lo voy a pensar'
-- 3. La fecha se guarda automáticamente cuando se inserta un registro
-- 4. Se crea un índice en 'fecha_respuesta' para mejorar las consultas por fecha
-- 5. Se usa utf8mb4 para soportar caracteres especiales y emojis
-- ============================================

