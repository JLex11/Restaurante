function vlogin () {
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;

    if (!(/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_ ]{3,30}$/.test(usuario))) {
        alert("Nombre de usuario no valido");
        return false;
    } else if (!(/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]{8,15}$/.test(contrasena))) {
        alert("Contraseña invalida");
        return false;
    } else {
        return true;
    }
}
