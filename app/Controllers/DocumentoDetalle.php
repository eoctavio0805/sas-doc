<?php

namespace App\Controllers;

use App\Models\TablaHistoricaModel;
use App\Controllers\Notificaciones;

class DocumentoDetalle extends BaseController
{

    protected $tabla_historica;
    protected $notificaciones;
    protected $idUsuario;

    public function __construct()
    {
        $this->tabla_historica = new TablaHistoricaModel();
        $this->notificaciones = new Notificaciones();
        $this->idUsuario = session()->get('id_usuario');
    }

    public function index()
    {
        $usuario = $this->idUsuario;
        $notificaciones = $this->notificaciones->verPendientesPorUsuario($usuario);
        echo view('header', $notificaciones);
        echo view('tabla_historica');
        echo view('footer');
    }

    public function llenarTablaHistorica()
    {
        $request = service('request');
        $postData = $request->getPost();
        $dtpostData = $postData['data'];

        $draw = $dtpostData['draw'];
        $start = $dtpostData['start'];
        $rowperpage = $dtpostData['length'];
        $columnIndex = $dtpostData['order'][0]['column'];
        $columnName = $dtpostData['columns'][$columnIndex]['data'];
        $columnSortOrder = $dtpostData['order'][0]['dir'];
        $searchValue = $dtpostData['search']['value'];

        ##Numero de registros totales sin filtro
        $totalRecords = $this->tabla_historica->select('id')->countAllResults();
        ##Numero de registros con el filtro de búsqueda
        $totalRecordwithFilter = $this->tabla_historica->select('id')
            ->orLike('id', $searchValue)
            ->orLike('Numero_documento', $searchValue)
            ->orLike('Fecha_emision', $searchValue)
            ->orLike('Expediente', $searchValue)
            ->orLike('Asunto', $searchValue)
            ->orLike('Remitente', $searchValue)
            ->orLike('Destinatario', $searchValue)
            ->orLike('Seguimiento_por', $searchValue)
            ->orLike('Tipo_documento', $searchValue)
            ->orLike('Expira', $searchValue)
            ->countAllResults();

        ##Obtener registros
        $response = array();
        $records = $this->tabla_historica->select('*')
            ->orLike('id', $searchValue)
            ->orLike('Numero_documento', $searchValue)
            ->orLike('Fecha_emision', $searchValue)
            ->orLike('Expediente', $searchValue)
            ->orLike('Asunto', $searchValue)
            ->orLike('Remitente', $searchValue)
            ->orLike('Destinatario', $searchValue)
            ->orLike('Seguimiento_por', $searchValue)
            ->orLike('Tipo_documento', $searchValue)
            ->orLike('Expira', $searchValue)
            //->orderBy($columnName, $columnSortOrder)
            ->orderBy($columnName, 'DESC')
            ->findAll($rowperpage, $start);


        $data = array();
        foreach ($records as $record) {
            $data[] = array(
                'id' => $record['id'],
                'Numero_documento' => $record['Numero_documento'],
                'Fecha_emision' => $record['Fecha_emision'],
                'Expediente' => $record['Expediente'],
                'Asunto' => $record['Asunto'],
                'Remitente' => $record['Remitente'],
                'Destinatario' => $record['Destinatario'],
                'Seguimiento_por' => $record['Seguimiento_por'],
                'Tipo_documento' => $record['Tipo_documento'],
                'Expira' => $record['Expira'],
            );
        }

        $response = array(
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordwithFilter,
            'aaData' => $data,
            'token' => csrf_hash()

        );

        return $this->response->setJSON($response);
    }
}
