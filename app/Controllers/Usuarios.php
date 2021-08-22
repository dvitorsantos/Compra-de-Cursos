<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
 
class Usuarios extends BaseController
{
    use ResponseTrait;
    public function index() {
        $model = new UsuarioModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
}