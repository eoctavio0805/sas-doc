CREATE VIEW vw_reportes_documentos AS
SELECT 
 documentos.id
,documentos.numero_documento as Numero_documento
,DATE_FORMAT(fecha_recepcion, "%d/%m/%Y") as Fecha_recepcion
,DATE(documentos.fecha_recepcion) as fecha_rece
,TIME_FORMAT(fecha_recepcion, '%H:%i') as Hora_recepcion
,DATE(documentos.fecha_emision) as fecha_emis
,DATE_FORMAT(fecha_emision, "%d/%m/%Y") as Fecha_emision
,TIME_FORMAT(fecha_emision, '%H:%i') as Hora_emision
,documentos.expediente as Expediente
,documentos.asunto as Asunto
,documentos.id_remitente
,documentos.remitente as Remitente
,documentos.id_destinatario
,destinatario.nombre as Destinatario
,documentos.id_asignado_a
,ifnull(asignado.nombre, "No asignado") as Seguimiento_por
,documentos.id_tipo_documento
,tipo_documento.nombre as Tipo_documento
,documentos.vigencia
,concat(documentos.vigencia, " dias") as Expira
,documentos.id_estatus
,documentos.anexos
,catalogo_estatus.estatus

FROM documentos
LEFT JOIN catalogo_usuarios destinatario ON
documentos.id_destinatario = destinatario.id
LEFT JOIN catalogo_usuarios asignado ON
documentos.id_asignado_a = asignado.id
LEFT JOIN catalogo_tipo_documento tipo_documento ON
documentos.id_tipo_documento = tipo_documento.id
LEFT JOIN catalogo_estatus ON 
documentos.id_estatus = catalogo_estatus.id

WHERE id_estatus <> 8 AND fecha_emision >= '2020-01-01'

ORDER BY id DESC
