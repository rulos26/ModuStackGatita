<?php
/**
 * Configuración de conexión a la base de datos
 * Hostinger - MySQL
 */

// Configuración de la base de datos
// NOTA: En Hostinger, cuando el script PHP está en el mismo servidor que la BD,
// debes usar 'localhost' en lugar de la IP externa
define('DB_HOST', 'localhost');
define('DB_USER', 'u494150416_gatita');
define('DB_PASS', '0382646740Ju*');
define('DB_NAME', 'u494150416_gatitia');

/**
 * Función para obtener la conexión a la base de datos
 * @return mysqli|false Retorna el objeto mysqli o false en caso de error
 */
function getDBConnection() {
    // Crear conexión usando localhost (recomendado para Hostinger cuando PHP está en el mismo servidor)
    $conn = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Verificar conexión
    if ($conn->connect_error) {
        error_log("Error de conexión: " . $conn->connect_error);
        // Cerrar la conexión fallida
        $conn->close();
        return false;
    }
    
    // Establecer charset UTF-8 para evitar problemas con caracteres especiales
    $conn->set_charset("utf8mb4");
    
    return $conn;
}

/**
 * Función para cerrar la conexión a la base de datos
 * @param mysqli $conn Conexión a cerrar
 */
function closeDBConnection($conn) {
    if ($conn && !$conn->connect_error) {
        $conn->close();
    }
}

?>

