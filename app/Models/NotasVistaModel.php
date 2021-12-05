<?php

namespace App\Models;

use CodeIgniter\Model;

class NotasVistaModel extends Model
{

    protected $table      = 'vw_notas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_notas', 'nota', 'id_usuario', 'id_documento_adjunto', 'path', 'usuario', 'fecha', 'hora'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
