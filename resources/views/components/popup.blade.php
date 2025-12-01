<!-- Modal genérico para login/prompt -->
<div class="modal fade" id="loginPromptModal" tabindex="-1" role="dialog" aria-labelledby="loginPromptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="loginPromptModalLabel" style="color: #333; font-weight: 600;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p id="loginPromptModalMessage" style="color: #666;"></p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <a href="/login" class="btn btn-primary mb-3">Iniciar sesión</a>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    /**
     * Función para mostrar un popup/modal de login
     * @param {string} title - Título del modal
     * @param {string} message - Mensaje del modal
     */
    function showLoginPrompt(title, message) {
        document.getElementById('loginPromptModalLabel').textContent = title;
        document.getElementById('loginPromptModalMessage').textContent = message;
        $('#loginPromptModal').modal({ backdrop: 'static', keyboard: false });
    }
</script>
@endpush

