<?php

namespace App\Models;

use CodeIgniter\Model;

class BitacoraModel extends Model
{

    protected $table      = 'bitacora';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_usuario', 'usuario', 'id_documento', 'numero_documento', 'evento', 'objeto', 'fecha_evento'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
