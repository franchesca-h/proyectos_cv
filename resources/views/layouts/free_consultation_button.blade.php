<style>
    /* Contenedor del botón y mensaje */
    .boton-consulta-wrapper {
        position: fixed;
        bottom: 40px;
        right: 40px;
        z-index: 10000;
    }
    
    /* Botón flotante */
    .boton-consulta {
        position: relative;
        width: 60px;
        height: 60px;
        background-color: #007bff;
        border-radius: 50%;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        transition: all 0.3s ease;
    }
    
    .boton-consulta:hover {
        background-color: #0056b3;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 123, 255, 0.4);
    }
    
    .boton-consulta img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    
    .boton-consulta i {
        color: white;
        font-size: 24px;
    }

    /* Mensaje que aparece */
    .mensaje-popup {
        position: absolute;
        right: 70px;
        bottom: 10px;
        background-color: white;
        color: #333;
        padding: 10px 15px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        display: none;
        z-index: 1001;
        white-space: nowrap;
        pointer-events: none;
    }
    
    /* Flecha del mensaje */
    .mensaje-popup::after {
        content: '';
        position: absolute;
        right: -8px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border: 8px solid transparent;
        border-left-color: white;
    }
    
    /* Mostrar mensaje */
    .mensaje-popup.mostrar {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    /* Solo en el home va arriba de whatsapp */
    body.home-page .boton-consulta-wrapper,
    body.at-light-background .boton-consulta-wrapper {
        bottom: 120px; /* Espacio para whatsapp debajo */
    }
    
    /* En otras páginas sin whatsapp, posición normal */
    body:not(.home-page):not(.at-light-background) .boton-consulta-wrapper {
        bottom: 40px;
    }

    /* Para móviles */
    @media (max-width: 768px) {
        .boton-consulta-wrapper {
            bottom: 110px;
            right: 1rem;
        }
        
        .boton-consulta {
            width: 55px;
            height: 55px;
        }
        
        .boton-consulta img {
            width: 35px;
            height: 35px;
        }
        
        .boton-consulta i {
            font-size: 20px;
        }
        
        .mensaje-popup {
            position: absolute !important;
            right: auto !important;
            left: -175px !important;
            bottom: 0 !important;
            top: auto !important;
            transform: none !important;
            font-size: 12px;
            padding: 10px 14px;
            max-width: 160px;
            min-width: 150px;
            white-space: normal;
            line-height: 1.4;
            z-index: 10001 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Si el mensaje se sale por la izquierda en pantallas muy pequeñas, ajustarlo */
        @media (max-width: 360px) {
            .mensaje-popup {
                left: -140px !important;
                max-width: 130px;
                font-size: 11px;
                padding: 8px 12px;
            }
        }
        
        /* Ocultar flecha en móvil o ajustarla */
        .mensaje-popup::after {
            display: none;
        }
        
        /* Asegurar que el mensaje sea visible cuando tenga la clase mostrar */
        .mensaje-popup.mostrar {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    }
</style>

<div class="boton-consulta-wrapper">
    <!-- Cambia esta URL por la de tu calendario o sistema de reuniones -->
    <a href="https://calendly.com/tu-empresa/reunion-gratuita" 
       target="_blank" 
       class="boton-consulta" 
       id="botonConsulta">
        <!-- Reemplaza esto con tu imagen: <img src="{{ asset('argon') }}/img/consultation-icon.png" alt="Consulta"> -->
        <i class="fas fa-comments"></i>
    </a>
    
    <!-- Mensaje que sale después de 20 segundos -->
    <div class="mensaje-popup" id="mensajePopup">
        Habla con nosotros gratis aquí
    </div>
</div>

<script>
(function() {
    // Función para inicializar el botón y mensaje
    function initBotonConsulta() {
        var boton = document.getElementById('botonConsulta');
        var mensaje = document.getElementById('mensajePopup');
        
        if (!boton || !mensaje) {
            // Si no están disponibles, intentar de nuevo después de un breve delay
            setTimeout(initBotonConsulta, 100);
            return;
        }
        
        var mensajeMostrado = false;
        
        // Verificar si estamos en home (donde está whatsapp)
        var url = window.location.pathname;
        var esHome = url === '/' || url === '/home' || document.body.classList.contains('at-light-background');
        
        if (esHome) {
            // En home: agregar clase para CSS
            document.body.classList.add('home-page');
        }
        
        // Mostrar mensaje después de 20 segundos
        function mostrarMensaje() {
            if (!mensaje || mensajeMostrado) {
                return;
            }
            
            // Verificar que el mensaje existe y está en el DOM
            if (!document.body.contains(mensaje)) {
                console.warn('Mensaje popup no encontrado en el DOM');
                return;
            }
            
            // Añadir clase para mostrar
            mensaje.classList.add('mostrar');
            mensajeMostrado = true;
            
            // Forzar display block para móvil y web
            mensaje.style.display = 'block';
            mensaje.style.opacity = '1';
            mensaje.style.visibility = 'visible';
            
            // El mensaje NO desaparece automáticamente - permanece visible
        }
        
        // Empezar timer de 20 segundos
        var timerMostrar = setTimeout(mostrarMensaje, 20000);
        
        // Limpiar timer si la página se oculta (para evitar que aparezca cuando vuelva)
        document.addEventListener('visibilitychange', function() {
            if (document.hidden && timerMostrar) {
                clearTimeout(timerMostrar);
            }
        });
        
        // El mensaje permanece visible incluso al hacer click en el botón
        // No se oculta automáticamente
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBotonConsulta);
    } else {
        // DOM ya está listo
        initBotonConsulta();
    }
    
    // También inicializar después de un delay por si acaso
    setTimeout(initBotonConsulta, 500);
})();
</script>

