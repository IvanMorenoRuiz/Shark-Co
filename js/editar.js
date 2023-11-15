function editarAlumno() {
    // Obtener los valores de los campos del formulario
    var dni = document.getElementById("dni_alu").value;
    var nombre = document.getElementById("nombre_alu").value;
    var apellido1 = document.getElementById("apellido1_alu").value;
    var apellido2 = document.getElementById("apellido2_alu").value;
    var email = document.getElementById("email_alu").value;
    var telefono = document.getElementById("telf_alu").value;
    var clase = document.getElementById("clase").value;

    // Validar que todos los campos estén completos
    if (dni.trim() === "" || nombre.trim() === "" || apellido1.trim() === "" || apellido2.trim() === "" || email.trim() === "" || telefono.trim() === "" || clase.trim() === "") {
        alert("Por favor, complete todos los campos.");
        return false; // Evita que se envíe el formulario
    }

    // Validar el formato del DNI
    var dniRegex = /^\d{8}[a-zA-Z]$/;
    if (!dniRegex.test(dni)) {
        alert("El DNI no tiene un formato válido. Debe tener 8 dígitos seguidos de una letra.");
        return false; // Evita que se envíe el formulario
    }

    // Validar el formato del email
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("El email no tiene un formato válido.");
        return false; // Evita que se envíe el formulario
    }

    // Validar el formato del teléfono
    var telefonoRegex = /^\d{9}$/;
    if (!telefonoRegex.test(telefono)) {
        alert("El teléfono no tiene un formato válido. Debe tener 9 dígitos sin espacios ni guiones.");
        return false; // Evita que se envíe el formulario
    }

    // Validar el número máximo de clase
    var claseNum = parseInt(clase);
    if (isNaN(claseNum) || claseNum > 3) {
        alert("El número de clase no es válido. Debe ser un número del 1 al 3.");
        return false; // Evita que se envíe el formulario
    }

    // Si se pasan todas las validaciones, se puede enviar el formulario
    document.forms[0].submit(); // Envía el formulario manualmente
}

// Obtener el formulario
var form = document.getElementById("formulario");

// Agregar el evento de submit al formulario
form.addEventListener("submit", editarAlumno);
