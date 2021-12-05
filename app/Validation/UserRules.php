<?php

namespace App\Validation;

use App\Models\UsuariosModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new UsuariosModel();
        $user = $model->where('user', $data['usuario'])
            ->first();

        $ldap = $this->LDAPValidation($data['usuario'], $data['password']);

        if ($ldap) {
            if (!$user) {
                $this->model->save([]);
            }
        } else {
            return false;
        }
    }

    private function LDAPValidation($usuario, $password)
    {
        $ladap_user = $usuario . "@conafor.gob.mx";
        $ldap_password = $password;
        $ldap_con = ldap_connect("10.0.0.7") or die("Could not connect to 
                                                      LDAP server");

        if (ldap_bind($ldap_con, $ladap_user, $ldap_password)) {
            return true;
        } else {
            return false;
        }
    }
}
