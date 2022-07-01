// VALIDAR FORMULARIOS
//validar que solo se digiten numeros
function validaNumeros(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}
// validar que solo digiten letras 
function validarTexto() {
    const input = document.getElementById('campo');
    if (!input.checkValidity()) {
        alert('El campo no es válido.');
    } else {
        alert('El campo es válido.');
    }
}

// PERSONAS - CLIENTES
// funcion para selecionar la persona o el cliente y cargar los datos en el modal
function seleccionar(cod, nombres, apellidos, num_doc, correo, celular, direccion,estado) {
    $('#cod').val(cod);
    $('#nombres').val(nombres);
    $('#apellidos').val(apellidos);
    $('#num_doc').val(num_doc);
    $('#correo').val(correo);
    $('#celular').val(celular);
    $('#direccion').val(direccion);
    $('#estado').val(estado); 
}


//funcion para enviar los datos del formulario modal devuelta 
function onEnviar(){
    //declarar variables de js y pasarle la informacion q traemos de los input
    var cod = document.getElementById("cod").value;
    var nombres = document.getElementById("nombres").value;
    var apellidos = document.getElementById("apellidos").value;
    var num_doc = document.getElementById("num_doc").value;
    var correo = document.getElementById("correo").value;
    var celular = document.getElementById("celular").value;
    var direccion = document.getElementById("direccion").value;
    var estado= document.getElementById("estado").value;
    var accion= document.getElementById("accion").value;

    // mandamos las variables por metodo post
    document.getElementById("cod").value=cod;
    document.getElementById("nombres").value=nombres;
    document.getElementById("apellidos").value=apellidos;
    document.getElementById("num_doc").value=num_doc;
    document.getElementById("correo").value=correo;
    document.getElementById("celular").value=celular;
    document.getElementById("direccion").value=direccion;
    document.getElementById("estado").value=estado;
    document.getElementById("accion").value=accion;
 }



