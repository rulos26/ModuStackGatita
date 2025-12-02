<?php
/**
 * Guardar respuesta de la propuesta
 * Recibe la respuesta vía POST y la guarda en la base de datos
 */

header('Content-Type: application/json; charset=UTF-8');

// Incluir configuración y funciones de base de datos
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../includes/database.php';

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
    exit;
}

// Obtener la respuesta del POST
$respuesta = isset($_POST['respuesta']) ? trim($_POST['respuesta']) : '';

// Validar que la respuesta no esté vacía
if (empty($respuesta)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'La respuesta no puede estar vacía'
    ]);
    exit;
}

// Validar que la respuesta sea una de las opciones permitidas
$respuestasPermitidas = ['Sí', 'No', 'Lo voy a pensar'];
if (!in_array($respuesta, $respuestasPermitidas)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Respuesta no válida'
    ]);
    exit;
}

try {
    // Obtener conexión a la base de datos
    $conn = getDBConnection();
    
    if (!$conn) {
        throw new Exception('No se pudo conectar a la base de datos');
    }
    
    // Preparar la consulta para insertar la respuesta
    $stmt = $conn->prepare("INSERT INTO respuestas_gatita (respuesta, fecha_respuesta) VALUES (?, NOW())");
    
    if (!$stmt) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }
    
    // Vincular parámetros
    $stmt->bind_param("s", $respuesta);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Respuesta exitosa
        echo json_encode([
            'success' => true,
            'message' => 'Respuesta guardada correctamente',
            'respuesta' => $respuesta
        ]);
    } else {
        throw new Exception('Error al ejecutar la consulta: ' . $stmt->error);
    }
    
    // Cerrar statement y conexión
    $stmt->close();
    closeDBConnection($conn);
    
} catch (Exception $e) {
    // Log del error (en producción, esto debería ir a un archivo de log)
    error_log('Error al guardar respuesta: ' . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al guardar la respuesta. Por favor, intenta de nuevo.'
    ]);
}

?>

