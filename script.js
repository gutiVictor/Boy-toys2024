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
  // Verificar si el foco está en el campo de referencia y si se presionó Enter
  if (event.target.id === "referencia" && event.key === "Enter") {
    // Evitar que se envíe el formulario automáticamente
    event.preventDefault();

    // Obtener el valor del código de barras leído
    var codigoBarras = document.getElementById("referencia").value;

    // Insertar el código de barras en el campo de referencia
    document.getElementById("referencia").value = codigoBarras;

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

    // Enviar el formulario (puedes ajustarlo )
    document.getElementById("formulario").submit();
  }
});
