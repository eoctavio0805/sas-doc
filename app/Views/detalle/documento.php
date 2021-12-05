<?php $sesion = session(); ?>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $sesion->get('usuario'); ?>">
<div class="col-xl-12">
  <!-- <h1 class="subheader-title" style="margin-top: 50px; margin-left: 30px;"> -->
  <h1 class="subheader-title" style="margin-top: 50px; margin-left: 60px;">
    <i class="fas fa-file mr-2 hidden-lg-down"></i>
    Revisión del documento
  </h1>
  <div class="panel" style="margin-left:30px; margin-top: 40px; margin-bottom:50px ; margin-right: 30px;">

    <div class="panel-container show">
      <div class="panel-content">
        <form>
          <div class="form-group mb-0">
            <div class="row">
              <div class="col-6">
                <label class="form-label text-muted" for="numero_documento">Numero de documento</label>
              </div>
              <div class="col-6">
                <label class="form-label text-muted" for="id_tipo_documento">Tipo de documento</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <input type="hidden" id="id_documento" name="id_documento" value="<?php echo $datos_documento['id'] ?>">
                <input type="text" id="numero_documento" name="numero_documento" value="<?php echo $datos_documento['Numero_documento'] ?>" class="form-control" disabled>
              </div>
              <div class="col-6">
                <?php $selected =  $datos_documento['id_tipo_documento'] ?>
                <select class="form-control" id="id_tipo_documento" name="id_tipo_documento" disabled>
                  <?php
                  foreach ($tipo_documento as $td) {
                    if ($selected == $td['id']) {
                      echo "<option selected='selected' value='" . $td['id'] . "'>" . $td['nombre'] . "</option>";
                    } else {
                      echo "<option value=0>Sin tipo de documento</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <label class="form-label text-muted" for="asunto">Asunto del documento</label>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <textarea class="form-control" id="asunto" name="asunto" rows="2" disabled><?php echo  $datos_documento['Asunto'] ?></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <label class="form-label text-muted" for="id_remitente">Remitente</label>
              </div>
              <div class="col-6">
                <label class="form-label text-muted" for="expediente">Expediente</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <?php $selected = $datos_documento['id_remitente']; ?>
                <select class="form-control" id="id_remitente" name="id_remitente" disabled>
                  <option value=0>Sin remitente</option>
                  <?php
                  foreach ($usuarios as $user) {
                    if ($selected == $user['id']) {
                      echo "<option selected='selected' value='" . $user['id'] . "'>" . $user['nombre'] . "</option>";
                    } else {
                      echo "<option value=0>Sin remitente</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <input type="text" id="expediente" name="expediente" value="<?php echo $datos_documento['Expediente'] ?>" class="form-control" disabled>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <label class="form-label text-muted" for="id_destinatario">Destinatario</label>
              </div>
              <div class="col-6">
                <label class="form-label text-muted" for="anexos">Anexos</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <?php $selected = $datos_documento['id_destinatario']; ?>
                <select class="form-control" id="id_destinatario" name="id_destinatario" disabled>
                  <option value=0>Sin destinatario</option>
                  <?php
                  foreach ($usuarios as $user) {
                    if ($selected == $user['id']) {
                      echo "<option selected='selected' value='" . $user['id'] . "'>" . $user['nombre'] . "</option>";
                    } else {
                      echo "<option value=0>Sin destinatarios</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <input type="text" id="anexos" name="anexos" value="<?php echo $datos_documento['anexos'] ?>" class="form-control" disabled>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <label class="form-label text-muted" for="id_asignado_a">Asignado a</label>
              </div>
              <div class="col-6">
                <label class="form-label text-muted" for="vigencia">Dias de vigencia</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <?php $selected = $datos_documento['id_asignado_a']; ?>
                <select class="form-control" id="id_asignado_a" name="id_asignado_a" disabled>
                  <option value=0>No asignado</option>
                  <?php
                  foreach ($usuarios as $user) {
                    if ($selected == $user['id']) {
                      echo "<option selected='selected' value='" . $user['id'] . "'>" . $user['nombre'] . "</option>";
                    } else {
                      echo "<option value=0>No asignado</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <input tabindex="15" class="form-control" type="number" id="vigencia" name="vigencia" value="<?php echo $datos_documento['vigencia'] ?>" min="0" disabled></select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-3">
                <label class="form-label text-muted" for="fecha_recepcion">Fecha de recepción</label>
              </div>
              <div class="col-3">
                <label class="form-label text-muted" for="hora_recepcion">Hora de recepción</label>
              </div>
              <div class="col-3">
                <label class="form-label text-muted" for="fecha_emision">Fecha de emisión</label>
              </div>
              <div class="col-3">
                <label class="form-label text-muted" for="anexos">Hora de emisión</label>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <input tabindex="8" class="form-control " id="fecha_rec" name="fecha_rece" type="date" value="<?php echo $datos_documento['fecha_rece']; ?>" disabled>
              </div>
              <div class="col-3">
                <input tabindex="9" class="form-control" id="hora_rece" value="<?php echo $datos_documento['Hora_recepcion'] ?>" size="4" type="time" name="time" disabled>
              </div>
              <div class="col-3">
                <input tabindex="8" class="form-control " id="fecha_emi" type="date" name="fecha_emi" value="<?php echo $datos_documento['fecha_emis'] ?>" disabled>
              </div>
              <div class="col-3">
                <input tabindex="9" class="form-control" id="hora_emi" name="hora_emi" size="4" value="<?php echo $datos_documento['Hora_emision'] ?>" type="time" name="time" disabled>
              </div>
            </div>
            <br>
            <br>
            <div class="row h-300">
              <div class="col-5 text-right">
                <a tabindex="19" href="<?= base_url() ?>/ver_notas/<?php echo $datos_documento['id'] ?>/<?php echo $datos_documento['id_estatus'] ?>" data-toggle="tooltip" style="width:120px" data-original-title="Regreasar a las notas" title="Regresar a las notas" class="btn btn-primary btn-md waves-effect wave-themed"><span class="fal fa-chevron-left mr-1"></span>Regresar</a>
              </div>
              <div class="col-2 text-center">
                <a tabindex="17" href="<?= base_url() ?>/documents/<?php echo $documento_adjunto['path'] ?>" data-toggle="tooltip" target="_blank" style="height:50px; margin-left: 20px;" data-original-title="Crear documento" title="Descargar el documento disponible" class="btn btn-default btn-lg btn-icon waves-effect wave-themed"><i class="fal fa-file-pdf fa-3x"></i></a>
              </div>
              <div class="col-5 text-left">
                <button type="button" tabindex="18" id="elimina_documento" data-toggle="tooltip" style="width: 120px; margin-left: 20px;" data-original-title="Eliminar documento " title="Eliminar el documento disponible" class="btn btn-danger btn-md waves-effect wave-themed"><span class="fas fa-trash mr-1"></span>Eliminar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>