<?php $sesion = session(); ?>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $sesion->get('usuario'); ?>">
<div class="d-flex flex-column flex-grow-1 bg-white">
    <!-- inbox header -->
    <?php $valida = \Config\Services::validation(); ?>
    <div class="flex-grow-0">
        <!-- inbox button shortcut -->
        <div class="d-flex flex-wrap align-items-center pl-2 pr-3 py-2 px-sm-4 pr-lg-5 pl-lg-0 border-faded border-top-0 border-left-0 border-right-0">
            <h3 class="subheader-title mb-0 ml-2">
                <i class="subheader-icon fal fa-file"> </i> <?php echo $datos_bandeja['Numero_documento'] ?> <small>
                    <strong>Asunto:</strong> <?php $tamanio = strlen($datos_bandeja['Asunto']);
                                                if ($tamanio > 120) {
                                                    $tamanio -= 110;
                                                    echo substr($datos_bandeja['Asunto'], 0, -$tamanio);
                                                } else {
                                                    echo $datos_bandeja['Asunto'];
                                                } ?>
                </small>
            </h3>
            <div class="text-muted mr-1 mr-lg-3 ml-auto">
                <div id="grp_btn_estatus" class="btn-group">
                    <div class=" btn-group dropleft" role="group">
                        <button type="button" id="btn_opciones" title="Cambiar el estatus del documento" class="btn btn-danger dropdown-toggle dropdown-toggle-split waves-effect waves-themed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropleft</span>
                        </button>
                        <div class="dropdown-menu" id="cambio_estatus">
                            <a class="dropdown-item" id="a_pendiente" href="#" data-toggle="modal" data-target="default-example-modal">Pendiente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="a_signado" href="#">Asignado</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="a_atendido" href="#">Atendido</a>
                        </div>
                    </div>
                    <button type="button" id="btn_estatus" class=" btn btn-danger waves-effect waves-themed" title="Estatus del documento">
                        Pendiente
                    </button>
                </div>
            </div>
            <div class="btn-group" id="grp_turnado" style="display:none;">
                <div class=" btn-group dropleft" role="group">
                    <button type="button" id="estatus" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropleft</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item c_estatus" id="recibido" href="#">Recibido</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item c_estatus" id="asignado" href="#">Asignado</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item c_estatus" id="atendido" href="#">Atendido</a>
                    </div>
                </div>
                <button type="button" id="estatus" class=" btn btn-warning">
                    Turnado
                </button>
            </div>

        </div>

        <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Basic Modals
                            <small class="m-0 text-muted">
                                Below is a static modal example
                            </small>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" d-flex flex-wrap hidden-lg-down">
        <!-- end inbox button shortcut -->
    </div>
    <!-- end inbox header -->
    <!-- inbox message -->
    <div class=" flex-wrap align-items-center flex-grow-1 position-relative bg-white">
        <div class=" position-absolute pos-top pos-bottom w-100 custom-scroll">
            <div class="d-flex h-100 flex-column" style="overflow-y: scroll;">
                <!-- inbox title -->
                <!-- <div
                    class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-3 flex-shrink-0"> -->
                <!-- button for mobile -->
                <!-- <a href="javascript:void(0);"
                    class="pl-3 pr-3 py-2 d-flex d-lg-none align-items-center justify-content-center mr-2 btn"
                    data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-inbox-menu">
                    <i class="fal fa-ellipsis-v h1 mb-0 "></i>
                    </a> -->
                <!-- end button for mobile -->
                <!-- <h1 class="subheader-title mb-0 ml-2 ml-lg-5">
                    UAF-0001-2021 Respuesta al dictámen de estudio de factibilidad
                    </h1>
                    <span class="badge badge-primary ml-2 hidden-sm-down">INBOX</span>
                    <div class="d-flex position-relative ml-auto">
                        <a href="#" title="starred" class="btn btn-icon ml-1 fs-lg">
                            <i class="fas fa-star color-warning-500"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg" data-toggle="collapse"
                            data-target=".js-collapse">
                            <i class="fas fa-arrows-v"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg hidden-lg-down">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
            </div>-->
                <!-- end inbox title -->
                <!-- message -->
                <?php $i = 1  ?>
                <?php foreach ($datos_notas as $nota) { ?>
                    <div id="msg-0<?php echo $i; ?>" class="d-flex flex-column border-faded border-top-0 border-left-0 border-right-0 py-3 px-3 px-sm-4 px-lg-0 mr-0 mr-lg-5 flex-shrink-0">
                        <div class="d-flex align-items-center flex-row">
                            <div class="ml-0 mr-3 mx-lg-3">
                                <img src="<?= base_url() ?>/frontend/img/human_avatar.png" class="profile-image profile-image-md rounded-circle" alt="human avatar">
                                <!--<i class="fal fa-user fa-2x"></i> -->
                            </div>
                            <div class="fw-500 flex-1 d-flex flex-column cursor-pointer" data-toggle="collapse" data-target="#msg-0<?php echo $i; ?>> .js-collapse">
                                <div class="fs-lg">
                                    <?php echo  strtoupper($nota['usuario']) ?>
                                    <!-- <span class="fs-nano fw-400 ml-2">Remitente</span> -->

                                    <?php
                                    if ($nota['id_documento_adjunto'] != 0) {
                                        echo "<a href='" . base_url() . "/documents/" . $nota['path'] . "' target='_blank' class='btn btn-icon fs-xl mr-1' data-toggle='tooltip' data-original-title='Descargar documento' data-placement='top'>";
                                        echo " <i class='fas fa-paperclip color-fusion-300'></i></a>";
                                    }
                                    ?>

                                    <!-- <a href="/documents/2021_11/1635961581_d590b52595e1f18aea11.pdf" target="_blank" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Descargar documento" data-placement="top">
                                        <i class="fas fa-paperclip color-fusion-300"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="color-fusion-200 fs-sm">
                                <span class="hidden-sm-down"><?php echo $nota['fecha'] ?></span> <?php echo $nota['hora'] . ' hrs' ?>
                            </div>
                            <!-- <div class="collapsed-reveal">
                                <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg rounded-circle">
                                    <i class="fal fa-reply"></i>
                                </a>
                            </div> -->
                        </div>
                        <div class="collapse js-collapse">
                            <div class="pl-lg-5 ml-lg-5 pt-3 pb-4">
                                <?php echo $nota['nota'] ?>
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <?php $i++; ?>
                <?php } ?>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                    <a tabindex="18" href="" style="width:130px" data-focus="asignar_documento" role="button" data-action="toggle" data-class="d-flex" data-target="#panel-compose_asignar" data-original-title="" title="Asignar el documento" class="btn btn-info btn-sm mr-3" data-placement="botton"><span class="fas fa-paper-plane mr-1"></span>Asignar</a>
                    <a tabindex="19" href="<?= base_url() ?>/ver_documento/<?php echo $datos_bandeja['id'] ?>" data-toggle="tooltip" style="width:130px" data-original-title="Ver documento" title="Ver el documento creado" class="btn btn-primary btn-sm mr-3"><span class="fal fa-eye mr-1"></span>Ver documento</a>
                    <a tabindex="18" href="" style="width:130px" data-focus="respuesta_documento" role="button" data-action="toggle" data-class="d-flex" data-target="#panel-compose_respuesta" data-original-title="" title="Dar respuesta" class="btn btn-success btn-sm mr-3" data-placement="botton"><span class="fas fa-edit mr-1"></span>Dar respuesta</a>
                    <a tabindex="19" href="<?= base_url() ?>/ir_a_bandeja" data-toggle="tooltip" style="width:130px" data-original-title="Regreasar al buzon de documentos" title="Regresar a los documentos disponibles" class="btn btn-primary btn-sm mr-3"><span class="fal fa-chevron-left mr-1"></span>Regresar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end inbox message -->
    <!-- end inbox container -->
    <!-- compose message asignar -->
    <div id="panel-compose_asignar" class="panel w-100 position-fixed pos-bottom pos-right mb-0 z-index-cloud mr-lg-4 shadow-3 border-bottom-left-radius-0 border-bottom-right-radius-0 expand-full-height-on-mobile expand-full-width-on-mobile shadow" style="max-width:40rem; height:35rem; display: none;">
        <div class="position-relative h-100 w-100 d-flex flex-column">
            <!-- desktop view -->
            <div class="panel-hdr bg-fusion-600 height-4 d-none d-sm-none d-lg-flex">
                <h4 class="flex-1 fs-lg color-white mb-0 pl-3">
                    Asignar documento
                </h4>
                <div class="panel-toolbar pr-2">
                    <a href="#panel-compose_asignar" class="btn btn-icon btn-icon-light fs-xl mr-1" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla completa" data-placement="bottom">
                        <i class="fal fa-expand-alt"></i>
                    </a>
                    <a href="#panel-compose_asignar" class="btn btn-icon btn-icon-light fs-xl" data-action="toggle" data-class="d-flex" data-target="#panel-compose_asignar" data-toggle="tooltip" data-original-title="Cerrar" data-placement="bottom">
                        <i class="fal fa-times"></i>
                    </a>
                </div>
            </div>
            <!-- end desktop view -->
            <!-- mobile view -->
            <div class="d-flex d-lg-none align-items-center px-3 py-3 bg-faded  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
                <!-- button for mobile -->
                <!-- end button for mobile -->
                <h3 class="subheader-title">
                    Asignar documento
                </h3>
                <div class="ml-auto">
                    <button type="button" class="btn btn-outline-danger" data-action="toggle" data-class="d-flex" data-target="#panel-compose">Cancelar</button>
                </div>
            </div>
            <!-- end mobile view -->
            <div class="panel-container show rounded-0 flex-1 d-flex flex-column">
                <div class="px-3">
                    <form method="post" id="form_asignar" enctype="multipart/form-data" name="form_asignar" action="<?= base_url() ?>/asignar_documento">
                        <br>
                        <?php if ($valida->hasError('usuario_asigando')) {
                            $error = "<div class='invalid-feedback'>Debe seleccionar un usuario</div>";
                            $class = " invalid-feedback";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <select id="id_usuario_asigando" name="id_usuario_asigando" type="text" required placeholder="Asignar *" data-toggle="tooltip" data-original-title="Asignar" class="js-event-log js-data-example-ajax form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 <?php echo $class; ?>" tabindex="6" title="Seleccionar a quien asignar">
                            <option value="0">Asignar a *</option>
                        </select>
                        <?php echo $error ?>

                        <?php if ($valida->hasError('texto_asigna')) {
                            $error = "<div class='invalid-feedback'>Debe capturar una texto para la nota</div>";
                            $class = " invalid-feedback";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>

                        <textarea placeholder="Nota del documento *" id="texto_asigna" name="texto_asigna" required class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5 <?php echo $class; ?>" rows="15" data-toggle="tooltip" data-original-title="Nota del documento" tabindex="4" title="Capturar nota del documento"><?= old('texto_asigna') ?></textarea>
                        <?php echo $error ?>
                </div>
                <div class="flex-1" style="overflow-y: auto;">

                </div>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0" data-original-title="Asignar documento">
                    <button id="asignar_documento" name="asignar_documento" type="submit" class="btn btn-info mr-3">Asignar</button>

                    <?php if ($valida->hasError('documento_asignado')) {
                        $error = "<div class='invalid-feedback'>Debe seleccionar un documento válido</div>";
                        $class = " is-invalid";
                    } else {
                        $error = "";
                        $class = "";
                    } ?>
                    <input id="documento_asignado" name="documento_asignado" type="file">
                    <a href="#" id="subir_asignado" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Agregar documento" data-placement="top">
                        <!--<i class="fas fa-paperclip color-fusion-300"></i> -->
                    </a>


                    <a id="subir_respuesta" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Agregar documento" data-placement="top">
                        <?php echo $error ?>
                        <input type="hidden" name="id_estatus" value="<?php echo $datos_bandeja['id_estatus'] ?>">
                        <input type="hidden" name="id_documento" value="<?php echo $datos_bandeja['id'] ?>">
                        </form>
                </div>
            </div>
        </div>
    </div> <!-- end compose message asignar-->
    <!-- compose message respuesta -->

    <div id="panel-compose_respuesta" class="panel w-100 position-fixed pos-bottom pos-right mb-0 z-index-cloud mr-lg-4 shadow-3 border-bottom-left-radius-0 border-bottom-right-radius-0 expand-full-height-on-mobile expand-full-width-on-mobile shadow" style="max-width:40rem; height:35rem; display: none;">
        <div class="position-relative h-100 w-100 d-flex flex-column">
            <!-- desktop view -->
            <div class="panel-hdr bg-fusion-600 height-4 d-none d-sm-none d-lg-flex">
                <h4 class="flex-1 fs-lg color-white mb-0 pl-3">
                    Responder documento
                </h4>
                <div class="panel-toolbar pr-2">
                    <a href="#panel-compose_respuesta" class="btn btn-icon btn-icon-light fs-xl mr-1" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Pantalla completa" data-placement="bottom">
                        <i class="fal fa-expand-alt"></i>
                    </a>
                    <a href="#panel-compose_respuesta" class="btn btn-icon btn-icon-light fs-xl" data-action="toggle" data-class="d-flex" data-target="#panel-compose_respuesta" data-toggle="tooltip" data-original-title="Cerrar" data-placement="bottom">
                        <i class="fal fa-times"></i>
                    </a>
                </div>
            </div>
            <!-- end desktop view -->
            <!-- mobile view -->
            <div class="d-flex d-lg-none align-items-center px-3 py-3 bg-faded  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
                <!-- button for mobile -->
                <!-- end button for mobile -->
                <h3 class="subheader-title">
                    Responder documento
                </h3>
                <div class="ml-auto">
                    <button type="button" class="btn btn-outline-danger" data-action="toggle" data-class="d-flex" data-target="#panel-compose">Cancelar</button>
                </div>
            </div>
            <!-- end mobile view -->

            <div class="panel-container show rounded-0 flex-1 d-flex flex-column">
                <div class="px-3">
                    <form method="post" id="form_respuesta" enctype="multipart/form-data" action="<?= base_url() ?>/respuesta_documento">
                        <?php if ($valida->hasError('texto_respuesta')) {
                            $error = "<div class='invalid-feedback'>Debe proporcionar un texto para la nota</div>";
                            $class = " invalid-feedback";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <textarea placeholder="Respuesta al documento *" id="texto_respuesta" name="texto_respuesta" required class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" rows="15" data-toggle="tooltip" data-original-title="Nota del documento" tabindex="4" title="Capturar respuesta del documento"><?= old('texto_respuesta') ?></textarea>
                        <?php echo $error ?>
                </div>
                <div class="flex-1" style="overflow-y: auto;">

                </div>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0" data-original-title="Asignar documento">
                    <button id="responder_documento" name="responder_documento" type="submit" class="btn btn-success mr-3">Enviar</button>
                    <?php if ($valida->hasError('documento_respuesta')) {
                        $error = "<div class='invalid-feedback'>Debe seleccionar un archivo válido</div>";
                        $class = " invalid-feedback";
                    } else {
                        $error = "";
                        $class = "";
                    } ?>
                    <input type="file" id="documento_respuesta" name="documento_respuesta" />
                    <a id="subir_respuesta" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Agregar documento" data-placement="top">
                        <!--<i class="fas fa-paperclip color-fusion-300"></i> -->
                        <?php echo $error ?>
                    </a>
                    <input type="hidden" name="id_estatus" value="<?php echo $datos_bandeja['id_estatus'] ?>">
                    <input type="hidden" id="id_documento" name="id_documento" value="<?php echo $datos_bandeja['id'] ?>">
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end compose message -->
</div>


<script>
    switch ('<?= $datos_bandeja['estatus'] ?>') {
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
            break;
        case 'Turnado':
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

    $('#subir_respuesta').click(function() {
        $('#documento_respuesta').trigger('click');
    });
    $('#subir_asignado').click(function() {
        $('#documento_asignado').trigger('click');
    });
</script>