function eliminarAlumno(numMatricula) {
  // Mostrar un mensaje de confirmación antes de eliminar el alumno
  var confirmacion = confirm("¿Estás seguro/a de que deseas eliminar este alumno?");

  if (confirmacion) {
      // Redireccionar a la página de eliminación con el parámetro de la matrícula del alumno
      window.location.href = "alumnos.php?num_matricula=" + numMatricula;
  }
}

// Obtener los botones de eliminar
var botonesEliminar = document.querySelectorAll("#eliminar");

// Agregar el evento de clic a cada botón de eliminar
botonesEliminar.forEach(function (boton) {
  boton.addEventListener("click", function (event) {
      event.preventDefault(); // Evitar el comportamiento predeterminado del botón
      var numMatricula = this.parentNode.parentNode.firstChild.innerHTML; // Obtener el número de matrícula del alumno
      eliminarAlumno(numMatricula); // Llamar a la función para eliminar el alumno
  });
});
