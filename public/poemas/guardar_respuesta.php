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

// Obtener la respuesta y el archivo del POST
$respuesta = isset($_POST['respuesta']) ? trim($_POST['respuesta']) : '';
$archivo = isset($_POST['archivo']) ? trim($_POST['archivo']) : '';

// Validar que la respuesta no esté vacía
if (empty($respuesta)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'La respuesta no puede estar vacía'
    ]);
    exit;
}

// Validar que el archivo no esté vacío
if (empty($archivo)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'El archivo no puede estar vacío'
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
    
    // Verificar si ya existe una respuesta para este archivo
    $checkStmt = $conn->prepare("SELECT id FROM respuestas_gatita WHERE archivo = ? LIMIT 1");
    $checkStmt->bind_param("s", $archivo);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult && $checkResult->num_rows > 0) {
        $checkStmt->close();
        closeDBConnection($conn);
        http_response_code(409); // Conflict
        echo json_encode([
            'success' => false,
            'message' => 'Ya existe una respuesta para este archivo'
        ]);
        exit;
    }
    $checkStmt->close();
    
    // Preparar la consulta para insertar la respuesta
    $stmt = $conn->prepare("INSERT INTO respuestas_gatita (archivo, respuesta, fecha_respuesta) VALUES (?, ?, NOW())");
    
    if (!$stmt) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }
    
    // Vincular parámetros
    $stmt->bind_param("ss", $archivo, $respuesta);
    
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

