<?php

namespace App\Models;

use CodeIgniter\Model;

class TablaHistoricaModel extends Model
{

    protected $table      = 'vw_reportes_documentos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'Numero_documento', 'Fecha_emision', 'Expediente', 'Asunto',
        'Remitente', 'Destinatario', 'Seguimiento_por',
        'Tipo_documento', 'Expira', 'id_estatus', 'estatus'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
