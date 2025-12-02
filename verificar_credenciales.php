<?php
/**
 * Script para ayudar a verificar y corregir las credenciales de la base de datos
 * Muestra instrucciones detalladas para verificar en el panel de Hostinger
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Credenciales - Hostinger</title>
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
        
        .warning-box {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            color: #856404;
        }
        
        .warning-box strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        
        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #495057;
            margin-bottom: 15px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }
        
        .step {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }
        
        .step-number {
            display: inline-block;
            background-color: #667eea;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .step-title {
            font-weight: bold;
            font-size: 16px;
            color: #495057;
            margin-bottom: 10px;
        }
        
        .step-content {
            color: #666;
            line-height: 1.8;
            margin-left: 40px;
        }
        
        .step-content ul {
            margin-left: 20px;
            margin-top: 10px;
        }
        
        .step-content li {
            margin-bottom: 8px;
        }
        
        code {
            background-color: #e9ecef;
            padding: 3px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            color: #d63384;
        }
        
        .info-box {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
        
        .test-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            font-size: 14px;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn {
            padding: 12px 30px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        
        .btn:hover {
            background-color: #5568d3;
        }
        
        .credentials-display {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            font-family: 'Courier New', monospace;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Verificar Credenciales de Base de Datos</h1>
        
        <div class="warning-box">
            <strong>⚠️ Problema Detectado</strong>
            <p>El error "Access denied" indica que las credenciales proporcionadas no son correctas o el usuario no tiene los permisos necesarios. Sigue estos pasos para verificar y corregir las credenciales en el panel de Hostinger.</p>
        </div>
        
        <div class="section">
            <div class="section-title">📋 Pasos para Verificar en el Panel de Hostinger</div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">1</span>
                    Acceder al Panel de Hostinger
                </div>
                <div class="step-content">
                    <ul>
                        <li>Inicia sesión en tu cuenta de Hostinger</li>
                        <li>Ve al panel de control (hPanel)</li>
                        <li>Busca la sección "Bases de datos" o "MySQL Databases"</li>
                    </ul>
                </div>
            </div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">2</span>
                    Verificar el Usuario de la Base de Datos
                </div>
                <div class="step-content">
                    <ul>
                        <li>En la sección "Usuarios de MySQL", busca el usuario: <code>u494150416_ZLlua</code></li>
                        <li><strong>IMPORTANTE:</strong> Copia el nombre EXACTO del usuario (puede tener prefijos diferentes)</li>
                        <li>Verifica que el usuario exista y esté activo</li>
                    </ul>
                    <div class="info-box">
                        <strong>💡 Nota:</strong> En Hostinger, los nombres de usuario suelen tener el formato completo como aparece en el panel. Asegúrate de copiarlo exactamente.
                    </div>
                </div>
            </div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">3</span>
                    Verificar la Contraseña
                </div>
                <div class="step-content">
                    <ul>
                        <li>Haz clic en el usuario de la base de datos</li>
                        <li>Busca la opción "Cambiar contraseña" o "Reset Password"</li>
                        <li><strong>Si no estás seguro de la contraseña:</strong> Cámbiala por una nueva</li>
                        <li>Guarda la nueva contraseña en un lugar seguro</li>
                    </ul>
                    <div class="info-box">
                        <strong>⚠️ Importante:</strong> Si cambias la contraseña, deberás actualizarla también en el archivo <code>config.php</code>
                    </div>
                </div>
            </div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">4</span>
                    Verificar el Nombre de la Base de Datos
                </div>
                <div class="step-content">
                    <ul>
                        <li>En la sección "Bases de datos MySQL", busca la base de datos</li>
                        <li>Verifica el nombre exacto: <code>u494150416_LilLT</code></li>
                        <li>Copia el nombre EXACTO tal como aparece</li>
                    </ul>
                </div>
            </div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">5</span>
                    Verificar la Asignación Usuario-Base de Datos
                </div>
                <div class="step-content">
                    <ul>
                        <li>En la sección de bases de datos, busca la opción "Usuarios asignados" o "Assigned Users"</li>
                        <li>Verifica que el usuario <code>u494150416_ZLlua</code> esté asignado a la base de datos</li>
                        <li>Si no está asignado, haz clic en "Agregar usuario" o "Assign User"</li>
                        <li>Asegúrate de que el usuario tenga todos los permisos (SELECT, INSERT, UPDATE, DELETE, etc.)</li>
                    </ul>
                    <div class="info-box">
                        <strong>🔑 Permisos necesarios:</strong> SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, INDEX, DROP (o "Todos los privilegios")
                    </div>
                </div>
            </div>
            
            <div class="step">
                <div class="step-title">
                    <span class="step-number">6</span>
                    Verificar el Host de Conexión
                </div>
                <div class="step-content">
                    <ul>
                        <li>En Hostinger, cuando ejecutas PHP desde el mismo servidor, usa: <code>127.0.0.1</code></li>
                        <li>La IP externa solo se usa para conexiones remotas</li>
                        <li>Para scripts PHP en el mismo servidor, usa <code>127.0.0.1</code> con el puerto <code>3306</code></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-title">🧪 Probar Nuevas Credenciales</div>
            <div class="test-form">
                <p style="margin-bottom: 20px; color: #666;">
                    Si has verificado o cambiado las credenciales en Hostinger, ingrésalas aquí para probar la conexión:
                </p>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="db_host">Host:</label>
                        <input type="text" id="db_host" name="db_host" value="127.0.0.1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="db_user">Usuario:</label>
                        <input type="text" id="db_user" name="db_user" value="u494150416_ZLlua" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="db_pass">Contraseña:</label>
                        <input type="password" id="db_pass" name="db_pass" placeholder="Ingresa la contraseña" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="db_name">Base de Datos:</label>
                        <input type="text" id="db_name" name="db_name" value="u494150416_LilLT" required>
                    </div>
                    
                    <button type="submit" class="btn">🔍 Probar Conexión</button>
                </form>
                
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $test_host = $_POST['db_host'] ?? 'localhost';
                    $test_user = $_POST['db_user'] ?? '';
                    $test_pass = $_POST['db_pass'] ?? '';
                    $test_db = $_POST['db_name'] ?? '';
                    
                    echo '<div style="margin-top: 20px;">';
                    echo '<div class="section-title">Resultado de la Prueba</div>';
                    
                    try {
                        $conn = new mysqli($test_host, $test_user, $test_pass, $test_db);
                        
                        if ($conn->connect_error) {
                            echo '<div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; border-left: 4px solid #dc3545;">';
                            echo '<strong>❌ Error de conexión</strong><br>';
                            echo 'Mensaje: ' . htmlspecialchars($conn->connect_error);
                            echo '</div>';
                            if ($conn) {
                                $conn->close();
                            }
                        } else {
                            echo '<div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; border-left: 4px solid #28a745;">';
                            echo '<strong>✅ ¡Conexión exitosa!</strong><br><br>';
                            echo 'Las credenciales son correctas. Usa esta configuración en tu archivo <code>config.php</code>:';
                            echo '<div class="credentials-display">';
                            echo "define('DB_HOST', '" . htmlspecialchars($test_host) . "');<br>";
                            echo "define('DB_USER', '" . htmlspecialchars($test_user) . "');<br>";
                            echo "define('DB_PASS', '" . htmlspecialchars($test_pass) . "');<br>";
                            echo "define('DB_NAME', '" . htmlspecialchars($test_db) . "');";
                            echo '</div>';
                            echo '</div>';
                            
                            // Mostrar información adicional
                            echo '<div style="background-color: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 8px; margin-top: 15px; border-left: 4px solid #17a2b8;">';
                            echo '<strong>📊 Información de la conexión:</strong><br>';
                            echo 'Versión MySQL: ' . htmlspecialchars($conn->server_info) . '<br>';
                            echo 'Charset: ' . htmlspecialchars($conn->character_set_name());
                            
                            // Probar consulta
                            $result = $conn->query("SHOW TABLES");
                            if ($result) {
                                echo '<br>Tablas encontradas: ' . $result->num_rows;
                            }
                            
                            echo '</div>';
                            
                            $conn->close();
                        }
                    } catch (mysqli_sql_exception $e) {
                        echo '<div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; border-left: 4px solid #dc3545;">';
                        echo '<strong>❌ Error de conexión (Excepción)</strong><br>';
                        echo 'Mensaje: ' . htmlspecialchars($e->getMessage());
                        echo '<br><br><strong>Posibles causas:</strong><br>';
                        echo '• La contraseña es incorrecta<br>';
                        echo '• El usuario no existe o no tiene permisos<br>';
                        echo '• El nombre de la base de datos es incorrecto<br>';
                        echo '• El usuario no está asignado a esta base de datos';
                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        
        <div class="section">
            <div class="section-title">📝 Checklist de Verificación</div>
            <div style="background-color: #fff; padding: 20px; border-radius: 8px;">
                <p style="margin-bottom: 15px;">Marca cada punto cuando lo hayas verificado:</p>
                <ul style="line-height: 2.5; margin-left: 20px;">
                    <li>☐ He accedido al panel de Hostinger</li>
                    <li>☐ He verificado el nombre exacto del usuario de MySQL</li>
                    <li>☐ He verificado o cambiado la contraseña del usuario</li>
                    <li>☐ He verificado el nombre exacto de la base de datos</li>
                    <li>☐ He verificado que el usuario esté asignado a la base de datos</li>
                    <li>☐ He verificado que el usuario tenga todos los permisos necesarios</li>
                    <li>☐ He probado la conexión con las nuevas credenciales</li>
                    <li>☐ He actualizado el archivo <code>config.php</code> con las credenciales correctas</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>

