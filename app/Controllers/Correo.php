<?php

namespace App\Controllers;

use App\Models\TablaHistoricaModel;
use App\Models\NotasVistaModel;
use App\Models\UsuariosModel;


class Correo extends BaseController
{

    protected $email;
    protected $documento;
    protected $nota;
    protected $usuario;
    protected $config;

    public function __construct()
    {
        $this->email = \Config\Services::email();

        $this->config['protocol'] = 'mail';
        $this->config['SMTPHost'] = '10.254.253.1';
        $this->config['SMTPPort'] = '2525';
        $this->config['charset']  = 'UTF-8';
        $this->config['wordWrap'] = true;

        $this->email->initialize($this->config);

        $this->documento = new TablaHistoricaModel();
        $this->nota = new NotasVistaModel();
        $this->usuario = new UsuariosModel();
    }

    public function enviarCorreoNotificacion($idDocumento, $evento)
    {
        $datosDocumento = $this->documento->where('id', $idDocumento)->first();
        $datosNota = $this->nota->where('id', $idDocumento)->first();
        $listaCorreo = "";
        $remitente = $this->usuario->where('id', $datosDocumento['id_remitente'])->first();
        $destinatario = $this->usuario->where('id', $datosDocumento['id_destinatario'])->first();
        $asignado = $this->usuario->where('id', $datosDocumento['id_asignado_a'])->first();
        $asunto = "";
        $mensaje = "";
        if ($asignado) {
            $listaCorreo = $remitente['user'] . "@conafor.gob.mx, " . $destinatario['user'] . "@conafor.gob.mx, " . $asignado['user'] . "@conafor.gob.mx";
        } else {
            $listaCorreo = $remitente['user'] . "@conafor.gob.mx, " . $destinatario['user'] . "@conafor.gob.mx";
        }

        switch ($evento) {
            case 1:
                $asunto = "SAS-DOC .: Se recibió un nuevo documento '" . $datosDocumento['Numero_documento'] . "'";
                $mensaje = "Se ha recibido un nuevo documento en el SAS-DOC " . $datosDocumento['id'] . " - " . $datosDocumento['Numero_documento'] . "
                
                Tipo: " . $datosDocumento['Tipo_documento'] . "
                Asunto: " . $datosDocumento['Asunto'] . "
                Nota: " . $datosNota['nota'] . "
                Anexos: " . $datosDocumento['anexos'] . "
                Fecha de emisión: " . $datosDocumento['Fecha_emision'] . " " . $datosDocumento['Hora_emision'] . "
                Fecha de recepción: " . $datosDocumento['Fecha_recepcion'] . " " . $datosDocumento['Hora_recepcion'] . "
                Fueron establecidos " . $datosDocumento['vigencia'] . " días para atender este documento.";
                break;
            case 2:
                $asunto = "SAS-DOC .: El documento '" . $datosDocumento['Numero_documento'] . "' se vence el día de hoy y aun no tiene el estatus de atendido";
                $mensaje = "Se ha vencido un documento en el SAS-DOC " . $datosDocumento['id'] . " - " . $datosDocumento['Numero_documento'] . "
                
                Tipo: " . $datosDocumento['Tipo_documento'] . "
                Asunto: " . $datosDocumento['Asunto'] . "
                Nota: " . $datosNota['nota'] . "
                Anexos: " . $datosDocumento['anexos'] . "
                Fecha de emisión: " . $datosDocumento['Fecha_emision'] . " " . $datosDocumento['Hora_emision'] . "
                Fecha de recepción: " . $datosDocumento['Fecha_recepcion'] . " " . $datosDocumento['Hora_recepcion'] . "
                Fueron establecidos " . $datosDocumento['vigencia'] . " días</b> para atender este documento.";
                break;
            case 3:
                $asunto = "SAS-DOC .: El documento '" . $datosDocumento['Numero_documento'] . "' ha sido asignado a " . $asignado['nombre'] . " para su atención";
                $mensaje = "Asignacion del documento SAS-DOC " . $datosDocumento['id'] . " - " . $datosDocumento['Numero_documento'] . "
               
                Tipo: " . $datosDocumento['Tipo_documento'] . "
                Asunto: " . $datosDocumento['Asunto'] . "
                Nota: " . $datosNota['nota'] . "
                Anexos: " . $datosDocumento['anexos'] . "
                Fecha de emisión: " . $datosDocumento['Fecha_emision'] . " " . $datosDocumento['Hora_emision'] . "
                Fecha de recepción: " . $datosDocumento['Fecha_recepcion'] . " " . $datosDocumento['Hora_recepcion'] . "
                Fueron establecidos " . $datosDocumento['vigencia'] . " días para atender este documento.";
                break;
            case 4:
                $asunto = "SAS-DOC .: El documento '" . $datosDocumento['Numero_documento'] . "' ha sido atendido";
                $mensaje = "Se ha atendido en el SAS-DOC " . $datosDocumento['id'] . " - " . $datosDocumento['Numero_documento'] . "
                
                Tipo: " . $datosDocumento['Tipo_documento'] . "
                Asunto: " . $datosDocumento['Asunto'] . "
                Nota: " . $datosNota['nota'] . "
                Anexos: " . $datosDocumento['anexos'] . "
                Fecha de emisión: " . $datosDocumento['Fecha_emision'] . " " . $datosDocumento['Hora_emision'] . "
                Fueron establecidos " . $datosDocumento['vigencia'] . " días para atender este documento.;";
                break;
            case 5:
                $asunto = "SAS-DOC .: El documento '" . $datosDocumento['Numero_documento'] . "' se ha vencido";
                $mensaje = "Se ha vencido un documento en el SAS-DOC " . $datosDocumento['id'] . " - " . $datosDocumento['Numero_documento'] . "
               
                Tipo: " . $datosDocumento['Tipo_documento'] . "
                Asunto: " . $datosDocumento['Asunto'] . "
                Nota: " . $datosNota['nota'] . " 
                Anexos: " . $datosDocumento['anexos'] . "
                Fecha de emisión: " . $datosDocumento['Fecha_emision'] . " " . $datosDocumento['Hora_emision'] . "
                Fueron establecidos " . $datosDocumento['vigencia'] . " para atender este documento. ";
                break;
        }

        $this->email->setTo($listaCorreo);
        $this->email->setFrom('nocontestar@conafor.gob.mx');
        $this->email->setSubject($asunto);
        $this->email->setMessage($mensaje);
        $this->email->send();
    }

    /* public function enviarCorreo()
    {
        $email = \Config\Services::email();

        $config['protocol'] = 'mail';
        $config['SMTPHost'] = '10.254.253.1';
        $config['SMTPPort'] = '2525';
        $config['SMTPTimeout'] = 4000;
        $config['charset']  = 'UTF-8';
        $config['wordWrap'] = true;

        $email->initialize($config);

        $email->setTo('octavio.calderon@conafor.gob.mx');
        $email->setFrom('nocontestar@conafor.gob.mx');
        $email->setSubject('Email desde codeigniter');
        $email->setMessage('Hola mundo por email');
        $email->send();
        echo $email->printDebugger();
    }*/
}
