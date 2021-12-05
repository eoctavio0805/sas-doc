<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionesModel extends Model
{

    protected $table      = 'vw_notificaciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'numero_documento', 'id_remitente', 'id_destinatario', 'id_asignado_a',
        'asunto', 'fecha_emision', 'vigencia', 'id_estatus'
    ];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
