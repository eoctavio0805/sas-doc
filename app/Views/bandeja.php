<!-- Page heading removed for composed layout -->

<div class="d-flex flex-grow-1 p-0">
    <!-- left slider -->
    <div id="js-inbox-menu" class="flex-wrap position-relative bg-white slide-on-mobile slide-on-mobile-left">
        <div class="position-absolute pos-top pos-bottom w-100">
            <div class="d-flex h-100 flex-column">
                <div class="px-3 px-sm-4 px-lg-5 py-4 align-items-center">
                    <div class="btn-group btn-block" role="group" aria-label="Button group with nested dropdown ">
                        <button type="button" class="btn btn-info btn-block fs-md" data-action="toggle" onclick="location.href='<?= base_url() ?>/nuevo_documento_generado'" data-class="d-flex" data-focus="message-to">Nuevo</button>
                        <div class="btn-group" role="group">
                            <a id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle px-2 js-waves-off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="<?= base_url() ?>/nuevo_documento_recibido">Recibido</a>
                                <a class="dropdown-item" href="<?= base_url() ?>/nuevo_documento_generado">Generado
                                    por la
                                    dependencia</a>
                                <div class="dropdown-divider m-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 pr-3">
                    <a href="<?= base_url() ?>/ir_a_bandeja" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md font-weight-bold d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0 ">
                        <div>
                            <i class="fas fa-folder-open width-1"></i>Disponibles
                        </div>
                        <div class="fw-400 fs-xs">(<?php echo $totalDocumentos ?>)
                        </div>
                    </a>
                    <a href="<?= base_url() ?>/filtrar_bandeja_por_estatus/6" id="pendientes" name="pendientes" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md  d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                        <div>
                            <i class="fas fa-flag width-1"></i>Pendientes
                        </div>
                        <div class="fw-400 fs-xs">(<?php echo $totalPendientes ?>)</div>
                    </a>
                    <a href="<?= base_url() ?>/filtrar_bandeja_por_estatus/3" id="atendidos" name="atendidoa" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                        <div class="icon">
                            <i class="fas fa-check width-1"></i>Atendidos
                        </div>
                        <div class="fw-400 fs-xs">(<?php echo $totalAtendidos ?>)</div>
                    </a>
                    <a href="<?= base_url() ?>/filtrar_bandeja_por_estatus/7" id="asignados" name="asignados" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                        <div>
                            <i class="fas fa-paper-plane width-1"></i>Asignados
                        </div>
                        <div class="fw-400 fs-xs">(<?php echo $totalAsignados ?>)</div>
                    </a>

                    <!--           <a href="javascript:void(0)"
                        class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md font-weight-bold d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                        <div>
                            <i class="fas fa-trash width-1"></i>Eliminados
                        </div>
                    </a> -->
                </div>
                <!--  <div class="px-5 py-3 fs-nano fw-500">
                    1.5 GB (10%) of 15 GB used
                    <div class="progress mt-1" style="height: 7px;">
                        <div class="progress-bar" role="progressbar" style="width: 11%;" aria-valuenow="11"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="slide-backdrop" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-inbox-menu">
    </div> <!-- end left slider -->
    <!-- inbox container -->
    <div class="d-flex flex-column flex-grow-1 bg-white">
        <!-- inbox header -->
        <div class="flex-grow-0">
            <!-- inbox title -->
            <div class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-4  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
                <!-- button for mobile -->
                <a href="javascript:void(0);" class="pl-3 pr-3 py-2 d-flex d-lg-none align-items-center justify-content-center mr-2 btn" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-inbox-menu">
                    <i class="fas fa-ellipsis-v h1 mb-0 "></i>
                </a>
                <!-- end button for mobile -->
                <h1 class="subheader-title ml-1 ml-lg-0">
                    <i class="fas fa-folder-open mr-2 hidden-lg-down"></i>
                    Bandeja de documentos disponibles
                </h1>

                <div class="d-flex position-relative ml-auto" style="max-width: 23rem;">
                    <!--<i class="fas fa-search position-absolute pos-right fs-lg px-3 py-2 mt-1"></i> -->
                    <form method="post" action="<?= base_url() ?>/filtrar_bandeja_por_criterio">
                        <div class="input-group">
                            <input type="text" name="criterio" id="criterio" class="form-control bg-subtlelight pl-6" placeholder="Buscar documentos">
                            <button type="submit" class="btn btn-outline-default btn-icon  waves-effect waves-themed">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end inbox title --
             inbox button shortcut menu de estados-->
            <!--<a href="#" title="" class="d-flex align-items-center py-1 ml-2 mt-4 mt-lg-0 ml-lg-0 mr-lg-4 fs-lg  order-3 order-lg-2"></a> -->
            <div class="d-flex flex-wrap align-items-center pl-3 pr-1 py-2 px-sm-4 px-lg-5 border-faded border-top-0 border-left-0 border-right-0">

                <div class="flex-1 d-flex align-items-center">
                    <div class="row w-100">
                        <!-- <a href="#" title="" class="d-flex align-items-center py-1 ml-2 mt-4 mt-lg-0 ml-lg-0 mr-lg-4 fs-lg  order-3 order-lg-2"><i class="fal fa-archive"></i></a> -->
                        <!--  <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-3"><b>Número del documento</b></a> -->
                        <!-- <a href="#" title="" class="d-flex align-items-center py-1 ml-2 mt-4 mt-lg-0 ml-lg-0 mr-lg-4 fs-lg  order-3 order-lg-2"><i class="fal fa-archive"></i></a> -->
                        <!--   <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-5"><b>Asunto</b></a> -->
                        <!-- <a href="#" title="" class="d-flex align-items-center py-1 ml-2 mt-4 mt-lg-0 ml-lg-0 mr-lg-4 fs-lg  order-3 order-lg-2"><i class="fal fa-archive"></i></a> -->
                        <!--    <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-2"><b>Asignado a</b></a> -->
                    </div>
                    <!-- <div class="custom-control custom-checkbox mr-2 mr-lg-2 d-inline-block">
                        <input type="checkbox" class="custom-control-input" id="js-msg-select-all">
                        <label class="custom-control-label bolder" for="js-msg-select-all"></label>
                    </div>
                    <div class="custom-control custom-checkbox mr-2 mr-lg-2 d-inline-block">
                    </div>

                    <a href="/ir_a_bandeja" title="Actualizar bandeja" class="btn btn-icon rounded-circle mr-1">
                        <i class="fas fa-redo fs-md"></i>
                    </a>
                    <a href="javascript:void(0);" title="Marcar como pendiente" class="btn btn-icon rounded-circle mr-1">
                        <i class="fas fa-flag width-1"></i>
                    </a>
                    <a href="javascript:void(0);" title="Marcar como atendido" id="js-delete-selected" class="btn btn-icon rounded-circle mr-1">
                        <i class="fas fa-check"></i>
                    </a> -->
                </div>


                <div class="text-muted mr-1 mr-lg-3 ml-auto">

                    <!-- 1 - 17 <span class="hidden-lg-down"> de </span> -->
                </div>
                <div class="d-flex flex-wrap">
                    <!-- <button class="btn btn-icon rounded-circle"><i class="fal fa-chevron-left fs-md"></i></button>
                    <button class="btn btn-icon rounded-circle"><i class="fal fa-chevron-right fs-md"></i></button> -->
                    <?= $pager->simpleLinks() ?>
                </div>
            </div>
            <!-- end inbox button shortcut -->
        </div>
        <!-- end inbox header -->
        <!-- inbox message -->
        <div class="flex-wrap align-items-center flex-grow-1 position-relative bg-gray-50">
            <div class="position-absolute pos-top pos-bottom w-100 custom-scroll">
                <div class="d-flex h-100 flex-column" style="overflow-y: scroll;">
                    <!-- message list (the part that scrolls) -->
                    <?php
                    $clase = '';
                    $estilo = '';
                    if ($empty == 1) {
                        $clase = 'alert alert-danger';
                        $estilo = '';
                    } else {
                        $clase = 'notification notification-layout-2';
                        $estilo = 'display: none;';
                    }
                    ?>
                    <ul id="js-emails" class="<?php echo $clase; ?>" style='text-align: center;'>

                        <li class="bg-primary bg-primary-gradient border–top: 1px solid #444; border–right: 1px solid #333; border–bottom: 1px solid #000; border–left: 1px solid #333; border-style:outset;">
                            <div class=" d-flex align-items-center px-3 px-sm-4 px-lg-6 py-1 py-lg-0 height-4 height-mobile-auto">
                                <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-3" style="color:whitesmoke"><b>Número del documento</b></a>
                                <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-5" style="color:whitesmoke"><b>Asunto</b></a>
                                <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-3" style="color:whitesmoke"><b>Asignado a</b></a>
                                <a href="#" class="d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-1" style="color:whitesmoke"><b>Fecha de emisión</b></a>
                            </div>
                        </li>

                        <span style="<?php echo $estilo; ?>">No hay documentos en la búsqueda realizada</span>

                        <?php foreach ($datosBandeja as $data) { ?>
                            <?php
                            $estatus = '';
                            $bandera = '';
                            $color = '';
                            $titulo = '';
                            if (strcmp($data['estatus'], 'Pendiente') === 0) {
                                $estatus = 'unread';
                                $bandera = 'fas fa-flag width-1';
                                $color = 'danger';
                                $titulo = 'Pendiente';
                            } else if (strcmp($data['estatus'], 'Asignado') === 0) {
                                $bandera = 'fas fa-paper-plane width-1';
                                $color = 'warning';
                                $titulo = 'Asignado';
                            } else if (strcmp($data['estatus'], 'Turnado') === 0) {
                                $bandera = 'fas fa-paper-plane width-1';
                                $color = 'warning';
                                $titulo = 'Asignado';
                            } else if (strcmp($data['estatus'], 'Atendido') === 0) {
                                $bandera = 'fas fa-check';
                                $color = 'success';
                                $titulo = 'Atendido';
                            } else {
                                $bandera = "fas fa-question";
                                $color = 'info';
                                $titulo = 'Indefinido';
                            }

                            $fecha = date_create($data['Fecha_emision']);
                            ?>
                            <li class="<?php echo $estatus; ?>">
                                <div class="d-flex align-items-center px-3 px-sm-4 px-lg-5 py-1 py-lg-0 height-4 height-mobile-auto">
                                    <!--  <div class="custom-control custom-checkbox mr-3 order-1">
                                        <input type="checkbox" class="custom-control-input" id="msg-1">
                                        <label class="custom-control-label" for="msg-1"></label>
                                    </div> -->
                                    <a href="<?= base_url() ?>/ver_notas/<?php echo $data['id'] ?>/<?php echo $data['id_estatus'] ?>" title="<?php echo $titulo; ?>" class="d-flex align-items-center py-1 ml-2 mt-4 mt-lg-0 ml-lg-0 mr-lg-4 fs-lg color-<?php echo $color; ?>-500 order-3 order-lg-2"><i class="<?php echo $bandera ?>"></i></a>
                                    <div class="d-flex flex-row flex-wrap flex-1 align-items-stretch align-self-stretch order-2 order-lg-auto">
                                        <div class="row w-100">

                                            <a href="<?= base_url() ?>/ver_notas/<?php echo $data['id'] ?>/<?php echo $data['id_estatus'] ?>" class="name d-flex width-sm align-items-center pt-1 pb-0 py-lg-1 col-3"><?php echo $data['Numero_documento']; ?></a>
                                            <a href="<?= base_url() ?>/ver_notas/<?php echo $data['id'] ?>/<?php echo $data['id_estatus'] ?>" class="name d-flex align-items-center pt-0 pb-1 py-lg-1 flex-1 col-5" style="text-align: left;">
                                                <?php $tamanio = strlen($data['Asunto']);
                                                if ($tamanio > 120) {
                                                    $tamanio -= 70;
                                                    echo substr($data['Asunto'], 0, -$tamanio);
                                                } else {
                                                    echo $data['Asunto'];
                                                } ?></a>
                                            <a href="<?= base_url() ?>/ver_notas/<?php echo $data['id'] ?>/<?php echo $data['id_estatus'] ?>" class="name d-flex align-items-center pt-0 pb-1 py-lg-1 flex-1 col-3"><?php echo $data['Seguimiento_por']; ?></a>
                                        </div>
                                    </div>
                                    <div class="fs-sm text-muted ml-auto hide-on-hover-parent order-4 position-on-mobile-absolute pos-top pos-right mt-2 mr-3 mr-sm-4 mt-lg-0 mr-lg-0">
                                        <?php echo $data['Fecha_emision'] . " " . $data['Hora_emision'] . " hrs"; ?></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- end message list -->
                </div>
            </div>
        </div>
        <!-- end inbox message -->
    </div>
    <!-- end inbox container -->
    <!-- compose message -->
    <div id="panel-compose" class="panel w-100 position-fixed pos-bottom pos-right mb-0 z-index-cloud mr-lg-4 shadow-3 border-bottom-left-radius-0 border-bottom-right-radius-0 expand-full-height-on-mobile expand-full-width-on-mobile shadow" style="max-width:40rem; height:35rem; display: none;">
        <div class="position-relative h-100 w-100 d-flex flex-column">
            <!-- desktop view -->
            <div class="panel-hdr bg-fusion-600 height-4 d-none d-sm-none d-lg-flex">
                <h4 class="flex-1 fs-lg color-white mb-0 pl-3">
                    New Message
                </h4>
                <div class="panel-toolbar pr-2">
                    <a href="javascript:void(0);" class="btn btn-icon btn-icon-light fs-xl mr-1" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" data-placement="bottom">
                        <i class="fal fa-expand-alt"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-icon-light fs-xl" data-action="toggle" data-class="d-flex" data-target="#panel-compose" data-toggle="tooltip" data-original-title="Save & Close" data-placement="bottom">
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
                    New message
                </h3>
                <div class="ml-auto">
                    <button type="button" class="btn btn-outline-danger" data-action="toggle" data-class="d-flex" data-target="#panel-compose">Cancel</button>
                </div>
            </div>
            <!-- end mobile view -->
            <div class="panel-container show rounded-0 flex-1 d-flex flex-column">
                <div class="px-3">
                    <input id="message-to" type="text" placeholder="Recipients" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="2">
                    <a href="javascript:void(0)" class="position-absolute pos-right pos-top mt-3 mr-4" data-action="toggle" data-class="d-block" data-target="#message-to-cc" data-focus="message-to-cc" data-toggle="tooltip" data-original-title="Add Cc recipients" data-placement="bottom">Cc</a>
                    <input id="message-to-cc" type="text" placeholder="Cc" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 d-none" tabindex="3">
                    <input type="text" placeholder="Subject" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" tabindex="4">
                </div>
                <div class="flex-1" style="overflow-y: auto;">
                    <div id='fake_textarea' class="form-control rounded-0 w-100 h-100 border-0 py-3" contenteditable tabindex="5">
                        <br>
                        <br>
                        <div class="d-flex d-column align-items-start mb-3">
                            <!--<img src="img/logo.png" alt="SmartAdmin WebApp" class="mr-3 mt-1"> -->
                            <div class="border-left pl-3">
                                <span class="fw-500 fs-lg d-block l-h-n">Dr. Codex Lantern</span>
                                <span class="fw-400 fs-nano d-block l-h-n mb-1">Orthopedic Surgeon</span>
                                <a href="#" class="mr-1 fs-xl" style="color:#3b5998"><i class="fab fa-facebook-square"></i></a>
                                <a href="#" class="mr-1 fs-xl" style="color:#38A1F3"><i class="fab fa-twitter-square"></i></a>
                                <a href="#" class="mr-1 fs-xl" style="color:#0077B5"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="mr-1 fs-xl" style="color:#ff0000"><i class="fab fa-youtube-square"></i></a>
                            </div>
                        </div>
                        <div class="text-muted fs-nano">
                            ​PRIVATE AND CONFIDENTIAL. This e-mail, its contents and attachments are private and
                            confidential and is intended for the recipient only. Any disclosure, copying or unauthorized
                            use of such information is prohibited. If you receive this message in error, please notify
                            us immediately and delete the original and any copies and attachments.
                        </div>
                    </div>
                </div>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                    <a href="javascript:void(0);" class="btn btn-info mr-3">Send</a>
                    <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Formatting options" data-placement="top">
                        <i class="fas fa-font color-fusion-300"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
                        <i class="fas fa-paperclip color-fusion-300"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
                        <i class="fas fa-camera color-fusion-300"></i>
                    </a>
                    <div class="ml-auto">
                        <a href="javascript:void(0);" class="btn btn-icon fs-xl" data-toggle="tooltip" data-original-title="Disregard draft" data-placement="top">
                            <i class="fas fa-trash color-fusion-300"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
                            <i class="fas fa-ellipsis-v-alt color-fusion-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end compose message -->

</div>