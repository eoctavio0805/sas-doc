// BLOQUE DE FUNCION PARA EL MANEJO DEL MENU //////////////////
var getUrl = window.location;

$('.nav-menu').on('click', 'li > a', function () {
    let obj = $(this);
    // localStorage.setItem('menu_li', $(this).parent().attr('data-rol'))
    location.reload();
});

function busca_parent(obj) {
    let obj_par = obj.parent();
    if (!obj_par.hasClass('nav-menu')) {
        if (obj_par.is('li'))
            obj_par.addClass('open active')
        busca_parent(obj_par)
    }
};

$(document).ready(function () {
    /* $('.nav-menu li[data-rol=' + localStorage.getItem('menu_li') + ']').addClass('active');
     let obj = $('.nav-menu li[class=active]'); */
    //busca_parent(obj);

    //Mostrar titulo, descripcion e icono de la pagina
    $('#title_page').html($('.nav-menu li[class=active]').attr('data-title'));
    $('#icon_page').addClass($('.nav-menu li[class=active]').attr('data-icon'));
    $('#description_page').html($('.nav-menu li[class=active]').attr('data-description'));

    //cambiar el estatus de un documento


    //Asignar fecha y hora actual de manera automática a los controles de los documentos
    //generados así como de los documentos recibidos, durante la captura

    //Documentos generados por el área
    $("#fecha_emision").val(fechaActualFormato());
    $("#hora_emision").val(horaActualFormato());
    //Documentos Recibidos
    // $("#fecha_emision_recibido").val(fechaActualFormato());
    $("#fecha_recepcion").val(fechaActualFormato());
    $("#hora_recepcion").val(horaActualFormato());

    llenarTabla();
    //buscar_datos_tabla();
    //crearTabla();

    //subirDocumento();
    getUsuarios();
    restablecerTiposUsuarios();


});
// FIN BLOQUE DE FUNCION PARA EL MANEJO DEL MENU //////////////////


/*$('#select2')
    .select2()
    .on('select2:open', () => {
        $(".select2-results:not(:has(a))").append('<a href="#" style="padding: 6px;height: 20px;display: inline-table;">Create new item</a>');
})*/

//initApp.pushSettings("nav-function-minify layout-composed", false);


/*
   Esta función permite cambiar el estatus del documento 
   tanto en la apariencia como a nivel de la base de datos
   en la vista notas.php
*/

$("#cambio_estatus").on("click", function (event) {
    var estatus = $(event.target).html();
    var idDocumento = $('input#id_documento').val();
    //var validado = false;
    let data = "";
    var usuario = $("#usuario").val();
    Swal.fire(
        {
            title: "El estatus cambiara a " + estatus,
            text: "Seleccione a quien turnará el documento",
            input: "password",
            inputAttributes:
            {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Enviar",
            cancelButtonText: "Cancelar",
            showLoaderOnConfirm: true,
            preConfirm: function preConfirm(password) {
                ///////////////////////////////
                data = "usuario=" + usuario + "&password=" + password;
                axios({
                    method: 'post',
                    url: 'http://187.218.23.71/API_REST/api/autorizacion',
                    data: data
                })
                    .then(function (response) {
                        if (response.data.status == 200) {
                            //validado = true;
                            cambiarEstatus(estatus, idDocumento);
                            Swal.fire("Estatus cambiado!", "El cambio se registró " +
                                "en la bitacora", "success");
                        }
                        else {
                            sclose('Sin conexion aparente con el servidor', 'error');
                        }
                    })
                    .catch(function (error) {
                        sclose('Credenciales Incorrectas', 'error');

                    });
                //return validado;
                ////////////////
            },
            /* allowOutsideClick: function allowOutsideClick() {
                 return !Swal.isLoading();
             }*/
        })/*.then(function (result) {
            if (result.value) {
                Swal.fire("Estatus cambiado!", "El cambio se registró " +
                    "en la bitacora", "success");
                // cambiarEstatus(estatus, idDocumento);
            } else {

            }
        });*/
});

function sclose(titulo, tipo, fn = null) {
    Swal.fire({
        title: titulo,
        icon: tipo,
        onClose: () => {
            if (!!fn)
                fn();
        }
    })
}

function cambiarEstatus(estatus, idDocumento) {

    var idEstatus;

    switch (estatus) {
        case 'Pendiente':
            $('#btn_estatus').text('Pendiente');
            $('#btn_estatus').removeClass('btn-warning');
            $('#btn_estatus').removeClass('btn-success');
            $('#btn_estatus').removeClass('btn-info');
            $('#btn_estatus').addClass('btn-danger');

            $('#btn_opciones').removeClass('btn-warning');
            $('#btn_opciones').removeClass('btn-success');
            $('#btn_opciones').removeClass('btn-info');
            $('#btn_opciones').addClass('btn-danger');
            idEstatus = 6;
            break;
        case 'Asignado':
            $('#btn_estatus').text('Asignado');
            $('#btn_estatus').removeClass('btn-danger');
            $('#btn_estatus').removeClass('btn-success');
            $('#btn_estatus').removeClass('btn-info');
            $('#btn_estatus').addClass('btn-warning');

            $('#btn_opciones').removeClass('btn-danger');
            $('#btn_opciones').removeClass('btn-success');
            $('#btn_opciones').removeClass('btn-info')
            $('#btn_opciones').addClass('btn-warning');
            idEstatus = 7;
            break;
        case 'Atendido':
            $('#btn_estatus').text('Atendido');
            $('#btn_estatus').removeClass('btn-danger');
            $('#btn_estatus').removeClass('btn-warning');
            $('#btn_estatus').removeClass('btn-info');
            $('#btn_estatus').addClass('btn-success');

            $('#btn_opciones').removeClass('btn-danger');
            $('#btn_opciones').removeClass('btn-warning');
            $('#btn_opciones').removeClass('btn-info');
            $('#btn_opciones').addClass('btn-success');
            idEstatus = 3;
            break;
        default:
            $('#btn_estatus').text('No definido');
            $('#btn_estatus').removeClass('btn-danger');
            $('#btn_estatus').removeClass('btn-warning');
            $('#btn_estatus').removeClass('btn-success');
            $('#btn_estatus').addClass('btn-info');

            $('#btn_opciones').removeClass('btn-danger');
            $('#btn_opciones').removeClass('btn-warning');
            $('#btn_opciones').removeClass('btn-success');
            $('#btn_opciones').addClass('btn-info');

    }
    $.ajax({
        url: getUrl.protocol + '//' + getUrl.host + '/sasdoc/public/actualiza_estatus/' + idEstatus + '/' + idDocumento,
        succes: function (resultado) {
            console.log(resultado.respuesta);
            if (resultado == 0) {
                console.log("No se actualizo estatus");
            } else {
                var resultado = JSON.parse(resultado);
                console.log(resultado.respuesta);
            }

        }
    });

}

$("#elimina_documento").on("click", function (event) {
    //var estatus = $(event.target).html();
    var idDocumento = $('#id_documento').val();
    let data = "";
    var usuario = $("#usuario").val();
    Swal.fire(
        {
            title: "El documento se eliminara",
            text: "Tecleé su password para confirmar",
            input: "password",
            inputAttributes:
            {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Enviar",
            cancelButtonText: "Cancelar",
            showLoaderOnConfirm: true,
            preConfirm: function preConfirm(password) {
                data = "usuario=" + usuario + "&password=" + password;
                axios({
                    method: 'post',
                    url: 'http://187.218.23.71/API_REST/api/autorizacion',
                    data: data
                })
                    .then(function (response) {
                        if (response.data.status == 200) {
                            $.ajax({
                                url: getUrl.protocol + '//' + getUrl.host + '/sasdoc/public/actualiza_estatus/8/' + idDocumento,
                                succes: function (resultado) {
                                    console.log(resultado.respuesta);
                                    if (resultado == 0) {
                                        console.log("No se actualizo estatus");
                                    } else {
                                        var resultado = JSON.parse(resultado);
                                        console.log(resultado.respuesta);
                                    }
                                }
                            });

                            Swal.fire("Documento eliminado!", "La eliminación se registró " +
                                "en la bitacora", "success")
                            location.href = `${location.protocol}//${location.host}/sasdoc/public/ir_a_bandeja`;

                        }
                        else {
                            sclose('Sin conexion aparente con el servidor', 'error');
                        }
                    })
                    .catch(function (error) {
                        sclose('Credenciales Incorrectas', 'error');

                    });
            },
        })
});

/*
 Esta función permite darle formato a todos los campos de fecha y hora del 
  sistema
*/
function fechaActualFormato() {
    let hoy = new Date();

    let dia = String(hoy.getDate());
    let mes = String(hoy.getMonth() + 1);
    let anio = hoy.getFullYear();

    let fecha_actual = anio + '-';

    if (mes.length < 2) {
        mes = "0" + mes;
        fecha_actual += mes;
    } else {

        fecha_actual += mes;
    }

    if (dia.length < 2) {
        dia = "0" + dia;
        fecha_actual += "-" + dia;
    } else {

        fecha_actual += "-" + dia;
    }
    return fecha_actual;

}

function horaActualFormato() {
    let tiempo = new Date();
    let hora = tiempo.getHours();
    let minutos = tiempo.getMinutes();

    hora = (hora < 10 ? "0" : "") + hora;
    minutos = (minutos < 10 ? "0" : "") + minutos;

    return hora + ":" + minutos;

}


/*
 Llenar la tabla con el listado histórico de documentos
 que permitirá descargar reportes en excel o enviar a imprimir
 con un formato preedeterminado en la tabla tabal
*/

function llenarTabla() {
    // initialize datatable
    var getUrl = window.location;
    $('#dt-basic-example').dataTable(
        {
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/mostrar_listado_historico",
                'data': function (data) {
                    var csrfName = $('.txt_csrfname').attr('name');
                    var csrfHash = $('.txt_csrfname').val();
                    return {
                        data: data,
                        [csrfName]: csrfHash
                    }
                },
                'dataSrc': function (data) {
                    $('.txt_csrfname').val(data.token);
                    return data.aaData;
                }
            },
            'columns': [
                { data: 'id' },
                { data: 'Numero_documento' },
                { data: 'Fecha_emision' },
                { data: 'Expediente' },
                { data: 'Asunto' },
                { data: 'Remitente' },
                { data: 'Destinatario' },
                { data: 'Seguimiento_por' },
                { data: 'Tipo_documento' },
                { data: 'Expira' }
            ],
            responsive: true,
            lengthChange: true,
            pageLength: 10,
            dom:
                /*	--- Layout Structure 
                    --- Options
                    l	-	length changing input control
                    f	-	filtering input
                    t	-	The table!
                    i	-	Table information summary
                    p	-	pagination control
                    r	-	processing display element
                    B	-	buttons
                    R	-	ColReorder
                    S	-	Select

                    --- Markup
                    < and >				- div element
                    <"class" and >		- div with a class
                    <"#id" and >		- div with an ID
                    <"#id.class" and >	- div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            buttons: [
                /*{
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                }, */
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                /*   {
                       extend: 'csvHtml5',
                       text: 'CSV',
                       titleAttr: 'Exportar a CSV',
                       className: 'btn-outline-success btn-sm mr-1'
                   },*/
                {
                    extend: 'copyHtml5',
                    text: 'Copiar',
                    titleAttr: 'Copiar al porta papeles',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir la tabla',
                    className: 'btn-outline-primary btn-sm mr-1'
                }

            ],

            language: {
                url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/frontend/js/es_es.json",
            }

        });

}

function subirDocumento() {
    $('#subir_respuesta').click(function () {
        $('#documento_respuesta').trigger('click');
    });
    $('#subir_asignado').click(function () {
        $('#documento_asignado').trigger('click');
    });
}


function getUsuarios() {

    $("#id_remitente").select2({
        ajax: {
            url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/cargar_usuarios",
            type: "post",
            dataType: 'json',
            width: 'resolve',
            delay: 250,
            data: function (params) {
                var csrfName = $('.txt_csrfname').attr('name');
                var csrfHash = $('.txt_csrfname').val();
                return {
                    searchTerm: params.term,
                    [csrfName]: csrfHash
                };
            },
            processResults: function (response) {
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                }
            },
            cache: true
        },
        placeholder: 'Buscar un remitente',
        allowClear: true,
        language: {

            inputTooShort: function () {
                return "Por favor ingresa 1 o mas caracteres...";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateSelection: formatRepoSelection

    });

    $("#id_destinatario").select2({
        ajax: {
            url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/cargar_usuarios",
            type: "post",
            dataType: 'json',
            width: 'resolve',
            delay: 250,
            data: function (params) {
                var csrfName = $('.txt_csrfname').attr('name');
                var csrfHash = $('.txt_csrfname').val();
                return {
                    searchTerm: params.term,
                    [csrfName]: csrfHash
                };
            },
            processResults: function (response) {
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                }
            },
            cache: true
        },
        placeholder: 'Buscar un destinatario',
        allowClear: true,
        language: {

            inputTooShort: function () {
                return "Por favor ingresa 1 o mas caracteres...";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateSelection: formatRepoSelection

    });


    $("#id_asignado_a").select2({
        ajax: {
            url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/cargar_usuarios",
            type: "post",
            dataType: 'json',
            width: 'resolve',
            delay: 250,
            data: function (params) {
                var csrfName = $('.txt_csrfname').attr('name');
                var csrfHash = $('.txt_csrfname').val();
                return {
                    searchTerm: params.term,
                    [csrfName]: csrfHash
                };
            },
            processResults: function (response) {
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                }
            },
            cache: true
        },
        placeholder: 'Buscar a quien asignar el documento',
        allowClear: true,
        language: {

            inputTooShort: function () {
                return "Por favor ingresa 1 o mas caracteres...";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateSelection: formatRepoSelection

    });

    $("#id_usuario_asigando").select2({
        ajax: {
            url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/cargar_usuarios",
            type: "post",
            dataType: 'json',
            width: 'resolve',
            delay: 250,
            data: function (params) {
                var csrfName = $('.txt_csrfname').attr('name');
                var csrfHash = $('.txt_csrfname').val();
                return {
                    searchTerm: params.term,
                    [csrfName]: csrfHash
                };
            },
            processResults: function (response) {
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                }
            },
            cache: true
        },
        placeholder: 'Buscar a quien asignar el documento',
        allowClear: true,
        theme: "classic",
        language: {

            inputTooShort: function () {
                return "Por favor ingresa 5 o mas caracteres...";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateSelection: formatRepoSelection

    });

}

function restablecerTiposUsuarios() {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: getUrl.protocol + "//" + getUrl.host + "/sasdoc/public/restablecer_tipos_usuarios",
        //data: { datos: datos },
        success: function (data) {
            console.log('Se restableció la tabla de usuarios ' + data);
        }
    });
}

function formatRepoSelection(repo) {
    return repo.full_name || repo.text;
}

