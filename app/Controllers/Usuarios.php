<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        helper('form');
    }

    public function index()
    {
        helper(['form']);
        echo view('usuarios/login');
    }

    public function getUsuarios()
    {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {

            $usuarioslist = $this->usuarios->select('id, nombre')
                ->where('activo', 1)
                ->orderBy('nombre')
                ->findAll(5);
        } else {
            $searchTerm = $postData['searchTerm'];
            $usuarioslist = $this->usuarios->select('id, nombre')
                ->where('activo', 1)
                ->like('nombre', $searchTerm)
                ->orderBy('nombre')
                ->findAll(5);
        }
        // ucwords(strtolower($remi['nombre'])
        $data = array();
        foreach ($usuarioslist as $usuario) {
            $data[] = array(
                "id" => $usuario['id'],
                "text" => strtoupper($usuario['nombre'])
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    public function asignaToken()
    {
        $session = session();
        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            //print_r($data);
            $usuario = $data['usuario'];
            $nombre = $data['nombre_completo'];

            if (!$this->buscarUsuario($usuario)) {
                $this->crearUsuario($usuario, $nombre);
            } else {
                $this->activarUsuario($usuario);
            }
            //$password = $data['pass'];
            $idUsuario = $this->usuarios->where('user', $usuario)->first();
            $gerencia = explode('=', explode(',', $data['pertenencia'])[1])[1];
            $coordinacion = explode('=', explode(',', $data['pertenencia'])[2])[1];
            $session->set(array(
                'token' => $data['token'],
                'nombre_completo' => $data['nombre_completo'],
                'gerencia' => $gerencia,
                'coordinacion' => $coordinacion,
                'email' => $data['email'],
                'ext' => $data['ext'],
                'num_emp' => $data['num_emp'],
                'emp_type' => $data['emp_type'],
                'puesto' => $data['puesto'],
                'id_usuario' => $idUsuario['id'],
                'usuario' => $data['usuario'],
                'isLoggedIn' => true,
                'notificacion' => 1

            ));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function buscarUsuario($usuario)
    {

        $this->usuarios->select('*');
        $this->usuarios->where('user', $usuario);
        $usuario = $this->usuarios->get()->getRow();
        return $usuario;
    }

    public function activarUsuario($usuario)
    {
        $this->usuarios->where('user', $usuario)
            ->set(['activo' => 1])
            ->update();
    }

    public function crearUsuario($usuario, $nombre)
    {
        $data = [
            'user' => $usuario,
            'nombre' => $nombre,
            'activo' => 1
        ];
        $this->usuarios->insert($data);
    }
}
