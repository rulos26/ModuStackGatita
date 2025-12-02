<?php
/**
 * Ejemplo de uso de la conexión a la base de datos
 * Este archivo muestra cómo usar la función getDBConnection() en tus scripts
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/database.php';

// Ejemplo 1: Consulta simple
function ejemploConsultaSimple() {
    $conn = getDBConnection();
    
    if (!$conn) {
        die("Error: No se pudo conectar a la base de datos");
    }
    
    // Ejemplo de consulta SELECT
    $query = "SELECT * FROM nombre_tabla LIMIT 10";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Procesar cada fila
            echo "ID: " . $row['id'] . "<br>";
        }
    } else {
        echo "No se encontraron resultados";
    }
    
    closeDBConnection($conn);
}

// Ejemplo 2: Consulta preparada (más segura)
function ejemploConsultaPreparada($id) {
    $conn = getDBConnection();
    
    if (!$conn) {
        die("Error: No se pudo conectar a la base de datos");
    }
    
    // Usar consultas preparadas para prevenir SQL injection
    $stmt = $conn->prepare("SELECT * FROM nombre_tabla WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" significa integer
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    }
    
    $stmt->close();
    closeDBConnection($conn);
    
    return null;
}

// Ejemplo 3: Insertar datos
function ejemploInsertar($nombre, $email) {
    $conn = getDBConnection();
    
    if (!$conn) {
        return false;
    }
    
    $stmt = $conn->prepare("INSERT INTO nombre_tabla (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $email); // "ss" significa dos strings
    $result = $stmt->execute();
    
    $stmt->close();
    closeDBConnection($conn);
    
    return $result;
}

// Ejemplo 4: Actualizar datos
function ejemploActualizar($id, $nombre) {
    $conn = getDBConnection();
    
    if (!$conn) {
        return false;
    }
    
    $stmt = $conn->prepare("UPDATE nombre_tabla SET nombre = ? WHERE id = ?");
    $stmt->bind_param("si", $nombre, $id); // "si" significa string e integer
    $result = $stmt->execute();
    
    $stmt->close();
    closeDBConnection($conn);
    
    return $result;
}

// Ejemplo 5: Eliminar datos
function ejemploEliminar($id) {
    $conn = getDBConnection();
    
    if (!$conn) {
        return false;
    }
    
    $stmt = $conn->prepare("DELETE FROM nombre_tabla WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    
    $stmt->close();
    closeDBConnection($conn);
    
    return $result;
}

?>

