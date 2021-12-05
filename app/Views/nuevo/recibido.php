<input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
<!-- inbox container -->
<div class="d-flex flex-column flex-grow-1 bg-white">

    <!-- inbox header -->
    <div class="flex-grow-0">
        <!-- inbox title -->
        <div class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-4  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
            <!-- button for mobile -->
            <!--    <a href="javascript:void(0);"
                                            class="pl-3 pr-3 py-2 d-flex d-lg-none align-items-center justify-content-center mr-2 btn"
                                            data-action="toggle" data-class="slide-on-mobile-left-show"
                                            data-target="#js-inbox-menu">
                                            <i class="fal fa-ellipsis-v h1 mb-0 "></i>
                                        </a> -->
            <!-- end button for mobile -->
            <h1 class="subheader-title">
                <i class="fas fa-edit"></i>
                Registrar un documento nuevo recibido
            </h1>
        </div>
        <!-- end inbox title -->
    </div>
    <?php $valida = \Config\Services::validation(); ?>
    <!-- end inbox header -->
    <!-- inbox message -->
    <div class="flex-wrap align-items-center flex-grow-1 position-relative bg-white mx-lg-3">
        <div class=" position-absolute pos-top pos-bottom w-100 custom-scroll">
            <div class="d-flex h-100 flex-column" style=" overflow-y: scroll;">
                <div class="px-3">
                    <form method="POST" autocomplete="off" enctype="multipart/form-data" action="<?= base_url() ?>/registrar_documento_recibido">
                        <div class="input-group">
                            <?php if ($valida->hasError('numero_documento')) {
                                $error = "<div class='invalid-feedback'>Debe capturar el número de documento</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <input id="numero_documento" name="numero_documento" value="<?= old('numero_documento') ?>" required type="text" autofocus title="Capture el número de documento" placeholder="Número de doumento *" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Número de documento" tabindex="1">
                            <?php echo $error ?>
                            <?php if ($valida->hasError('id_tipo_documento')) {
                                $error = "<div class='invalid-feedback'>Debe capturar el tipo de documento</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <select id="id_tipo_documento" name="id_tipo_documento" title="Seleccione un tipo de documento" placeholder="Tipo de documento *" data-toggle="tooltip" data-original-title="Tipo de documento" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="2" required>
                                <option value="0">Seleccione un tipo de documento</option>
                                <?php foreach ($id_tipo_documento as $tipo) { ?>
                                    <option value="<?php echo $tipo['id'] ?>" <?php echo  $tipo['id'] == old('id_tipo_documento') ? 'selected' : '' ?>>
                                        <?php echo $tipo['nombre'] ?></option>
                                <?php } ?>
                            </select>
                            <?php echo $error ?>
                        </div>
                        <?php if ($valida->hasError('asunto')) {
                            $error = "<div class='invalid-feedback'>Debe capturar el asunto del documento</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <textarea placeholder="Asunto del documento *" id="asunto" name="asunto" title="Capture asunto del documento" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Asunto del documento" tabindex="3" required><?= old('asunto') ?></textarea>
                        <?php echo $error ?>

                        <?php if ($valida->hasError('nota')) {
                            $error = "<div class='invalid-feedback'>Debe capturar la nota del documento</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <textarea placeholder="Nota del documento *" id="nota" name="nota" title="Capture nota del documento" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Nota del documento" tabindex="4" required><?= old('nota') ?></textarea>
                        <?php echo $error ?>
                        <!-- <div class="input-group"> -->
                        <div class="input-group">
                            <?php if ($valida->hasError('id_remitente')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un remitente</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <select id="id_remitente" name="id_remitente" type="text" placeholder="Remitente *" title="Seleccione un remitente" style="width: 500px;" class="js-event-log js-data-example-ajax <?php echo $class ?> form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Remitente" tabindex="5" reuired>
                                <option value="0">Seleccione un remitente</option>
                                <?php if (isset($id_remitente)) { ?>
                                    <?php foreach ($id_remitente as $remi) { ?>
                                        <option value="<?php echo $remi['id'] ?>" <?php echo  $remi['id'] == old('id_remitente') ? 'selected' : '' ?>>
                                            <?php echo strtoupper($remi['nombre']); ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <?php echo $error ?>
                        </div>
                        </br>
                        <div class="input-group">
                            <?php if ($valida->hasError('id_destinatario')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un remitente</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <select id="id_destinatario" name="id_destinatario" type="text" placeholder="Destinatario *" title="Seleccione un destinatario" style="width: 500px;" class="js-event-log js-data-example-ajax <?php echo $class ?> form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Destinatario" tabindex="6" required>
                                <option value="0">Seleccione un destinatario</option>
                                <?php if (isset($id_destinatario)) { ?>
                                    <?php foreach ($id_destinatario as $dest) { ?>
                                        <option value="<?php echo $dest['id'] ?>" <?php echo  $dest['id'] == old('id_destinatario') ? 'selected' : '' ?>>
                                            <?php echo strtoupper($dest['nombre']); ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <?php echo $error ?>
                        </div>
                        </br>
                        <div class="input-group">
                            <?php if ($valida->hasError('id_asignado_a')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un remitente</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <select id="id_asignado_a" name="id_asignado_a" value="" type="text" placeholder="Asignado a" title="Seleccione a quien se le asignará el documento" style="width: 50%" class="js-data-example-ajax form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Asignado a" tabindex="7">
                                <option value=0>Seleccione a quien asignar</option>
                                <?php if (isset($id_asignado_a)) { ?>
                                    <?php foreach ($id_asignado_a as $asig) { ?>
                                        <option value="<?php echo $asig['id'] ?>" <?php echo  $asig['id'] == old('id_asignado_a') ? 'selected' : '' ?>>
                                            <?php echo strtoupper($asig['nombre']); ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <?php echo $error ?>
                        </div>
                        <!-- </div> -->
                        <div class="input-group">
                            <?php if ($valida->hasError('expediente')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un remitente</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <input id="expediente" name="expediente" value="<?= old('expediente') ?>" tabindex="7" type="text" name="expediente" title="Capture el expediente" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Expediente" placeholder="Expediente *" required>
                            <?php echo $error ?>

                            <input id="anexos" tabindex="8" type="text" name="anexos" value="<?= old('anexos') ?>" title="Capture los anexos" data-toggle="tooltip" data-original-title="Anexos" placeholder="Anexos" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5">
                        </div>
                        <div class="input-group">
                            <input tabindex="9" title="Seleccione o capture la fecha de emisión del documento" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" id="fecha_emision" type="date" name="fecha_emision" value="Fecha de emision" data-toggle="tooltip" data-original-title="Fecha de emisión" required>
                            <input tabindex="10" title="Seleccione o capture los día de vigencia del documento" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" type="number" id="vigencia" name="vigencia" value="0" min="0" data-toggle="tooltip" data-original-title="Días de vigencia">
                            </select>
                        </div>
                        <div class="input-group">
                            <input tabindex="11" title="Capture o seleccione la fecha de recepción del documento" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" id="fecha_recepcion" type="date" name="fecha_recepcion" value="Fecha de recepcion" data-toggle="tooltip" data-original-title="Fecha de recepción" value="" required>
                            <input tabindex="12" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" id="hora_recepcion" name="hora_recepcion" size="4" type="time" name="time" title="Seleccione o capture la hora de recepción del documento" value="Hora de recepcion" data-toggle="tooltip" data-original-title="Hora de recepción" required>
                        </div>
                        <br>
                        <br>
                        <div class="input-group">
                            <div class="input-group">
                                <?php if ($valida->hasError('documento_recibido')) {
                                    $error = "<div class='invalid-feedback'>Debe seleccionar un archivo</div>";
                                    $class = " is-invalid";
                                } else {
                                    $error = "";
                                    $class = "";
                                } ?>
                                <input type="file" class="form-control-file <?php echo $class ?>" tabindex="11" name="documento_recibido" id="documento_recibido" required />
                                <span name="old" value="<?= old('documento_recibido') ?>"></span>
                                <?php echo $error ?>
                            </div>
                        </div>
                </div>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                    <button tabindex="14" data-toggle="tooltip" style="width:100px" data-original-title="Crear documento" title="Guardar el documento capturado" class="btn btn-info btn-sm mr-3" type="submit">Guardar</button>
                    <a tabindex="15" href="<?= base_url() ?>/ir_a_bandeja" data-toggle="tooltip" style="width:100px" data-original-title="Cancelar y regresar" title="Cancelar la creación del documento" class="btn btn-dark btn-sm mr-3">Cancelar</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end inbox message -->
</div>
<!-- end inbox container -->