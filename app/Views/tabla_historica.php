<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="txt_csrfname">
<div class=" d-flex flex-column flex-grow-2 bg-white">
    <div class="flex-grow-0">
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <!-- <div class="panel-hdr">
                                        <h2>
                                            Example <span class="fw-300"><i>Table</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div> -->
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                    <tr>
                                        <th>Id del documento</th>
                                        <th>No de documento</th>
                                        <th>Fecha de emisión</th>
                                        <th>Expediente</th>
                                        <th>Asunto</th>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Seguimiento por</th>
                                        <th>Tipo de documento</th>
                                        <th>Expira</th>
                                    </tr>
                                </thead>
                                <tbody id="reporte_documetos" class="bg-secondary-600">

                                </tbody>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>