CREATE VIEW vw_notificaciones AS 
SELECT 
documentos.id 
,documentos.numero_documento
,documentos.id_remitente
,documentos.id_destinatario
,documentos.id_asignado_a
,SUBSTRING(documentos.asunto, 1, 50) as asunto
,documentos.fecha_emision
,documentos.vigencia
,documentos.id_estatus
,DATEDIFF(documentos.fecha_emision, NOW()) as diferencia
,DATE_ADD(documentos.fecha_emision, INTERVAL documentos.vigencia DAY) as fecha_vencimiento
,DATEDIFF(DATE_ADD(documentos.fecha_emision, INTERVAL documentos.vigencia DAY), NOW()) as tiempo_limite
FROM documentos

WHERE documentos.fecha_emision >= '2020-01-01'  AND documentos.id_estatus IN (2, 6, 7)

ORDER BY documentos.fecha_emision DESC

DROP VIEW vw_notificaciones

