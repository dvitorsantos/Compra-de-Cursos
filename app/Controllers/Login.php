<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
 
class Login extends BaseController
{
    use ResponseTrait;
    public function index() {
        
    }

    public function login() {
        $model = new UsuarioModel();
        $email = $this->request->getVar('email');
        $senha = $this->request->getVar('senha');
        $data = $model->getWhere(['email' => $email])->getResult();
        if ($data) {
            $pass = $data[0]->senha;
            $verify = password_verify($senha, $pass);
            if ($verify) {
                return $this->respond($data);
            }
        }

    }
}