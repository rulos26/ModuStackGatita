<?php
/**
 * Configuración de conexión a la base de datos
 * Hostinger - MySQL
 */

// Configuración de la base de datos
// NOTA: En Hostinger, cuando el script PHP está en el mismo servidor que la BD,
// usa '127.0.0.1' en lugar de la IP externa
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_USER', 'u494150416_ZLlua');
define('DB_PASS', '!$a2-b2}^Kf.!Gj0');
define('DB_NAME', 'u494150416_LilLT'); 

/* define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_USER', 'u494150416_gatita');
define('DB_PASS', '0382646740Ju*');
define('DB_NAME', 'u494150416_gatita'); */

/**
 * Función para obtener la conexión a la base de datos
 * @return mysqli|false Retorna el objeto mysqli o false en caso de error
 */
function getDBConnection() {
    // Crear conexión usando 127.0.0.1 (recomendado para Hostinger cuando PHP está en el mismo servidor)
    try {
        // Conectar con el puerto especificado
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        
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
    } catch (mysqli_sql_exception $e) {
        error_log("Excepción de conexión: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        error_log("Error inesperado: " . $e->getMessage());
        return false;
    }
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

