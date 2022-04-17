function des_ventana() {
    ventana_accion = document.getElementById("ventana_accion").style;
    ventana = document.getElementById("capa_ventana_accion").style;
    ventana.bottom = "-100vh";
    ventana_accion.bottom = "-100vh";
}
function act_ventana() {
    ventana_accion = document.getElementById("ventana_accion").style;
    ventana = document.getElementById("capa_ventana_accion").style;
    ventana.bottom = "0";
    ventana_accion.bottom = "0";
}

function eliminados() {
    var parametros = {};

    $.ajax({
        data: parametros,
        url: "../control/eliminados.php",
        type: "POST",

        beforesend: function () {
            $("#mostrar_mensaje").html("Mensaje antes de Enviar");
        },

        success: function (mensaje) {
            $("#content_tabs").html(mensaje);
        },
    });
}

function activar(id, tablaselect) {
    id_eliminar = id;
    tabla_select = tablaselect;

    var parametros = {
        id: id_eliminar,
        tabla: tabla_select,
    };

    console.log(parametros);

    $.ajax({
        data: parametros,
        dataType: "json",
        url: "../control/activar.php",
        type: "POST",

        beforeSend: function () {},

        error: function () {
            alert("error");
        },

        success: function () {
            eliminados();
        },
    });
}


function agregar(proceso) {
    if (proceso == 1) {
        act_ventana();
        var parametros = {
            proceso: proceso,
        };

    } else if (proceso == 2) {
        tabla_op = document.getElementById("input_tabla").value;
        var parametros = {
            proceso: proceso,
            tabla_select: tabla_op,
        };

    } else if (proceso == 3) {
        tabla = document.getElementById("input_tabla").value;
        campo1 = document.getElementById("input_1").value;
        campo2 = document.getElementById("input_2").value;
        campo3 = document.getElementById("input_3").value;
        if (tabla == 3) {
            foto = document.getElementById("foto");
        }

        var formData = new FormData();

        formData.append("tabla_select", tabla);
        formData.append("campo1", campo1);
        formData.append("campo2", campo2);
        formData.append("campo3", campo3);
        if (tabla == 3) {
            descripcion = document.getElementById("descripcion").value;
            ingredientes = document.getElementById("ingredientes").value;

            formData.append("foto", $("input[type=file]")[0].files[0]);
            formData.append("descripcion", descripcion);
            formData.append("ingredientes", ingredientes);
        }
    }

    if (proceso == 3) {
        $.ajax({
            data: formData,
            url: "../control/insertar.php",
            type: "POST",
            processData: false,
            contentType: false,

            beforeSend: function () {},

            error: function () {},

            complete: function () {},

            success: function (mensaje) {
                alert(mensaje);
                consultar(tabla);
                des_ventana();
            },
        });
    } else {
        $.ajax({
            data: parametros,
            url: "../control/agregar.php",
            type: "POST",

            beforeSend: function () {},

            error: function () {},

            success: function (mensaje) {
                $("#form_datos").html(mensaje);
            },
        });
    }
}

function eliminar(id, tablaselect) {
    id_eliminar = id;
    tabla_select = tablaselect;

    var parametros = {
        id: id_eliminar,
        tabla: tabla_select,
    };

    console.log(parametros);

    $.ajax({
        data: parametros,
        dataType: "json",
        url: "../control/eliminar.php",
        type: "POST",

        beforeSend: function () {},

        error: function () {
            alert("error");
        },

        success: function (mensaje) {
            consultar(tabla_select);
        },
    });
}

function actualizar() {
    des_ventana();

    tabla = $("#input_tabla").val();
    campo_id = $("#input_id").val();
    campo_1 = $("#input_1").val();
    campo_2 = $("#input_2").val();
    campo_3 = $("#input_3").val();

    if (tabla == 3) {
        descripcion = $("#descripcion").val();
        ingredientes = $("#ingredientes").val();

        var parametros = {
            tabla: tabla,
            id: campo_id,
            campo_1: campo_1,
            campo_2: campo_2,
            campo_3: campo_3,
            descripcion: descripcion,
            ingredientes: ingredientes,
        };
    } else {
        var parametros = {
            tabla: tabla,
            id: campo_id,
            campo_1: campo_1,
            campo_2: campo_2,
            campo_3: campo_3,
        };
    }


    console.log(parametros);

    $.ajax({
        data: parametros,
        dataType: "json",
        url: "../control/actualizar.php",
        type: "POST",

        beforeSend: function () {},

        error: function () {
            alert("error");
        },

        success: function (mensaje) {
            consultar(tabla);
        },
    });
}

function editar(id, tablaselect) {
    act_ventana();

    id = id;
    tablaselect = tablaselect;

    var parametros = {
        id_editar: id,
        tablaselect: tablaselect,
    };

    $.ajax({
        data: parametros,
        url: "../control/editar.php",
        type: "POST",

        beforeSend: function () {},

        error: function () {},

        complete: function () {},

        success: function (mensaje) {
            $("#form_datos").html(mensaje);
        },
    });
}

function buscar() {
    dato_buscar = document.getElementById("input_buscar").value;

    var parametros = {
        busqueda: dato_buscar,
    };

    $.ajax({
        data: parametros,
        url: "../control/buscador.php",
        type: "POST",

        beforesend: function () {
            $("#mostrar_mensaje").html("Mensaje antes de Enviar");
        },

        success: function (mensaje) {
            $("#content_tabs").html(mensaje);
        },
    });
}

function consultar(btn) {
    accion = btn;
    var parametros = {
        accion: accion,
    };

    $.ajax({
        data: parametros,
        url: "../control/consultar.php",
        type: "POST",

        beforesend: function () {
            $("#mostrar_mensaje").html("Mensaje antes de Enviar");
        },

        success: function (mensaje) {
            $("#content_tabs").html(mensaje);
        },
    });
}
