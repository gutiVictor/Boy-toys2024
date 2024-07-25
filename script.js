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

document.addEventListener("keydown", function(event) {
  // Verificar si el foco está en el campo de codigo y si se presionó Enter
  if (event.target.id === "codigo" && event.key === "Enter") {
    // Evitar que se envíe el formulario automáticamente
    event.preventDefault();

    // Obtener el valor del código de barras leído
    var codigoBarras = document.getElementById("codigo").value;

    // Insertar el código de barras en el campo de codigo
    document.getElementById("codigo").value = codigoBarras;

    // Buscar la descripción del producto y actualizar el campo correspondiente
    if (productos[codigoBarras]) {
      document.getElementById("descripcion").value = productos[codigoBarras].descripcion;
      document.getElementById("ref").value = productos[codigoBarras].ref; // Asignar Ref
    } else {
      document.getElementById("descripcion").value = "Descripción no encontrada";
      document.getElementById("ref").value = ""; // Limpiar Ref si no se encuentra el producto
    }

    // Mover el foco al campo de cantidad
    document.getElementById("cantidad").focus();
  }

  // Verificar si el foco está en el campo de cantidad y si se presionó Enter
  if (event.target.id === "cantidad" && event.key === "Enter") {
    event.preventDefault();

    // Mover el foco al campo de número de caja
    document.getElementById("num-caja").focus();
  }

  // Verificar si el foco está en el campo de número de caja y si se presionó Enter
  if (event.target.id === "num-caja" && event.key === "Enter") {
    event.preventDefault();

    // Validar el campo de número de caja antes de enviar el formulario
    if (!validarNumeroCaja()) {
      event.preventDefault();
    } else {
      document.getElementById("mi-formulario").submit();
    }
  }
});

// Función para validar el campo de número de caja
function validarNumeroCaja() {
    const numeroCaja = document.getElementById("num-caja").value;
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
        // Establecer un breve retraso antes de enfocar el campo de codigo para asegurarse de que el formulario haya terminado de enviarse
        setTimeout(function() {
            document.getElementById("codigo").focus();
        }, 500);
    }
});
