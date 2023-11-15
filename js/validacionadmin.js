function usuarioadmin() {
    var usuario = document.getElementById('usuario').value
    var usuarioinc = document.getElementById('usuarioincorrecto')
    if (usuario != 'newvision') {
        return false
    } else {
        usuarioinc.innerHTML = ''
    }
    var contrasena = document.getElementById('contrasena').value
    var contrasenainc = document.getElementById('contrasenaincorrecta')
    if (contrasena != 'qweQWE123') {
        return false
    } else {
        contrasenainc.innerHTML = ''
    }
}