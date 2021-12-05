<?php

namespace App\Controllers;

use App\Models\NotificacionesModel;
use App\Controllers\Correo;


class Notificaciones extends BaseController
{
    protected $notificaciones;
    protected $builder;
    protected $db;
    protected $correo;
    protected $sesion;

    public function __construct()
    {
        $this->notificaciones = new NotificacionesModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('vw_notificaciones');
        $this->correo = new Correo();
        $this->sesion = session();

        helper('form');
    }

    public function verPendientesPorUsuario($idUsuario)
    {

        $estatus = ['2', '6', '7'];
        $this->builder->whereIn('id_estatus', $estatus);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $idUsuario);
        $this->builder->orWhere('id_destinatario', $idUsuario);
        $this->builder->orWhere('id_asignado_a', $idUsuario);
        $this->builder->groupEnd();

        $totalSinAtender = $this->builder->countAllResults();

        $datosNotifica =  $this->notificaciones
            ->where('id_remitente', $idUsuario)
            ->orwhere('id_destinatario', $idUsuario)
            ->orWhere('id_asignado_a', $idUsuario)
            ->findAll(10);

        $data = [
            'notificaciones' => $datosNotifica,
            'total_sin_atender' => $totalSinAtender,
        ];

        return $data;
    }

    public function notificacionDocumentoVencido($datosNotifica)
    {
        foreach ($datosNotifica as $notifica) {
            if ($notifica['difrencia'] == 0 && $this->sesion->get('notificacion') == 1) {
                $this->correo->enviarCorreoNotificacion($notifica['id'], 5);
            }
        }
        $this->sesion->set('notificacion', 0);
    }
}
