-- ============================================
-- Script SQL para actualizar la tabla respuestas_gatita
-- Si ya tienes la tabla creada, ejecuta este script para agregar el campo 'archivo'
-- Base de datos: u494150416_LilLT
-- ============================================

-- Verificar si la columna 'archivo' ya existe
-- Nota: MySQL/MariaDB no soporta IF NOT EXISTS en ALTER TABLE ADD COLUMN
-- Si la columna ya existe, este comando fallará, pero puedes ignorarlo

-- Agregar la columna archivo (ejecuta solo si no existe)
ALTER TABLE respuestas_gatita 
ADD COLUMN archivo VARCHAR(100) NOT NULL DEFAULT 'dia_1' AFTER id;

-- Crear índice en el campo archivo para mejorar las consultas
-- Si ya existe, este comando fallará, pero puedes ignorarlo
CREATE INDEX idx_archivo ON respuestas_gatita(archivo);

-- Crear índice único para evitar respuestas duplicadas por archivo
-- Si ya existe, este comando fallará, pero puedes ignorarlo
ALTER TABLE respuestas_gatita 
ADD UNIQUE KEY unique_archivo (archivo);

-- Actualizar registros existentes sin archivo (si los hay)
UPDATE respuestas_gatita 
SET archivo = 'dia_1' 
WHERE archivo IS NULL OR archivo = '';

-- Verificar la estructura de la tabla
-- DESCRIBE respuestas_gatita;

-- ============================================
-- NOTAS:
-- ============================================
-- 1. Este script actualiza la tabla existente para agregar el campo 'archivo'
-- 2. Si la tabla no existe, usa crear_tabla_respuestas.sql primero
-- 3. El campo 'archivo' identifica de qué archivo PHP viene la respuesta
-- 4. Se crea un índice único para evitar múltiples respuestas por archivo
-- 5. Los registros existentes se actualizan con 'dia_1' como valor por defecto
-- ============================================

