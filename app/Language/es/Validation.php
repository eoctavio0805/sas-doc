<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// Validation language settings
return [
	// Core Messages
	'noRuleSets'            => 'No rulesets specified in Validation configuration.',
	'ruleNotFound'          => '{0} is not a valid rule.',
	'groupNotFound'         => '{0} is not a validation rules group.',
	'groupNotArray'         => '{0} rule group must be an array.',
	'invalidTemplate'       => '{0} is not a valid Validation template.',

	// Rule Messages
	'alpha'                 => 'El campo {field}  debe solo contener caracteres alfabeticos.',
	'alpha_dash'            => 'El campo {field}  debe solo contener alfanumericos, underscore, y dash characters.',
	'alpha_numeric'         => 'El campo {field}  debe solo contener caracteres alfanumericos.',
	'alpha_numeric_punct'   => 'El campo {field}  debe contener solo caracteres alfanumericos, espacios, y/o  ~ ! # $ % & * - _ + = | : . .',
	'alpha_numeric_space'   => 'El campo {field}  debe solo contener caracteres alfanumericos y/o espacios.',
	'alpha_space'           => 'El campo {field}  debe solo contener caracteres alfabeticos y/o espacios.',
	'decimal'               => 'El campo {field}  debe contener un numero decimal.',
	'differs'               => 'El campo {field}  debe ser diferente de {param}.',
	'equals'                => 'El campo {field}  debe ser exactamente: {param}.',
	'exact_length'          => 'El campo {field}  debe tener exactamente {param} caracteres.',
	'greater_than'          => 'El campo {field}  debe contener un número mayor a {param}.',
	'greater_than_equal_to' => 'El campo {field}  debe contener un número mayor a o igual que {param}.',
	'hex'                   => 'El campo {field}  debe solo contener caracteres hexadecimales.',
	'in_list'               => 'El campo {field}  debe be one of: {param}.',
	'integer'               => 'El campo {field}  debe contener an integer.',
	'is_natural'            => 'El campo {field}  debe solo contener digitos.',
	'is_natural_no_zero'    => 'El campo {field}  debe seleccionar un usuario',
	'is_not_unique'         => 'El campo {field}  debe existir en la base de datos.',
	'is_unique'             => 'El campo {field}  debe contener un valor unico.',
	'less_than'             => 'El campo {field}  debe contener un numero menor que {param}.',
	'less_than_equal_to'    => 'El campo {field}  debe contener un numero menor o igual que {param}.',
	'matches'               => 'El campo {field}  no coincide con el valor {param}.',
	'max_length'            => 'El campo {field}  no puede superar {param} caracteres de longitud.',
	'min_length'            => 'El campo {field}  debe tener al menos {param} caracteres de longitud.',
	'not_equals'            => 'El campo {field}  no puede ser: {param}.',
	'not_in_list'           => 'El campo {field}  no puede ser: {param}.',
	'numeric'               => 'El campo {field}  debe contener solo numeros.',
	'regex_match'           => 'El campo {field}  no tiene el formato correcto.',
	'required'              => 'El campo {field}  es requerido.',
	'required_with'         => 'El campo {field}  es requerido cuando {param} esta presente.',
	'required_without'      => 'El campo {field}  es requerido cuando {param} no está presente.',
	'string'                => 'El campo {field}  debe ser una cadena valida.',
	'timezone'              => 'El campo {field}  debe ser una zona horaria valida.',
	'valid_base64'          => 'El campo {field}  debe ser una cadena base64 valida.',
	'valid_email'           => 'El campo {field}  debe contener una dirección de correo valida.',
	'valid_emails'          => 'El campo {field}  debe contener direcciones de correo validas.',
	'valid_ip'              => 'El campo {field}  debe contener una IP valida.',
	'valid_url'             => 'El campo {field}  debe contener una URL valida.',
	'valid_date'            => 'El campo {field}  debe contener una fecha valida.',

	// Credit Cards
	'valid_cc_num'          => '{field} does not appear to be a valid credit card number.',

	// Files
	'uploaded'              => '{field} is not a valid uploaded file.',
	'max_size'              => '{field} is too large of a file.',
	'is_image'              => '{field} is not a valid, uploaded image file.',
	'mime_in'               => '{field} does not have a valid mime type.',
	'ext_in'                => '{field} does not have a valid file extension.',
	'max_dims'              => '{field} is either not an image, or it is too wide or tall.',
];
