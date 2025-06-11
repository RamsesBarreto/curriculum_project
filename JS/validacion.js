// Este apartado con ayuda de Js, estamos validando los campos, o sea, que generen una alerta
// al usuario si no ha llenado los campos obligatorios, y que se elimine el borde rojo, esto en general es animacion y estetica

function mostrarAlerta(mensaje) {
  const alerta = document.getElementById("alerta-campos");
  const alertaMensaje = document.getElementById("alerta-mensaje");
  alertaMensaje.textContent = mensaje;
  alerta.style.display = "flex";
  setTimeout(() => {
    alerta.classList.add("mostrar");
  }, 10); // Permite que la animación se active

  document.getElementById("alerta-cerrar").onclick = function () {
    alerta.classList.remove("mostrar");
    setTimeout(() => {
      alerta.style.display = "none";
    }, 250); // Espera a que termine la animación
  };
}

document.addEventListener("DOMContentLoaded", function () {
  // Experiencia Laboral
  if (document.getElementById("empresa") && document.getElementById("puesto")) {
    const btn = document.querySelector(".pie-registro .boton.primario");
    const requiredInputs = [
      document.getElementById("empresa"),
      document.getElementById("puesto"),
      document.getElementById("fecha-inicio"),
      document.getElementById("fecha-fin"),
      document.getElementById("responsabilidades"),
    ];
    // Elimina el borde rojo al escribir
    requiredInputs.forEach((input) => {
      input.addEventListener("input", function () {
        if (input.value.trim()) {
          input.style.borderColor = "#ddd";
        }
      });
    });
    btn.addEventListener("click", function (e) {
      let valid = true;
      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          input.style.borderColor = "red";
          valid = false;
        } else {
          input.style.borderColor = "#ddd";
        }
      });
      if (!valid) {
        e.preventDefault();
        mostrarAlerta("Por favor, completa todos los campos obligatorios.");
      }
    });
  }
  // Formación Académica
  else if (
    document.getElementById("titulo") &&
    document.getElementById("institucion")
  ) {
    const btn = document.querySelector(".pie-registro .boton.primario");
    const requiredInputs = [
      document.getElementById("titulo"),
      document.getElementById("institucion"),
      document.getElementById("año-graduacion"),
    ];
    // Elimina el borde rojo al escribir
    requiredInputs.forEach((input) => {
      input.addEventListener("input", function () {
        if (input.value.trim()) {
          input.style.borderColor = "#ddd";
        }
      });
    });
    btn.addEventListener("click", function (e) {
      let valid = true;
      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          input.style.borderColor = "red";
          valid = false;
        } else {
          input.style.borderColor = "#ddd";
        }
      });
      if (!valid) {
        e.preventDefault();
        mostrarAlerta("Por favor, completa todos los campos obligatorios.");
      }
    });
  }
  // Datos Personales
  else if (
    document.getElementById("nombre") &&
    document.getElementById("apellido")
  ) {
    const btn = document.querySelector(".pie-registro .boton.primario");
    const requiredInputs = [
      document.getElementById("nombre"),
      document.getElementById("apellido"),
      document.getElementById("correo"),
      document.getElementById("telefono"),
      document.getElementById("fecha-nacimiento"),
      document.getElementById("contrasena"),
      document.getElementById("direccion"),
    ];
    // Elimina el borde rojo al escribir
    requiredInputs.forEach((input) => {
      input.addEventListener("input", function () {
        if (input.value.trim()) {
          input.style.borderColor = "#ddd";
        }
      });
    });
    btn.addEventListener("click", function (e) {
      let valid = true;
      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          input.style.borderColor = "red";
          valid = false;
        } else {
          input.style.borderColor = "#ddd";
        }
      });
      // Validar género
      const generoChecked = document.querySelector(
        'input[name="gender"]:checked'
      );
      if (!generoChecked) {
        valid = false;
        mostrarAlerta("Por favor, selecciona un género.");
      }
      if (!valid) {
        e.preventDefault();
        if (generoChecked) {
          mostrarAlerta("Por favor, completa todos los campos obligatorios.");
        }
      }
    });
  }
  // Registro de Empresa (sin representante)
  else if (
    document.getElementById("nombre-empresa") &&
    document.getElementById("rif")
  ) {
    const btn = document.querySelector(".pie-registro .boton.primario");
    const requiredInputs = [
      document.getElementById("nombre-empresa"),
      document.getElementById("rif"),
      document.getElementById("direccion-empresa"),
      document.getElementById("contrasena-empresa"),
      document.getElementById("telefono-empresa"),
      document.getElementById("correo-empresa"),
      document.getElementById("sector"),
      // Eliminado: document.getElementById('representante')
    ];
    // Elimina el borde rojo al escribir
    requiredInputs.forEach((input) => {
      input.addEventListener("input", function () {
        if (input.value.trim()) {
          input.style.borderColor = "#ddd";
        }
      });
    });
    btn.addEventListener("click", function (e) {
      let valid = true;
      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          input.style.borderColor = "red";
          valid = false;
        } else {
          input.style.borderColor = "#ddd";
        }
      });
      if (!valid) {
        e.preventDefault();
        mostrarAlerta("Por favor, completa todos los campos obligatorios.");
      }
    });
  } else if (document.getElementById("form-publicacion")) {
    const btn = document.querySelector(
      '#form-publicacion button[type="submit"]'
    );
    const requiredInputs = [
      document.getElementById("ocupacion"),
      document.getElementById("salario"),
      document.getElementById("hora-inicio"),
      document.getElementById("hora-fin"),
      document.getElementById("fecha-inicio"),
      document.getElementById("fecha-fin"),
      document.getElementById("experiencia"),
    ];
    requiredInputs.forEach((input) => {
      input.addEventListener("input", function () {
        if (input.value.trim()) {
          input.style.borderColor = "#ddd";
        }
      });
    });
    btn.addEventListener("click", function (e) {
      let valid = true;
      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          input.style.borderColor = "red";
          valid = false;
        } else {
          input.style.borderColor = "#ddd";
        }
      });
      if (!valid) {
        e.preventDefault();
        mostrarAlerta("Por favor, completa todos los campos obligatorios.");
      }
    });
  }
});
