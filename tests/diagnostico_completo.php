<?php
/**
 * Script de diagnóstico completo para problemas de conexión
 * Prueba diferentes combinaciones de credenciales y nombres de base de datos
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Credenciales base - Actualizadas con las nuevas credenciales
$db_user = 'u494150416_ZLlua';
$db_pass = '!$a2-b2}^Kf.!Gj0';

// Posibles nombres de base de datos
$possible_db_names = [
    'u494150416_LilLT',  // Base de datos actual
];

// Hosts a probar
$hosts = [
    'localhost',
    '127.0.0.1',
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico Completo de Conexión</title>
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
            max-width: 900px;
            margin: 0 auto;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #495057;
            margin-bottom: 15px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }
        
        .test-result {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid;
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
        
        .warning {
            background-color: #fff3cd;
            border-color: #ffc107;
            color: #856404;
        }
        
        .info {
            background-color: #d1ecf1;
            border-color: #17a2b8;
            color: #0c5460;
        }
        
        code {
            background-color: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        
        .test-item {
            margin: 10px 0;
        }
        
        .credentials-box {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #dee2e6;
        }
        
        .credentials-box strong {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Diagnóstico Completo de Conexión</h1>
        <p class="subtitle">Probando todas las combinaciones posibles para encontrar la configuración correcta</p>
        
        <div class="credentials-box">
            <strong>Credenciales que se están probando:</strong>
            <div>Usuario: <code><?php echo htmlspecialchars($db_user); ?></code></div>
            <div>Contraseña: <code>******</code> (oculta por seguridad)</div>
        </div>
        
        <?php
        $connectionFound = false;
        $workingConfig = null;
        
        // PASO 1: Probar conexión sin base de datos (solo para verificar credenciales de usuario)
        echo '<div class="section">';
        echo '<div class="section-title">Paso 1: Verificar credenciales del usuario (sin base de datos)</div>';
        
        foreach ($hosts as $host) {
            echo '<div class="test-item">';
            echo '<strong>Probando usuario con host: <code>' . htmlspecialchars($host) . '</code></strong>';
            
            try {
                // Intentar conectar sin especificar base de datos
                $conn = new mysqli($host, $db_user, $db_pass);
                
                if ($conn->connect_error) {
                    echo '<div class="test-result error">';
                    echo '<strong>❌ Error de autenticación</strong><br>';
                    echo 'Mensaje: ' . htmlspecialchars($conn->connect_error);
                    echo '<br><br><strong>⚠️ Esto significa que:</strong><br>';
                    echo '• El usuario o la contraseña son incorrectos<br>';
                    echo '• El usuario no existe<br>';
                    echo '• El usuario no tiene permisos para conectarse desde este host';
                    echo '</div>';
                    if ($conn) {
                        $conn->close();
                    }
                } else {
                    echo '<div class="test-result success">';
                    echo '<strong>✅ Credenciales de usuario correctas</strong><br>';
                    echo 'El usuario y contraseña son válidos. Ahora probaremos las bases de datos...';
                    echo '</div>';
                    $conn->close();
                }
            } catch (mysqli_sql_exception $e) {
                echo '<div class="test-result error">';
                echo '<strong>❌ Error de autenticación (Excepción)</strong><br>';
                echo 'Mensaje: ' . htmlspecialchars($e->getMessage());
                echo '</div>';
            }
            
            echo '</div>';
        }
        echo '</div>';
        
        // PASO 2: Probar cada combinación de host y base de datos
        echo '<div class="section">';
        echo '<div class="section-title">Paso 2: Probar conexión completa (con base de datos)</div>';
        
        foreach ($hosts as $host) {
            foreach ($possible_db_names as $db_name) {
                echo '<div class="test-item">';
                echo '<strong>Host: <code>' . htmlspecialchars($host) . '</code> | Base de datos: <code>' . htmlspecialchars($db_name) . '</code></strong>';
                
                try {
                    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
                    
                    if ($conn->connect_error) {
                        echo '<div class="test-result error">';
                        echo '<strong>❌ Error de conexión</strong><br>';
                        echo 'Mensaje: ' . htmlspecialchars($conn->connect_error);
                        
                        // Mensajes específicos según el tipo de error
                        if (strpos($conn->connect_error, 'Access denied') !== false) {
                            echo '<br><br><strong>💡 Posibles soluciones:</strong><br>';
                            echo '• Verifica que el usuario tenga permisos sobre esta base de datos<br>';
                            echo '• Verifica que el nombre de la base de datos sea correcto<br>';
                            echo '• En el panel de Hostinger, asegúrate de que el usuario esté asignado a esta base de datos';
                        } elseif (strpos($conn->connect_error, "Unknown database") !== false) {
                            echo '<br><br><strong>💡 El nombre de la base de datos es incorrecto</strong>';
                        }
                        
                        echo '</div>';
                        if ($conn) {
                            $conn->close();
                        }
                    } else {
                        echo '<div class="test-result success">';
                        echo '<strong>✅ ¡CONEXIÓN EXITOSA!</strong><br>';
                        echo 'Host: <code>' . htmlspecialchars($host) . '</code><br>';
                        echo 'Base de datos: <code>' . htmlspecialchars($db_name) . '</code><br>';
                        echo 'Versión MySQL: ' . htmlspecialchars($conn->server_info) . '<br>';
                        echo 'Charset: ' . htmlspecialchars($conn->character_set_name());
                        
                        // Probar una consulta
                        $result = $conn->query("SHOW TABLES");
                        if ($result) {
                            echo '<br>Tablas encontradas: ' . $result->num_rows;
                        }
                        
                        // Probar consulta de información
                        $info_result = $conn->query("SELECT DATABASE() as db_name, VERSION() as version");
                        if ($info_result && $info_result->num_rows > 0) {
                            $info = $info_result->fetch_assoc();
                            echo '<br>Base de datos actual: ' . htmlspecialchars($info['db_name']);
                        }
                        
                        echo '</div>';
                        
                        $connectionFound = true;
                        $workingConfig = [
                            'host' => $host,
                            'db_name' => $db_name
                        ];
                        
                        $conn->close();
                        
                        // Mostrar configuración recomendada
                        echo '<div class="test-result info">';
                        echo '<strong>💡 Configuración recomendada para config.php:</strong><br>';
                        echo '<pre style="background: #fff; padding: 10px; border-radius: 5px; margin-top: 10px;">';
                        echo "define('DB_HOST', '" . htmlspecialchars($host) . "');\n";
                        echo "define('DB_USER', '" . htmlspecialchars($db_user) . "');\n";
                        echo "define('DB_PASS', '!$a2-b2}^Kf.!Gj0');\n";
                        echo "define('DB_NAME', '" . htmlspecialchars($db_name) . "');";
                        echo '</pre>';
                        echo '</div>';
                        
                        break 2; // Salir de ambos bucles
                    }
                } catch (mysqli_sql_exception $e) {
                    echo '<div class="test-result error">';
                    echo '<strong>❌ Error de conexión (Excepción)</strong><br>';
                    echo 'Mensaje: ' . htmlspecialchars($e->getMessage());
                    echo '</div>';
                }
                
                echo '</div>';
            }
        }
        echo '</div>';
        
        // Resumen final
        if (!$connectionFound) {
            echo '<div class="section">';
            echo '<div class="section-title">❌ Resumen: No se encontró ninguna conexión exitosa</div>';
            echo '<div class="test-result warning">';
            echo '<strong>⚠️ Acciones recomendadas:</strong><br><br>';
            echo '<ol style="margin-left: 20px; line-height: 1.8;">';
            echo '<li><strong>Verifica en el panel de Hostinger:</strong><br>';
            echo '   • Ve a "Bases de datos MySQL"<br>';
            echo '   • Confirma el nombre exacto del usuario: <code>' . htmlspecialchars($db_user) . '</code><br>';
            echo '   • Confirma el nombre exacto de la base de datos<br>';
            echo '   • Verifica que el usuario esté asignado a la base de datos<br>';
            echo '   • Verifica que la contraseña sea correcta</li>';
            echo '<li><strong>Revisa los permisos:</strong><br>';
            echo '   • El usuario debe tener permisos SELECT, INSERT, UPDATE, DELETE<br>';
            echo '   • En Hostinger, asegúrate de que el usuario tenga acceso a la base de datos</li>';
            echo '<li><strong>Verifica el nombre de la base de datos:</strong><br>';
            echo '   • Puede haber un error de tipeo<br>';
            echo '   • El nombre debe ser exactamente como aparece en el panel</li>';
            echo '</ol>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="section">';
            echo '<div class="section-title">✅ Resumen: Configuración encontrada</div>';
            echo '<div class="test-result success">';
            echo '<strong>¡Perfecto! La conexión funciona con la siguiente configuración:</strong><br><br>';
            echo 'Host: <code>' . htmlspecialchars($workingConfig['host']) . '</code><br>';
            echo 'Base de datos: <code>' . htmlspecialchars($workingConfig['db_name']) . '</code><br>';
            echo 'Usuario: <code>' . htmlspecialchars($db_user) . '</code><br><br>';
            echo '<strong>Actualiza tu archivo config.php con estos valores.</strong>';
            echo '</div>';
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

