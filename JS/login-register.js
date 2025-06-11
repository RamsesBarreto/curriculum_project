function mostrarMensaje(tipo) {
    const modal = document.createElement('div');
    modal.classList.add('custom-modal');
    modal.innerHTML = `
        <div class="modal-content">
            <p>${tipo === 'inicio' ? '¡Has iniciado sesión correctamente!' : '¡Te has registrado correctamente!'}</p>
            <button class="modal-button">Aceptar</button>
        </div>
    `;
    document.body.appendChild(modal);

    const button = modal.querySelector('.modal-button');
    button.addEventListener('click', () => {
        modal.remove(); // Elimina el modal
        location.reload(); // Recarga la página
    });
}

function validarCorreo(correo) {
    const patron = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/;
    return patron.test(correo);
}

function mostrarAlertaError(mensaje) {
    // Obtén el contenedor global de alertas
    const alertContainer = document.getElementById('alert-container');

    // Elimina cualquier alerta existente para evitar duplicados
    alertContainer.innerHTML = '';

    // Crea la alerta
    const alerta = document.createElement('div');
    alerta.classList.add('alerta-error');
    alerta.textContent = mensaje;

    // Inserta la alerta en el contenedor global
    alertContainer.appendChild(alerta);

    // Elimina la alerta después de 3 segundos
    setTimeout(() => {
        alerta.remove();
    }, 3000);
}

// Evento para el formulario de inicio de sesión


// Evento para el formulario de registro
document.querySelector('.formulario__register').addEventListener('submit', function (e) {
    const emailInput = this.email;

    // Validar el correo
    if (!validarCorreo(emailInput.value)) {
        e.preventDefault(); // Evita que el formulario se envíe
        mostrarAlertaError('El correo debe ser válido y pertenecer a dominios como gmail.com, hotmail.com, outlook.com.');
        emailInput.focus(); // Enfoca el campo de correo
        return; // Detiene la ejecución
    }

    // Mostrar mensaje de éxito si la validación es correcta
    e.preventDefault(); // Evita el envío del formulario
    mostrarMensaje('registro');
});

// Funciones para alternar entre los formularios de inicio de sesión y registro
function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.opacity = "1";
    }
}

// Ajustar el diseño según el ancho de la página
function anchoPagina() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0";
    }
}

// Variables globales
const contenedor_login_register = document.querySelector(".contenedor__login-register");
const formulario_login = document.querySelector(".formulario__login");
const formulario_register = document.querySelector(".formulario__register");
const caja_trasera_login = document.querySelector(".caja__trasera-login");
const caja_trasera_register = document.querySelector(".caja__trasera-register");

// Inicializar
anchoPagina();
window.addEventListener("resize", anchoPagina);
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);


