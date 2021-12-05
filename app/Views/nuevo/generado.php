<!-- inbox container -->
<div class="d-flex flex-column flex-grow-1 bg-white">
    <!-- inbox header -->
    <div class="flex-grow-0">
        <!-- inbox title -->
        <div class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-4  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
            <!-- button for mobile -->
            <!-- end button for mobile -->
            <h1 class="subheader-title">
                <i class="fas fa-edit"></i>
                Crear un documento generado en el área
            </h1>

        </div>
        <!-- end inbox title -->
    </div>
    <?php $valida = \Config\Services::validation(); ?>
    <!-- end inbox header -->
    <!-- inbox message -->
    <div class="flex-wrap align-items-center flex-grow-1 position-relative bg-white mx-lg-3">
        <div class=" position-absolute pos-top pos-bottom w-100 custom-scroll">
            <div class=" d-flex h-100 flex-column" style="overflow-y: scroll;">
                <div class=" px-3">
                    <form method="post" id="formGenerado" enctype="multipart/form-data" action="<?= base_url() ?>/DocumentoGenerado/crear">
                        <div class="input-group">
                            <?php if ($valida->hasError('numero_documento')) {
                                $error = "<div class='invalid-feedback'>Debe capturar el número de documento</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <input id="numero_documento" value="<?= old('numero_documento') ?>" required name="numero_documento" type="text" placeholder="Número de doumento *" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Número de documento" tabindex="1" title="Capture el número del documento" autofocus>
                            <?php echo $error ?>
                            <?php if ($valida->hasError('id_tipo_documento')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un tipo de documento</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <select id="id_tipo_documento" name="id_tipo_documento" type="text" placeholder="Tipo de documento *" data-toggle="tooltip" data-original-title="Tipo de documento" class="form-control <?php echo $class ?>  border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="2" title="Seleccionar el tipo de documento">
                                <option value=0>Seleccione un tipo de documento</option>
                                <?php foreach ($id_tipo_documento as $tipo) { ?>
                                    <option value="<?php echo $tipo['id'] ?>" <?php echo  $tipo['id'] == old('id_tipo_documento') ? 'selected' : '' ?>>
                                        <?php echo $tipo['nombre'] ?></option>
                                <?php } ?>
                            </select>
                            <?php echo $error ?>
                        </div>
                        <?php if ($valida->hasError('asunto')) {
                            $error = "<div class='invalid-feedback'>Debe proporcionar el asunto</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <textarea placeholder="Asunto del documento *" id="asunto" name="asunto" value="" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Asunto del documento" tabindex="3" title="Capturar el asunto del documento" required><?= old('asunto') ?></textarea>
                        <?php echo $error ?>
                        <?php if ($valida->hasError('nota')) {
                            $error = "<div class='invalid-feedback'>Debe proporcionar una nota</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <textarea placeholder="Nota del documento *" id="nota" name="nota" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Nota del documento" tabindex="4" title="Capturar nota del documento" required><?= old('nota') ?></textarea>
                        <?php echo $error ?>
                        <!--    <div class="input-group"> -->
                        <?php if ($valida->hasError('id_remitente')) {
                            $error = "<div class='invalid-feedback'>Debe seleccionar un remitente</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <div class="input-group">
                            <select id="id_remitente" name="id_remitente" type="text" placeholder="Remitente *" title="Seleccione un remitente" style="width: 500px;" class="js-event-log js-data-example-ajax <?php echo $class ?> form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Remitente" tabindex="5" required>
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
                        <br>
                        <?php if ($valida->hasError('id_destinatario')) {
                            $error = "<div class='invalid-feedback'>Debe seleccionar un destinatario</div>";
                            $class = " is-invalid";
                        } else {
                            $error = "";
                            $class = "";
                        } ?>
                        <div class="input-group">
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
                        <br>
                        <div class="input-group">
                            <select id="id_asignado_a" name="id_asignado_a" value="" type="text" placeholder="Asignado a" title="Seleccione a quien se le asignará el documento" style="width: 50%" class="js-data-example-ajax form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Asignado a" tabindex="7">
                                <option value=0>Seleccione a quien asignar</option>
                                <?php if (isset($id_asignado_a)) { ?>
                                    <?php foreach ($id_asignado_a as $asig) { ?>
                                        <option value="<?php echo $asig['id'] ?>" <?php echo  $asig['id'] == old('id_asignado_a') ? 'selected' : '' ?>>
                                            <?php echo strtoupper($asig['nombre']); ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <!--    </div> -->
                        <div class="input-group">
                            <?php if ($valida->hasError('expediente')) {
                                $error = "<div class='invalid-feedback'>Debe proporcionar el expediente</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <input tabindex="9" type="text" id="expediente" name="expediente" value="<?= old('expediente') ?>" class="form-control <?php echo $class ?> border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Expediente" placeholder="Expediente *" title="Capturar el número de expediente" required>
                            <?php echo $error ?>
                            <input tabindex="10" type="text" id="anexos" name="anexos" value="<?= old('anexos') ?>" data-toggle="tooltip" data-original-title="Anexos" placeholder="Anexos" title="Capturar si tiene anexos" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5">
                        </div>
                        <div class="input-group">
                            <input tabindex="7" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" type="date" id="fecha_emision" name="fecha_emision" value="" data-toggle="tooltip" data-original-title="Fecha de emisión" title="Seleccione o capture la fecha de emisión">
                            <input tabindex="8" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" size="4" type="time" name="hora_emision" id="hora_emision" value="" data-toggle="tooltip" tabindex="8" data-original-title="Hora de emisión" title="Seleccione o capture la hora de emisión">
                            <input tabindex="10" title="Seleccione o capture los día de vigencia del documento" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" type="number" id="vigencia" name="vigencia" value="0" min=" 0" data-toggle="tooltip" data-original-title="Días de vigencia">
                        </div>

                        <br>
                        <br>
                        <div class="input-group">
                            <?php if ($valida->hasError('documento_generado')) {
                                $error = "<div class='invalid-feedback'>Debe seleccionar un archivo</div>";
                                $class = " is-invalid";
                            } else {
                                $error = "";
                                $class = "";
                            } ?>
                            <input type="file" class="form-control-file <?php echo $class ?>" tabindex="11" name="documento_generado" id="documento_generado" required />
                            <span name="old" value="<?= old('documento_generado') ?>"></span>
                            <?php echo $error ?>

                        </div>
                </div>
                <br />
                <br />
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                    <!-- <div class="ml-auto"> -->
                    <button data-toggle="tooltip" tabindex="12" style="width:100px;" data-original-title="Guardar" title="Crear el documento" type="submit" class="btn btn-info btn-sm mr-3">
                        Guardar</button>
                    <a href="<?= base_url() ?>/ir_a_bandeja" data-toggle="tooltip" tabindex="13" style="width:100px" data-original-title="Cancelar y regresar" title="Cancelar el documento y regresar" class="btn btn-dark btn-sm mr-3">Cancelar</a>
                    <!-- </div> -->

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end inbox message -->
</div>


<!-- end inbox container -->