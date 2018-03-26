function iniciarSesion() {

    var usuario = $("#usuario").val();
    var clave = $("#clave").val();

    datos = {
        usuario: usuario,
        clave: clave
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/sesion.php?op=1",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == true) {
                window.location.href = "agenda.php";
            } else {
                //alert("Datos invalidos");
                swal("ERROR", "Datos invalidos, por favor intente de nuevo", "error");
            }
        }
    });
}


function registrarCliente() {
    var nit = $("#nit").val();
    var tipoCliente = $('input:radio[name=tipoCliente]:checked').val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var email = $("#email").val();
    var usuario = $("#usuario").val();
    var clave = $("#clave").val();
    var confirmarClave = $("#confirmarClave").val();

    if (nit != "") {
        if (nombre != "") {
            if (email != "") {
                if (usuario != "") {

                    if (clave == confirmarClave) {

                        /*var validarNit = validarDatoEnBD(nit, "identificacion", "cliente");
                        var validarUsuario = validarDatoEnBD(usuario, "usuario", "login");

                        if (validarNit == true && validarUsuario == true) {*/

                        datos = {
                            nit: nit,
                            tipoCliente: tipoCliente,
                            nombre: nombre,
                            apellido: apellido,
                            email: email,
                            usuario: usuario,
                            clave: clave
                        };

                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "php/cliente.php?op=1",
                            data: datos,
                            beforeSend: function() {},
                            success: function(response) {
                                if (response.res == true) {
                                    //notificacion("LISTO: Registro exitoso", 2);
                                    swal("LISTO", "Registro exitoso", "success");
                                    setTimeout(function() {
                                        window.location.href = "index.php";
                                    }, 3000);

                                } else {
                                    //alert("Datos invalidos");
                                    swal("ERROR", "No se pudo registrar, intente en 5min", "error");
                                }
                            }
                        });

                        // }

                    } else {
                        swal("ERROR", "Clave no coincide", "error");
                    }


                } else {
                    swal("ERROR", "Llene el campo usuario", "error");
                }
            } else {
                swal("ERROR", "Llene el campo Email", "error");
            }
        } else {
            swal("ERROR", "Llene el campo Nombre", "error");
        }
    } else {
        swal("ERROR", "Llene el campo NIT", "error");
    }

}

function validarDatoEnBD(dato, columna, tabla) {

    datos = {
        dato: dato,
        columna: columna,
        tabla: tabla
    };
    return $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/buscarDato.php",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == false) {

                return false;
            } else {
                return true;
            }
        }
    });



}

function mostrarDatosUsuario(id) {
    datos = {
        id: id
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/cliente.php?op=2",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            $("#modalDatosUsuario").html("<h5>Usuario: </h5><p>" + response.usuario + "</p>" +
                "<h5>Rol: </h5><p>" + response.rol + "</p>" +
                "<h5>Direccion: </h5><p>" + response.direccion + "</p>" +
                "<h5>Tipo Cliente: </h5><p>" + response.tipo_cliente + "</p>" +
                "<h5>Sexo: </h5><p>" + response.sexo + "</p>" +
                "<h5>Empresa Base: </h5><p>" + response.id_empresa_base + "</p>" +
                "<h5>Nacimiento: </h5><p>" + response.nacimiento + "</p>" +
                "<h5>Fecha Registro: </h5><p>" + response.fecha_registro + "</p>");
        }
    });
}

function asignarIdUsuario(id) {
    $("#btnCambioClave").attr("onclick", "cambiarClaveUsuario(" + id + "); return false;");
}

function cambiarClaveUsuario(id) {

    var pass = $("#newClave").val();

    datos = {
        id: id,
        pass: pass
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/cliente.php?op=3",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == true) {
                swal("LISTO", "Cambio de clave exitoso", "success");
                $('#newClave').val('');
            } else {
                swal("ERROR", "Fallo al cambiar la clave", "error");
            }
        }
    });
}

function mostrarResumenCaso(id) {
    datos = {
        id: id
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/cliente.php?op=2",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            $("#modalDatosUsuario").html("<h5>Usuario: </h5><p>" + response.usuario + "</p>" +
                "<h5>Rol: </h5><p>" + response.rol + "</p>" +
                "<h5>Direccion: </h5><p>" + response.direccion + "</p>" +
                "<h5>Tipo Cliente: </h5><p>" + response.tipo_cliente + "</p>" +
                "<h5>Sexo: </h5><p>" + response.sexo + "</p>" +
                "<h5>Empresa Base: </h5><p>" + response.id_empresa_base + "</p>" +
                "<h5>Nacimiento: </h5><p>" + response.nacimiento + "</p>" +
                "<h5>Fecha Registro: </h5><p>" + response.fecha_registro + "</p>");
        }
    });
}

function recordarClave() {

    var email = $("#email").val();

    datos = {
        email: email
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/sesion.php?op=3",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == true) {
                enviarCorreo(email, "Su nueva clave es 12345");
            } else {
                swal("ERROR", "El email introducido no existe en la base de datos", "error");
            }
        }
    });

}

$(document).ready(function() {
    $('input[type=radio][name=categoria]').change(function() {
        var categoria = $('input:radio[name=categoria]:checked').val();
        $("#subcategoria").load(
            "php/items.php?op=1&categoria=" + categoria
        );

    });
});


function registrarSoporte() {

    var categoria = $('input:radio[name=categoria]:checked').val();
    var subcategoria = $('input:radio[name=subcategoria]:checked').val();
    var tipo = $('input:radio[name=tipo]:checked').val();
    var descripcion = $("#descripcion").val();
    var user_remoto = $("#user_remoto").val();
    var pass_remoto = $("#pass_remoto").val();



    datos = {
        categoria: categoria,
        subcategoria: subcategoria,
        tipo: tipo,
        descripcion: descripcion,
        user_remoto: user_remoto,
        pass_remoto: pass_remoto
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/soporte.php?op=1",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == true) {
                swal("Soporte Enviado", "La solicitud fue enviada con exito", "success");
                setTimeout(function() {
                    location.reload();
                }, 3000);

            } else {
                swal("ERROR", "Ocurrio un error al enviar, por favor intente luego", "warning");
            }
        }
    });

}

$(document).ready(function() {
    $('#btnNuevaCotizacion').click(function() {
        var descripcion = $("#descripcion").val();
        var urgencia = $("#urgencia").val();

        datos = {
            descripcion: descripcion,
            urgencia: urgencia
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/cotizacion.php?op=1",
            data: datos,
            beforeSend: function() {},
            success: function(response) {
                if (response.res == true) {
                    $("#modalNuevaCotizacion").modal("hide");
                    swal("Cotizacion Enviada", "La cotización fue enviada con exito", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    swal("ERROR", "Ocurrio un error al enviar cotización, intente de nuevo", "warning");
                }
            }
        });

    });
});

$(document).ready(function() {
    $('#btnCerrarNuevaCotizacion').click(function() {
        $("#modalNuevaCotizacion").modal("hide");
    });
});

$(document).ready(function() {
    $('#btnNuevoEvento').click(function() {

        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var fecha_inicio = $("#fecha_inicio").val();
        var fecha_fin = $("#fecha_fin").val();
        var enlace = $("#enlace").val();
        var color = $("#color").val();

        datos = {
            nombre: nombre,
            descripcion: descripcion,
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_fin,
            enlace: enlace,
            color: color
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/agenda.php?op=1",
            data: datos,
            beforeSend: function() {},
            success: function(response) {
                if (response.res == true) {
                    //notificacion("Evento Agregado: El evento se acaba de añadir a su agenda", 2);
                    swal("Evento Agregado", "El evento se acaba de añadir a su agenda", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    //notificacion("ERROR: El evento no se pudo añadir, intente de nuevo", 1);
                    swal("ERROR", "El evento no se pudo añadir, intente de nuevo", "error");
                }
            }
        });

    });
});


function insertarPerfil(id_cliente) {

    datos = {
        id: id_cliente,
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/cliente.php?op=2",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == true) {
                $("#nit").val(response.nit);
                $("#nombre_perfil").val(response.nombre);
                $("#apellido").val(response.apellido);
                $("#email").val(response.email);
                $("#direccion").val(response.direccion);
                $("#telefono").val(response.telefono);
                $("#genero").val(response.sexo);
                $("#nacimiento").val(response.nacimiento);
            } else {
                //notificacion("ERROR: El email introducido no existe en la base de datos", 1);
                swal("ERROR", "El email introducido no existe en la base de datos", "error");

            }
        }
    });

}

$(document).ready(function() {
    $('#btnCerrarModalPerfil').click(function() {
        $("#modalPerfilUsuario").modal("hide");
    });
});

$(document).ready(function() {
    $('#btnEditarPerfil').click(function() {

        var password = $("#clave").val();
        var rePassword = $("#repetirClave").val();

        if (password == rePassword) {

            swal({
                title: "¿Desea aplicar los cambios?",
                text: "Usted está seguro de que desea guardar los ultimos cambios en su perfil.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, ahora",
                closeOnConfirm: false
            }, function() {

                var nit = $("#nit").val();
                var nombre_perfil = $("#nombre_perfil").val();
                var apellido = $("#apellido").val();
                var email = $("#email").val();
                var direccion = $("#direccion").val();
                var telefono = $("#telefono").val();
                var genero = $("#sexo").val();
                var nacimiento = $("#nacimiento").val();

                var password = $("#clave").val();
                var rePassword = $("#repetirClave").val();

                if (password != "") {

                    datos = {
                        nit: nit,
                        nombre_perfil: nombre_perfil,
                        apellido: apellido,
                        email: email,
                        direccion: direccion,
                        telefono: telefono,
                        genero: genero,
                        nacimiento: nacimiento,
                        password: password
                    };

                } else {
                    datos = {
                        nit: nit,
                        nombre_perfil: nombre_perfil,
                        apellido: apellido,
                        email: email,
                        direccion: direccion,
                        telefono: telefono,
                        genero: genero,
                        nacimiento: nacimiento
                    };
                }



                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "php/cliente.php?op=4",
                    data: datos,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.res_personal == true) {
                            swal("Guardado Exitoso!", "Sus cambios han sido guardado con exito.", "success");
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            swal("ERROR", "Ocurrio un error al insertar, por favor intente de nuevo", "error");
                        }
                    }
                });



            });

        } else {

            swal("ERROR", "La clave no coincide", "error");

        }




    });
});