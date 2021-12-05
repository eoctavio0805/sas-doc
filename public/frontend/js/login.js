$("body").on('click', '#btn_ingresar', function (e) {
    e.preventDefault();
    //if (e.keyCode == 13) {
    let data = $('form[name=login]').serialize();
    axios({
        method: 'post',
        url: 'http://187.218.23.71/API_REST/api/autorizacion',
        data: data
    })
        .then(function (response) {
            if (response.data.status == 200) {
                $.ajax({
                    method: 'post',
                    url: 'usuarios/asignaToken',
                    data: {
                        'data': response.data.data
                    },
                })
                    .then(function () {
                        $.ajax({
                            /* method: 'get',
                             url: '<?=base_url()?>inicio/inserta_empleado'*/
                        })
                            .then(function (res) {
                                location.href = `${location.protocol}//${location.host}/sasdoc/public/ir_a_bandeja`;
                            })
                    })
            }
            else {
                sclose('Sin conexion aparente con el servidor', 'error')
            }
        })
        .catch(function (error) {
            sclose('Credenciales Incorrectas', 'error');

        });
    // }
})

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

$('body').on('click', '#btx_salir', function () {
    //location.href = '<?=base_url()?>inicio/salir';
})