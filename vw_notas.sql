 create view vw_notas AS 
 SELECT
documentos.id
,documento_notas.id as id_nota
,documento_notas.nota
,id_usuario
,documento_notas.id_documento_adjunto
,ifnull(documento_adjuntos.path, "") as path
,ifnull(catalogo_usuarios.nombre, "Sin usuario") as usuario
,DATE_FORMAT(documento_notas.fecha, "%d/%m/%Y") as fecha
,TIME_FORMAT(documento_notas.fecha, '%H:%i') as hora

FROM documento_notas

LEFT JOIN documentos ON 
documento_notas.id_documento = documentos.id
LEFT JOIN catalogo_usuarios ON 
documento_notas.id_usuario = catalogo_usuarios.id
LEFT JOIN documento_adjuntos ON 
documento_adjuntos.id = documento_notas.id_documento_adjunto
