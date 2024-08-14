// Función para navegar a otras páginas
function navigateTo(page) {
  window.location.href = page;
}

// Variable global para almacenar los datos de productos
let productos = {};

// Cargar los datos del archivo JSON al cargar la página
document.addEventListener("DOMContentLoaded", function() {
  fetch('productos.json')
    .then(response => response.json())
    .then(data => {
      productos = data;
    })
    .catch(error => {
      console.error('Error al cargar productos:', error);
    });
});

// Variable para manejar el temporizador
let typingTimer;
const doneTypingInterval = 500; // Tiempo en milisegundos

// Manejar el evento de entrada en el campo de código
document.getElementById("codigo").addEventListener("input", function() {
  clearTimeout(typingTimer);
  const codigoBarras = this.value;

  // Esperar hasta que el código de barras tenga 7 dígitos
  if (codigoBarras.length >= 7) {
    typingTimer = setTimeout(() => {
      if (productos[codigoBarras]) {
        document.getElementById("descripcion").value = productos[codigoBarras].descripcion;
        document.getElementById("ref").value = productos[codigoBarras].ref; // Asignar Ref
      } else {
        document.getElementById("descripcion").value = "Descripción no encontrada";
        document.getElementById("ref").value = ""; // Limpiar Ref si no se encuentra el producto
      }
      document.getElementById("cantidad").focus(); // Mover el foco al campo de cantidad
    }, doneTypingInterval);
  }
});

// Manejar el evento de entrada en el campo de cantidad
document.getElementById("cantidad").addEventListener("input", function() {
  document.getElementById("numero_caja").focus(); // Mover el foco al campo de número de caja
});

// Función para validar el campo de número de caja
function validarNumeroCaja() {
    const numeroCaja = document.getElementById("numero_caja").value;
    const mensajeError = document.getElementById("mensaje-error");

    if (!numeroCaja || numeroCaja <= 0) {
        mensajeError.textContent = "El número de caja debe ser mayor a 0.";
        return false;
    } else {
        mensajeError.textContent = "";
        return true;
    }
}

// Evento de envío del formulario
document.getElementById("mi-formulario").addEventListener("submit", function(event) {
    if (!validarNumeroCaja()) {
        event.preventDefault();
    } else {
        // Establecer un breve retraso antes de enfocar el campo de código para asegurarse de que el formulario haya terminado de enviarse
        setTimeout(function() {
            document.getElementById("codigo").focus();
        }, 500);
    }
});
