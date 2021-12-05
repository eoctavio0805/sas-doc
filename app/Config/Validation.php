<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $documentoGenerado = [
        'numero_documento' => 'required',
        'id_tipo_documento' => 'is_natural_no_zero',
        'asunto' => 'required',
        'nota' => 'required',
        'id_remitente' => 'is_natural_no_zero',
        'id_destinatario' => 'is_natural_no_zero',
        'expediente' => 'required',
        'fecha_emision' => 'required',
        'hora_emision' => 'required',
        'documento_generado' => 'uploaded[documento_generado]|max_size[documento_generado, 15000]|ext_in[documento_generado,pdf]'
        //documento_digital => uploaded[documento_digital.0] //para arreglos de archivos con la finalidad de verificar si almenos un archivo ha sido anexado
    ];

    public $documentoRecibido = [
        'numero_documento' => 'required',
        'id_tipo_documento' => 'is_natural_no_zero',
        'asunto' => 'required',
        'nota' => 'required',
        'id_remitente' => 'is_natural_no_zero',
        'id_destinatario' => 'is_natural_no_zero',
        'expediente' => 'required',
        'fecha_emision' => 'required',
        'fecha_recepcion' => 'required',
        'hora_recepcion' => 'required',
        'documento_recibido' => 'uploaded[documento_recibido]|max_size[documento_recibido, 15000]|ext_in[documento_recibido,pdf]'
    ];

    public $notaRespuesta = [
        'texto_respuesta' => 'required',
        'documento_asignado' => 'max_size[documento_asignado, 15000] | ext_in[documento_asignado,pdf]',

    ];

    public $notaAsignacion = [
        'usuario_asigando' => 'is_natural_no_zero',
        'texto_asigna' => 'required',
        'documento_respuesta' => 'max_size[documento_respuesta, 15000] | ext_in[documento_respuesta,pdf]'
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
