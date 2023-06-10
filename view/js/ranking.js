// Función para redireccionar al perfil del usuario al hacer clic en una fila

function redireccionar(idUsuario) {
    //Redirecciona al perfil del usuario con el ID correspondiente

    window.location.href = 'http://localhost/perfil/verPerfil?usuario=' + idUsuario;
}
