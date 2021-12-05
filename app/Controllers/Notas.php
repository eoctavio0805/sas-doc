<?php

namespace App\Controllers;

use App\Models\DocumentoModel;
use App\Models\NotasVistaModel;
use App\Models\NotasModel;
use App\Models\TablaHistoricaModel;
use App\Models\DocumentoAdjuntoModel;
use App\Controllers\Notificaciones;
use App\Controllers\DocumentoSeguimiento;

class Notas extends BaseController
{
    protected $notasVista;
    protected $bandeja;
    protected $notas;
    protected $documento;
    protected $notificaciones;
    protected $monthFolder;
    protected $cambioStatus;
    protected $documentoAdjunto;
    protected $idUsuario;
    protected $correo;

    public function __construct()
    {
        $this->notasVista = new NotasVistaModel();
        $this->bandeja = new TablaHistoricaModel();
        $this->notas = new NotasModel();
        $this->documento = new DocumentoModel();
        $this->notificaciones = new Notificaciones();
        $this->cambioStatus = new DocumentoSeguimiento();
        $this->documentoAdjunto = new DocumentoAdjuntoModel();
        $this->idUsuario = session()->get('id_usuario');
        $this->correo = new Correo();

        helper('form');
        //$this->builder = $this->db->table('vw_notas');

    }

    public function verNotasPorDocumento($idDocumento)
    {
        $usuario = $this->idUsuario;
        $datosNotas = $this->notasVista->where('id', $idDocumento)
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'des')
            ->findAll();
        $datosBandeja = $this->bandeja->where('id', $idDocumento)->first();
        $data = [
            'datos_notas' => $datosNotas,
            'datos_bandeja' => $datosBandeja
        ];

        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        echo view('header', $notificaciones);
        echo view('notas', $data);
        echo view('footer');
    }

    public function asignarDocumento()
    {
        $monthFolder = date('Y_m');
        //$validation = $this->validate('notaAsignacion');
        $idDocumentoAdjunto = 0;

        // if ($validation) {
        $idDocumento = $this->request->getPost('id_documento');
        $documentoDigital = $this->request->getFile('documento_asignado');
        $idAsignadoA = $this->request->getPost('id_usuario_asigando');

        if ($documentoDigital) {
            if ($documentoDigital->isValid() && !$documentoDigital->hasMoved()) {
                $documentoDigital->move('./documents/' . $monthFolder, $documentoDigital->getRandomName());

                $path = $monthFolder . "/" . $documentoDigital->getName();
                $this->documentoAdjunto->save([
                    'id_documento' => $idDocumento,
                    'path' => $path,
                ]);

                $idDocumentoAdjunto = $this->documentoAdjunto->insertID();
            }
        }

        $this->notas->save([
            'id_documento' => $idDocumento,
            'id_usuario' => $this->idUsuario, // usuario sesión,
            'id_documento_adjunto' => $idDocumentoAdjunto,
            'nota' => $this->request->getPost('texto_asigna'),
        ]);
        $this->documento->where('id', $idDocumento)->set(['id_asignado_a' => $idAsignadoA])->update();
        $this->cambioStatus->actualizaEstatus(7, $idDocumento);
        $this->correo->enviarCorreoNotificacion($idDocumento, 3);
        //$this->documento->where('id', $idDocumento)->set(['id_estatus' => 3])->update();
        //  return redirect()->to(base_url() . '/ver_notas/"' . $idDocumento . '/' . $estatus);
        // } else {
        //return redirect()->back()->withInput();
        // }
        $this->verNotasPorDocumento($idDocumento);
    }

    public function respuestaDocumento()
    {
        $monthFolder = date('Y_m');
        // $validation = $this->validate('notaRespuesta');
        $idDocumentoAdjunto = 0;

        // if ($validation) {

        $idDocumento = $this->request->getPost('id_documento');
        //$estatus = $this->request->getPost('id_estatus');

        $documentoDigital = $this->request->getFile('documento_respuesta');

        if ($documentoDigital) {
            if ($documentoDigital->isValid() && !$documentoDigital->hasMoved()) {
                $documentoDigital->move('./documents/' . $monthFolder, $documentoDigital->getRandomName());

                $path = $monthFolder . "/" . $documentoDigital->getName();
                $this->documentoAdjunto->save([
                    'id_documento' => $idDocumento,
                    'path' => $path,
                ]);

                $idDocumentoAdjunto = $this->documentoAdjunto->insertID();
            }
        }

        // if ($documentoDigital->isValid() && !$documentoDigital->hasMoved()) {


        //}

        $this->notas->save([
            'id_documento' => $idDocumento,
            'id_usuario' => $this->idUsuario, // usuario sesión
            'id_documento_adjunto' => $idDocumentoAdjunto,
            'nota' => $this->request->getPost('texto_respuesta'),
        ]);

        $this->documento->where('id', $idDocumento)->set(['id_estatus' => 3])->update();
        //$this->cambioStatus->actualizaEstatus(3, $idDocumento);
        $this->correo->enviarCorreoNotificacion($idDocumento, 4);
        $this->verNotasPorDocumento($idDocumento);
        /*} else {
            return redirect()->back()->withInput();
        }*/
    }
}
