function editarProfesor() {

    // Obtener los valores de los campos del formulario
    var dni = document.getElementById("dni_prof").value;
    var nombre = document.getElementById("nombre_prof").value;
    var apellido1 = document.getElementById("apellido1_prof").value;
    var apellido2 = document.getElementById("apellido2_prof").value;
    var email = document.getElementById("email_prof").value;
    var telefono = document.getElementById("telf_prof").value;
    var dept_prof = document.getElementById("dept_prof").value;
    var sal_prof = document.getElementById("sal_prof").value;

    // Validar que todos los campos estén completos
    if (
        dni.trim() === "" ||
        nombre.trim() === "" ||
        apellido1.trim() === "" ||
        apellido2.trim() === "" ||
        email.trim() === "" ||
        telefono.trim() === "" ||
        dept_prof.trim() === "" ||
        sal_prof.trim() === ""
    ) {
        alert("Por favor, complete todos los campos.");
        return false; // Evita que se envíe el formulario
    }

    // Validar el formato del DNI
    var dniRegex = /^\d{8}[a-zA-Z]$/;
    if (!dniRegex.test(dni)) {
        alert(
            "El DNI no tiene un formato válido. Debe tener 8 dígitos seguidos de una letra."
        );
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
        alert(
            "El teléfono no tiene un formato válido. Debe tener 9 dígitos sin espacios ni guiones."
        );
        return false; // Evita que se envíe el formulario
    }

    // Validar el formato del salario
    var salarioRegex = /^\d+(\.\d{1,2})?$/;
    if (!salarioRegex.test(sal_prof)) {
        alert(
            "El salario no tiene un formato válido. Debe ser un número con 2 decimales como máximo."
        );
        return false; // Evita que se envíe el formulario
    }

    // Validar el número máximo de departamento
    var departamentoNum = parseInt(dept_prof);
    if (isNaN(departamentoNum) || departamentoNum > 3) {
        alert(
            "El número de departamento no es válido. Debe ser un número del 1 al 3."
        );
        return false; // Evita que se envíe el formulario
    }

    // Si se pasan todas las validaciones, se puede enviar el formulario
    document.forms[0].submit(); // Envía el formulario manualmente
}

// Obtener el formulario
var form = document.getElementById("formulario");

// Agregar el evento de submit al formulario
form.addEventListener("submit", editarProfesor);
