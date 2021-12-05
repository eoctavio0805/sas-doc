<?php

namespace App\Controllers;

use App\Models\TablaHistoricaModel;
use App\Models\DocumentoModel;
use App\Models\TipoDocumentoModel;
use App\Models\UsuariosModel;
use App\Models\DocumentoAdjuntoModel;
use App\Models\BitacoraModel;
use App\Controllers\Notificaciones;


class DocumentoSeguimiento extends BaseController
{
    protected $bandeja;
    protected $usuarios;
    protected $db;
    protected $builder;
    protected $documento;
    protected $notificaciones;
    protected $docAdjunto;
    protected $bitacora;
    protected $idUsuario;
    protected $usuario;
    protected $correo;

    public function  __construct()
    {
        $this->bandeja = new TablaHistoricaModel();
        $this->documento = new DocumentoModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('vw_reportes_documentos');
        $this->tipoDocumento = new TipoDocumentoModel();
        $this->usuarios = new UsuariosModel();
        $this->notificaciones = new Notificaciones();
        $this->docAdjunto = new DocumentoAdjuntoModel();
        $this->bitacora = new BitacoraModel();
        $this->idUsuario = session()->get('id_usuario');
        $this->usuario = session()->get('usuario');
        $this->correo = new Correo();

        helper('form');
    }

    public function index()
    {
        $this->iniciarBandeja();
    }

    public function filtrarDocumentos()
    {
        /*
           Filtrado de búsqueda mediante la interacción del
           usuario.
        */
        $criterio = null;
        $usuario = $this->idUsuario;
        if (isset($_POST['criterio']) && (trim($_POST['criterio']) != '')) {
            $criterio = $_POST['criterio'];
        }

        $totalDocumentos = $this->builder->countAllResults();
        $this->builder->where('id_estatus', 3);
        $totalAtendidos = $this->builder->countAllResults();
        $this->builder->where('id_estatus', 6);
        $totalPendientes = $this->builder->countAllResults();
        $estatus = ['2', '7'];
        $this->builder->whereIn('id_estatus', $estatus);
        $totalAsignados = $this->builder->countAllResults();

        if (!is_null($criterio)) {
            $records = $this->bandeja->select('*')
                ->orLike('Numero_documento', $criterio)
                ->orLike('Asunto', $criterio)
                ->orLike('Seguimiento_por', $criterio)
                ->orLike('Fecha_emision', $criterio)->paginate(15);

            $datosBandeja = array();
            foreach ($records as $record) {
                $datosBandeja[] = array(
                    'id' => $record['id'],
                    'Numero_documento' => $record['Numero_documento'],
                    'Fecha_emision' => $record['Fecha_emision'],
                    'Hora_emision' => $record['Hora_emision'],
                    'Asunto' => $record['Asunto'],
                    'Seguimiento_por' => $record['Seguimiento_por'],
                    'estatus' => $record['estatus'],
                );
            }
            $empty = empty($datosBandeja);
            $data = [
                'datosBandeja' => $datosBandeja,
                'totalDocumentos' => $totalDocumentos,
                'totalAtendidos' => $totalAtendidos,
                'totalPendientes' => $totalPendientes,
                'totalAsignados' => $totalAsignados,
                'pager' => $this->bandeja->pager,
                'empty' => $empty

            ];
            $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);
            echo view('header', $notificaciones);
            echo view('bandeja', $data);
            echo view('footer');
        } else {

            $this->iniciarBandeja();
        }
    }

    public function iniciarBandeja()
    {
        $usuario = $this->idUsuario;

        //$this->builder->where('id_estatus', 3)
        //Filtrar por usuario todos los documentos disponibles
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $totalDocumentos = $this->builder->countAllResults();

        //Filtrar por documentos atendidos y por usuario
        $this->builder->where('id_estatus', 3);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAtendidos = $this->builder->countAllResults();

        $estatus = ['2', '7'];
        $this->builder->whereIn('id_estatus', $estatus);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAsignados = $this->builder->countAllResults();

        $this->builder->where('id_estatus', 6);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalPendientes = $this->builder->countAllResults();

        $empty = 0;

        $records = $this->bandeja->select('*')
            ->orWhere('id_remitente', $usuario)
            ->orWhere('id_destinatario', $usuario)
            ->orWhere('id_asignado_a', $usuario)->paginate(17);

        $datosBandeja = array();
        foreach ($records as $record) {
            $datosBandeja[] = array(
                'id' => $record['id'],
                'Numero_documento' => $record['Numero_documento'],
                'Fecha_emision' => $record['Fecha_emision'],
                'Hora_emision' => $record['Hora_emision'],
                'Asunto' => $record['Asunto'],
                'Seguimiento_por' => $record['Seguimiento_por'],
                'id_estatus' => $record['id_estatus'],
                'estatus' => $record['estatus']
            );
        }

        $data = [
            'datosBandeja' => $datosBandeja,
            'pager' => $this->bandeja->pager,
            'totalDocumentos' => $totalDocumentos,
            'totalAtendidos' => $totalAtendidos,
            'totalPendientes' => $totalPendientes,
            'totalAsignados' => $totalAsignados,
            'empty' => $empty
        ];

        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        echo view('header', $notificaciones);
        echo view('bandeja', $data);
        echo view('footer');
    }

    public function filtrarBandejaPorEstatus($estatus)
    {

        $usuario = $this->idUsuario; //usuario de sesión

        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $totalDocumentos = $this->builder->countAllResults();

        $this->builder->where('id_estatus', 3);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAtendidos = $this->builder->countAllResults();

        $this->builder->where('id_estatus', 6);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalPendientes = $this->builder->countAllResults();

        $asignado = ['2', '7'];
        $this->builder->whereIn('id_estatus', $asignado);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAsignados = $this->builder->countAllResults();



        if ($estatus == 7 || $estatus == 2) {
            $datosBandeja = $this->bandeja->whereIn('id_estatus', $asignado)
                ->groupStart()
                ->orwhere('id_remitente', $usuario)
                ->orwhere('id_destinatario', $usuario)
                ->orWhere('id_asignado_a', $usuario)
                ->groupEnd()
                ->paginate(17);
        } else {
            $datosBandeja = $this->bandeja->where('id_estatus', $estatus)
                ->groupStart()
                ->orwhere('id_remitente', $usuario)
                ->orwhere('id_destinatario', $usuario)
                ->orWhere('id_asignado_a', $usuario)
                ->groupEnd()
                ->paginate(17);
        }
        $empty = empty($datosBandeja);
        $data = [
            'datosBandeja' => $datosBandeja,
            'pager' => $this->bandeja->pager,
            'totalDocumentos' => $totalDocumentos,
            'totalAtendidos' => $totalAtendidos,
            'totalPendientes' => $totalPendientes,
            'totalAsignados' => $totalAsignados,
            'empty' => $empty
        ];

        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        echo view('header', $notificaciones);
        echo view('bandeja', $data);
        echo view('footer');
    }

    public function verDocumento($idDocumento)
    {

        $usuario = $this->idUsuario;
        $datosDocumento = $this->bandeja->where('id', $idDocumento)->first();
        $documentoAdjunto = $this->docAdjunto->where('id_documento', $idDocumento)->first();
        $tipoDoc = $this->tipoDocumento->orderBy('nombre', 'ASC')->findAll();
        $usuariosList = $this->usuarios->select('id, nombre')
            ->where('activo', 1)
            ->orderBy('nombre')
            ->findAll();

        $data = [
            'datos_documento' => $datosDocumento,
            'tipo_documento' => $tipoDoc,
            'usuarios' => $usuariosList,
            'documento_adjunto' => $documentoAdjunto
        ];

        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        echo view('header', $notificaciones);
        echo view('detalle/documento', $data);
        echo view('footer');
    }

    public function actualizaEstatus($estatus, $idDocumento)
    {

        $this->documento->where('id', $idDocumento)
            ->set(['id_estatus' => $estatus])
            ->update();

        $res['respuesta'] = "Actualizacion exitosa";

        $this->registrarBitacora($estatus, $idDocumento);
        echo json_encode($res);
    }

    public function registrarBitacora($estatus, $idDocumento)
    {

        $idUsuario = $this->idUsuario;
        $usuario = $this->usuario;
        $evento = "";
        $fechaEvento = date('Y-m-d H:i:s');

        switch ($estatus) {
            case 1:
                break;
            case 2:
                break;
            case 3:
                $evento = "Cambio de estatus a atendido";
                $this->correo->enviarCorreoNotificacion($idDocumento, 4);
                break;
            case 5:
                break;
            case 6:
                $evento = "Cambio de estatus a pendiente";
                break;
            case 7:
                $evento = "Cambio de estatus a asignado";
                break;
            case 8:
                $evento = "Cambio de estatus a eliminado";
                break;
        }

        $this->bitacora->save([
            'id_usuario' => $idUsuario,
            'usuario' => $usuario,
            'id_documento' => $idDocumento,
            'evento' => $evento,
            'fecha_evento' => $fechaEvento
        ]);
    }

    public function cargarEstadistica()
    {
        $usuario = $this->idUsuario;
        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);

        $this->builder->where('id_estatus', 3);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAtendidos = $this->builder->countAllResults();

        $estatus = ['2', '7'];
        $this->builder->whereIn('id_estatus', $estatus);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalAsignados = $this->builder->countAllResults();

        $this->builder->where('id_estatus', 6);
        $this->builder->groupStart();
        $this->builder->orWhere('id_remitente', $usuario);
        $this->builder->orWhere('id_destinatario', $usuario);
        $this->builder->orWhere('id_asignado_a', $usuario);
        $this->builder->groupEnd();
        $totalPendientes = $this->builder->countAllResults();

        $data = [
            'totalAtendidos' => $totalAtendidos,
            'totalPendientes' => $totalPendientes,
            'totalAsignados' => $totalAsignados,
        ];

        echo view('header', $notificaciones);
        echo view('estadistica', $data);
        echo view('footer');
    }
}
