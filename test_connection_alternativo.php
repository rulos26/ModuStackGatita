<?php
/**
 * Script de prueba alternativo que intenta múltiples métodos de conexión
 * Útil para diagnosticar problemas de conexión en Hostinger
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Credenciales
$db_user = 'u494150416_gatita';
$db_pass = '0382646740Ju*';
$db_name = 'u494150416_gatitia';

// Opciones de host a probar
$hosts = [
    'localhost',
    '127.0.0.1',
    '82.197.82.130'
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Alternativo de Conexión</title>
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
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .test-result {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 5px solid;
        }
        
        .success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        
        .error {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        
        .info {
            background-color: #d1ecf1;
            border-color: #17a2b8;
            color: #0c5460;
        }
        
        .test-item {
            margin: 10px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .test-item strong {
            display: block;
            margin-bottom: 5px;
            color: #495057;
        }
        
        code {
            background-color: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Test Alternativo de Conexión</h1>
        <p style="text-align: center; margin-bottom: 30px; color: #666;">
            Probando diferentes métodos de conexión para encontrar el que funciona
        </p>
        
        <?php
        $connectionFound = false;
        
        foreach ($hosts as $host) {
            echo '<div class="test-item">';
            echo '<strong>Probando conexión con host: <code>' . htmlspecialchars($host) . '</code></strong>';
            
            $conn = @new mysqli($host, $db_user, $db_pass, $db_name);
            
            if ($conn->connect_error) {
                echo '<div class="test-result error">';
                echo '<strong>❌ Error de conexión</strong><br>';
                echo 'Mensaje: ' . htmlspecialchars($conn->connect_error);
                echo '</div>';
                $conn->close();
            } else {
                echo '<div class="test-result success">';
                echo '<strong>✅ ¡Conexión exitosa!</strong><br>';
                echo 'Host: <code>' . htmlspecialchars($host) . '</code><br>';
                echo 'Versión MySQL: ' . htmlspecialchars($conn->server_info) . '<br>';
                echo 'Charset: ' . htmlspecialchars($conn->character_set_name());
                
                // Probar una consulta simple
                $result = $conn->query("SHOW TABLES");
                if ($result) {
                    echo '<br>Tablas encontradas: ' . $result->num_rows;
                }
                
                echo '</div>';
                $conn->close();
                $connectionFound = true;
                
                // Mostrar recomendación
                echo '<div class="test-result info">';
                echo '<strong>💡 Recomendación:</strong><br>';
                echo 'Usa este host en tu archivo <code>config.php</code>: <code>' . htmlspecialchars($host) . '</code>';
                echo '</div>';
                
                break; // Si encontramos una conexión exitosa, salir del bucle
            }
            
            echo '</div>';
        }
        
        if (!$connectionFound) {
            echo '<div class="test-result error">';
            echo '<h3>❌ No se pudo establecer conexión con ningún host</h3>';
            echo '<p><strong>Posibles causas:</strong></p>';
            echo '<ul style="margin-left: 20px; margin-top: 10px;">';
            echo '<li>Las credenciales (usuario/contraseña) son incorrectas</li>';
            echo '<li>El nombre de la base de datos es incorrecto</li>';
            echo '<li>El usuario no tiene permisos para acceder a la base de datos</li>';
            echo '<li>La base de datos no existe</li>';
            echo '<li>El servicio MySQL no está corriendo</li>';
            echo '</ul>';
            echo '<p style="margin-top: 15px;"><strong>Verifica en el panel de Hostinger:</strong></p>';
            echo '<ul style="margin-left: 20px;">';
            echo '<li>Que el usuario de la base de datos sea correcto</li>';
            echo '<li>Que la contraseña sea la correcta</li>';
            echo '<li>Que el nombre de la base de datos sea exactamente: <code>' . htmlspecialchars($db_name) . '</code></li>';
            echo '<li>Que el usuario tenga permisos sobre la base de datos</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
        
        <div style="margin-top: 30px; text-align: center;">
            <button onclick="location.reload()" style="padding: 12px 30px; background-color: #667eea; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                🔄 Probar Nuevamente
            </button>
        </div>
    </div>
</body>
</html>

