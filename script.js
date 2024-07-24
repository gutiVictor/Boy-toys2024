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
      document.getElementById("descripcion").value = productos[codigoBarras];
    } else {
      document.getElementById("descripcion").value = "Descripción no encontrada";
    }

    // Mover el foco al campo de cantidad
    document.getElementById("cantidad").focus();
  }

  // Verificar si el foco está en el campo de cantidad y si se presionó Enter
  if (event.target.id === "cantidad" && event.key === "Enter") {
    event.preventDefault();

    // Mover el foco al campo de número de caja
    document.getElementById("numero_caja").focus();
  }

  // Verificar si el foco está en el campo de número de caja y si se presionó Enter
  if (event.target.id === "numero_caja" && event.key === "Enter") {
    event.preventDefault();

    // Enviar el formulario
    document.getElementById("mi-formulario").submit();
  }
});

// Agregar un evento de envío al formulario para enfocar el campo de codigo después de enviar
document.getElementById("mi-formulario").addEventListener("submit", function(event) {
  // Establecer un breve retraso antes de enfocar el campo de codigo para asegurarse de que el formulario haya terminado de enviarse
  setTimeout(function() {
    document.getElementById("codigo").focus();
  }, 500);
});
