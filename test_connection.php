<?php
/**
 * Script de prueba para verificar la conexión a la base de datos
 * Hostinger - MySQL
 */

// Incluir archivo de configuración
require_once 'config.php';

// Encabezados para mostrar errores (solo en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Conexión a Base de Datos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 600px;
            width: 100%;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        
        .status-box {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid;
        }
        
        .status-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        
        .status-error {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        
        .status-info {
            background-color: #d1ecf1;
            border-color: #17a2b8;
            color: #0c5460;
        }
        
        .info-item {
            margin: 15px 0;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .info-label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }
        
        .info-value {
            color: #212529;
            font-family: 'Courier New', monospace;
            word-break: break-all;
        }
        
        .test-button {
            display: block;
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .test-button:hover {
            background-color: #5568d3;
        }
        
        .query-result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        
        .query-result h3 {
            margin-bottom: 10px;
            color: #495057;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        
        table th {
            background-color: #e9ecef;
            font-weight: bold;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔌 Test de Conexión a Base de Datos</h1>
        
        <?php
        // Intentar conectar a la base de datos
        $conn = getDBConnection();
        
        if ($conn) {
            // Conexión exitosa
            echo '<div class="status-box status-success">';
            echo '<h2>✅ ¡Conexión Exitosa!</h2>';
            echo '<p>La conexión a la base de datos se estableció correctamente.</p>';
            echo '</div>';
            
            // Mostrar información de la conexión
            echo '<div class="status-box status-info">';
            echo '<h3>📊 Información de la Conexión</h3>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Host:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_HOST) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Usuario:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_USER) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Base de Datos:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_NAME) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Versión de MySQL:</div>';
            echo '<div class="info-value">' . htmlspecialchars($conn->server_info) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Charset:</div>';
            echo '<div class="info-value">' . htmlspecialchars($conn->character_set_name()) . '</div>';
            echo '</div>';
            echo '</div>';
            
            // Realizar una consulta de prueba
            echo '<div class="query-result">';
            echo '<h3>🔍 Consulta de Prueba</h3>';
            
            // Consulta para obtener todas las tablas
            $query = "SHOW TABLES";
            $result = $conn->query($query);
            
            if ($result && $result->num_rows > 0) {
                echo '<p><strong>Tablas encontradas en la base de datos:</strong></p>';
                echo '<table>';
                echo '<tr><th>#</th><th>Nombre de la Tabla</th></tr>';
                $counter = 1;
                while ($row = $result->fetch_array()) {
                    echo '<tr>';
                    echo '<td>' . $counter . '</td>';
                    echo '<td>' . htmlspecialchars($row[0]) . '</td>';
                    echo '</tr>';
                    $counter++;
                }
                echo '</table>';
            } else {
                echo '<p><em>No se encontraron tablas en la base de datos. La base de datos está vacía.</em></p>';
            }
            
            // Consulta para obtener información de la base de datos
            // Nota: Usamos 'server_time' en lugar de 'current_time' porque current_time es una palabra reservada
            $query = "SELECT DATABASE() as db_name, VERSION() as version, NOW() as server_time";
            $result = $conn->query($query);
            
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div style="margin-top: 20px; padding: 15px; background-color: #e7f3ff; border-radius: 5px;">';
                echo '<h4>Información Adicional:</h4>';
                echo '<p><strong>Base de datos actual:</strong> ' . htmlspecialchars($row['db_name']) . '</p>';
                echo '<p><strong>Versión del servidor:</strong> ' . htmlspecialchars($row['version']) . '</p>';
                echo '<p><strong>Fecha y hora del servidor:</strong> ' . htmlspecialchars($row['server_time']) . '</p>';
                echo '</div>';
            }
            
            echo '</div>';
            
            // Cerrar conexión
            closeDBConnection($conn);
            
        } else {
            // Error en la conexión
            echo '<div class="status-box status-error">';
            echo '<h2>❌ Error de Conexión</h2>';
            echo '<p>No se pudo establecer la conexión a la base de datos.</p>';
            echo '</div>';
            
            echo '<div class="status-box status-info">';
            echo '<h3>📋 Parámetros de Conexión Utilizados</h3>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Host:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_HOST) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Usuario:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_USER) . '</div>';
            echo '</div>';
            echo '<div class="info-item">';
            echo '<div class="info-label">Base de Datos:</div>';
            echo '<div class="info-value">' . htmlspecialchars(DB_NAME) . '</div>';
            echo '</div>';
            echo '</div>';
            
            echo '<div class="status-box status-error">';
            echo '<h3>⚠️ Posibles Causas del Error</h3>';
            echo '<ul style="margin-left: 20px; margin-top: 10px;">';
            echo '<li>Las credenciales son incorrectas</li>';
            echo '<li>El servidor de base de datos no está accesible</li>';
            echo '<li>El firewall está bloqueando la conexión</li>';
            echo '<li>La base de datos no existe</li>';
            echo '<li>El usuario no tiene permisos para acceder a la base de datos</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
        
        <button class="test-button" onclick="location.reload()">🔄 Probar Nuevamente</button>
    </div>
</body>
</html>

