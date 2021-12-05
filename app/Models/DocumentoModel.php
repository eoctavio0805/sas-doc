<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentoModel extends Model
{

    protected $table = 'documentos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'numero_documento', 'expediente', 'fecha_emision', 'fecha_recepcion',
        'id_remitente', 'id_destinatario', 'asunto', 'anexos', 'id_tipo_documento',
        'id_asignado_a', 'id_asignado_por', 'fecha_asignado', 'id_estatus', 'vigencia'
    ];

    protected $useTimestamps = true;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
