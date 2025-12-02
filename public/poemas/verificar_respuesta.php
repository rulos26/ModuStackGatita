<?php
/**
 * Verificar si ya existe una respuesta para un archivo específico
 * Devuelve JSON con información sobre si existe respuesta
 */

header('Content-Type: application/json; charset=UTF-8');

// Incluir configuración y funciones de base de datos
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../includes/database.php';

// Obtener el nombre del archivo desde el parámetro GET
$archivo = isset($_GET['archivo']) ? trim($_GET['archivo']) : '';

if (empty($archivo)) {
    echo json_encode([
        'success' => false,
        'tiene_respuesta' => false,
        'message' => 'Archivo no especificado'
    ]);
    exit;
}

try {
    // Obtener conexión a la base de datos
    $conn = getDBConnection();
    
    if (!$conn) {
        throw new Exception('No se pudo conectar a la base de datos');
    }
    
    // Verificar si existe una respuesta para este archivo
    // Usamos el nombre del archivo como identificador único
    $stmt = $conn->prepare("SELECT id, respuesta, fecha_respuesta FROM respuestas_gatita WHERE archivo = ? LIMIT 1");
    
    if (!$stmt) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }
    
    $stmt->bind_param("s", $archivo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'tiene_respuesta' => true,
            'respuesta' => $row['respuesta'],
            'fecha_respuesta' => $row['fecha_respuesta']
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'tiene_respuesta' => false
        ]);
    }
    
    $stmt->close();
    closeDBConnection($conn);
    
} catch (Exception $e) {
    error_log('Error al verificar respuesta: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'tiene_respuesta' => false,
        'message' => 'Error al verificar respuesta'
    ]);
}

?>

