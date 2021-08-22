<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
 
class Register extends BaseController
{
    use ResponseTrait;
    public function index() {
        
    }

    public function register() {
        $model = new UsuarioModel();
        $data = [
            'nome'     => $this->request->getVar('nome'),
            'email'    => $this->request->getVar('email'),
            'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
        ];
    
        if($model->insert($data)){
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ]
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }
}