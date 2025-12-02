<?php
/**
 * Funciones de conexión y manejo de base de datos
 * Incluye las funciones para trabajar con la base de datos
 */

require_once __DIR__ . '/../config/config.php';

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

