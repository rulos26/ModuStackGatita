// ============================================
// CONFIGURACIÓN Y VARIABLES GLOBALES
// ============================================
let soundEnabled = false;
let confettiActive = false;

// ============================================
// INICIALIZACIÓN
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
    setupEventListeners();
    setLetterDate();
});

function initializeApp() {
    // Inicializar canvas de confetti
    initConfettiCanvas();
    
    // Crear partículas flotantes
    createFloatingParticles();
    
    // Cargar sección de pasión dinámicamente
    loadPassionSection();
}

function setupEventListeners() {
    // Control de sonido
    const soundToggle = document.getElementById('soundToggle');
    if (soundToggle) {
        soundToggle.addEventListener('click', toggleSound);
    }
    
    // Botón de abrir carta
    const letterOpenBtn = document.getElementById('letterOpenBtn');
    if (letterOpenBtn) {
        letterOpenBtn.addEventListener('click', openLetter);
    }
    
    // Botón de propuesta
    const proposalBtn = document.getElementById('proposalBtn');
    if (proposalBtn) {
        proposalBtn.addEventListener('click', showProposalModal);
    }
    
    // Botones de respuesta
    const responseButtons = document.querySelectorAll('.response-btn');
    responseButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            handleResponse(this.dataset.response);
        });
    });
    
    // Cerrar modal al hacer clic fuera
    const modalOverlay = document.getElementById('modalOverlay');
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }
    
    // Animaciones al hacer scroll
    setupScrollAnimations();
}

// ============================================
// FUNCIONES DE NAVEGACIÓN
// ============================================
function scrollToContent() {
    const momentsSection = document.getElementById('moments');
    if (momentsSection) {
        momentsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// ============================================
// CONTROL DE SONIDO
// ============================================
function toggleSound() {
    soundEnabled = !soundEnabled;
    const soundIcon = document.getElementById('soundIcon');
    const romanticSound = document.getElementById('romanticSound');
    
    if (soundIcon) {
        soundIcon.textContent = soundEnabled ? '🔊' : '🔇';
    }
    
    if (romanticSound) {
        if (soundEnabled) {
            romanticSound.volume = 0.3;
            romanticSound.play().catch(e => {
                console.log('No se pudo reproducir el sonido:', e);
            });
        } else {
            romanticSound.pause();
        }
    }
}

// ============================================
// FUNCIONES DE LA CARTA
// ============================================
function setLetterDate() {
    const letterDate = document.getElementById('letterDate');
    if (letterDate) {
        const today = new Date();
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        letterDate.textContent = today.toLocaleDateString('es-ES', options);
    }
}

function openLetter() {
    const letterContent = document.getElementById('letterContent');
    const letterOpenBtn = document.getElementById('letterOpenBtn');
    
    if (letterContent && !letterContent.classList.contains('open')) {
        letterContent.classList.add('open');
        letterOpenBtn.style.display = 'none';
        
        // Reproducir sonido suave
        if (soundEnabled) {
            playSoftSound();
        }
        
        // Animación de partículas suaves
        createLetterParticles();
    }
}

// ============================================
// FUNCIONES DE PROPUESTA Y RESPUESTA
// ============================================
function showProposalModal() {
    const modalOverlay = document.getElementById('modalOverlay');
    if (modalOverlay) {
        modalOverlay.classList.add('show');
        
        // Reproducir sonido
        if (soundEnabled) {
            playSoftSound();
        }
        
        // Animación de entrada
        animateModalEntry();
    }
}

function closeModal() {
    const modalOverlay = document.getElementById('modalOverlay');
    if (modalOverlay) {
        modalOverlay.classList.remove('show');
    }
}

function handleResponse(response) {
    closeModal();
    
    const finalMessage = document.getElementById('finalMessage');
    const finalTitle = document.getElementById('finalTitle');
    const finalText = document.getElementById('finalText');
    
    if (!finalMessage || !finalTitle || !finalText) return;
    
    if (response === 'yes') {
        // Respuesta positiva
        finalTitle.textContent = '¡Eres Mi Todo, Vivi! ❤️';
        finalText.textContent = 'Mi amor, mi cariño, mi vida, mi luz, mi gatita... No puedo expresar la felicidad que siento en este momento. Prometo hacerte sonreír cada día, estar a tu lado en los buenos y malos momentos, y amarte con todo mi corazón. ¡Gracias por decir que sí, Vivi!';
        
        // Confetti masivo
        triggerConfetti();
        
        // Sonido especial
        if (soundEnabled) {
            playCelebrationSound();
        }
        
        // Animación de corazones
        createHeartExplosion();
        
    } else if (response === 'maybe') {
        // Respuesta de "lo hablamos después"
        finalTitle.textContent = 'Entiendo Perfectamente, Vivi 💭';
        finalText.textContent = 'Mi amor, respeto tu decisión y el tiempo que necesites. Estaré aquí cuando quieras hablar. Lo importante es que sepas lo que siento por ti, mi cariño, mi vida, mi luz, mi gatita.';
    }
    
    // Mostrar mensaje final
    setTimeout(() => {
        finalMessage.classList.add('show');
    }, 500);
}

function closeFinalMessage() {
    const finalMessage = document.getElementById('finalMessage');
    if (finalMessage) {
        finalMessage.classList.remove('show');
    }
}

// ============================================
// ANIMACIONES Y EFECTOS VISUALES
// ============================================
function initConfettiCanvas() {
    const canvas = document.getElementById('confettiCanvas');
    if (!canvas) return;
    
    // Función para actualizar tamaño del canvas
    function updateCanvasSize() {
        const dpr = window.devicePixelRatio || 1;
        const rect = canvas.getBoundingClientRect();
        
        // Ajustar para alta densidad de píxeles
        canvas.width = rect.width * dpr;
        canvas.height = rect.height * dpr;
        
        const ctx = canvas.getContext('2d');
        ctx.scale(dpr, dpr);
        
        // Ajustar tamaño CSS
        canvas.style.width = rect.width + 'px';
        canvas.style.height = rect.height + 'px';
    }
    
    updateCanvasSize();
    
    // Optimizar resize con debounce
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(updateCanvasSize, 250);
    });
    
    // Actualizar en cambio de orientación
    window.addEventListener('orientationchange', () => {
        setTimeout(updateCanvasSize, 100);
    });
}

function triggerConfetti() {
    if (confettiActive) return;
    confettiActive = true;
    
    const canvas = document.getElementById('confettiCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    const confetti = [];
    
    // Reducir cantidad en móviles para mejor rendimiento
    const isMobile = window.innerWidth <= 768;
    const confettiCount = isMobile ? 100 : 200;
    const colors = ['#ff6b9d', '#c44569', '#f8b500', '#ffd700', '#ff9ff3', '#f368e0'];
    
    // Obtener dimensiones reales del canvas
    const rect = canvas.getBoundingClientRect();
    const canvasWidth = rect.width;
    const canvasHeight = rect.height;
    
    // Crear partículas de confetti
    for (let i = 0; i < confettiCount; i++) {
        confetti.push({
            x: Math.random() * canvasWidth,
            y: -Math.random() * canvasHeight,
            width: Math.random() * 10 + 5,
            height: Math.random() * 10 + 5,
            speed: Math.random() * 3 + 2,
            rotation: Math.random() * 360,
            rotationSpeed: Math.random() * 10 - 5,
            color: colors[Math.floor(Math.random() * colors.length)],
            opacity: Math.random() * 0.5 + 0.5
        });
    }
    
    // Animar confetti
    function animate() {
        // Usar dimensiones CSS para dibujar
        const rect = canvas.getBoundingClientRect();
        const dpr = window.devicePixelRatio || 1;
        const drawWidth = rect.width;
        const drawHeight = rect.height;
        
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        let activeCount = 0;
        
        confetti.forEach(particle => {
            if (particle.y < drawHeight && particle.opacity > 0) {
                activeCount++;
                
                ctx.save();
                ctx.globalAlpha = particle.opacity;
                ctx.fillStyle = particle.color;
                ctx.translate(particle.x, particle.y);
                ctx.rotate((particle.rotation * Math.PI) / 180);
                ctx.fillRect(-particle.width / 2, -particle.height / 2, particle.width, particle.height);
                ctx.restore();
                
                particle.y += particle.speed;
                particle.x += Math.sin(particle.y * 0.01) * 2;
                particle.rotation += particle.rotationSpeed;
                particle.opacity -= 0.005;
            }
        });
        
        if (activeCount > 0) {
            requestAnimationFrame(animate);
        } else {
            confettiActive = false;
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
    }
    
    animate();
}

function createFloatingParticles() {
    const hero = document.querySelector('.hero');
    if (!hero) return;
    
    // Reducir partículas en móviles para mejor rendimiento
    const isMobile = window.innerWidth <= 768;
    const particleCount = isMobile ? 10 : 20;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.innerHTML = '✨';
        particle.style.position = 'absolute';
        particle.style.fontSize = Math.random() * 15 + 8 + 'px';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.opacity = Math.random() * 0.4 + 0.2;
        particle.style.pointerEvents = 'none';
        particle.style.animation = `float ${Math.random() * 10 + 10}s infinite ease-in-out`;
        particle.style.animationDelay = Math.random() * 5 + 's';
        hero.appendChild(particle);
    }
}

function createLetterParticles() {
    const letterSection = document.querySelector('.letter-section');
    if (!letterSection) return;
    
    for (let i = 0; i < 30; i++) {
        const particle = document.createElement('div');
        particle.innerHTML = '💕';
        particle.style.position = 'absolute';
        particle.style.fontSize = Math.random() * 15 + 10 + 'px';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.opacity = 0;
        particle.style.pointerEvents = 'none';
        particle.style.transition = 'all 2s ease-out';
        letterSection.appendChild(particle);
        
        setTimeout(() => {
            particle.style.opacity = 0.6;
            particle.style.transform = `translateY(-${Math.random() * 200 + 100}px) translateX(${Math.random() * 100 - 50}px)`;
        }, i * 50);
        
        setTimeout(() => {
            particle.style.opacity = 0;
            setTimeout(() => particle.remove(), 2000);
        }, 3000);
    }
}

function createPassionParticles(element) {
    if (!element) return;
    
    const heartSymbols = ['💕', '💖', '💗', '💓', '💝', '❤️'];
    const particleCount = 8;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.innerHTML = heartSymbols[Math.floor(Math.random() * heartSymbols.length)];
        particle.style.position = 'absolute';
        particle.style.fontSize = Math.random() * 15 + 12 + 'px';
        particle.style.left = '50%';
        particle.style.top = '50%';
        particle.style.opacity = '0';
        particle.style.pointerEvents = 'none';
        particle.style.transform = 'translate(-50%, -50%)';
        particle.style.transition = 'all 2s ease-out';
        particle.style.zIndex = '1000';
        element.style.position = 'relative';
        element.appendChild(particle);
        
        setTimeout(() => {
            const angle = (Math.PI * 2 * i) / particleCount;
            const distance = Math.random() * 80 + 60;
            particle.style.opacity = '0.8';
            particle.style.transform = `translate(-50%, -50%) translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px) scale(0)`;
        }, i * 50);
        
        setTimeout(() => {
            particle.style.opacity = '0';
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.remove();
                }
            }, 2000);
        }, 2500);
    }
}

function createHeartExplosion() {
    const ctaSection = document.querySelector('.cta-section');
    if (!ctaSection) return;
    
    const heartSymbols = ['❤️', '💖', '💕', '💗', '💓', '💝'];
    
    // Reducir corazones en móviles
    const isMobile = window.innerWidth <= 768;
    const heartCount = isMobile ? 25 : 50;
    const maxDistance = isMobile ? 200 : 300;
    
    for (let i = 0; i < heartCount; i++) {
        const heart = document.createElement('div');
        heart.innerHTML = heartSymbols[Math.floor(Math.random() * heartSymbols.length)];
        heart.style.position = 'absolute';
        heart.style.fontSize = Math.random() * 25 + 15 + 'px';
        heart.style.left = '50%';
        heart.style.top = '50%';
        heart.style.opacity = 0;
        heart.style.pointerEvents = 'none';
        heart.style.transform = 'translate(-50%, -50%)';
        heart.style.transition = 'all 3s ease-out';
        ctaSection.appendChild(heart);
        
        setTimeout(() => {
            const angle = (Math.PI * 2 * i) / heartCount;
            const distance = Math.random() * maxDistance + (maxDistance * 0.5);
            heart.style.opacity = 1;
            heart.style.transform = `translate(-50%, -50%) translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px) scale(0)`;
        }, i * 30);
        
        setTimeout(() => {
            heart.remove();
        }, 3000);
    }
}

function animateModalEntry() {
    const modalContent = document.querySelector('.modal-content');
    if (modalContent) {
        modalContent.style.animation = 'none';
        setTimeout(() => {
            modalContent.style.animation = 'slideUp 0.4s ease';
        }, 10);
    }
}

// ============================================
// ANIMACIONES AL SCROLL
// ============================================
function setupScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observar tarjetas de momentos
    const momentCards = document.querySelectorAll('.moment-card');
    momentCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });
    
    // Las tarjetas de pasión se configuran en setupPassionAnimations()
    // después de que se cargue el contenido dinámicamente desde passion.html
}

// ============================================
// SONIDOS
// ============================================
function playSoftSound() {
    // Crear un sonido suave usando Web Audio API
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.value = 523.25; // Nota C5
        oscillator.type = 'sine';
        
        gainNode.gain.setValueAtTime(0, audioContext.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.1, audioContext.currentTime + 0.01);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.5);
    } catch (e) {
        console.log('No se pudo reproducir el sonido:', e);
    }
}

function playCelebrationSound() {
    // Sonido de celebración más alegre
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const notes = [523.25, 659.25, 783.99]; // C, E, G (acorde mayor)
        
        notes.forEach((freq, index) => {
            setTimeout(() => {
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();
                
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                oscillator.frequency.value = freq;
                oscillator.type = 'sine';
                
                gainNode.gain.setValueAtTime(0, audioContext.currentTime);
                gainNode.gain.linearRampToValueAtTime(0.15, audioContext.currentTime + 0.01);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.8);
                
                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.8);
            }, index * 100);
        });
    } catch (e) {
        console.log('No se pudo reproducir el sonido:', e);
    }
}

// ============================================
// CARGA DINÁMICA DE SECCIONES
// ============================================
function loadPassionSection() {
    const passionContainer = document.getElementById('passion-container');
    if (!passionContainer) return;
    
    fetch('passion.html', {
        headers: {
            'Content-Type': 'text/html; charset=utf-8'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo cargar la sección de pasión');
            }
            // Asegurar que se lea como UTF-8
            return response.text();
        })
        .then(html => {
            passionContainer.innerHTML = html;
            
            // Reinicializar animaciones después de cargar el contenido
            setTimeout(() => {
                setupPassionAnimations();
            }, 100);
        })
        .catch(error => {
            console.error('Error al cargar passion.html:', error);
            passionContainer.innerHTML = '<p style="text-align: center; padding: 40px; color: var(--rojo-borgoña);">No se pudo cargar la sección de pasión.</p>';
        });
}

function setupPassionAnimations() {
    // Configurar animaciones para las tarjetas de amor cargadas dinámicamente
    const loveCards = document.querySelectorAll('.love-card');
    if (loveCards.length === 0) return;
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observer adicional para efectos especiales en tarjetas de amor
    const loveObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('love-visible');
                // Crear partículas de corazones al aparecer
                if (entry.target.classList.contains('love-card')) {
                    createPassionParticles(entry.target);
                }
            }
        });
    }, { threshold: 0.3 });
    
    loveCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(40px)';
        card.style.transition = `all 0.8s ease-out ${index * 0.1}s`;
        observer.observe(card);
        loveObserver.observe(card);
    });
}

// ============================================
// EFECTOS ADICIONALES
// ============================================
// Efecto parallax suave en hero (solo en desktop)
let lastScrollTop = 0;
let ticking = false;

function updateParallax() {
    const hero = document.querySelector('.hero');
    if (hero && window.innerWidth > 768) {
        const scrolled = window.pageYOffset;
        const rate = scrolled * 0.5;
        hero.style.transform = `translateY(${rate}px)`;
    }
    ticking = false;
}

window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(updateParallax);
        ticking = true;
    }
});

// Desactivar parallax en móviles para mejor rendimiento
window.addEventListener('resize', () => {
    const hero = document.querySelector('.hero');
    if (hero && window.innerWidth <= 768) {
        hero.style.transform = 'none';
    }
});

// Efecto hover mejorado en botones
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px)';
    });
    
    button.addEventListener('mouseleave', function() {
        if (!this.classList.contains('cta-button') || !this.classList.contains('response-btn')) {
            this.style.transform = 'translateY(0)';
        }
    });
});

