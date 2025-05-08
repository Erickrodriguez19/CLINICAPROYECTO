// Función para abrir modal
function abrirModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

// Función para cerrar modal
function cerrarModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Cerrar modal al hacer clic fuera del contenido
window.onclick = function(event) {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}

function cerrarPagina() {
    window.close();
}
