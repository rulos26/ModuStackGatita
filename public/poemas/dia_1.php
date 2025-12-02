<?php
/**
 * Poema del Día 1 - Para Ti, Vivi ❤️
 * Página romántica con poema y propuesta especial
 */

// Configurar headers
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Día 1 - Para Ti, Vivi ❤️</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --rojo-profundo: #8b1538;
            --rojo-suave: #c44569;
            --rosado-claro: #f8b5c2;
            --rosado-medio: #f4a5b8;
            --morado-profundo: #6c5ce7;
            --morado-suave: #a29bfe;
            --morado-claro: #ddd6fe;
            --blanco: #ffffff;
            --sombra-suave: rgba(139, 21, 56, 0.2);
        }
        
        body {
            font-family: 'Lato', sans-serif;
            background: linear-gradient(135deg, var(--morado-profundo) 0%, var(--rojo-profundo) 50%, var(--morado-suave) 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Corazones flotantes de fondo */
        body::before {
            content: '💕';
            position: fixed;
            font-size: 30px;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
            top: 10%;
            left: 10%;
        }
        
        body::after {
            content: '💖';
            position: fixed;
            font-size: 25px;
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
            top: 80%;
            right: 15%;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            box-shadow: 0 20px 60px var(--sombra-suave);
            padding: 50px 40px;
            max-width: 800px;
            width: 100%;
            position: relative;
            z-index: 1;
            border: 2px solid var(--rosado-claro);
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--morado-claro);
        }
        
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--rojo-profundo);
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(139, 21, 56, 0.1);
        }
        
        .header .date {
            color: var(--morado-profundo);
            font-style: italic;
            font-size: 1.1rem;
        }
        
        .poem-content {
            line-height: 2.2;
            font-size: 1.2rem;
            color: #333;
            text-align: center;
            padding: 30px 0;
            font-weight: 300;
        }
        
        .poem-content p {
            margin-bottom: 25px;
            padding: 0 20px;
        }
        
        .poem-content .verse {
            font-size: 1.3rem;
            color: var(--rojo-profundo);
            font-weight: 400;
            margin: 20px 0;
        }
        
        .poem-content .signature {
            margin-top: 30px;
            font-style: italic;
            color: var(--morado-profundo);
            font-size: 1.1rem;
        }
        
        .heart-icon {
            font-size: 2rem;
            margin: 20px 0;
            animation: heartbeat 1.5s infinite;
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1); }
            75% { transform: scale(1.05); }
        }
        
        .button-container {
            text-align: center;
            margin-top: 40px;
        }
        
        .romantic-button {
            background: linear-gradient(135deg, var(--rojo-profundo) 0%, var(--morado-profundo) 100%);
            color: var(--blanco);
            border: none;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(139, 21, 56, 0.3);
            font-family: 'Lato', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .romantic-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(139, 21, 56, 0.4);
            background: linear-gradient(135deg, var(--rojo-suave) 0%, var(--morado-suave) 100%);
        }
        
        .romantic-button:active {
            transform: translateY(-1px);
        }
        
        .romantic-button:disabled {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            cursor: not-allowed;
            opacity: 0.6;
            transform: none;
        }
        
        .romantic-button:disabled:hover {
            transform: none;
            box-shadow: 0 8px 20px rgba(139, 21, 56, 0.3);
        }
        
        .respuesta-info {
            display: none;
            padding: 15px;
            background: linear-gradient(135deg, var(--rosado-claro) 0%, var(--morado-claro) 100%);
            border-radius: 15px;
            margin-top: 20px;
            color: var(--rojo-profundo);
            font-weight: 500;
            text-align: center;
        }
        
        .respuesta-info.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .back-link {
            display: inline-block;
            text-align: center;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: var(--rosado-medio);
            color: var(--rojo-profundo);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .back-link:hover {
            background-color: var(--rosado-claro);
            transform: translateY(-2px);
        }
        
        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(139, 21, 56, 0.8);
            backdrop-filter: blur(5px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }
        
        .modal-overlay.show {
            display: flex;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .modal-content {
            background: linear-gradient(135deg, var(--blanco) 0%, var(--morado-claro) 100%);
            border-radius: 25px;
            padding: 50px 40px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 3px solid var(--rosado-claro);
            animation: slideUp 0.4s ease;
            position: relative;
        }
        
        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .modal-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--rojo-profundo);
            margin-bottom: 30px;
        }
        
        .modal-content .question {
            font-size: 1.5rem;
            color: var(--morado-profundo);
            margin-bottom: 40px;
            font-weight: 600;
        }
        
        .response-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }
        
        .response-btn {
            padding: 15px 30px;
            font-size: 1.1rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-family: 'Lato', sans-serif;
        }
        
        .response-btn.yes {
            background: linear-gradient(135deg, var(--rojo-profundo) 0%, var(--rojo-suave) 100%);
            color: var(--blanco);
        }
        
        .response-btn.yes:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(139, 21, 56, 0.4);
        }
        
        .response-btn.no {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: var(--blanco);
        }
        
        .response-btn.no:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(127, 140, 141, 0.4);
        }
        
        .response-btn.maybe {
            background: linear-gradient(135deg, var(--morado-profundo) 0%, var(--morado-suave) 100%);
            color: var(--blanco);
        }
        
        .response-btn.maybe:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.4);
        }
        
        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--rojo-profundo);
            transition: transform 0.3s ease;
        }
        
        .close-modal:hover {
            transform: rotate(90deg);
        }
        
        .success-message {
            display: none;
            padding: 20px;
            background: linear-gradient(135deg, var(--rosado-claro) 0%, var(--morado-claro) 100%);
            border-radius: 15px;
            margin-top: 20px;
            color: var(--rojo-profundo);
            font-weight: 600;
            line-height: 1.6;
            text-align: center;
        }
        
        .success-message.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .success-message.yes {
            background: linear-gradient(135deg, #ffd6e8 0%, #ffb3d9 100%);
            color: var(--rojo-profundo);
        }
        
        .success-message.maybe {
            background: linear-gradient(135deg, var(--morado-claro) 0%, #e6d5ff 100%);
            color: var(--morado-profundo);
        }
        
        .success-message.no {
            background: linear-gradient(135deg, #ffe6e6 0%, #ffcccc 100%);
            color: var(--rojo-profundo);
        }
        
        .respuesta-info.yes {
            background: linear-gradient(135deg, #ffd6e8 0%, #ffb3d9 100%);
        }
        
        .respuesta-info.maybe {
            background: linear-gradient(135deg, var(--morado-claro) 0%, #e6d5ff 100%);
        }
        
        .respuesta-info.no {
            background: linear-gradient(135deg, #ffe6e6 0%, #ffcccc 100%);
        }
        
        /* Responsive Design - Tablets */
        @media (max-width: 1024px) {
            .container {
                padding: 40px 30px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .poem-content {
                font-size: 1.1rem;
            }
        }
        
        /* Responsive Design - Móviles */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 30px 20px;
                border-radius: 20px;
            }
            
            .header {
                margin-bottom: 30px;
                padding-bottom: 15px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .header .date {
                font-size: 0.95rem;
            }
            
            .poem-content {
                font-size: 1rem;
                padding: 20px 0;
                line-height: 1.8;
            }
            
            .poem-content p {
                margin-bottom: 20px;
                padding: 0 10px;
            }
            
            .poem-content .verse {
                font-size: 1.1rem;
            }
            
            .poem-content .signature {
                font-size: 0.95rem;
            }
            
            .heart-icon {
                font-size: 1.5rem;
            }
            
            .romantic-button {
                padding: 15px 30px;
                font-size: 1rem;
                width: 100%;
                max-width: 300px;
            }
            
            .modal-content {
                padding: 30px 20px;
                width: 95%;
                max-width: 400px;
            }
            
            .modal-content h2 {
                font-size: 1.5rem;
            }
            
            .modal-content .question {
                font-size: 1.2rem;
            }
            
            .response-btn {
                padding: 12px 25px;
                font-size: 1rem;
            }
            
            .back-link {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
        
        /* Responsive Design - Móviles pequeños */
        @media (max-width: 480px) {
            .container {
                padding: 25px 15px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .poem-content {
                font-size: 0.9rem;
            }
            
            .poem-content .verse {
                font-size: 1rem;
            }
            
            .romantic-button {
                padding: 12px 25px;
                font-size: 0.9rem;
            }
            
            .modal-content {
                padding: 25px 15px;
            }
            
            .modal-content h2 {
                font-size: 1.3rem;
            }
            
            .modal-content .question {
                font-size: 1.1rem;
            }
        }
        
        /* Responsive Design - Orientación landscape en móviles */
        @media (max-width: 768px) and (orientation: landscape) {
            body {
                padding: 10px;
            }
            
            .container {
                padding: 20px;
            }
            
            .poem-content {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💜 Día 1 💜</h1>
            <p class="date"><?php echo date('d de F, Y'); ?></p>
        </div>
        
        <div class="poem-content">
            <div class="heart-icon">💖</div>
            
            <p class="verse">
                En este primer día, Vivi,<br>
                quiero que sepas algo hermoso:
            </p>
            
            <p>
                Desde que llegaste a mi vida,<br>
                cada amanecer tiene más sentido,<br>
                cada atardecer es más hermoso,<br>
                y cada noche sueño contigo.
            </p>
            
            <p>
                Tu risa es la melodía<br>
                que llena de música mi corazón,<br>
                tu mirada es el faro<br>
                que guía mis días con pasión.
            </p>
            
            <p class="verse">
                Eres especial, única, perfecta,<br>
                y quiero que lo sepas siempre.
            </p>
            
            <p>
                Porque contigo, mi amor,<br>
                cada momento es un regalo,<br>
                cada instante es un tesoro,<br>
                y cada día es una nueva oportunidad<br>
                de demostrarte cuánto te amo.
            </p>
            
            <p class="signature">
                Con todo mi amor y cariño,<br>
                tu gatito que te adora ❤️
            </p>
        </div>
        
        <div class="button-container">
            <button class="romantic-button" id="openModalBtn">
                Quiero preguntarte algo…
            </button>
        </div>
        
        <div class="respuesta-info" id="respuestaInfo">
            <div id="respuestaTexto"></div>
        </div>
        
        <div style="text-align: center;">
            <a href="../index.html" class="back-link">← Volver al inicio</a>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-content">
            <button class="close-modal" id="closeModalBtn">&times;</button>
            <h2>💕 Para Ti, Vivi 💕</h2>
            <p class="question">¿Quieres ser mi novia?</p>
            
            <div class="response-buttons">
                <button class="response-btn yes" data-response="Sí">Sí ❤️</button>
                <button class="response-btn no" data-response="No">No</button>
                <button class="response-btn maybe" data-response="Lo voy a pensar">Lo voy a pensar 💭</button>
            </div>
            
            <div class="success-message" id="successMessage">
                ¡Gracias por tu respuesta! ❤️
            </div>
        </div>
    </div>
    
    <script>
        const ARCHIVO_ACTUAL = 'dia_1';
        const openModalBtn = document.getElementById('openModalBtn');
        const respuestaInfo = document.getElementById('respuestaInfo');
        const respuestaTexto = document.getElementById('respuestaTexto');
        
        // Función para obtener el mensaje según la respuesta
        function obtenerMensajeRespuesta(respuesta) {
            const mensajes = {
                'Sí': '¡Eres mi todo, Vivi! ❤️<br>No puedo expresar la felicidad que siento en este momento. Prometo hacerte sonreír cada día, estar a tu lado siempre y amarte con todo mi corazón. ¡Gracias por decir que sí, mi amor! 💕',
                'Lo voy a pensar': 'Entiendo perfectamente, Vivi 💜<br>Estaré aquí esperando, con paciencia y cariño. Cada día que pase será una oportunidad para demostrarte lo que siento por ti. No hay prisa, solo quiero que sepas que estaré aquí cuando quieras hablar. Te adoro 💖',
                'No': 'No me rendiré, Vivi 💪❤️<br>Entiendo tu respuesta, pero quiero que sepas que no voy a darme por vencido. Cada día trabajaré para demostrarte lo especial que eres para mí. Confío en que con el tiempo, ese "no" se convertirá en un "sí" lleno de amor. Te seguiré esperando con todo mi corazón 💕'
            };
            return mensajes[respuesta] || 'Gracias por tu respuesta ❤️';
        }
        
        // Función para obtener el texto corto según la respuesta
        function obtenerTextoRespuesta(respuesta) {
            const textos = {
                'Sí': 'Sí ❤️',
                'Lo voy a pensar': 'Lo voy a pensar 💭',
                'No': 'No'
            };
            return textos[respuesta] || respuesta;
        }
        
        // Verificar si ya existe una respuesta al cargar la página
        function verificarRespuesta() {
            fetch(`verificar_respuesta.php?archivo=${ARCHIVO_ACTUAL}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.tiene_respuesta) {
                        // Desactivar el botón
                        openModalBtn.disabled = true;
                        openModalBtn.textContent = 'Ya respondiste ❤️';
                        
                        // Mostrar información de la respuesta con mensaje personalizado
                        const mensajeCompleto = obtenerMensajeRespuesta(data.respuesta);
                        respuestaTexto.innerHTML = mensajeCompleto;
                        respuestaInfo.classList.add('show');
                        respuestaInfo.classList.add(data.respuesta === 'Sí' ? 'yes' : data.respuesta === 'Lo voy a pensar' ? 'maybe' : 'no');
                    }
                })
                .catch(error => {
                    console.error('Error al verificar respuesta:', error);
                });
        }
        
        // Verificar respuesta al cargar la página
        verificarRespuesta();
        
        // Abrir modal
        openModalBtn.addEventListener('click', function() {
            if (!this.disabled) {
                document.getElementById('modalOverlay').classList.add('show');
            }
        });
        
        // Cerrar modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modalOverlay').classList.remove('show');
        });
        
        // Cerrar modal al hacer clic fuera
        document.getElementById('modalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
        
        // Manejar respuestas
        document.querySelectorAll('.response-btn').forEach(button => {
            button.addEventListener('click', function() {
                const respuesta = this.getAttribute('data-response');
                const successMessage = document.getElementById('successMessage');
                
                // Enviar respuesta al servidor
                fetch('guardar_respuesta.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'archivo=' + encodeURIComponent(ARCHIVO_ACTUAL) + '&respuesta=' + encodeURIComponent(respuesta)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Obtener mensaje personalizado según la respuesta
                        const mensajePersonalizado = obtenerMensajeRespuesta(respuesta);
                        successMessage.innerHTML = mensajePersonalizado;
                        
                        // Agregar clase según el tipo de respuesta
                        successMessage.className = 'success-message show';
                        if (respuesta === 'Sí') {
                            successMessage.classList.add('yes');
                        } else if (respuesta === 'Lo voy a pensar') {
                            successMessage.classList.add('maybe');
                        } else if (respuesta === 'No') {
                            successMessage.classList.add('no');
                        }
                        
                        successMessage.classList.add('show');
                        
                        // Ocultar botones de respuesta
                        document.querySelectorAll('.response-btn').forEach(btn => {
                            btn.style.display = 'none';
                        });
                        
                        // Desactivar el botón principal
                        openModalBtn.disabled = true;
                        openModalBtn.textContent = 'Ya respondiste ❤️';
                        
                        // Mostrar información de la respuesta con mensaje completo
                        respuestaTexto.innerHTML = mensajePersonalizado;
                        respuestaInfo.classList.add('show');
                        respuestaInfo.classList.add(respuesta === 'Sí' ? 'yes' : respuesta === 'Lo voy a pensar' ? 'maybe' : 'no');
                        
                        // Cerrar modal después de 5 segundos (más tiempo para leer el mensaje)
                        setTimeout(() => {
                            document.getElementById('modalOverlay').classList.remove('show');
                            successMessage.classList.remove('show');
                            // Restaurar botones
                            document.querySelectorAll('.response-btn').forEach(btn => {
                                btn.style.display = 'block';
                            });
                        }, 5000);
                    } else {
                        alert('Hubo un error al guardar tu respuesta. Por favor, intenta de nuevo.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al guardar tu respuesta. Por favor, intenta de nuevo.');
                });
            });
        });
    </script>
</body>
</html>
