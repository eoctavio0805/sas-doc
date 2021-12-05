<!-- inbox container -->
<div class="d-flex flex-column flex-grow-1 bg-white">
    <!-- inbox header -->
    <div class="flex-grow-0">
        <!-- inbox title -->
        <div class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-4  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
        </div>
        <!-- end inbox title -->
    </div>
    <!-- end inbox header -->
    <!-- inbox message -->
    <div class="flex-wrap align-items-center flex-grow-1 position-relative bg-white mx-lg-3">
        <div class=" position-absolute pos-top pos-bottom w-100 custom-scroll">
            <div class=" d-flex h-100 flex-column" style="overflow-y: scroll;">
                <div class=" px-3">
                    <form class="was-validate">
                        <div class="input-group">
                            <input id="message-to" type="text" disabled placeholder="Número de doumento *" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Número de documento" tabindex="1" title="Capturar el número del documento">
                            <select id="tipo_documento" type="text" disabled placeholder="Tipo de documento *" data-toggle="tooltip" data-original-title="Tipo de documento" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="2" title="Seleccionar el tipo de documento">
                                <option value="0">Tipo de documento *</option>
                            </select>
                        </div>
                        <textarea placeholder="Asunto del documento *" id="asunto" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Asunto del documento" tabindex="3" title="Capturar el asunto del documento"></textarea>

                        <textarea placeholder="Nota del documento *" id="nota" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" data-toggle="tooltip" data-original-title="Nota del documento" tabindex="4" title="Capturar nota del documento"></textarea>

                        <div class="input-group">
                            <select id="remitente" type="text" placeholder="Remitente *" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Remitente" tabindex="5" title="Seleccionar un remitente">
                                <option value="0">Remitente *</option>
                            </select>
                            <input tabindex="9" type="text" id="expediente" name="expediente" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" data-toggle="tooltip" data-original-title="Expediente" placeholder="Expediente *" title="Capturar el número de expediente">
                        </div>

                        <div class="input-group">
                            <select id="destinatario" type="text" disabled placeholder="Destinatario *" data-toggle="tooltip" data-original-title="Destinatario" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="6" title="Seleccionar un destinatario">
                                <option value="0">Destinatario *</option>
                            </select>
                            <input tabindex="10" type="text" id="anexos" name="anexos" disabled data-toggle="tooltip" data-original-title="Anexos" placeholder="Anexos" title="Capturar si tiene anexos" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5">
                        </div>
                        <div class="input-group">
                            <input tabindex="7" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" id="fecha_emision" type="date" name="date" value="Fecha de emision" data-toggle="tooltip" data-original-title="Fecha de emisión" title="Seleccione o capture la fecha de emisión">
                            <input tabindex="8" disabled class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" id="hora_emision" size="4" type="time" name="time" value="Hora de emisión" data-toggle="tooltip" tabindex="8" data-original-title="Hora de emisión" title="Seleccione o capture la hora de emisión" value="12">
                        </div>

                </div>
                <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                    <!-- <div class="ml-auto"> -->
                    <a tabindex="19" href="<?= base_url() ?>/seguimiento_lectura" data-toggle="tooltip" style="width:120px" data-original-title="Regreasar al buzon de documentos" title="Regresar a los documentos disponibles" class="btn btn-primary btn-md waves-effect wave-themed"><span class="fal fa-chevron-left mr-1"></span>Regresar</a>

                    <a tabindex="17" href="<?= base_url() ?>/home" data-toggle="tooltip" style="height:50px; margin-left: 20px;" data-original-title="Crear documento" title="Descargar el documento disponible" class="btn btn-default btn-lg btn-icon waves-effect wave-themed"><i class="fal fa-file-pdf fa-3x"></i></a>

                    <a tabindex="18" href="<?= base_url() ?>/home" data-toggle="tooltip" style="width: 120px; margin-left: 20px;" data-original-title="Eliminar documento " title="Eliminar el documento disponible" class="btn btn-danger btn-md waves-effect wave-themed"><span class="fal fa-trash mr-1"></span>Eliminar</a>
                    <!-- </div> -->
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end inbox message -->
</div>

<!-- end inbox container -->