<!-- Modal de Reunión Gratuita -->
<div class="modal fade" id="freeSessionModal" tabindex="-1" role="dialog" aria-labelledby="freeSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center" style="background: #fff;">
            <div class="modal-header border-0" style="display: block !important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" style="position: absolute; right: 15px; top: 15px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="freeSessionModalLabel" style="color: #333; font-weight: 600; margin-top: 1rem;">
                    ¡Solicita una reunión gratuita!
                </h5>
            </div>
            <div class="modal-body">
                <p style="color: #666; font-size: 1rem;">
                    Conversa con nosotros y encuentra la respuesta que necesitas para empezar el cambio.
                </p>
            </div>
            <div class="modal-footer border-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" 
                                onClick="goToFreeMeeting();" 
                                class="btn btn-primary btn-block">
                            Quiero mi reunión
                        </button>
                    </div>
                    <div class="col-md-6 web-desktop">
                        <button type="button" 
                                class="btn btn-secondary btn-block"
                                data-dismiss="modal">
                            En otro momento...
                        </button>
                    </div>
                    <div class="col-md-6 web-mobile">
                        <br>
                        <button type="button" 
                                class="btn btn-secondary btn-block"
                                data-dismiss="modal">
                            En otro momento...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    /**
     * Función para abrir el modal de reunión gratuita después de un tiempo
     * Se ejecuta automáticamente después de 20 segundos si el modal existe
     */
    async function openFreeSessionModal() {
        await sleep(20000); // Esperar 20 segundos
        $('#freeSessionModal').modal();
    }

    /**
     * Función para redirigir a la página de reunión gratuita
     * Cambia la URL por la de tu calendario o sistema de reuniones
     */
    function goToFreeMeeting() {
        // Cambia esta URL por la de tu calendario o sistema de reuniones
        window.location.href = "https://calendly.com/tu-empresa/reunion-gratuita";
        // O abre en nueva ventana:
        // window.open("https://calendly.com/tu-empresa/reunion-gratuita", "_blank");
    }

    /**
     * Función auxiliar para crear delays
     */
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    // Inicializar el modal si existe en la página
    $(document).ready(function() {
        var freeSessionModal = document.getElementById('freeSessionModal');
        if (freeSessionModal) {
            openFreeSessionModal();
        }
    });
</script>
@endpush

