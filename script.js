// script.js

// Función para navegar a otras páginas
function navigateTo(page) {
    window.location.href = page;
  }
  
  const productos = {
    "1234567890": "Muñeca",
    "0987654321": "Sombrilla",
    "1122334455": "Carro de compras",
    // Añade más productos según sea necesario
  };
  
  document.addEventListener("keydown", function (event) {
    // Verificar si el foco está en el campo de referencia y si se presionó Enter
    if (event.target.id === "referencia" && event.key === "Enter") {
      // Evitar que se envíe el formulario automáticamente
      event.preventDefault();
  
      // Obtener el valor del código de barras leído (simulado con '1234567890' aquí)
      var codigoBarras = document.getElementById("referencia").value;
  
      // Insertar el código de barras en el campo de referencia
      document.getElementById("referencia").value = codigoBarras;
  
      // Buscar la descripción del producto y actualizar el campo correspondiente
      if (productos[codigoBarras]) {
        document.getElementById("descripcion").value = productos[codigoBarras];
      } else {
        document.getElementById("descripcion").value = "Descripción no encontrada";
      }
    }
  });