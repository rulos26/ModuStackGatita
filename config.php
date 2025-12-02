<?php
/**
 * Configuración de conexión a la base de datos
 * Hostinger - MySQL
 */

// Configuración de la base de datos
define('DB_HOST', '82.197.82.130');
define('DB_USER', 'u494150416_gatita');
define('DB_PASS', '0382646740Ju*');
define('DB_NAME', 'u494150416_gatitia');

/**
 * Función para obtener la conexión a la base de datos
 * @return mysqli|false Retorna el objeto mysqli o false en caso de error
 */
function getDBConnection() {
    // Crear conexión
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Verificar conexión
    if ($conn->connect_error) {
        error_log("Error de conexión: " . $conn->connect_error);
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

