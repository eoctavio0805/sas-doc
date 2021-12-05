<?php

namespace App\Controllers;

use App\Models\TipoDocumentoModel;
use App\Models\UsuariosModel;
use App\Models\DocumentoModel;
use App\Models\NotasModel;
use App\Models\DocumentoAdjuntoModel;
use App\Controllers\Notificaciones;
use App\Controllers\Correo;

class DocumentoRecibido extends BaseController
{

    protected $tipo_documento;
    protected $usuarios;
    protected $documento;
    protected $nota;
    protected $notificaciones;
    protected $idUsuario;
    protected $correo;

    public function __construct()
    {
        $this->tipo_documento = new TipoDocumentoModel();
        $this->usuarios = new UsuariosModel();
        $this->documento = new DocumentoModel();
        $this->nota = new NotasModel();
        $this->notificaciones = new Notificaciones();
        $this->documentoAdjunto = new DocumentoAdjuntoModel();
        $this->idUsuario =  session()->get('id_usuario');
        $this->correo = new Correo();
        helper('form');
    }

    public function index()
    {
        /*
         Al cargar los valores los valores de cada catálogo de usuarios cada vez que se carge la página de generados
         permitirá fija el último valor utilizado, si no paso las validaciones, por lo que el usuario, no tendrá que
         volver a capturar ese dato, si lo capturó desde el principio.
        */

        $tipo_documento = $this->tipo_documento->orderBy('nombre', 'ASC')->findAll();
        $remitente = $this->usuarios->where('es_remitente', 1)->findAll();
        $destinatario = $this->usuarios->where('es_destinatario', 1)->findAll();
        $asignado = $this->usuarios->where('es_asignado', 1)->findAll();
        $usuario = $this->idUsuario; // Usuario de sesion
        $data = [
            'id_tipo_documento' => $tipo_documento,
            'id_remitente' => $remitente,
            'id_destinatario' => $destinatario,
            'id_asignado_a' => $asignado,
        ];

        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        echo view('header', $notificaciones);
        echo view('nuevo/recibido', $data);
        echo view('footer');
    }

    public function crear()
    {
        /*
         Se valida desde el servidor y en caso de no pasar las validaciones se marca en la base de datos al usuario
        y el rol que esta desempeñando para poder recuperarlo y mostrarlo al usuario en caso de que haya sido
        capturado y al mismo tiempo, se reedireccionará al formulario de captura para completar los campos faltantes.
        En caso de pasar las validaciones, se guardará el registro del documento generado.
        */

        $monthFolder = date('Y_m');
        $validation = $this->validate('documentoRecibido');

        if ($validation) {
            $asignadoPor = $this->idUsuario; //Usuario de sesion
            $fechaRecepcion = $this->request->getPost('fecha_recepcion');
            $horaRecepcion = $this->request->getPost('hora_recepcion');
            $fechaEmision = $this->request->getPost('fecha_emision');

            $timeStampRecepcion = $fechaRecepcion . " " . $horaRecepcion . ":00";
            $timeStampEmision = $fechaEmision . "  00:00:00";

            $asignadoA = $this->request->getPost('id_asignado_a');
            $estatus = $this->request->getPost('id_estatus');

            if ($asignadoA != 0) {
                $estatus = 7;
            } else {
                $estatus = 6;
                $asignadoPor = 0;
            }

            $this->documento->save([
                'numero_documento' => $this->request->getPost('numero_documento'),
                'expediente' => $this->request->getPost('expediente'),
                'id_remitente' => $this->request->getPost('id_remitente'),
                'id_destinatario' => $this->request->getPost('id_destinatario'),
                'id_asignado_a' => $asignadoA,
                'asunto' => $this->request->getPost('asunto'),
                'id_tipo_documento' => $this->request->getPost('id_tipo_documento'),
                'vigencia' => $this->request->getPost('vigencia'),
                'anexos' => $this->request->getPost('anexos'),
                'fecha_recepcion' => $timeStampRecepcion,
                //'fecha_emision' => $timeStampEmision,
                'fecha_emision' => date("Y-m-d H:i:s"),
                'id_asignado_por' => $asignadoPor,
                'id_estatus' => $estatus,

            ]);

            $idNuevoDocumento = $this->documento->insertID();

            $this->nota->save([
                'id_documento' => $idNuevoDocumento,
                'id_usuario' => $this->request->getPost('id_remitente'),
                'nota' => $this->request->getPost('nota'),
            ]);

            $documentoDigital = $this->request->getFile('documento_recibido');

            if ($documentoDigital->isValid() && !$documentoDigital->hasMoved()) {

                $documentoDigital->move('./documents/' . $monthFolder, $documentoDigital->getRandomName());

                $path = $monthFolder . "/" . $documentoDigital->getName();

                $this->documentoAdjunto->save([
                    'id_documento' => $idNuevoDocumento,
                    'path' => $path,
                ]);
            }

            $this->correo->enviarCorreoNotificacion($idNuevoDocumento, 1);

            return redirect()->route('ir_a_bandeja');
        } else {

            if (isset($_POST['id_remitente'])) {
                $idRemitente =  $_POST['id_remitente'];
                if ($idRemitente !== 0) {
                    $this->usuarios->update($idRemitente, ['es_remitente' => 1]);
                }
            }
            if (isset($_POST['id_destinatario'])) {
                $idDestinatario =  $_POST['id_destinatario'];
                if ($idDestinatario !== 0) {
                    $this->usuarios->update($idDestinatario, ['es_destinatario' => 1]);
                }
            }
            if (isset($_POST['id_asignado_a'])) {
                $idAsignado =  $_POST['id_asignado_a'];
                if ($idAsignado !== 0) {
                    $this->usuarios->update($idAsignado, ['es_asignado' => 1]);
                }
            }

            return redirect()->back()->withInput();
        }
    }
}
