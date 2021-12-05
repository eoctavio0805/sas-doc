<?php

namespace App\Models;

use CodeIgniter\Model;

class NotasModel extends Model
{

    protected $table      = 'documento_notas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_documento', 'id_usuario', 'id_documento_adjunto', 'nota', 'fecha'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
