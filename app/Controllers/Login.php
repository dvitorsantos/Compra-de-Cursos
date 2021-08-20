<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
  
    public function signin()
    {
        $session = session();
        $model = new UsuarioModel();

        $email = $this->request->getVar('email');
        $senha = $this->request->getVar('senha');
        
        $data = $model->where('email', $email)->first();
        
        if($data){
            $pass = $data['senha'];
            $pwd_verify = password_verify($senha, $pass);
            if($pwd_verify){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isSignedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'wrong senha.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'wrong email.');
            return redirect()->to('/login');
        }
    }
}